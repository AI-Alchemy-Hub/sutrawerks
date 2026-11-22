<?php
/**
 * ============================================================================
 * SUTRAWERKS — PRIVACY POLICY & DATA GOVERNANCE (GDPR / DPDP ACT 2023)
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        privacy.php
 * @description Legal & Governance Page: Privacy Policy.
 *              Details SutraWerks' strict zero-tracking stance, local-first
 *              data minimization, EU GDPR alignment, and India Digital Personal
 *              Data Protection (DPDP) Act 2023 compliance.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Data Governance
 *
 * @last-updated November 2026
 * ============================================================================
 */


/* ============================================================================
 * PHP BLOCK 2 — STRICT TYPES, UTF-8 AND SHARED SECURITY
 * ============================================================================
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/security-headers.php';


/* ============================================================================
 * PHP BLOCK 3 — CENTRALIZED APPLICATION CONFIGURATION & HELPERS
 * ============================================================================
 */

require_once __DIR__ . '/includes/config.php';

/* SITE IDENTITY */

$site_name    = 'SutraWerks';
$site_tagline = 'Clean, Green, Lean, Secure and Ethical Engineering';
$site_url     = 'https://sutrawerks.com';

/* PAGE METADATA */

$page_number      = '10';
$page_slug        = 'privacy';
$page_section     = 'Governance & Legal';
$page_category    = 'Privacy Policy & Data Protection';
$page_type        = 'Legal Policy';

$page_title = 'Privacy Policy (GDPR & India DPDP Act) — SutraWerks';

$page_description = 'SutraWerks Privacy Policy: Zero third-party ad trackers, strict data minimization, air-gapped client confidentiality, and full compliance with EU GDPR and India DPDP Act 2023.';

$page_keywords = 'Privacy Policy, GDPR Compliance, India DPDP Act 2023, Data Minimization, Zero Tracking, Enterprise Data Governance, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/privacy';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-privacy.jpg';
$og_image_alt = 'Privacy Policy (GDPR & India DPDP Act) — SutraWerks';

/* OPEN GRAPH / SOCIAL SHARING */

$og_title       = $page_title;
$og_description = $page_description;
$og_url         = $canonical_url;
$og_type        = 'article';
$og_site_name   = $site_name;
$og_locale      = 'en_US';

/* TWITTER / X SOCIAL SHARING */

$twitter_card        = 'summary_large_image';
$twitter_title       = $page_title;
$twitter_description = $page_description;
$twitter_image       = $og_image;
$twitter_image_alt   = $og_image_alt;

/* SEARCH ENGINE INDEXING */

$robots_directive = 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';

/* STRUCTURED DATA */

$schema_date_modified = '2026-11-19';

$webpage_schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'WebPage',
    'name'        => $page_title,
    'description' => $page_description,
    'url'         => $canonical_url,
    'publisher'   => [
        '@type' => 'Organization',
        'name'  => $site_name,
        'logo'  => rtrim($site_url, '/') . '/assets/img/sw-logo.png'
    ],
    'inLanguage'   => 'en-US',
    'dateModified' => $schema_date_modified
];


/* ============================================================================
 * PHP BLOCK 4 — PAGE CONTENT MODEL & ASSET INJECTIONS
 * ============================================================================
 */

