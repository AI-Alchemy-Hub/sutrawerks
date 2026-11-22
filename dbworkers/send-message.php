<?php
/**
 * @file dbworkers/send-message.php
 * @description Secure POST processing worker for B2B contact inquiries.
 */
declare(strict_types=1);

require_once __DIR__ . '/../includes/security-headers.php';
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../db/dbconfig.php';
require_once __DIR__ . '/../includes/mailer.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../contact.php');
    exit;
}

// 1. Validate CSRF Token
$csrfToken = $_POST['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'] ?? '', $csrfToken)) {
    $_SESSION['form_message'] = 'Security validation failed (CSRF token mismatch). Please refresh and retry.';
    $_SESSION['form_status']  = 'danger';
    header('Location: ../contact.php');
    exit;
}

// 2. Honeypot Anti-Spam Check
if (!empty($_POST['website_url'])) {
    // Silent success redirect for bots
    $_SESSION['form_message'] = 'Inquiry transmitted successfully.';
    $_SESSION['form_status']  = 'success';
    header('Location: ../thank-you.php');
    exit;
}

// 3. Sanitize and Validate Inputs
$fullName        = trim((string) ($_POST['full_name'] ?? ''));
$workEmail       = filter_var(trim((string) ($_POST['work_email'] ?? '')), FILTER_SANITIZE_EMAIL);
$organization    = trim((string) ($_POST['organization'] ?? ''));
$region          = trim((string) ($_POST['region'] ?? 'Global'));
$engagementTrack = trim((string) ($_POST['engagement_track'] ?? 'Advisory'));
$projectBrief    = trim((string) ($_POST['project_brief'] ?? ''));
$ndaRequested    = isset($_POST['nda_requested']) ? 1 : 0;

if ($fullName === '' || strlen($fullName) > 150 || !filter_var($workEmail, FILTER_VALIDATE_EMAIL) || $organization === '' || $projectBrief === '') {
    $_SESSION['form_message'] = 'Please complete all required fields with valid information.';
    $_SESSION['form_status']  = 'danger';
    header('Location: ../contact.php');
    exit;
}

try {
    $db = DatabaseConnect::getInstance();
    $pdoInsert = $db->getPDO_Insert();

    $referenceCode = 'SW-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
    $rawIp         = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $clientIpHash  = hash('sha256', $rawIp . $db->getEnv('APP_KEY', 'sutrawerks_salt'));
    $userAgent     = substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'), 0, 255);

    $sql = "INSERT INTO contact_inquiries 
        (reference_code, full_name, work_email, organization, region, engagement_track, project_brief, nda_requested, client_ip_hash, user_agent) 
        VALUES (:ref, :name, :email, :org, :region, :track, :brief, :nda, :ip, :ua)";

    $stmt = $pdoInsert->prepare($sql);
    $stmt->execute([
        ':ref'    => $referenceCode,
        ':name'   => $fullName,
        ':email'  => $workEmail,
        ':org'    => $organization,
        ':region' => $region,
        ':track'  => $engagementTrack,
        ':brief'  => $projectBrief,
        ':nda'    => $ndaRequested,
        ':ip'     => $clientIpHash,
        ':ua'     => $userAgent
    ]);

    // Dispatch Emails
    $adminEmail = $db->getEnv('SMTP_ADMIN_NOTIFY', 'principal@sutrawerks.com');
    $adminSubject = "New B2B Inquiry [{$referenceCode}] — {$organization}";
    $adminHtml = "
        <h2>New Enterprise Engagement Inquiry</h2>
        <p><strong>Reference:</strong> {$referenceCode}</p>
        <p><strong>Name:</strong> {$escape($fullName)}</p>
        <p><strong>Email:</strong> {$escape($workEmail)}</p>
        <p><strong>Organization:</strong> {$escape($organization)}</p>
        <p><strong>Region:</strong> {$escape($region)}</p>
        <p><strong>Track:</strong> {$escape($engagementTrack)}</p>
        <p><strong>NDA Requested:</strong> " . ($ndaRequested ? 'Yes' : 'No') . "</p>
        <h3>Project Brief:</h3>
        <p>" . nl2br($escape($projectBrief)) . "</p>
    ";
    sw_send_mail($adminEmail, 'SutraWerks Principal Desk', $adminSubject, $adminHtml, '', $workEmail, $fullName);

    $clientSubject = "SutraWerks Consultation Request Received [{$referenceCode}]";
    $clientHtml = "
        <h2>Thank you for contacting SutraWerks</h2>
        <p>Dear {$escape($fullName)},</p>
        <p>We have received your inquiry regarding <strong>{$escape($engagementTrack)}</strong> for <strong>{$escape($organization)}</strong>.</p>
        <p>Reference Code: <strong>{$referenceCode}</strong></p>
        <p>Our Principal Enterprise Architect will review your brief and respond within 24 business hours.</p>
        <br><p>Sincerely,<br><strong>SutraWerks B2B Engagement Desk</strong></p>
    ";
    sw_send_mail($workEmail, $fullName, $clientSubject, $clientHtml);

    // Save reference code to session for thank-you display & rotate CSRF
    $_SESSION['last_reference_code'] = $referenceCode;
    unset($_SESSION['csrf_token']);
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Redirect to PRG Thank You page
    header('Location: ../thank-you.php');
    exit;

} catch (Throwable $e) {
    error_log('CONTACT INQUIRY EXCEPTION: ' . $e->getMessage());
    $_SESSION['form_message'] = 'An internal system error occurred while recording your inquiry. Please try again later.';
    $_SESSION['form_status']  = 'danger';
    header('Location: ../contact.php');
    exit;
}