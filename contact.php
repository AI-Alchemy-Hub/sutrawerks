<?php
/**
 * ============================================================================
 * SUTRAWERKS — B2B CONSULTING & ENGAGEMENT PORTAL
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        contact.php
 * @description Secure B2B consultation inquiry, engagement commissioning, and
 *              vendor onboarding intake portal backed by MySQL 8 least-privilege insert.
 *
 * @technology  PHP 8.3+ | PDO Least-Privilege | PHPMailer | Bootstrap 5.3.3
 *
 * @last-updated November 2026
 * ============================================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/security-headers.php';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/db/dbconfig.php';
require_once __DIR__ . '/includes/mailer.php';

/* Start session securely for CSRF token management */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* SITE IDENTITY & METADATA */
$site_name    = 'SutraWerks';
$site_url     = 'https://sutrawerks.com';

$page_title       = 'SutraWerks | Initiate a B2B Engagement & Consultation';
$page_description = 'Schedule an executive briefing or commission enterprise Industry 5.0 consulting, Sentio digital twins, sovereign agentic AI, or custom platform engineering.';
$page_keywords    = 'Contact SutraWerks, B2B Engagement, Fractional CTO, Industry 5.0 Consulting, Vendor Onboarding, Enterprise Architecture Briefing';
$page_author      = 'Satya Prakash Nigam';
$canonical_url    = rtrim($site_url, '/') . '/contact';

$og_title       = $page_title;
$og_description = $page_description;
$og_url         = $canonical_url;
$og_type        = 'website';
$og_site_name   = $site_name;
$og_locale      = 'en_US';

$robots_directive = 'index, follow';

$pageCss = null; // Uses main.css
$pageJs  = null; // Uses main.js

/* GENERATE CSRF TOKEN */
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$formMessage = '';
$formStatus  = '';