$pageCss = $asset('css/privacy.css');
$pageJs  = $asset('js/privacy.js');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PRIMARY SEO METADATA -->
    <title><?= $escape($page_title); ?></title>
    <meta name="description" content="<?= $escape($page_description); ?>">
    <meta name="keywords" content="<?= $escape($page_keywords); ?>">
    <meta name="author" content="<?= $escape($page_author); ?>">
    <link rel="canonical" href="<?= $escape($canonical_url); ?>">

    <!-- SEARCH ENGINE INDEXING DIRECTIVES -->
    <meta name="robots" content="<?= $escape($robots_directive); ?>">
    <meta name="googlebot" content="<?= $escape($robots_directive); ?>">
    <meta name="bingbot" content="<?= $escape($robots_directive); ?>">
    <meta name="slurp" content="<?= $escape($robots_directive); ?>">

    <!-- AI CRAWLER ACCESS DIRECTIVES -->
    <meta name="GPTBot" content="index, follow">
    <meta name="ChatGPT-User" content="index, follow">
    <meta name="PerplexityBot" content="index, follow">
    <meta name="ClaudeBot" content="index, follow">

    <!-- BROWSER AND DEVICE SETTINGS -->
    <meta name="theme-color" content="#0b192c">
    <meta name="color-scheme" content="light dark">
    <meta name="format-detection" content="telephone=no, address=no, email=no">

    <!-- OPEN GRAPH / SOCIAL METADATA -->
    <meta property="og:locale" content="<?= $escape($og_locale); ?>">
    <meta property="og:type" content="<?= $escape($og_type); ?>">
    <meta property="og:site_name" content="<?= $escape($og_site_name); ?>">
    <meta property="og:title" content="<?= $escape($og_title); ?>">
    <meta property="og:description" content="<?= $escape($og_description); ?>">
    <meta property="og:url" content="<?= $escape($og_url); ?>">
    <meta property="og:image" content="<?= $escape($og_image); ?>">
    <meta property="og:image:alt" content="<?= $escape($og_image_alt); ?>">

    <!-- TWITTER / X METADATA -->
    <meta name="twitter:card" content="<?= $escape($twitter_card); ?>">
    <meta name="twitter:title" content="<?= $escape($twitter_title); ?>">
    <meta name="twitter:description" content="<?= $escape($twitter_description); ?>">
    <meta name="twitter:image" content="<?= $escape($twitter_image); ?>">
    <meta name="twitter:image:alt" content="<?= $escape($twitter_image_alt); ?>">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="<?= $escape($asset('img/sw-logo.png')); ?>">

    <!-- STRUCTURED DATA: WEBPAGE -->
    <script type="application/ld+json">
    <?= json_encode($webpage_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
    </script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP 5.3.3 CSS & ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS ANIMATION CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- PORTAL STYLESHEETS & PAGE-SPECIFIC CSS INJECTION -->
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">
    <?php if (isset($pageCss) && $pageCss): ?>
    <link rel="stylesheet" href="<?= $escape($pageCss); ?>">
    <?php endif; ?>
</head>
<body>

  <!-- Top Navigation -->
  <?php require_once __DIR__ . '/includes/topnav.php'; ?>

  <!-- Main Content Wrapper -->
  <main class="pr-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="pr-breadcrumb-parent">Governance &amp; Legal</span></li>
          <li class="breadcrumb-item active pr-breadcrumb-current" aria-current="page">Privacy Policy</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge pr-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Governance &bull; Zero Tracking</span>
          <h1 class="display-4 fw-bold pr-hero-title mb-3">Privacy Policy &amp; Data Governance</h1>
          <p class="lead pr-hero-lead mb-4">
            At SutraWerks, privacy is engineered into our architecture from first principles. We adhere to a strict zero-tracking stance, data minimization, and full compliance with the European Union General Data Protection Regulation (GDPR) and the India Digital Personal Data Protection (DPDP) Act 2023.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#policy-content" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-file-text-fill me-2"></i>Read Policy Terms
            </a>
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-shield-lock me-2"></i>Data Principal Request
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card pr-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-shield-check me-2"></i>Governance Commitments</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between pr-spec-row pb-2 mb-2">
                <span class="pr-spec-label">Ad Trackers:</span>
                <span class="text-success fw-semibold">Zero (None)</span>
              </li>
              <li class="d-flex justify-content-between pr-spec-row pb-2 mb-2">
                <span class="pr-spec-label">Regulatory Standard:</span>
                <span class="pr-spec-val">GDPR &amp; India DPDP Act 2023</span>
              </li>
              <li class="d-flex justify-content-between pr-spec-row pb-2 mb-2">
                <span class="pr-spec-label">Data Retention:</span>
                <span class="pr-spec-val">Strict Minimization</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="pr-spec-label">Hosting Topology:</span>
                <span class="pr-spec-val">Air-Gapped / Sovereign</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="pr-divider my-5">

      <!-- Policy Content Sections -->
      <section id="policy-content" class="py-3" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-3">
            <!-- Sidebar Navigation -->
            <div class="sticky-top pr-sidebar-nav p-3 rounded-4 d-none d-lg-block">
              <h6 class="text-white fw-semibold mb-3">Table of Contents</h6>
              <ul class="list-unstyled small space-y-2">
                <li class="mb-2"><a href="#section-1" class="text-decoration-none text-muted link-light">1. Overview &amp; Scope</a></li>
                <li class="mb-2"><a href="#section-2" class="text-decoration-none text-muted link-light">2. Zero-Tracking &amp; Cookies</a></li>
                <li class="mb-2"><a href="#section-3" class="text-decoration-none text-muted link-light">3. Data Collection &amp; Purpose</a></li>
                <li class="mb-2"><a href="#section-4" class="text-decoration-none text-muted link-light">4. GDPR &amp; DPDP Rights</a></li>
                <li class="mb-2"><a href="#section-5" class="text-decoration-none text-muted link-light">5. Contact &amp; Grievances</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="card pr-content-card p-4 p-lg-5 rounded-4">
              
              <!-- Section 1 -->
              <div id="section-1" class="mb-5">
                <h3 class="h4 fw-bold pr-card-title mb-3">1. Overview &amp; Scope</h3>
                <p class="pr-card-text mb-3">
                  SutraWerks (&ldquo;we&rdquo;, &ldquo;our&rdquo;, or &ldquo;firm&rdquo;), headquartered in Bengaluru, India, respects your privacy and is committed to protecting personal data. This Privacy Policy outlines our data handling practices when you visit our portal (`sutrawerks.com`), engage our consulting services, or interact with our open-source reference architectures.
                </p>
                <p class="pr-card-text mb-0">
                  We operate on principles of absolute transparency, data minimization, and localized security. We do not monetize personal telemetry, sell visitor logs, or integrate third-party advertising trackers.
                </p>
              </div>

              <hr class="pr-divider my-4">

              <!-- Section 2 -->
              <div id="section-2" class="mb-5">
                <h3 class="h4 fw-bold pr-card-title mb-3">2. Zero-Tracking &amp; Cookie Policy</h3>
                <p class="pr-card-text mb-3">
                  Unlike traditional commercial websites that embed cross-site tracking pixels, social media widgets, and behavioral advertising cookies, SutraWerks enforces a strict zero-tracking policy:
                </p>
                <ul class="list-unstyled pr-card-text small space-y-2 mb-0">
                  <li class="mb-2">&bull; <strong>No Ad Trackers:</strong> We deploy zero third-party marketing trackers, Google Analytics pixels, or fingerprinting scripts.</li>
                  <li class="mb-2">&bull; <strong>Session &amp; Functional Cookies Only:</strong> Any cookies utilized are strictly technical (e.g., session state handling) and contain no personally identifiable profiling.</li>
                  <li class="mb-2">&bull; <strong>Do Not Respect vs. Enforce:</strong> We respect your browser's Do-Not-Track signals by default because we do not track you in the first place.</li>
                </ul>
              </div>

              <hr class="pr-divider my-4">

              <!-- Section 3 -->
              <div id="section-3" class="mb-5">
                <h3 class="h4 fw-bold pr-card-title mb-3">3. Data Collection &amp; Lawful Basis</h3>
                <p class="pr-card-text mb-3">
                  We collect personal data only when voluntarily provided by you—specifically when you submit an onboarding inquiry through our contact form, request a technical whitepaper, or commission an advisory mandate.
                </p>
                <p class="pr-card-text mb-0">
                  Collected details (such as name, professional email, corporate affiliation, and project requirements) are processed solely for contract performance, legitimate B2B communication, and regulatory compliance under the India Digital Personal Data Protection (DPDP) Act 2023 and EU GDPR Article 6.
                </p>
              </div>

              <hr class="pr-divider my-4">

              <!-- Section 4 -->
              <div id="section-4" class="mb-5">
                <h3 class="h4 fw-bold pr-card-title mb-3">4. Data Principal Rights (GDPR &amp; DPDP Act 2023)</h3>
                <p class="pr-card-text mb-3">
                  Whether you reside within the European Union or India, you retain absolute sovereign rights over your personal data:
                </p>
                <ul class="list-unstyled pr-card-text small space-y-2 mb-0">
                  <li class="mb-2">&bull; <strong>Right to Access:</strong> Request a full export of any correspondence or metadata associated with your profile.</li>
                  <li class="mb-2">&bull; <strong>Right to Correction:</strong> Request immediate rectification of inaccurate or outdated professional details.</li>
                  <li class="mb-2">&bull; <strong>Right to Erasure (&ldquo;To Be Forgotten&rdquo;):</strong> Instruct us to purge your contact records and communication logs from our air-gapped databases.</li>
                  <li class="mb-2">&bull; <strong>Right to Grievance Redressal:</strong> Direct escalation path to our internal data protection desk in Bengaluru.</li>
                </ul>
              </div>

              <hr class="pr-divider my-4">

              <!-- Section 5 -->
              <div id="section-5">
                <h3 class="h4 fw-bold pr-card-title mb-3">5. Contact &amp; Governance Desk</h3>
                <p class="pr-card-text mb-3">
                  For any data access request, privacy inquiry, or grievance redressal under GDPR or the DPDP Act 2023, please contact our Principal Engineering and Governance Desk directly:
                </p>
                <div class="p-3 rounded-3 font-monospace small pr-contact-box">
                  <div class="text-white mb-1"><strong>SutraWerks Governance Desk</strong></div>
                  <div class="text-muted">Headquarters: Bengaluru, Karnataka, India</div>
                  <div class="text-muted">Principal Lead: Satya Prakash Nigam</div>
                  <div class="mt-2"><a href="<?= $escape($url('contact')); ?>" class="text-success text-decoration-none fw-semibold">Submit Secure Request via Contact Portal &rarr;</a></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <!-- Footer -->
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