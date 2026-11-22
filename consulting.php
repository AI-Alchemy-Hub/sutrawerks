<?php
/**
 * ============================================================================
 * SUTRAWERKS — ENTERPRISE CONSULTING & ADVISORY SERVICES SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        consulting.php
 * @description Product & Service Showcase: Enterprise Consulting & Advisory.
 *              Highlights Fractional CTO mandates, Industry 5.0 transformations,
 *              legacy systems modernization, and sovereign AI readiness.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Strategic Architecture
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

$page_number      = '06';
$page_slug        = 'consulting';
$page_section     = 'Services';
$page_category    = 'Strategic Enterprise Advisory & Fractional Leadership';
$page_type        = 'Service Showcase';

$page_title = 'Enterprise Consulting & Fractional CTO Advisory — SutraWerks';

$page_description = 'Senior executive advisory, Fractional CTO mandates, and Industry 5.0 digital transformation consulting for enterprises across India, Europe (DACH), and global markets.';

$page_keywords = 'Enterprise Consulting, Fractional CTO, Industry 5.0 Advisory, Digital Transformation, Legacy Modernization, RAMI 4.0, Sovereign AI Strategy, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/consulting';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-consulting.jpg';
$og_image_alt = 'Enterprise Consulting & Fractional CTO Advisory — SutraWerks';

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
    '@context' => 'https://schema.org',
    '@type'    => 'TechArticle',
    'name'     => $page_title,
    'description' => $page_description,
    'url'      => $canonical_url,
    'publisher' => [
        '@type' => 'Organization',
        'name'  => $site_name,
        'logo'  => rtrim($site_url, '/') . '/assets/img/sw-logo.png'
    ],
    'inLanguage' => 'en-US',
    'dateModified' => $schema_date_modified
];


/* ============================================================================
 * PHP BLOCK 4 — PAGE CONTENT MODEL & ASSET INJECTIONS
 * ============================================================================
 */

$pageCss = $asset('css/consulting.css');
$pageJs  = $asset('js/consulting.js');
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

    <!-- STRUCTURED DATA: TECH ARTICLE -->
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
  <main class="cs-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="cs-breadcrumb-parent">Services</span></li>
          <li class="breadcrumb-item active cs-breadcrumb-current" aria-current="page">Enterprise Consulting</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge cs-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Advisory &bull; Fractional Leadership</span>
          <h1 class="display-4 fw-bold cs-hero-title mb-3">Enterprise Consulting &amp; Fractional CTO Advisory</h1>
          <p class="lead cs-hero-lead mb-4">
            Direct senior engineering leadership and strategic architecture guidance for industrial corporations, scale-ups, and technology firms. Navigate complex digital transformations, sovereign AI adoption, and regulatory compliance without permanent overhead.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-calendar-check me-2"></i>Schedule Executive Consultation
            </a>
            <a href="#engagement-models" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-briefcase me-2"></i>Explore Advisory Mandates
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card cs-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-award me-2"></i>Advisory Credentials</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between cs-spec-row pb-2 mb-2">
                <span class="cs-spec-label">Global Experience:</span>
                <span class="cs-spec-val">30+ Years Principal Engineering</span>
              </li>
              <li class="d-flex justify-content-between cs-spec-row pb-2 mb-2">
                <span class="cs-spec-label">Primary Markets:</span>
                <span class="text-success fw-semibold">India &bull; EU / DACH &bull; GCC</span>
              </li>
              <li class="d-flex justify-content-between cs-spec-row pb-2 mb-2">
                <span class="cs-spec-label">Core Domains:</span>
                <span class="cs-spec-val">Industry 5.0 / Edge / AI</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="cs-spec-label">Engagement Format:</span>
                <span class="cs-spec-val">Fractional / Retainer / Audit</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="cs-divider my-5">

      <!-- Core Advisory Pillars -->
      <section class="py-3" data-aos="fade-up">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold cs-section-title">Strategic Engineering Mandates</h2>
            <p class="cs-section-desc">Bridging executive business objectives with rigorous, first-principles technical execution.</p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card cs-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-person-workspace"></i>
              </div>
              <h3 class="h5 fw-semibold cs-card-title">Fractional CTO &amp; Architecture Lead</h3>
              <p class="cs-card-text small mb-0">
                Executive technical leadership for product teams, technology roadmapping, architectural reviews, and hands-on guidance through critical milestone deliveries.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card cs-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-gear-wide-connected"></i>
              </div>
              <h3 class="h5 fw-semibold cs-card-title">Industry 5.0 &amp; RAMI 4.0 Transformation</h3>
              <p class="cs-card-text small mb-0">
                Guiding manufacturing and industrial enterprises from legacy SCADA silos toward air-gapped digital twins, edge IoT telemetry, and sovereign automation.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card cs-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-shield-lock"></i>
              </div>
              <h3 class="h5 fw-semibold cs-card-title">Sovereign AI &amp; Regulatory Compliance</h3>
              <p class="cs-card-text small mb-0">
                Designing air-gapped local LLM architectures, ensuring strict EU Cyber Resilience Act (CRA), NIS2, and DPDP compliance without cloud data exposure.
              </p>
            </div>
          </div>
        </div>
      </section>

      <hr class="cs-divider my-5">

      <!-- Interactive Engagement Scope Estimator -->
      <section id="engagement-models" class="py-3" data-aos="fade-up">
        <div class="row align-items-center mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold cs-section-title">Interactive Engagement Scope Estimator</h2>
            <p class="cs-section-desc">Configure your enterprise advisory requirement to determine recommended pacing, deliverables, and team engagement format.</p>
          </div>
        </div>

        <div class="card cs-estimator-card p-4 rounded-4">
          <div class="row g-4 align-items-center">
            <div class="col-lg-5">
              <label for="csScopeSelect" class="form-label fw-semibold cs-card-title small">Select Advisory Scope</label>
              <select id="csScopeSelect" class="form-select cs-select mb-3">
                <option value="audit">1. Architecture &amp; Security Audit (2-Week Intensive)</option>
                <option value="fractional_cto">2. Fractional CTO &amp; Engineering Retainer (Quarterly)</option>
                <option value="industry5">3. Industry 5.0 Digital Twin Roadmap (Full Strategy)</option>
                <option value="sovereign_ai">4. Air-Gapped Sovereign AI Pilot Design &amp; PoC</option>
              </select>
              <button type="button" id="csEstimateBtn" class="btn btn-success fw-semibold text-dark w-100">
                <i class="bi bi-calculator me-1"></i>Generate Engagement Blueprint
              </button>
            </div>

            <div class="col-lg-7">
              <div class="cs-result-panel p-3 rounded-3 font-monospace small" id="csResultOutput" aria-live="polite">
                <div class="text-success mb-1">[SUTRAWERKS ADVISORY DESK] Ready for Scoping.</div>
                <div class="cs-result-line">Select an engagement mandate on the left and click <strong>Generate Engagement Blueprint</strong> to review estimated timelines, deliverables, and governance milestones.</div>
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