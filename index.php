<?php
/**
 * ============================================================================
 * SUTRAWERKS — PUBLIC HOMEPAGE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        index.php
 * @description Public homepage and landing page for SutraWerks — Industry 5.0 
 *              consulting, E2E products, and platform engineering.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3
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
 * PHP BLOCK 3 — APPLICATION CONFIGURATION AND PAGE METADATA MODEL
 * ============================================================================
 */

require_once __DIR__ . '/includes/config.php';

/* SITE IDENTITY */

$site_name    = 'SutraWerks';
$site_tagline = 'Clean, Green, Lean, Secure and Ethical Engineering';
$site_url     = 'https://sutrawerks.com';

/* PAGE METADATA */

$page_number      = '01';
$page_slug        = 'home';
$page_section     = 'Home';
$page_category    = 'Enterprise Consulting & Engineering';
$page_type        = 'Public Homepage';

$page_title = 'SutraWerks | Industry 5.0 Consulting, E2E Products & Platform Engineering';

$page_description = 'Enterprise Industry 5.0 consulting, Cyber-Physical Systems (Sentio), Sovereign Agentic AI, Zero Trust (VeritasLens), and E2E platform engineering for global industrial leaders.';

$page_keywords = 'Industry 5.0, Cyber-Physical Systems, Digital Twin, Agentic AI, Zero Trust Architecture, Fractional CTO, Enterprise Architecture, SutraWerks, Bengaluru, EU Consulting';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-home.jpg';
$og_image_alt = 'SutraWerks — Industry 5.0 Consulting & Platform Engineering';

/* OPEN GRAPH / SOCIAL SHARING */

$og_title       = $page_title;
$og_description = $page_description;
$og_url         = $canonical_url;
$og_type        = 'website';
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

$website_schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'WebSite',
    'name'     => $site_name,
    'url'      => $canonical_url,
    'description' => $page_description,
    'inLanguage' => 'en-US',
    'publisher' => [
        '@type' => 'Organization',
        'name'  => $site_name,
        'logo'  => rtrim($site_url, '/') . '/assets/img/sw-logo.png'
    ]
];

$webpage_schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'WebPage',
    'name'     => $page_title,
    'description' => $page_description,
    'url'      => $canonical_url,
    'isPartOf' => [
        '@type' => 'WebSite',
        'name'  => $site_name,
        'url'   => $canonical_url
    ],
    'inLanguage' => 'en-US',
    'dateModified' => $schema_date_modified
];


/* ============================================================================
 * PHP BLOCK 4 — PAGE CONTENT MODEL & ASSET INJECTIONS
 * ============================================================================
 */

$pageCss = null; // Homepage uses main.css
$pageJs  = null; // Homepage uses main.js via footer
?>
<?php
/**
 * ============================================================================
 * SUTRAWERKS — PUBLIC HOMEPAGE DOCUMENT HEAD
 * ============================================================================
 */
