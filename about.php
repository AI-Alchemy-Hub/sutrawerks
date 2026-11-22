<?php
/**
 * ============================================================================
 * SUTRAWERKS — PRINCIPAL LEADERSHIP & FIRM PROFILE SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        about.php
 * @description Firm Profile & Leadership Showcase: Principal Leadership.
 *              Highlights 30+ years of global systems engineering experience,
 *              founding philosophy, AI Alchemy Hub collaboration, and Bengaluru
 *              headquarters.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Executive Profile
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

$page_number      = '09';
$page_slug        = 'about';
$page_section     = 'Firm';
$page_category    = 'Principal Leadership & Firm Profile';
$page_type        = 'About Page';

$page_title = 'Principal Leadership & Firm Profile — SutraWerks';

$page_description = 'Headquartered in Bengaluru, India. Led by Principal Architect S.P. Nigam with 30+ years of global enterprise systems, distributed architecture, and Industry 5.0 expertise.';

$page_keywords = 'Satya Prakash Nigam, S.P. Nigam, Principal Architect, SutraWerks, AI Alchemy Hub, Industry 5.0, Enterprise Engineering, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/about';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-about.jpg';
$og_image_alt = 'Principal Leadership & Firm Profile — SutraWerks';

/* OPEN GRAPH / SOCIAL SHARING */

$og_title       = $page_title;
$og_description = $page_description;
$og_url         = $canonical_url;
$og_type        = 'profile';
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
    '@type'       => 'ProfilePage',
    'name'        => $page_title,
    'description' => $page_description,
    'url'         => $canonical_url,
    'publisher'   => [
        '@type' => 'Organization',
        'name'  => $site_name,
        'logo'  => rtrim($site_url, '/') . '/assets/img/sw-logo.png'
    ],
    'mainEntity'  => [
        '@type'       => 'Person',
        'name'        => 'Satya Prakash Nigam',
        'jobTitle'    => 'Founder & Principal Industry 5.0 & Edge AI Architect',
        'worksFor'    => [
            '@type' => 'Organization',
            'name'  => 'SutraWerks'
        ],
        'alumniOf'    => 'Shri Govindram Seksaria Institute of Technology & Science (SGSITS)',
        'nationality' => 'Indian'
    ],
    'inLanguage'   => 'en-US',
    'dateModified' => $schema_date_modified
];


/* ============================================================================
 * PHP BLOCK 4 — PAGE CONTENT MODEL & ASSET INJECTIONS
 * ============================================================================
 */

