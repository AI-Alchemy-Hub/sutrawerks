<?php
/**
 * ============================================================================
 * SUTRAWERKS — B2B CONSULTING & ENGAGEMENT PORTAL
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @version     1.2.0
 *
 * @file        contact.php
 * @description Zero-scroll laptop-optimized B2B consultation intake form.
 * ============================================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/security-headers.php';
require_once __DIR__ . '/includes/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* GENERATE CSRF TOKEN IF NOT EXISTS */
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$site_name        = 'SutraWerks';
$site_url         = 'https://sutrawerks.com';
$page_title       = 'SutraWerks | Initiate a B2B Engagement & Consultation';
$page_description = 'Schedule an executive briefing or commission enterprise Industry 5.0 consulting, Sentio digital twins, or sovereign agentic AI.';
$page_keywords    = 'Contact SutraWerks, B2B Engagement, Fractional CTO, Industry 5.0 Consulting';
$page_author      = 'Satya Prakash Nigam';
$canonical_url    = rtrim($site_url, '/') . '/contact';

$formMessage = $_SESSION['form_message'] ?? '';
$formStatus  = $_SESSION['form_status'] ?? '';
unset($_SESSION['form_message'], $_SESSION['form_status']);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($page_title); ?></title>
    <meta name="description" content="<?= $escape($page_description); ?>">
    <link rel="canonical" href="<?= $escape($canonical_url); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">
    <style>
        /* Zero-scroll laptop viewport optimization */
        .contact-hero-slim {
            padding: 0.55rem 0 !important;
            background: linear-gradient(135deg, #0b192c 0%, #1e3e62 100%);
        }
        .contact-section-slim {
            padding: 0.85rem 0 1rem 0 !important;
        }
        .sw-compact-card {
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 0.5rem;
        }
        .contact-section-slim .form-label {
            font-size: 0.78rem;
            margin-bottom: 0.15rem;
        }
        .contact-section-slim .form-control-sm,
        .contact-section-slim .form-select-sm {
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
        }
    </style>
</head>
<body class="public-page contact-page bg-light d-flex flex-column min-vh-100">

  <!-- Top Navigation -->
  <?php require_once __DIR__ . '/includes/topnav.php'; ?>

  <!-- Main Content Landmark -->
  <main class="flex-grow-1 d-flex flex-column justify-content-center">

    <!-- Single-Line Slim Hero Header -->
    <header class="contact-hero-slim text-white border-bottom border-secondary">
      <div class="container d-flex flex-wrap align-items-center justify-content-center gap-2 text-center">
        <span class="d-inline-flex align-items-center gap-1 px-2 py-0 rounded-pill bg-opacity-10 bg-info text-info small border border-info border-opacity-25">
          <i class="bi bi-shield-check"></i> Encrypted B2B Desk
        </span>
        <h1 class="h5 fw-bold mb-0">Initiate a Consultation or Onboarding</h1>
      </div>
    </header>

    <!-- Ultra-Compact Above-the-Fold Form Section -->
    <section class="contact-section-slim">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="sw-compact-card p-3 p-md-4 bg-white shadow-sm">

              <?php if ($formMessage !== ''): ?>
                <div class="alert alert-<?= $escape($formStatus); ?> alert-dismissible fade show py-2 mb-2 small" role="alert">
                  <?= $formMessage; ?>
                  <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <form action="dbworkers/send-message.php" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="csrf_token" value="<?= $escape($_SESSION['csrf_token']); ?>">

                <!-- Honeypot -->
                <div class="d-none" aria-hidden="true">
                  <label for="website_url">Website URL</label>
                  <input type="text" id="website_url" name="website_url" value="" tabindex="-1" autocomplete="off">
                </div>

                <!-- Row 1: Identity -->
                <div class="row g-2 mb-2">
                  <div class="col-md-6">
                    <label for="full_name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="full_name" name="full_name" required maxlength="150" placeholder="e.g., Dr. Marcus Weber">
                  </div>
                  <div class="col-md-6">
                    <label for="work_email" class="form-label fw-semibold">Corporate Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-sm" id="work_email" name="work_email" required maxlength="180" placeholder="marcus.weber@enterprise.de">
                  </div>
                </div>

                <!-- Row 2: Organization & Region -->
                <div class="row g-2 mb-2">
                  <div class="col-md-6">
                    <label for="organization" class="form-label fw-semibold">Organization / Enterprise <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" id="organization" name="organization" required maxlength="180" placeholder="Industrial Robotics GmbH">
                  </div>
                  <div class="col-md-6">
                    <label for="region" class="form-label fw-semibold">Operating Region</label>
                    <select class="form-select form-select-sm" id="region" name="region">
                      <option value="Europe / DACH">Europe / DACH Region</option>
                      <option value="Middle East / GCC">Middle East / GCC Region</option>
                      <option value="India / South Asia">India / South Asia</option>
                      <option value="North America">North America</option>
                      <option value="Global / Other" selected>Global / Other</option>
                    </select>
                  </div>
                </div>

                <!-- Row 3: Side-by-Side Track/NDA & Project Brief -->
                <div class="row g-2 mb-3">
                  <div class="col-md-5 d-flex flex-column justify-content-between">
                    <div class="mb-2">
                      <label for="engagement_track" class="form-label fw-semibold">Primary Engagement Track <span class="text-danger">*</span></label>
                      <select class="form-select form-select-sm" id="engagement_track" name="engagement_track" required>
                        <option value="" selected disabled>Select capability track...</option>
                        <option value="Sentio Digital Twin & Industrial IoT">Sentio&trade; Digital Twin &amp; Industrial IoT</option>
                        <option value="Sovereign Agentic AI Orchestration">Sovereign Agentic AI Orchestration</option>
                        <option value="VeritasLens Zero Trust & Compliance">VeritasLens&trade; Zero Trust &amp; Compliance</option>
                        <option value="E2E Platform Engineering">E2E Custom Platform Engineering</option>
                        <option value="Enterprise Architecture Advisory & Fractional CTO">Architecture Advisory &amp; Fractional CTO</option>
                      </select>
                    </div>
                    <div class="form-check bg-light p-2 ps-4 rounded border">
                      <input type="checkbox" class="form-check-input" id="nda_requested" name="nda_requested" value="1">
                      <label class="form-check-label small text-muted lh-sm" for="nda_requested">
                        Request Mutual NDA prior to technical discovery session.
                      </label>
                    </div>
                  </div>

                  <div class="col-md-7">
                    <label for="project_brief" class="form-label fw-semibold">Project Brief &amp; Technical Requirements <span class="text-danger">*</span></label>
                    <textarea class="form-control form-control-sm" id="project_brief" name="project_brief" rows="4" required maxlength="5000" placeholder="Outline technical goals, performance targets, or compliance scope..."></textarea>
                  </div>
                </div>

                <!-- Submit Row -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-sw-primary">
                    Submit Engagement Brief <i class="bi bi-arrow-right ms-1"></i>
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer & Back-to-Top Component -->
  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= $escape($asset('js/main.js')); ?>"></script>
  
  <!-- Page-Specific Override: Lower Back-to-Top Threshold for Compact Viewport -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const backToTopBtn = document.getElementById('swBackToTop');
      if (!backToTopBtn) return;

      const compactThreshold = 100;

      const enforceCompactBackToTop = () => {
        if (window.scrollY > compactThreshold) {
          backToTopBtn.classList.add('show');
        } else {
          backToTopBtn.classList.remove('show');
        }
      };

      window.addEventListener('scroll', enforceCompactBackToTop, { passive: true });
      enforceCompactBackToTop();
    });
  </script>
  
</body>
</html>