/* FORM SUBMISSION HANDLER */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Validate CSRF Token
    $csrfToken = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $csrfToken)) {
        $formMessage = 'Security validation failed (CSRF token mismatch). Please refresh and retry.';
        $formStatus  = 'danger';
    } 
    // 2. Honeypot Anti-Spam Check (field must be empty)
    elseif (!empty($_POST['website_url'])) {
        // Silent rejection for bots
        $formMessage = 'Inquiry transmitted successfully. Our Principal Architect will review your brief.';
        $formStatus  = 'success';
    } else {
        // 3. Sanitize and Validate Inputs
        $fullName        = trim((string) ($_POST['full_name'] ?? ''));
        $workEmail       = filter_var(trim((string) ($_POST['work_email'] ?? '')), FILTER_SANITIZE_EMAIL);
        $organization    = trim((string) ($_POST['organization'] ?? ''));
        $region          = trim((string) ($_POST['region'] ?? 'Global'));
        $engagementTrack = trim((string) ($_POST['engagement_track'] ?? 'Advisory'));
        $projectBrief    = trim((string) ($_POST['project_brief'] ?? ''));
        $ndaRequested    = isset($_POST['nda_requested']) ? 1 : 0;

        if ($fullName === '' || strlen($fullName) > 150) {
            $formMessage = 'Please provide a valid full name (up to 150 characters).';
            $formStatus  = 'danger';
        } elseif (!filter_var($workEmail, FILTER_VALIDATE_EMAIL)) {
            $formMessage = 'Please provide a valid corporate email address.';
            $formStatus  = 'danger';
        } elseif ($organization === '' || strlen($organization) > 180) {
            $formMessage = 'Please provide your organization or enterprise name.';
            $formStatus  = 'danger';
        } elseif ($projectBrief === '' || strlen($projectBrief) > 5000) {
            $formMessage = 'Please provide a project brief or scope outline (maximum 5000 characters).';
            $formStatus  = 'danger';
        } else {
            try {
                // Use least-privilege INSERT connection handle
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

                // 4. Dispatch Notifications via PHPMailer
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
                    <br>
                    <p>Sincerely,<br><strong>SutraWerks B2B Engagement Desk</strong><br>Bengaluru, India</p>
                ";
                sw_send_mail($workEmail, $fullName, $clientSubject, $clientHtml);

                $formMessage = "Inquiry successfully submitted! Your reference code is <strong>{$referenceCode}</strong>. Our Principal Architect will be in touch shortly.";
                $formStatus  = 'success';

                // Regenerate CSRF token to prevent duplicate submissions
                unset($_SESSION['csrf_token']);
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            } catch (Throwable $e) {
                error_log('CONTACT INQUIRY EXCEPTION: ' . $e->getMessage());
                $formMessage = 'An internal system error occurred while recording your inquiry. Please try again later.';
                $formStatus  = 'danger';
            }
        }
    }
}
?>
<?php
/**
 * ============================================================================
 * SUTRAWERKS — CONTACT PORTAL DOCUMENT HEAD
 * ============================================================================
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($page_title); ?></title>
    <meta name="description" content="<?= $escape($page_description); ?>">
    <meta name="keywords" content="<?= $escape($page_keywords); ?>">
    <meta name="author" content="<?= $escape($page_author); ?>">
    <link rel="canonical" href="<?= $escape($canonical_url); ?>">
    <meta name="robots" content="<?= $escape($robots_directive); ?>">
    <meta name="theme-color" content="#0b192c">

    <!-- Open Graph -->
    <meta property="og:locale" content="<?= $escape($og_locale); ?>">
    <meta property="og:type" content="<?= $escape($og_type); ?>">
    <meta property="og:site_name" content="<?= $escape($og_site_name); ?>">
    <meta property="og:title" content="<?= $escape($og_title); ?>">
    <meta property="og:description" content="<?= $escape($og_description); ?>">
    <meta property="og:url" content="<?= $escape($og_url); ?>">

    <!-- STRUCTURED DATA: WEBPAGE / CONTACT -->
    <script type="application/ld+json">
    <?php
    $contact_schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'ContactPage',
        'name'        => $page_title,
        'description' => $page_description,
        'url'         => $canonical_url,
        'publisher'   => [
            '@type' => 'Organization',
            'name'  => $site_name ?? 'SutraWerks',
            'logo'  => 'https://sutrawerks.com/assets/img/sw-logo.png'
        ],
        'inLanguage'   => 'en-US'
    ];
    echo json_encode($contact_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
    ?>
    </script>

    <!-- Google Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">
	
    <?php if (isset($pageCss) && $pageCss): ?>
    <!-- Page-Specific CSS -->
    <link rel="stylesheet" href="<?= $escape($pageCss); ?>">
    <?php endif; ?>
</head>
<body class="public-page contact-page">

  <!-- Top Navigation -->
  <?php require_once __DIR__ . '/includes/topnav.php'; ?>

  <!-- Hero Header -->
  <header class="sw-hero py-5">
    <div class="container text-center py-4" data-aos="fade-up">
      <div class="sw-badge-pill mb-3 mx-auto">
        <i class="bi bi-shield-check"></i>
        <span>Secure B2B Channel &bull; Encrypted Inquiry Desk</span>
      </div>
      <h1 class="display-5 fw-bold mb-3">Initiate a Consultation or Onboarding</h1>
      <p class="lead text-light opacity-75 mx-auto" style="max-width: 680px;">
        Connect directly with our Principal Enterprise Architect for systems audits, architectural reviews, or turnkey Industry 5.0 project commissioning.
      </p>
    </div>
  </header>

  <!-- Contact Form Section -->
  <section class="py-5 bg-light">
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up">
          <div class="sw-card p-4 p-md-5 bg-white shadow-sm">

            <?php if ($formMessage !== ''): ?>
              <div class="alert alert-<?= $escape($formStatus); ?> alert-dismissible fade show mb-4" role="alert">
                <?= $formMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <form action="contact.php" method="POST" class="needs-validation" novalidate>
              <input type="hidden" name="csrf_token" value="<?= $escape($_SESSION['csrf_token']); ?>">

              <!-- Honeypot Anti-Spam Field (Hidden from real users) -->
              <div class="d-none" aria-hidden="true">
                <label for="website_url">Website URL</label>
                <input type="text" id="website_url" name="website_url" value="" tabindex="-1" autocomplete="off">
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="full_name" class="form-label fw-semibold small">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="full_name" name="full_name" required maxlength="150" placeholder="e.g., Dr. Marcus Weber">
                  <div class="invalid-feedback">Please provide your full name.</div>
                </div>
                <div class="col-md-6">
                  <label for="work_email" class="form-label fw-semibold small">Corporate Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="work_email" name="work_email" required maxlength="180" placeholder="marcus.weber@enterprise.de">
                  <div class="invalid-feedback">Please provide a valid corporate email.</div>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="organization" class="form-label fw-semibold small">Organization / Enterprise <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="organization" name="organization" required maxlength="180" placeholder="Industrial Robotics GmbH">
                  <div class="invalid-feedback">Please specify your organization.</div>
                </div>
                <div class="col-md-6">
                  <label for="region" class="form-label fw-semibold small">Operating Region</label>
                  <select class="form-select" id="region" name="region">
                    <option value="Europe / DACH">Europe / DACH Region</option>
                    <option value="Middle East / GCC">Middle East / GCC Region</option>
                    <option value="India / South Asia">India / South Asia</option>
                    <option value="North America">North America</option>
                    <option value="Global / Other" selected>Global / Other</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label for="engagement_track" class="form-label fw-semibold small">Primary Engagement Track <span class="text-danger">*</span></label>
                <select class="form-select" id="engagement_track" name="engagement_track" required>
                  <option value="" selected disabled>Select primary capability or advisory track...</option>
                  <option value="Sentio Digital Twin & Industrial IoT">Sentio&trade; Digital Twin &amp; Industrial IoT (ISO 10816 / IEC 60034)</option>
                  <option value="Sovereign Agentic AI Orchestration">Sovereign Agentic AI Orchestration (Air-Gapped &amp; Deterministic)</option>
                  <option value="VeritasLens Zero Trust & Compliance">VeritasLens&trade; Zero Trust, CRA &amp; NIS2 Compliance</option>
                  <option value="E2E Platform Engineering">E2E Custom B2B/B2C Platform Engineering (PHP/Rust/Docker)</option>
                  <option value="Enterprise Architecture Advisory & Fractional CTO">Enterprise Architecture Advisory &amp; Fractional CTO Mandate</option>
                </select>
                <div class="invalid-feedback">Please select an engagement track.</div>
              </div>

              <div class="mb-3">
                <label for="project_brief" class="form-label fw-semibold small">Project Brief &amp; Technical Requirements <span class="text-danger">*</span></label>
                <textarea class="form-control" id="project_brief" name="project_brief" rows="5" required maxlength="5000" placeholder="Outline your technical architecture goals, performance targets, or compliance requirements..."></textarea>
                <div class="invalid-feedback">Please provide a brief project scope.</div>
              </div>

              <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="nda_requested" name="nda_requested" value="1">
                <label class="form-check-label small text-muted" for="nda_requested">
                  Request Mutual Non-Disclosure Agreement (NDA) prior to technical discovery session.
                </label>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-sw-primary btn-lg">
                  Submit Engagement Brief <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

	<?php
	/**
	 * ============================================================================
	 * SUTRAWERKS — CONTACT PORTAL FOOTER & SCRIPT BUNDLES
	 * ============================================================================
	 */
	?>

	<!-- Footer & Back-to-Top Component -->
	<?php require_once __DIR__ . '/includes/footer.php'; ?>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
	<script src="<?= $escape($asset('js/main.js')); ?>"></script>

	<?php if (isset($pageJs) && $pageJs): ?>
	<!-- Page-Specific JS -->
	<script src="<?= $escape($pageJs); ?>"></script>
	<?php endif; ?>
</body>
</html>
