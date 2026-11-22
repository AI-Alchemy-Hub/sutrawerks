<?php
/**
 * ============================================================================
 * SUTRAWERKS — SENTIO™ INDUSTRY 5.0 DIGITAL TWIN SHOWCASE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        industry-5-0.php
 * @description Product & Architecture Showcase: Sentio™ Industry 5.0 Digital Twin.
 *              Highlights Rust edge engines, ISO 10816 / IEC 60034 modeling, 
 *              RAMI 4.0 AAS, and air-gapped sovereign industrial deployments.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Rust Edge Core
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

/* APPLICATION BASE PATH: XAMPP SUBDIRECTORY / PRODUCTION DOMAIN ROOT */

$document_root = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
$project_root  = realpath(__DIR__);
$app_base_path = '';

if ($document_root !== false && $project_root !== false) {
    $root_prefix  = rtrim(str_replace('\\', '/', $document_root), '/');
    $project_path = str_replace('\\', '/', $project_root);

    if (strcasecmp($project_path, $root_prefix) === 0) {
        $app_base_path = '';
    } elseif (stripos($project_path, $root_prefix . '/') === 0) {
        $app_base_path = rtrim(substr($project_path, strlen($root_prefix)), '/');
    }
}

/* APPLICATION URL HELPERS */

$base_url       = $app_base_path;
$asset_base_url = $base_url . '/assets';

$url = static fn(string $path): string =>
    $base_url . '/' . ltrim($path, '/');

$asset = static fn(string $path): string =>
    $asset_base_url . '/' . ltrim($path, '/');

$escape = static fn(string $value): string =>
    htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

/* SITE IDENTITY */

$site_name    = 'SutraWerks';
$site_tagline = 'Clean, Green, Lean, Secure and Ethical Engineering';
$site_url     = 'https://sutrawerks.com';

/* PAGE METADATA */

$page_number      = '02';
$page_slug        = 'industry-5-0';
$page_section     = 'Products';
$page_category    = 'Cyber-Physical Systems & Digital Twins';
$page_type        = 'Product Showcase';

$page_title = 'Sentio™ Industry 5.0 Digital Twin — SutraWerks';

$page_description = 'Deterministic, air-gapped Rust edge digital twins for rotating industrial machinery. Compliant with ISO 10816, IEC 60034, RAMI 4.0, and EU Cyber Resilience Act.';

$page_keywords = 'Industry 5.0, Sentio Digital Twin, Rust Edge AI, ISO 10816, IEC 60034, RAMI 4.0, Asset Administration Shell, Predictive Maintenance, SutraWerks, Bengaluru';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/industry-5-0';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-industry-5-0.jpg';
$og_image_alt = 'Sentio™ Industry 5.0 Digital Twin — SutraWerks';

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

