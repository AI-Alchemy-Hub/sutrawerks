<?php
/**
 * ============================================================================
 * SUTRAWERKS — E2E PLATFORM ENGINEERING & SOVEREIGN STACKS SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        platforms.php
 * @description Product & Architecture Showcase: E2E Platform Engineering.
 *              Highlights bare-metal & private-cloud sovereign platforms,
 *              clean-green-lean runtime optimization, ISO 20022 financial
 *              gateways, and deterministic observability stacks.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Rust / Go / Linux
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

$page_number      = '05';
$page_slug        = 'platforms';
$page_section     = 'Products';
$page_category    = 'B2B / B2C Systems & Platform Engineering';
$page_type        = 'Product Showcase';

$page_title = 'E2E Platform Engineering — SutraWerks';

$page_description = 'Clean, Green, and Lean end-to-end platform engineering. Sovereign bare-metal and private-cloud architectures built with Rust, Go, C++, and open-source toolchains.';

$page_keywords = 'E2E Platform Engineering, Sovereign Infrastructure, Clean Green Lean Software, Mechanical Sympathy, Rust Systems, ISO 20022 Gateway, Open Source Platform, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/platforms';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-platforms.jpg';
$og_image_alt = 'E2E Platform Engineering — SutraWerks';

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

$pageCss = $asset('css/platforms.css');
$pageJs  = $asset('js/platforms.js');
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
  <main class="pf-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="pf-breadcrumb-parent">Products</span></li>
          <li class="breadcrumb-item active pf-breadcrumb-current" aria-current="page">E2E Platform Engineering</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge pf-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Module 05 &bull; Clean, Green &amp; Lean Systems</span>
          <h1 class="display-4 fw-bold pf-hero-title mb-3">E2E Platform Engineering</h1>
          <p class="lead pf-hero-lead mb-4">
            We architect and deliver deterministic, sovereign B2B and B2C software platforms free from hyperscaler lock-in. Engineered from first principles with Rust, Go, C++, and lean open-source stacks for sub-millisecond throughput and radical infrastructure economy.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-layers-fill me-2"></i>Scope a Platform Build
            </a>
            <a href="#reference-stacks" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-diagram-2 me-2"></i>Inspect Reference Blueprints
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card pf-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-speedometer2 me-2"></i>Engineering Benchmarks</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between pf-spec-row pb-2 mb-2">
                <span class="pf-spec-label">Core Runtimes:</span>
                <span class="pf-spec-val">Rust / Go / C++ / PHP 8.3</span>
              </li>
              <li class="d-flex justify-content-between pf-spec-row pb-2 mb-2">
                <span class="pf-spec-label">Deployment Target:</span>
                <span class="text-success fw-semibold">Bare-Metal / Sovereign Cloud</span>
              </li>
              <li class="d-flex justify-content-between pf-spec-row pb-2 mb-2">
                <span class="pf-spec-label">Vendor Lock-In:</span>
                <span class="pf-spec-val">Zero (100% FOSS Core)</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="pf-spec-label">Resilience Testing:</span>
                <span class="pf-spec-val">Proactive Chaos Injection</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="pf-divider my-5">

      <!-- Core Engineering Principles -->
      <section class="py-3" data-aos="fade-up">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold pf-section-title">Mechanical Sympathy Over Cloud Bloat</h2>
            <p class="pf-section-desc">Software engineered to respect CPU cache lines, memory boundaries, and energy budgets—cutting infrastructure overhead by up to 70%.</p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card pf-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-cpu-fill"></i>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">Clean, Green &amp; Lean Runtimes</h3>
              <p class="pf-card-text small mb-0">
                Eliminates bloated microservice sprawl and heavy JVM/container overhead in favor of single-binary Rust and Go services with predictable tail latency.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card pf-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-bank2"></i>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">Mission-Critical Transaction Engines</h3>
              <p class="pf-card-text small mb-0">
                High-throughput financial messaging gateways (ISO 20022), real-time AML anomaly detection, and ACID-compliant embedded or distributed data stores.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card pf-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-activity"></i>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">Chaos-Verified Resilience</h3>
              <p class="pf-card-text small mb-0">
                Every platform ships with automated failure-injection harnesses, deterministic replay logs, and self-healing circuit breakers tested before production cutover.
              </p>
            </div>
          </div>
        </div>
      </section>

      <hr class="pf-divider my-5">

      <!-- Interactive Reference Stack Explorer -->
      <section id="reference-stacks" class="py-3" data-aos="fade-up">
        <div class="row align-items-center mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold pf-section-title">Reference Architecture Blueprints</h2>
            <p class="pf-section-desc">Filter production-ready SutraWerks platform blueprints by target workload profile.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <div class="btn-group" role="group" aria-label="Filter Platform Blueprints">
              <button type="button" class="btn btn-sm btn-success text-dark fw-semibold pf-filter-btn active" data-filter="all">All Stacks</button>
              <button type="button" class="btn btn-sm btn-outline-light pf-filter-btn" data-filter="fintech">FinTech &amp; Core</button>
              <button type="button" class="btn btn-sm btn-outline-light pf-filter-btn" data-filter="telecom">Telecom &amp; Edge</button>
              <button type="button" class="btn btn-sm btn-outline-light pf-filter-btn" data-filter="b2b">B2B Portals</button>
            </div>
          </div>
        </div>

        <div class="row g-4" id="pfBlueprintGrid">
          <!-- Blueprint 1 -->
          <div class="col-md-4 pf-blueprint-item" data-category="fintech">
            <div class="card pf-blueprint-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge pf-tag">FINTECH / ISO 20022</span>
                <span class="font-monospace small text-success">p99 &lt; 1.8ms</span>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">Sovereign Payment &amp; AML Guard</h3>
              <p class="pf-card-text small mb-3">
                Air-gapped ISO 20022 XML/JSON ingestion gateway built in Rust Axum paired with real-time scikit-learn anomaly scoring and audit dashboards.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace pf-stack-meta">
                Rust &bull; Axum &bull; Python &bull; SQLite/PostgreSQL
              </div>
            </div>
          </div>

          <!-- Blueprint 2 -->
          <div class="col-md-4 pf-blueprint-item" data-category="telecom">
            <div class="card pf-blueprint-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge pf-tag">TELECOM / NOC TWIN</span>
                <span class="font-monospace small text-success">100k+ msg/sec</span>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">RAN NOC Digital Twin Engine</h3>
              <p class="pf-card-text small mb-3">
                High-concurrency network telemetry collector and predictive fault simulator for Radio Access Networks with deterministic replay capability.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace pf-stack-meta">
                Rust &bull; Tokio &bull; eBPF &bull; TimescaleDB
              </div>
            </div>
          </div>

          <!-- Blueprint 3 -->
          <div class="col-md-4 pf-blueprint-item" data-category="b2b">
            <div class="card pf-blueprint-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge pf-tag">B2B / SAAS PORTAL</span>
                <span class="font-monospace small text-success">Zero Bloat</span>
              </div>
              <h3 class="h5 fw-semibold pf-card-title">Multi-Tenant Enterprise Knowledge &amp; LMS</h3>
              <p class="pf-card-text small mb-3">
                Self-hosted sovereign academy, bilingual requirements engineering workspace (RAMI 4.0 / AAS), and gated B2B client delivery portal.
              </p>
              <div class="mt-auto pt-2 border-top border-secondary border-opacity-25 small font-monospace pf-stack-meta">
                PHP 8.3 &bull; FastAPI &bull; MySQL 8 &bull; Docker
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