$pageCss = $asset('css/about.css');
$pageJs  = $asset('js/about.js');
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

    <!-- STRUCTURED DATA: PROFILE PAGE -->
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
  <main class="ab-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="ab-breadcrumb-parent">Firm</span></li>
          <li class="breadcrumb-item active ab-breadcrumb-current" aria-current="page">Principal Leadership</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge ab-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Leadership &bull; Bengaluru, India</span>
          <h1 class="display-4 fw-bold ab-hero-title mb-3">Principal Leadership &amp; Firm Profile</h1>
          <p class="lead ab-hero-lead mb-4">
            SutraWerks is an independent enterprise engineering practice founded on first-principles software architecture, mechanical sympathy, and uncompromising sovereign data ownership. Headquartered in Bengaluru, we serve global enterprise clients across India, Europe, and GCC markets.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-envelope-at-fill me-2"></i>Connect with Principal
            </a>
            <a href="#leadership-bio" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-person-badge me-2"></i>Read Principal Bio
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card ab-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-person-lines-fill me-2"></i>Principal Profile</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between ab-spec-row pb-2 mb-2">
                <span class="ab-spec-label">Principal Architect:</span>
                <span class="ab-spec-val">Satya Prakash Nigam</span>
              </li>
              <li class="d-flex justify-content-between ab-spec-row pb-2 mb-2">
                <span class="ab-spec-label">Experience:</span>
                <span class="text-success fw-semibold">30+ Years Global Engineering</span>
              </li>
              <li class="d-flex justify-content-between ab-spec-row pb-2 mb-2">
                <span class="ab-spec-label">Alma Mater:</span>
                <span class="ab-spec-val">SGSITS Indore (B.E. Electronics)</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="ab-spec-label">Research &amp; Lab:</span>
                <span class="ab-spec-val">AI Alchemy Hub &amp; Indus 5.0</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="ab-divider my-5">

      <!-- Principal Leadership Bio Section -->
      <section id="leadership-bio" class="py-3 mb-5" data-aos="fade-up">
        <div class="row align-items-center g-5">
          <div class="col-lg-5">
            <div class="card ab-bio-card p-4 rounded-4 text-center">
              <div class="mb-3 text-success display-4">
                <i class="bi bi-person-circle"></i>
              </div>
              <h3 class="h4 fw-bold ab-card-title mb-1">Satya Prakash Nigam (S.P. Nigam)</h3>
              <p class="small text-success font-monospace mb-3">Independent Enterprise Solution Architect &amp; Fractional CTO</p>
              <p class="ab-card-text small mb-0 text-start">
                With over three decades of engineering leadership spanning Microsoft, Yahoo!, Novell, Cisco, and complex government research projects, S.P. Nigam specializes in high-performance distributed systems, low-latency telemetry engines, and air-gapped sovereign AI architectures.
              </p>
            </div>
          </div>
          <div class="col-lg-7">
            <h2 class="h3 fw-bold ab-section-title mb-3">Clean, Green, Lean, and Ethical Engineering</h2>
            <p class="ab-section-desc mb-3">
              Modern enterprise software has strayed into excessive cloud bloat, unnecessary subscription dependencies, and opaque telemetry. SutraWerks was established to reverse this trend. We champion local-first, air-gapped open-source architectures (Rust, Go, C++, SQLite, Ollama) that respect hardware cache lines and corporate data sovereignty.
            </p>
            <p class="ab-section-desc mb-4">
              In addition to advisory and fractional CTO mandates, S.P. Nigam serves as a Professor of Practice mentoring undergraduate engineers in Data Structures, Applied AI, and Systems Logic at premier institutions in Bengaluru, bridging decades of industrial rigor with the next generation of systems architects.
            </p>
            <div class="d-flex flex-wrap gap-2 font-monospace small">
              <span class="badge ab-tag">Microsoft (Windows Service Packs)</span>
              <span class="badge ab-tag">Yahoo! (Online Ad Exchange)</span>
              <span class="badge ab-tag">Novell (NetWare &amp; Quality)</span>
              <span class="badge ab-tag">AI Alchemy Hub</span>
            </div>
          </div>
        </div>
      </section>

      <hr class="ab-divider my-5">

      <!-- Interactive Career & Engineering Milestones Timeline -->
      <section class="py-3" data-aos="fade-up">
        <div class="row mb-4">
          <div class="col-lg-8">
            <h2 class="h3 fw-bold ab-section-title">Three Decades of Systems Engineering</h2>
            <p class="ab-section-desc">Click any milestone below to inspect key architectural contributions and leadership milestones.</p>
          </div>
        </div>

        <!-- Interactive Timeline Tabs / Buttons -->
        <div class="row g-4">
          <div class="col-lg-4">
            <div class="list-group ab-timeline-nav" id="abTimelineNav" role="tablist">
              <button type="button" class="list-group-item list-group-item-action active ab-tl-btn" data-milestone="milestone1">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1 fw-semibold text-white">Foundational Systems</h5>
                  <small class="font-monospace text-success">Early Research</small>
                </div>
                <p class="mb-1 small ab-card-text">University of Roorkee &amp; SGSITS Indore</p>
              </button>

              <button type="button" class="list-group-item list-group-item-action ab-tl-btn" data-milestone="milestone2">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1 fw-semibold text-white">Global Tech Leadership</h5>
                  <small class="font-monospace text-success">Microsoft &amp; Yahoo!</small>
                </div>
                <p class="mb-1 small ab-card-text">Windows Service Packs &amp; Ad Exchange</p>
              </button>

              <button type="button" class="list-group-item list-group-item-action ab-tl-btn" data-milestone="milestone3">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1 fw-semibold text-white">Industry 5.0 &amp; Sovereign AI</h5>
                  <small class="font-monospace text-success">2025 &ndash; Present</small>
                </div>
                <p class="mb-1 small ab-card-text">SutraWerks &amp; AI Alchemy Hub</p>
              </button>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card ab-timeline-display p-4 rounded-4 h-100" id="abTimelineDisplayContent">
              <!-- Dynamically updated by about.js -->
              <div class="text-success fw-bold font-monospace mb-2">[PHASE 1: FOUNDATIONAL SYSTEMS &amp; ACADEMIC RIGOR]</div>
              <h4 class="h4 text-white fw-semibold mb-3">Computer Science Research &amp; Core Architecture</h4>
              <p class="ab-card-text mb-3">
                Served as Computer Science Research Assistant at the University of Roorkee on government-sponsored projects, establishing deep mastery over data structures, compiler design, and systems logic. Honored as top university chess player, cultivating strategic analytical discipline.
              </p>
              <div class="font-monospace small text-success">
                Key Focus: C/C++ &bull; Systems Logic &bull; Algorithmic Efficiency
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