$pageCss = $asset('css/industry-5-0.css');
$pageJs  = $asset('js/industry-5-0.js');
?>
<?php
/**
 * ============================================================================
 * SUTRAWERKS — SENTIO™ INDUSTRY 5.0 DIGITAL TWIN DOCUMENT HEAD
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

    <!-- OPEN GRAPH METADATA -->
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

    <!-- PORTAL STYLESHEETS & PAGE-SPECIFIC INJECTION -->
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">
    <?php if (isset($pageCss) && $pageCss): ?>
    <link rel="stylesheet" href="<?= $escape($pageCss); ?>">
    <?php endif; ?>
</head>
<body class="d-flex flex-column min-vh-100 bg-white">

    <!-- Unified Sticky App Shell Top Navigation -->
    <?php include __DIR__ . '/includes/topnav.php'; ?>

    <!-- Hero Banner -->
    <header class="sw-hero">
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="sw-badge-pill mb-3">
                        <i class="bi bi-cpu-fill"></i> Sentio&trade; Industrial Core &bull; RAMI 4.0
                    </div>
                    <h1 class="display-4 fw-bold mb-3">
                        Deterministic Edge Digital Twins for Human-Centric Industry 5.0
                    </h1>
                    <p class="lead text-light opacity-75 mb-4">
                        Sub-millisecond telemetry, physics-informed thermal &amp; vibration modeling, and air-gapped sovereignty—engineered in memory-safe Rust for mission-critical shop floors.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="/sutrawerks/contact" class="btn btn-sw-primary px-4 py-2">
                            <i class="bi bi-calendar-check me-2"></i>Commission a Pilot Audit
                        </a>
                        <a href="#live-twin-simulator" class="btn btn-outline-light px-4 py-2">
                            <i class="bi bi-activity me-2"></i>Test Edge Twin Telemetry
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="sw-twin-console p-4">
                        <div class="d-flex justify-content-between align-items-center border-bottom border-secondary pb-3 mb-3">
                            <span class="sw-mono-label text-success"><i class="bi bi-broadcast me-1"></i>EDGE NODE: BLR-MTR-04</span>
                            <span class="badge bg-dark border border-secondary text-light sw-mono-label">RUST 1.82 / ZERO-CLOUD</span>
                        </div>
                        <p class="small text-light opacity-75 mb-3">
                            Built on mechanical sympathy principles: zero garbage-collection pauses, deterministic CPU cache locality, and local SQLite/OPC-UA persistence on commodity industrial gateways.
                        </p>
                        <div class="row g-2 text-center">
                            <div class="col-4">
                                <div class="p-2 rounded bg-dark border border-secondary">
                                    <div class="fw-bold text-success fs-5">&lt; 0.5 ms</div>
                                    <div class="sw-mono-label text-light opacity-75" style="font-size: 0.68rem;">Inference Loop</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 rounded bg-dark border border-secondary">
                                    <div class="fw-bold text-info fs-5">100%</div>
                                    <div class="sw-mono-label text-light opacity-75" style="font-size: 0.68rem;">Air-Gap Ready</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="p-2 rounded bg-dark border border-secondary">
                                    <div class="fw-bold text-warning fs-5">&lt; 24 MB</div>
                                    <div class="sw-mono-label text-light opacity-75" style="font-size: 0.68rem;">RAM Footprint</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1">

        <!-- Section 1: Four Architectural Pillars -->
        <section class="py-5 bg-light border-bottom">
            <div class="container py-4">
                <div class="text-center max-w-75 mx-auto mb-5">
                    <span class="text-success fw-semibold text-uppercase small tracking-wider">Engineering First Principles</span>
                    <h2 class="fw-bold mt-1">Why Enterprises Replace Cloud-Heavy IoT with Sentio&trade;</h2>
                    <p class="text-muted">Designed for Indian SME industrial corridors and European DACH manufacturers facing strict latency, IP sovereignty, and cyber-resilience mandates.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="sw-arch-node shadow-sm">
                            <div class="sw-icon-box mb-3"><i class="bi bi-speedometer2"></i></div>
                            <h5 class="fw-bold">Physics-Informed Models</h5>
                            <p class="small text-muted mb-0">
                                Real-time ISO 10816 RMS vibration severity classification and IEC 60034 stator thermal dynamics prevent catastrophic motor failure without black-box guesswork.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="sw-arch-node shadow-sm">
                            <div class="sw-icon-box mb-3"><i class="bi bi-hdd-network"></i></div>
                            <h5 class="fw-bold">Air-Gapped Sovereignty</h5>
                            <p class="small text-muted mb-0">
                                Operates entirely on-premise on edge IPCs or standard x86/ARM hardware. Zero mandatory cloud subscriptions, zero external telemetry leakage.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="sw-arch-node shadow-sm">
                            <div class="sw-icon-box mb-3"><i class="bi bi-diagram-3"></i></div>
                            <h5 class="fw-bold">RAMI 4.0 &amp; AAS Native</h5>
                            <p class="small text-muted mb-0">
                                Standardized Asset Administration Shell (AAS) submodels and bilingual EN/DE requirement schemas ensure seamless ERP, MES, and OPC-UA interoperability.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="sw-arch-node shadow-sm">
                            <div class="sw-icon-box mb-3"><i class="bi bi-person-check"></i></div>
                            <h5 class="fw-bold">Human-in-the-Loop UX</h5>
                            <p class="small text-muted mb-0">
                                Aligns with Industry 5.0 principles—augmenting floor operators with clear, actionable root-cause diagnostics rather than overwhelming alert fatigue.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Interactive Edge Digital Twin Simulator -->
        <section id="live-twin-simulator" class="py-5">
            <div class="container py-4">
                <div class="row align-items-center mb-4">
                    <div class="col-lg-7">
                        <span class="text-success fw-semibold text-uppercase small">Interactive Telemetry Preview</span>
                        <h2 class="fw-bold mt-1">3-Phase Induction Motor Edge Twin Console</h2>
                        <p class="text-muted mb-0">Simulate operating states below to observe how Sentio&trade; evaluates vibration severity, thermal drift, and local PLC trip interlocks.</p>
                    </div>
                    <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                        <div class="btn-group" role="group" aria-label="Twin Operating State">
							<button type="button" class="btn btn-success btn-sm px-3" data-twin-mode="nominal">Nominal Load</button>
							<button type="button" class="btn btn-outline-dark btn-sm px-3" data-twin-mode="degraded">Bearing Wear</button>
							<button type="button" class="btn btn-outline-dark btn-sm px-3" data-twin-mode="critical">Thermal Fault</button>
						</div>
                    </div>
                </div>

                <div class="sw-twin-console p-4 p-md-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 pb-4 mb-4 border-bottom border-secondary">
                        <div>
                            <div class="sw-mono-label text-light opacity-75">Asset ID: AAS-IND-3PH-45KW</div>
                            <h4 class="fw-bold mb-0 text-white">45 kW Squirrel-Cage Induction Drive</h4>
                        </div>
                        <div>
                            <span id="twinStatusBadge" class="badge bg-success text-white sw-mono-label px-3 py-2">
                                ISO 10816 ZONE A — NOMINAL
                            </span>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="sw-telemetry-metric state-normal">
                                <div class="sw-mono-label text-light opacity-75 mb-1">RMS Vibration Velocity</div>
                                <div id="twinRmsValue" class="display-6 fw-bold text-white">1.42 mm/s</div>
                                <div class="small text-light opacity-75 mt-1">Standard: ISO 10816-3 Class II</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sw-telemetry-metric state-normal">
                                <div class="sw-mono-label text-light opacity-75 mb-1">Stator Winding Temp</div>
                                <div id="twinTempValue" class="display-6 fw-bold text-white">64.5 &deg;C</div>
                                <div class="small text-light opacity-75 mt-1">Insulation Limit: IEC 60034 Class F</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sw-telemetry-metric state-normal">
                                <div class="sw-mono-label text-light opacity-75 mb-1">Edge Inference Latency</div>
                                <div id="twinLatencyValue" class="display-6 fw-bold text-white">0.38 ms</div>
                                <div class="small text-light opacity-75 mt-1">Runtime: Native Rust Async Worker</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 rounded bg-dark border border-secondary d-flex align-items-start gap-3">
                        <i class="bi bi-terminal-fill text-success fs-5 mt-1"></i>
                        <div>
                            <div class="sw-mono-label text-success mb-1">Deterministic Diagnostic Output</div>
                            <p id="twinDiagnosticText" class="mb-0 small text-light">
                                Harmonic spectrum clean. Bearing outer-race &amp; rotor bar frequencies within deterministic envelope.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Technical Reference Architecture & Compliance Matrix -->
        <section class="py-5 bg-light border-top">
            <div class="container py-4">
                <h3 class="fw-bold mb-4">Technical Specifications &amp; Regulatory Alignment</h3>
				
				<div class="table-responsive bg-white rounded shadow-sm border">
					<table class="table table-hover align-middle mb-0 sw-spec-table">
						<thead>
							<tr>
								<th>Architectural Layer</th>
								<th>Technology &amp; Standards</th>
								<th>Operational Guarantee</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="fw-semibold">Edge Compute Core</td>
								<td>Rust (Tokio / Axum), C++20 FFI, Zero-GC</td>
								<td class="text-muted">Deterministic &lt;1ms jitter-free sensor ingestion</td>
							</tr>
							<tr>
								<td class="fw-semibold">Industrial Protocols</td>
								<td>OPC-UA, Modbus TCP/RTU, MQTT Sparkplug B</td>
								<td class="text-muted">Direct brownfield PLC &amp; SCADA integration</td>
							</tr>
							<tr>
								<td class="fw-semibold">Digital Twin Schema</td>
								<td>RAMI 4.0 Asset Administration Shell (AAS)</td>
								<td class="text-muted">Vendor-neutral semantic interoperability (EN / DE)</td>
							</tr>
							<tr>
								<td class="fw-semibold">Cyber &amp; Data Governance</td>
								<td>EU Cyber Resilience Act (CRA), NIS2, DPDP</td>
								<td class="text-muted">SBOM attested, air-gapped local SQLite/Timescale storage</td>
							</tr>
						</tbody>
					</table>
				</div>

								<div class="mt-5 p-4 p-md-5 rounded-3 bg-dark text-white d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                    <div>
                        <h4 class="fw-bold mb-2">Ready to Deploy Sovereign Edge Telemetry?</h4>
                        <p class="text-light opacity-75 mb-0">Schedule a technical architecture review with our Principal Architect to scope a brownfield digital twin pilot.</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="/sutrawerks/contact" class="btn btn-sw-primary px-4 py-3">
                            Initiate Technical Scoping <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Unified Enterprise Footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <!-- Bootstrap 5.3 JS Bundle + App Shell JS + Page-Specific JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/sutrawerks/assets/js/main.js"></script>
    <script src="/sutrawerks/assets/js/industry-5-0.js"></script>
</body>
</html>