?>
<!DOCTYPE html> 
<html lang="en"> 
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

    <!-- OPEN GRAPH / FACEBOOK / LINKEDIN METADATA -->
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

    <!-- STRUCTURED DATA: WEBSITE -->
    <script type="application/ld+json">
    <?= json_encode($website_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
    </script>

    <!-- STRUCTURED DATA: WEBPAGE -->
    <script type="application/ld+json">
    <?= json_encode($webpage_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
    </script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP 5.3.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS ANIMATION CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- PORTAL STYLESHEETS -->
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">

    <?php if (isset($pageCss) && $pageCss): ?>
    <!-- PAGE-SPECIFIC STYLESHEET -->
    <link rel="stylesheet" href="<?= $escape($pageCss); ?>">
    <?php endif; ?>
</head>
<body class="public-page public-home">

  <!-- Top Navigation -->
  <?php require_once __DIR__ . '/includes/topnav.php'; ?>

  <!-- Hero Section -->
  <header class="sw-hero">
    <div class="container position-relative">
      <div class="row align-items-center g-5">
        <div class="col-lg-7" data-aos="fade-right">
          <div class="sw-badge-pill mb-3">
            <i class="bi bi-cpu"></i>
            <span>Industry 5.0 Consulting &bull; E2E Products &bull; Platform Engineering</span>
          </div>
          <h1 class="display-5 fw-bold mb-3">
            Clean, Green, Lean, Secure and Ethical Engineering — <span class="text-info">now and always.</span>
          </h1>
          <p class="lead text-light opacity-75 mb-4">
            We design, engineer, and deploy production-grade cyber-physical systems, sovereign agentic AI, and mission-critical B2B/B2C platforms for European industrial leaders, GCC enterprises, and ambitious SMEs.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('consulting.php')); ?>" class="btn btn-sw-primary">
              Enterprise Consulting &amp; Advisory <i class="bi bi-arrow-right ms-1"></i>
            </a>
            <a href="<?= $escape($url('industry-5-0.php')); ?>" class="btn btn-outline-light px-4 py-2">
              Discover Sentio&trade; Digital Twin
            </a>
          </div>
          <div class="row mt-5 pt-3 border-top border-secondary border-opacity-25 g-3">
            <div class="col-4">
              <div class="h4 fw-bold text-white mb-0">30+ Yrs</div>
              <small class="text-light opacity-75">Enterprise Systems Pedigree</small>
            </div>
            <div class="col-4">
              <div class="h4 fw-bold text-success mb-0">E2E</div>
              <small class="text-light opacity-75">Architecture to Production</small>
            </div>
            <div class="col-4">
              <div class="h4 fw-bold text-info mb-0">EU &bull; GCC &bull; IN</div>
              <small class="text-light opacity-75">Global B2B Execution</small>
            </div>
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-left">
          <div class="sw-hero-img-frame bg-dark">
            <!-- Placeholder image: will be replaced with prompt-driven custom visual -->
            <img src="https://picsum.photos/seed/sutrawerks-hero/800/620" class="img-fluid w-100" alt="Industry 5.0 Cyber-Physical Systems Architecture">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Core Engineering Pillars -->
  <section class="py-5 bg-light">
    <div class="container py-4">
      <div class="text-center mx-auto mb-5" style="max-width: 700px;" data-aos="fade-up">
        <span class="text-uppercase text-success fw-semibold small">Products &amp; Engineering Pillars</span>
        <h2 class="fw-bold mt-1">End-to-End Industrial &amp; Enterprise Systems</h2>
        <p class="text-muted">Engineered from first principles with mechanical sympathy, zero vendor lock-in, and compliance alignment for EU CRA, NIS2, and RAMI 4.0 standards.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
          <div class="sw-card p-4">
            <div class="sw-icon-box mb-3"><i class="bi bi-cpu"></i></div>
            <h5 class="fw-bold">Sentio&trade; Digital Twin</h5>
            <p class="text-muted small">Production cyber-physical telemetry engine for industrial rotating machinery, edge sensors, and ISO 10816 / IEC 60034 predictive diagnostics.</p>
            <a href="<?= $escape($url('industry-5-0.php')); ?>" class="text-success fw-semibold small text-decoration-none">Explore Sentio&trade; &rarr;</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="sw-card p-4">
            <div class="sw-icon-box mb-3"><i class="bi bi-diagram-3"></i></div>
            <h5 class="fw-bold">Sovereign Agentic AI</h5>
            <p class="text-muted small">Air-gapped, deterministic multi-agent orchestration running on private infrastructure with full auditability and zero external telemetry leakage.</p>
            <a href="<?= $escape($url('agentic-ai.php')); ?>" class="text-success fw-semibold small text-decoration-none">Explore Agentic AI &rarr;</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
          <div class="sw-card p-4">
            <div class="sw-icon-box mb-3"><i class="bi bi-shield-lock"></i></div>
            <h5 class="fw-bold">VeritasLens&trade; Zero Trust</h5>
            <p class="text-muted small">Continuous cryptographic verification, automated anomaly triage, and regulatory compliance assurance for critical operational networks.</p>
            <a href="<?= $escape($url('zero-trust.php')); ?>" class="text-success fw-semibold small text-decoration-none">Explore VeritasLens&trade; &rarr;</a>
          </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="sw-card p-4">
            <div class="sw-icon-box mb-3"><i class="bi bi-window-stack"></i></div>
            <h5 class="fw-bold">E2E Platform Engineering</h5>
            <p class="text-muted small">Full-lifecycle custom B2B and B2C digital platforms built on high-efficiency Rust, C++, PHP 8, and hardened containerized runtimes.</p>
            <a href="<?= $escape($url('platforms.php')); ?>" class="text-success fw-semibold small text-decoration-none">Explore Platforms &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Live Telemetry & Mechanical Sympathy Section -->
  <section class="py-5">
    <div class="container py-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-5" data-aos="fade-right">
          <span class="text-uppercase text-primary fw-semibold small">Measurable Industrial Impact</span>
          <h2 class="fw-bold mt-1 mb-3">Lean Compute. Maximum Operational Resilience.</h2>
          <p class="text-muted">
            Bloated cloud stacks erode operating margins and expand attack surfaces. Our platform engineering prioritizes hardware-aware efficiency—cutting compute and energy overhead while elevating Overall Equipment Effectiveness (OEE).
          </p>
          <ul class="list-unstyled text-muted small">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Edge-First Telemetry:</strong> Sub-millisecond Rust &amp; C++ ingestion engines built for deterministic industrial workloads.</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Turnkey Product Delivery:</strong> From architectural blueprint through hardened production deployment and SLA support.</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Cross-Border B2B Execution:</strong> Direct MSA/SoW delivery from Bengaluru for EU, UK, US &amp; GCC enterprises.</li>
          </ul>
        </div>
        <div class="col-lg-7" data-aos="fade-left">
          <div class="sw-telemetry-panel shadow">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
                <h6 class="mb-0 text-white fw-bold">Sentio&trade; Reference Benchmark: OEE vs. Energy Overhead</h6>
                <small class="text-secondary">4-Quarter Industrial Edge Modernization Trajectory</small>
              </div>
              <span class="badge bg-success bg-opacity-25 text-success border border-success">Telemetry Model</span>
            </div>
            <div style="height: 270px;">
              <canvas id="sentioTelemetryChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Executive CTA Banner -->
  <section class="py-5 bg-dark text-white">
    <div class="container py-3 text-center" data-aos="zoom-in">
      <h2 class="fw-bold mb-3">Commission Your Next Mission-Critical System</h2>
      <p class="text-light opacity-75 mx-auto mb-4" style="max-width: 640px;">
        Partner with SutraWerks for Principal Enterprise Architecture, Fractional CTO leadership, and turnkey Industry 5.0 product engineering.
      </p>
      <a href="<?= $escape($url('contact.php')); ?>" class="btn btn-sw-primary btn-lg">Initiate a B2B Engagement</a>
    </div>
  </section>

	<?php
	/**
	 * ============================================================================
	 * SUTRAWERKS — PUBLIC HOMEPAGE FOOTER & SCRIPT BUNDLES
	 * ============================================================================
	 */
	?>

  <!-- Footer -->
  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <!-- Bootstrap 5.3.3 Bundle JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS Animation JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <!-- Chart.js 4.4.3 JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
  <!-- SutraWerks Custom JS -->
  <script src="<?= $escape($asset('js/main.js')); ?>"></script>

  <?php if (isset($pageJs) && $pageJs): ?>
  <!-- Page-Specific JS -->
  <script src="<?= $escape($pageJs); ?>"></script>
  <?php endif; ?>
</body>
</html>