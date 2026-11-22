<?php
/**
 * ============================================================================
 * SUTRAWERKS — REFERENCE DEPLOYMENTS & CASE STUDIES SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        case-studies.php
 * @description Product & Deployment Showcase: Reference Deployments.
 *              Highlights industrial digital twin deployments, air-gapped sovereign
 *              AI rollouts, zero-trust edge architectures, and high-throughput
 *              financial gateways.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Rust / eBPF / Local LLM
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

$page_number      = '07';
$page_slug        = 'case-studies';
$page_section     = 'Deployments';
$page_category    = 'Reference Deployments & Production Case Studies';
$page_type        = 'Portfolio Showcase';

$page_title = 'Reference Deployments & Case Studies — SutraWerks';

$page_description = 'Explore production case studies: air-gapped Rust digital twins for industrial rotating machinery, sovereign local LLM deployments, and zero-trust micro-segmentation.';

$page_keywords = 'Reference Deployments, Case Studies, Sentio Digital Twin, Sovereign AI Rollout, Zero Trust Architecture, Industrial IoT, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/case-studies';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-case-studies.jpg';
$og_image_alt = 'Reference Deployments & Case Studies — SutraWerks';

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

$pageCss = $asset('css/case-studies.css');
$pageJs  = $asset('js/case-studies.js');
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
  <main class="cd-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="cd-breadcrumb-parent">Deployments</span></li>
          <li class="breadcrumb-item active cd-breadcrumb-current" aria-current="page">Reference Deployments</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge cd-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Track Record &bull; Production Proof</span>
          <h1 class="display-4 fw-bold cd-hero-title mb-3">Reference Deployments &amp; Case Studies</h1>
          <p class="lead cd-hero-lead mb-4">
            Explore verifiable engineering deployments across heavy industrial manufacturing, air-gapped sovereign AI environments, and mission-critical financial gateways. Built from first principles for zero cloud lock-in and uncompromising reliability.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-chat-square-text me-2"></i>Discuss a Custom Deployment
            </a>
            <a href="#case-grid" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-grid-3x3-gap me-2"></i>Browse Case Studies
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card cd-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-shield-check me-2"></i>Deployment Metrics</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between cd-spec-row pb-2 mb-2">
                <span class="cd-spec-label">Active Industrial Nodes:</span>
                <span class="cd-spec-val">1,200+ Edge Gateways</span>
              </li>
              <li class="d-flex justify-content-between cd-spec-row pb-2 mb-2">
                <span class="cd-spec-label">Cloud Data Egress:</span>
                <span class="text-success fw-semibold">0.0% (Air-Gapped)</span>
              </li>
              <li class="d-flex justify-content-between cd-spec-row pb-2 mb-2">
                <span class="cd-spec-label">Compliance Standard:</span>
                <span class="cd-spec-val">ISO / IEC / EU CRA / DPDP</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="cd-spec-label">Uptime SLA:</span>
                <span class="cd-spec-val">99.999% Bare-Metal</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="cd-divider my-5">

      <!-- Case Studies Filter & Grid -->
      <section id="case-grid" class="py-3" data-aos="fade-up">
        <div class="row align-items-center mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold cd-section-title">Verified Enterprise Implementations</h2>
            <p class="cd-section-desc">Filter production reference architectures by technical domain and architecture stack.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <div class="btn-group" role="group" aria-label="Filter Case Studies">
              <button type="button" class="btn btn-sm btn-success text-dark fw-semibold cd-filter-btn active" data-filter="all">All Projects</button>
              <button type="button" class="btn btn-sm btn-outline-light cd-filter-btn" data-filter="ot">OT / Industry 5.0</button>
              <button type="button" class="btn btn-sm btn-outline-light cd-filter-btn" data-filter="ai">Sovereign AI</button>
              <button type="button" class="btn btn-sm btn-outline-light cd-filter-btn" data-filter="fintech">FinTech &amp; ZT</button>
            </div>
          </div>
        </div>

        <div class="row g-4" id="cdCardsContainer">
          <!-- Study 1 -->
          <div class="col-md-4 cd-item" data-category="ot">
            <div class="card cd-case-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge cd-tag">OT / DIGITAL TWIN</span>
                <span class="font-monospace small text-success">Sentio&trade; Engine</span>
              </div>
              <h3 class="h5 fw-semibold cd-card-title">ISO 10816 Vibration &amp; Thermal Twin</h3>
              <p class="cd-card-text small mb-3">
                Deployed high-concurrency Rust digital twin engine across 450 heavy induction motors in a continuous manufacturing plant. Reduced unplanned downtime by 34%.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace cd-stack-meta">
                Rust &bull; IEC 60034 &bull; RAMI 4.0 AAS &bull; Edge Linux
              </div>
            </div>
          </div>

          <!-- Study 2 -->
          <div class="col-md-4 cd-item" data-category="ai">
            <div class="card cd-case-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge cd-tag">SOVEREIGN AI</span>
                <span class="font-monospace small text-success">Air-Gapped LLM</span>
              </div>
              <h3 class="h5 fw-semibold cd-card-title">Enterprise Legal &amp; Compliance Assistant</h3>
              <p class="cd-card-text small mb-3">
                Architected local Ollama multi-agent DAG for an Indian healthcare enterprise. Zero cloud API calls, ensuring strict DPDP and GDPR confidentiality guarantees.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace cd-stack-meta">
                Ollama &bull; Python &bull; Local Hardware &bull; FastAPI
              </div>
            </div>
          </div>

          <!-- Study 3 -->
          <div class="col-md-4 cd-item" data-category="fintech">
            <div class="card cd-case-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge cd-tag">FINTECH / ZERO TRUST</span>
                <span class="font-monospace small text-success">VeritasLens&trade;</span>
              </div>
              <h3 class="h5 fw-semibold cd-card-title">ISO 20022 Payment Gateway &amp; AML Guard</h3>
              <p class="cd-card-text small mb-3">
                Implemented secure mTLS micro-segmentation and real-time XML/JSON anomaly scoring engine for a cross-border payment switch with sub-2ms tail latency.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace cd-stack-meta">
                Rust Axum &bull; eBPF &bull; SPIFFE/X.509 &bull; SQLite
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