<?php
/**
 * ============================================================================
 * SUTRAWERKS — VERITASLENS™ ZERO TRUST & REGULATORY COMPLIANCE SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        zero-trust.php
 * @description Product & Architecture Showcase: VeritasLens™ Zero Trust.
 *              Highlights cryptographic identity, mTLS edge micro-segmentation,
 *              immutable audit ledgers, and EU CRA / NIS2 / DPDP compliance.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Rust / eBPF Core
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

$page_number      = '04';
$page_slug        = 'zero-trust';
$page_section     = 'Products';
$page_category    = 'Zero Trust Security & Governance';
$page_type        = 'Product Showcase';

$page_title = 'VeritasLens™ Zero Trust Architecture — SutraWerks';

$page_description = 'Cryptographic workload identity, mTLS micro-segmentation, and immutable SBOM attestation engineered for EU Cyber Resilience Act (CRA), NIS2, and DPDP compliance.';

$page_keywords = 'VeritasLens, Zero Trust Architecture, mTLS, Micro-Segmentation, EU Cyber Resilience Act, CRA, NIS2, SBOM, Cryptographic Identity, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/zero-trust';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-zero-trust.jpg';
$og_image_alt = 'VeritasLens™ Zero Trust Architecture — SutraWerks';

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

$pageCss = $asset('css/zero-trust.css');
$pageJs  = $asset('js/zero-trust.js');
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
  <main class="zt-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="zt-breadcrumb-parent">Products</span></li>
          <li class="breadcrumb-item active zt-breadcrumb-current" aria-current="page">VeritasLens&trade; Zero Trust</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge zt-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Module 04 &bull; Continuous Verification</span>
          <h1 class="display-4 fw-bold zt-hero-title mb-3">VeritasLens&trade; Zero Trust</h1>
          <p class="lead zt-hero-lead mb-4">
            Eliminate implicit network trust across OT/IT boundaries. VeritasLens&trade; enforces cryptographic workload identity, mutual TLS micro-segmentation, and tamper-evident audit trails engineered for EU CRA, NIS2, and DPDP mandates.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-shield-check me-2"></i>Request Security Architecture Review
            </a>
            <a href="#policy-simulator" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-terminal me-2"></i>Inspect Policy Engine
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card zt-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-fingerprint me-2"></i>Posture &amp; Compliance</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between zt-spec-row pb-2 mb-2">
                <span class="zt-spec-label">Identity Plane:</span>
                <span class="zt-spec-val">SPIFFE / X.509 SVID</span>
              </li>
              <li class="d-flex justify-content-between zt-spec-row pb-2 mb-2">
                <span class="zt-spec-label">Transport Security:</span>
                <span class="text-success fw-semibold">mTLS 1.3 Enforced</span>
              </li>
              <li class="d-flex justify-content-between zt-spec-row pb-2 mb-2">
                <span class="zt-spec-label">Regulatory Alignment:</span>
                <span class="zt-spec-val">EU CRA / NIS2 / DPDP</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="zt-spec-label">Audit Storage:</span>
                <span class="zt-spec-val">Merkle-Tree SQLite</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="zt-divider my-5">

      <!-- Core Architecture Pillars -->
      <section class="py-3" data-aos="fade-up">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold zt-section-title">Never Trust, Always Verify at the Edge</h2>
            <p class="zt-section-desc">Designed with mechanical sympathy for constrained industrial gateways and sovereign enterprise nodes.</p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-md-4">
            <div class="card zt-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-key-fill"></i>
              </div>
              <h3 class="h5 fw-semibold zt-card-title">Cryptographic Workload Identity</h3>
              <p class="zt-card-text small mb-0">
                Replaces brittle static IP whitelists and hardcoded API keys with short-lived, automatically rotated X.509 certificates bound to hardware attestation.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card zt-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-bricks"></i>
              </div>
              <h3 class="h5 fw-semibold zt-card-title">OT/IT Micro-Segmentation</h3>
              <p class="zt-card-text small mb-0">
                Enforces default-deny packet filtering between PLC/SCADA telemetry collectors and enterprise analytics engines, containing lateral movement instantly.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card zt-feature-card h-100 p-4 rounded-4">
              <div class="mb-3 text-success fs-3">
                <i class="bi bi-file-earmark-lock2-fill"></i>
              </div>
              <h3 class="h5 fw-semibold zt-card-title">Continuous SBOM &amp; CRA Attestation</h3>
              <p class="zt-card-text small mb-0">
                Generates cryptographic Software Bills of Materials (CycloneDX/SPDX) and immutable incident logs ready for EU Cyber Resilience Act audits.
              </p>
            </div>
          </div>
        </div>
      </section>

      <hr class="zt-divider my-5">

      <!-- Interactive Zero-Trust Policy Simulator -->
      <section id="policy-simulator" class="py-3" data-aos="fade-up">
        <div class="row align-items-center mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold zt-section-title">Interactive Policy Evaluation Console</h2>
            <p class="zt-section-desc">Simulate real-time Zero Trust access decisions across industrial edge nodes and enterprise services.</p>
          </div>
        </div>

        <div class="card zt-console-card p-4 rounded-4">
          <div class="row g-4 align-items-center">
            <div class="col-lg-5">
              <label for="ztScenarioSelect" class="form-label fw-semibold zt-card-title small">Select Request Scenario</label>
              <select id="ztScenarioSelect" class="form-select zt-select mb-3">
                <option value="valid_edge">1. Attested Edge Gateway &rarr; Telemetry Ingest (Valid SVID)</option>
                <option value="expired_cert">2. Field Sensor Node &rarr; Core DB (Expired X.509 Cert)</option>
                <option value="untrusted_subnet">3. Unverified Lateral Host &rarr; PLC Control Plane</option>
                <option value="unsigned_binary">4. Modified Container Hash &rarr; Sovereign LLM API</option>
              </select>
              <button type="button" id="ztEvaluateBtn" class="btn btn-success fw-semibold text-dark w-100">
                <i class="bi bi-play-fill me-1"></i>Evaluate Zero-Trust Policy
              </button>
            </div>

            <div class="col-lg-7">
              <div class="zt-terminal p-3 rounded-3 font-monospace small" id="ztConsoleOutput" aria-live="polite">
                <div class="text-success mb-1">[VERITAS-PDP v1.4] Policy Decision Point Ready.</div>
                <div class="zt-terminal-line">Select a workload scenario on the left and click <strong>Evaluate Zero-Trust Policy</strong> to inspect cryptographic verification steps.</div>
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