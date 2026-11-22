<?php
/**
 * ============================================================================
 * SUTRAWERKS — ARCHITECTURE INSIGHTS & ENGINEERING RESEARCH SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        insights.php
 * @description Thought Leadership & Technical Whitepapers: Architecture Insights.
 *              Highlights first-principles systems engineering, Industry 5.0
 *              telemetry standards, sovereign AI architectures, and clean-green-lean
 *              platform engineering research.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Technical Publications
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

$page_number      = '08';
$page_slug        = 'insights';
$page_section     = 'Insights';
$page_category    = 'Architecture Insights & Technical Whitepapers';
$page_type        = 'Editorial Hub';

$page_title = 'Architecture Insights & Research — SutraWerks';

$page_description = 'Deep-dive architectural whitepapers, first-principles systems engineering essays, and compliance field guides on Industry 5.0, Rust edge runtimes, and Sovereign AI.';

$page_keywords = 'Architecture Insights, Technical Whitepapers, Mechanical Sympathy, Industry 5.0 Research, Sovereign AI, EU CRA Compliance, Clean Green Lean Software, SutraWerks';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/insights';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-insights.jpg';
$og_image_alt = 'Architecture Insights & Research — SutraWerks';

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

$webpage_schema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'CollectionPage',
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

$pageCss = $asset('css/insights.css');
$pageJs  = $asset('js/insights.js');
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

    <!-- STRUCTURED DATA: COLLECTION PAGE -->
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
  <main class="in-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="in-breadcrumb-parent">Insights</span></li>
          <li class="breadcrumb-item active in-breadcrumb-current" aria-current="page">Architecture Insights</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge in-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Research &bull; First-Principles Engineering</span>
          <h1 class="display-4 fw-bold in-hero-title mb-3">Architecture Insights &amp; Field Notes</h1>
          <p class="lead in-hero-lead mb-4">
            Technical monographs, systems architecture blueprints, and regulatory field guides authored from over three decades of enterprise engineering practice. Focused on mechanical sympathy, air-gapped AI, and industrial resilience.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#featured-papers" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-journal-code me-2"></i>Explore Technical Monographs
            </a>
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-envelope-paper me-2"></i>Request Briefing Pack
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card in-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-book-half me-2"></i>Editorial Focus</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between in-spec-row pb-2 mb-2">
                <span class="in-spec-label">Systems Philosophy:</span>
                <span class="in-spec-val">Mechanical Sympathy</span>
              </li>
              <li class="d-flex justify-content-between in-spec-row pb-2 mb-2">
                <span class="in-spec-label">Core Stack:</span>
                <span class="text-success fw-semibold">Rust &bull; C++ &bull; Linux &bull; Ollama</span>
              </li>
              <li class="d-flex justify-content-between in-spec-row pb-2 mb-2">
                <span class="in-spec-label">Standards Tracked:</span>
                <span class="in-spec-val">RAMI 4.0 / CRA / ISO 10816</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="in-spec-label">Published Series:</span>
                <span class="in-spec-val">101+ Technical Essays</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="in-divider my-5">

      <!-- Featured Monograph Banner -->
      <section class="py-2 mb-5" data-aos="fade-up">
        <div class="card in-featured-banner p-4 p-lg-5 rounded-4">
          <div class="row align-items-center g-4">
            <div class="col-lg-8">
              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge bg-success text-dark font-monospace">FEATURED MONOGRAPH</span>
                <span class="small font-monospace in-meta-date">NOVEMBER 2026 &bull; 14 MIN READ</span>
              </div>
              <h2 class="h3 fw-bold in-card-title mb-3">Clean, Green, and Lean Platform Engineering: Escaping Hyperscaler Bloat</h2>
              <p class="in-card-text mb-3">
                Why modern enterprise software consumes 10x more compute and energy than necessary—and how returning to cache-aware Rust/C++ binaries, SQLite/PostgreSQL fundamentals, and deterministic bare-metal topologies cuts TCO while boosting tail-latency predictability.
              </p>
              <div class="small font-monospace in-stack-meta">
                Topics: Mechanical Sympathy &bull; Zero-Dependency Core &bull; Sustainable Compute
              </div>
            </div>
            <div class="col-lg-4 text-lg-end">
              <a href="<?= $escape($url('contact')); ?>?topic=whitepaper-clean-green-lean" class="btn btn-outline-success fw-semibold px-4 py-2">
                <i class="bi bi-file-earmark-arrow-down me-2"></i>Request Executive PDF
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Filterable Insights Library -->
      <section id="featured-papers" class="py-3" data-aos="fade-up">
        <div class="row align-items-end mb-4 g-3">
          <div class="col-lg-6">
            <h2 class="h3 fw-bold in-section-title">Technical Monographs &amp; Field Guides</h2>
            <p class="in-section-desc mb-0">Filter publications by engineering domain or search by keyword.</p>
          </div>
          <div class="col-lg-6">
            <div class="d-flex flex-column flex-sm-row gap-2 justify-content-lg-end">
              <input type="search" id="inSearchInput" class="form-control form-control-sm in-search-input" placeholder="Search topics (e.g., Rust, CRA, Ollama)..." aria-label="Search insights">
              <div class="btn-group btn-group-sm" role="group" aria-label="Filter Insights">
                <button type="button" class="btn btn-success text-dark fw-semibold in-filter-btn active" data-filter="all">All</button>
                <button type="button" class="btn btn-outline-light in-filter-btn" data-filter="industry5">Industry 5.0</button>
                <button type="button" class="btn btn-outline-light in-filter-btn" data-filter="ai">Sovereign AI</button>
                <button type="button" class="btn btn-outline-light in-filter-btn" data-filter="security">CRA / Security</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-4" id="inArticlesGrid">
          <!-- Article 1 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="industry5">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">INDUSTRY 5.0</span>
                <span class="small font-monospace in-meta-date">10 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">Deterministic Edge Twins Under ISO 10816 &amp; IEC 60034</h3>
              <p class="in-card-text small mb-3">
                Modeling rotating machinery vibration severity and thermal derating curves directly inside memory-safe Rust loops without cloud round-trips.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">RAMI 4.0 &bull; AAS</span>
                <a href="<?= $escape($url('industry-5-0')); ?>" class="text-success text-decoration-none fw-semibold">Explore Twin &rarr;</a>
              </div>
            </article>
          </div>

          <!-- Article 2 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="ai">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">SOVEREIGN AI</span>
                <span class="small font-monospace in-meta-date">12 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">Beyond Stochastic Chatbots: Deterministic Multi-Agent DAGs</h3>
              <p class="in-card-text small mb-3">
                How to constrain local quantized LLMs inside typed state machines with schema validation and auditable human-in-the-loop checkpoints.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">Ollama &bull; Air-Gapped</span>
                <a href="<?= $escape($url('agentic-ai')); ?>" class="text-success text-decoration-none fw-semibold">View Stack &rarr;</a>
              </div>
            </article>
          </div>

          <!-- Article 3 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="security">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">REGULATORY / CRA</span>
                <span class="small font-monospace in-meta-date">9 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">Preparing Industrial Edge Firmware for the EU Cyber Resilience Act</h3>
              <p class="in-card-text small mb-3">
                Practical engineering checklist for automated CycloneDX SBOM generation, signed firmware provenance, and mTLS workload attestation.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">EU CRA &bull; NIS2</span>
                <a href="<?= $escape($url('zero-trust')); ?>" class="text-success text-decoration-none fw-semibold">Inspect ZT &rarr;</a>
              </div>
            </article>
          </div>

          <!-- Article 4 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="industry5">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">CHAOS ENGINEERING</span>
                <span class="small font-monospace in-meta-date">11 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">Proactive Failure Injection for Cyber-Physical &amp; Payment Systems</h3>
              <p class="in-card-text small mb-3">
                Designing deterministic fault-injection harnesses that verify graceful degradation under sensor dropout, packet jitter, and disk saturation.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">Resilience &bull; QA</span>
                <a href="<?= $escape($url('platforms')); ?>" class="text-success text-decoration-none fw-semibold">Blueprints &rarr;</a>
              </div>
            </article>
          </div>

          <!-- Article 5 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="ai">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">HUMAN-CENTRIC AI</span>
                <span class="small font-monospace in-meta-date">8 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">The Irreplaceable Human: Architectural Judgment in the Age of Synthesis</h3>
              <p class="in-card-text small mb-3">
                Why synthetic code generation amplifies the value of senior architectural taste, ethical accountability, and first-principles problem framing.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">Leadership &bull; Ethics</span>
                <a href="<?= $escape($url('consulting')); ?>" class="text-success text-decoration-none fw-semibold">Advisory &rarr;</a>
              </div>
            </article>
          </div>

          <!-- Article 6 -->
          <div class="col-md-6 col-lg-4 in-article-item" data-category="security">
            <article class="card in-article-card h-100 p-4 rounded-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge in-tag">FINTECH / ISO 20022</span>
                <span class="small font-monospace in-meta-date">13 MIN READ</span>
              </div>
              <h3 class="h5 fw-semibold in-card-title">Air-Gapped AML Anomaly Triage on High-Throughput ISO 20022 Streams</h3>
              <p class="in-card-text small mb-3">
                Pairing zero-copy Rust XML/JSON gateways with local scikit-learn anomaly scoring to flag suspicious cross-border wires in under 2 milliseconds.
              </p>
              <div class="mt-auto pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center small">
                <span class="font-monospace in-stack-meta">Rust Axum &bull; AML</span>
                <a href="<?= $escape($url('case-studies')); ?>" class="text-success text-decoration-none fw-semibold">Case Study &rarr;</a>
              </div>
            </article>
          </div>
        </div>

        <!-- Empty Search State -->
        <div id="inEmptyState" class="text-center py-5 d-none">
          <p class="in-section-desc mb-2">No technical monographs matched your current filter or search term.</p>
          <button type="button" id="inResetFiltersBtn" class="btn btn-sm btn-outline-success">Reset Filters</button>
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