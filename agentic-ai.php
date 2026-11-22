<?php
/**
 * ============================================================================
 * SUTRAWERKS — SOVEREIGN AGENTIC AI SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        agentic-ai.php
 * @description Product & Architecture Showcase: Sovereign Agentic AI.
 *              Highlights air-gapped local LLMs, deterministic multi-agent orchestration,
 *              zero-cloud egress privacy, and enterprise autonomous workflows.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Local LLM / Ollama Core
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

$page_number      = '03';
$page_slug        = 'agentic-ai';
$page_section     = 'Products';
$page_category    = 'Sovereign AI & Autonomous Workflows';
$page_type        = 'Product Showcase';

$page_title = 'Sovereign Agentic AI — SutraWerks Enterprise AI';

$page_description = 'Air-gapped, local-first agentic AI architectures powered by open-source models (Ollama). Zero cloud egress, strict data privacy, and deterministic multi-agent orchestration.';

$page_keywords = 'Sovereign Agentic AI, Local LLMs, Ollama, Air-Gapped AI, Autonomous Workflows, Zero Cloud Egress, Enterprise AI Architecture, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/agentic-ai';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-agentic-ai.jpg';
$og_image_alt = 'Sovereign Agentic AI — SutraWerks';

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

$pageCss = $asset('css/agentic-ai.css');
$pageJs  = null; // Uses main.js via footer
?>
?>
<?php
/**
 * ============================================================================
 * SUTRAWERKS — SOVEREIGN AGENTIC AI DOCUMENT HEAD
 * ============================================================================
 */
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
<?php require_once __DIR__ . '/includes/topnav.php'; ?>

<!-- Main Content Wrapper -->
<main class="py-5 bg-dark text-light">
    <div class="container py-4">
        
        <!-- Breadcrumb / Header -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-success text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">Sovereign Agentic AI</li>
            </ol>
        </nav>

        <div class="row align-items-center mb-5">
            <div class="col-lg-8">
                <span class="badge bg-success text-dark font-monospace mb-2 px-3 py-1 text-uppercase tracking-wider">Module 03 &bull; Sovereign Intelligence</span>
                <h1 class="display-4 fw-bold text-white mb-3">Sovereign Agentic AI</h1>
                <p class="lead text-muted mb-4">
                    Deterministic, air-gapped multi-agent architectures running entirely on local enterprise hardware. Zero cloud data egress, complete code ownership, and uncompromising corporate data sovereignty.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= $escape($url('contact')); ?>" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
                        <i class="bi bi-shield-lock-fill me-2"></i>Commission Sovereign AI
                    </a>
                    <a href="#architecture" class="btn btn-outline-light px-4 py-2">
                        <i class="bi bi-cpu me-2"></i>Explore Architecture
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card bg-black border-secondary p-4 rounded-4 shadow">
                    <h5 class="text-success fw-semibold mb-3"><i class="bi bi-cpu-fill me-2"></i>Runtime Specs</h5>
                    <ul class="list-unstyled small text-muted mb-0 space-y-2">
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-2">
                            <span class="text-white">Inference Engine:</span> <span>Ollama / Local C++</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-2">
                            <span class="text-white">Cloud Egress:</span> <span class="text-success fw-semibold">0% (Air-Gapped)</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-2">
                            <span class="text-white">Data Privacy:</span> <span>GDPR / DPDP Compliant</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="text-white">Orchestration:</span> <span>Deterministic DAGs</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="border-secondary opacity-25 my-5">

        <!-- Architecture Pillars -->
        <section id="architecture" class="py-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card bg-black border-secondary h-100 p-4 rounded-4">
                        <div class="mb-3 text-success fs-3">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                        <h3 class="h5 text-white fw-semibold">100% Air-Gapped Privacy</h3>
                        <p class="text-muted small mb-0">
                            No proprietary LLM APIs, no third-party telemetry, and zero exposure of intellectual property to external cloud providers. Your proprietary data never leaves your secure infrastructure.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-black border-secondary h-100 p-4 rounded-4">
                        <div class="mb-3 text-success fs-3">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h3 class="h5 text-white fw-semibold">Deterministic Multi-Agent DAGs</h3>
                        <p class="text-muted small mb-0">
                            Replace unpredictable LLM chat loops with rigorous, graph-structured execution pipelines. Agents collaborate under strict protocol checks and verifiable verification loops.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-black border-secondary h-100 p-4 rounded-4">
                        <div class="mb-3 text-success fs-3">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h3 class="h5 text-white fw-semibold">Hardware-Aware Efficiency</h3>
                        <p class="text-muted small mb-0">
                            Engineered with mechanical sympathy for local CPU/GPU caches. Optimized quantization and low-latency inference on modest bare-metal hardware.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<!-- Bootstrap 5.3.3 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Animation JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<!-- SutraWerks Custom Global JS -->
<script src="<?= $escape($asset('js/main.js')); ?>"></script>

<?php if (isset($pageJs) && $pageJs): ?>
<!-- Page-Specific JS -->
<script src="<?= $escape($pageJs); ?>"></script>
<?php endif; ?>
</body>
</html>