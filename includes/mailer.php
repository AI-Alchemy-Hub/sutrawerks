<?php
/**
 * ============================================================================
 * FILE: mailer.php
 * LOCATION: ./includes/mailer.php
 * ============================================================================
 *
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Resilient PHPMailer SMTP Dispatcher for SutraWerks.
 * Safely handles vendor libraries and transmits authenticated SMTP mail.
 * ============================================================================
 */

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

// Load Composer autoloader
$autoloader = dirname(__DIR__) . '/vendor/autoload.php';
if (is_file($autoloader)) {
    require_once $autoloader;
}

require_once dirname(__DIR__) . '/db/dbconfig.php';

/**
 * Send an HTML email via authenticated SMTP with graceful fallback.
 */
function sw_send_mail(
    string $toEmail,
    string $toName,
    string $subject,
    string $htmlBody,
    string $plainBody = '',
    ?string $replyToEmail = null,
    ?string $replyToName = null
): bool {
    if (!class_exists(PHPMailer::class)) {
        error_log('MAILER NOTICE [SutraWerks]: PHPMailer not installed. Skipping email dispatch.');
        return false;
    }

    $config = DatabaseConnect::getInstance();

    $host       = $config->getEnv('SMTP_HOST', '');
    $port       = (int) $config->getEnv('SMTP_PORT', '587');
    $encryption = strtolower((string) $config->getEnv('SMTP_ENCRYPTION', 'tls'));
    $username   = $config->getEnv('SMTP_USERNAME', '');
    $password   = $config->getEnv('SMTP_PASSWORD', '');
    $fromEmail  = $config->getEnv('SMTP_FROM_EMAIL', $username);
    $fromName   = $config->getEnv('SMTP_FROM_NAME', 'SutraWerks');

    if ($host === '' || $username === '' || $password === '' || str_contains($password, 'YOUR_')) {
        error_log('MAILER NOTICE [SutraWerks]: SMTP credentials not fully configured in .env.');
        return false;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $username;
        $mail->Password   = $password;
        $mail->Port       = $port;
        $mail->CharSet    = 'UTF-8';
        $mail->Timeout    = 15;

        if ($encryption === 'ssl' || $port === 465) {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);

        if ($replyToEmail !== null && filter_var($replyToEmail, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo($replyToEmail, $replyToName ?? $replyToEmail);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $htmlBody;
        $mail->AltBody = $plainBody !== '' ? $plainBody : strip_tags($htmlBody);

        return $mail->send();
    } catch (Throwable $e) {
        error_log('MAILER EXCEPTION [SutraWerks]: ' . $e->getMessage());
        return false;
    }
}