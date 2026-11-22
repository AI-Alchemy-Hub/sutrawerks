<?php
/**
 * ============================================================================
 * SUTRAWERKS — TERMS OF SERVICE & ENTERPRISE ENGAGEMENT GOVERNANCE
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        terms.php
 * @description Legal & Governance Page: Terms of Service.
 *              Outlines terms governing portal usage, open-source reference
 *              blueprints, intellectual property rights, enterprise advisory
 *              mandates, limitation of liability, and Bengaluru jurisdiction.
 *
 * @technology  PHP 8.3+ | MySQL 8.0 | Bootstrap 5.3.3 | Enterprise Governance
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

$page_number      = '11';
$page_slug        = 'terms';
$page_section     = 'Governance & Legal';
$page_category    = 'Terms of Service & Enterprise Engagement';
$page_type        = 'Legal Policy';

$page_title = 'Terms of Service & Enterprise Engagement — SutraWerks';

$page_description = 'Terms of Service governing access to the SutraWerks enterprise engineering portal, intellectual property rights, sovereign software licensing, and Bengaluru jurisdiction.';

$page_keywords = 'Terms of Service, Enterprise Engagement Terms, Intellectual Property, Open Source Reference, Governing Law, Bengaluru Jurisdiction, SutraWerks';

$page_author = 'Satya Prakash Nigam';

$canonical_url = rtrim($site_url, '/') . '/terms';

$og_image     = rtrim($site_url, '/') . '/assets/img/og-terms.jpg';
$og_image_alt = 'Terms of Service & Enterprise Engagement — SutraWerks';

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

$schema_date_modified = '2026-11-20';

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

$pageCss = $asset('css/terms.css');
$pageJs  = $asset('js/terms.js');
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
  <main class="tm-main py-5">
    <div class="container py-4">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-1">
          <li class="breadcrumb-item"><a href="<?= $escape($url('')); ?>" class="text-success text-decoration-none">Home</a></li>
          <li class="breadcrumb-item"><span class="tm-breadcrumb-parent">Governance &amp; Legal</span></li>
          <li class="breadcrumb-item active tm-breadcrumb-current" aria-current="page">Terms of Service</li>
        </ol>
      </nav>

      <!-- Hero Section -->
      <div class="row align-items-center mb-5" data-aos="fade-up">
        <div class="col-lg-8">
          <span class="badge tm-badge-module font-monospace mb-3 px-3 py-2 text-uppercase">Governance &bull; Engagement Terms</span>
          <h1 class="display-4 fw-bold tm-hero-title mb-3">Terms of Service &amp; Enterprise Engagement</h1>
          <p class="lead tm-hero-lead mb-4">
            These Terms of Service govern access to the SutraWerks portal (<code>sutrawerks.com</code>), technical monographs, reference architecture blueprints, and professional advisory engagements.
          </p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#terms-content" class="btn btn-success fw-semibold text-dark px-4 py-2 shadow-sm">
              <i class="bi bi-file-earmark-ruled-fill me-2"></i>Review Engagement Terms
            </a>
            <a href="<?= $escape($url('privacy')); ?>" class="btn btn-outline-light px-4 py-2">
              <i class="bi bi-shield-check me-2"></i>View Privacy Policy
            </a>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="card tm-spec-card p-4 rounded-4">
            <h5 class="text-success fw-semibold mb-3"><i class="bi bi-bank me-2"></i>Legal &amp; Jurisdiction Summary</h5>
            <ul class="list-unstyled small mb-0">
              <li class="d-flex justify-content-between tm-spec-row pb-2 mb-2">
                <span class="tm-spec-label">Effective Date:</span>
                <span class="tm-spec-val">November 20, 2026</span>
              </li>
              <li class="d-flex justify-content-between tm-spec-row pb-2 mb-2">
                <span class="tm-spec-label">Advisory Contracts:</span>
                <span class="text-success fw-semibold">Governed by Executed MSA</span>
              </li>
              <li class="d-flex justify-content-between tm-spec-row pb-2 mb-2">
                <span class="tm-spec-label">Client IP Ownership:</span>
                <span class="tm-spec-val">100% Upon Settlement</span>
              </li>
              <li class="d-flex justify-content-between">
                <span class="tm-spec-label">Governing Jurisdiction:</span>
                <span class="tm-spec-val">Bengaluru, Karnataka, India</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <hr class="tm-divider my-5">

      <!-- Terms Content Sections -->
      <section id="terms-content" class="py-3" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-3">
            <!-- Sidebar Navigation -->
            <div class="sticky-top tm-sidebar-nav p-3 rounded-4 d-none d-lg-block">
              <h6 class="fw-semibold mb-3">Table of Contents</h6>
              <ul class="list-unstyled small mb-0">
                <li class="mb-2"><a href="#section-1" class="text-decoration-none">1. Acceptance of Terms</a></li>
                <li class="mb-2"><a href="#section-2" class="text-decoration-none">2. Intellectual Property &amp; Blueprints</a></li>
                <li class="mb-2"><a href="#section-3" class="text-decoration-none">3. Enterprise Advisory Mandates</a></li>
                <li class="mb-2"><a href="#section-4" class="text-decoration-none">4. Acceptable Portal Conduct</a></li>
                <li class="mb-2"><a href="#section-5" class="text-decoration-none">5. Disclaimer &amp; Liability</a></li>
                <li class="mb-0"><a href="#section-6" class="text-decoration-none">6. Governing Law &amp; Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="card tm-content-card p-4 p-lg-5 rounded-4">

              <!-- Section 1 -->
              <div id="section-1" class="mb-5">
                <h3 class="h4 fw-bold tm-card-title mb-3">1. Acceptance of Terms</h3>
                <p class="tm-card-text mb-3">
                  By accessing or browsing the SutraWerks web portal (<code>sutrawerks.com</code>), downloading published technical whitepapers, or initiating an inquiry for architectural consulting, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service and our <a href="<?= $escape($url('privacy')); ?>" class="text-success text-decoration-none">Privacy Policy</a>.
                </p>
                <p class="tm-card-text mb-0">
                  If you are accessing this portal on behalf of a corporate or institutional entity, you represent that you possess the authority to bind that organization to these terms.
                </p>
              </div>

              <hr class="tm-divider my-4">

              <!-- Section 2 -->
              <div id="section-2" class="mb-5">
                <h3 class="h4 fw-bold tm-card-title mb-3">2. Intellectual Property &amp; Reference Blueprints</h3>
                <p class="tm-card-text mb-3">
                  All editorial monographs, system diagrams, brand marks (including <strong>SutraWerks</strong>, <strong>Sentio&trade;</strong>, and <strong>VeritasLens&trade;</strong>), and proprietary source code published on this portal remain the intellectual property of SutraWerks and Satya Prakash Nigam unless explicitly released under an open-source license (such as Apache 2.0 or MIT).
                </p>
                <ul class="list-unstyled tm-card-text small mb-0">
                  <li class="mb-2">&bull; <strong>Evaluation Use:</strong> Enterprise architects and decision makers may review and cite published reference blueprints for internal architectural evaluation with proper attribution.</li>
                  <li class="mb-2">&bull; <strong>Custom Client Deliverables:</strong> Under commissioned consulting engagements, custom architectures, Rust/Python/C++ implementations, and bespoke documentation transfer to full client ownership upon milestone settlement as specified in the executed Statement of Work (SoW).</li>
                </ul>
              </div>

              <hr class="tm-divider my-4">

              <!-- Section 3 -->
              <div id="section-3" class="mb-5">
                <h3 class="h4 fw-bold tm-card-title mb-3">3. Enterprise Advisory &amp; Fractional CTO Mandates</h3>
                <p class="tm-card-text mb-3">
                  Submission of an inquiry via our contact portal does not establish a binding fiduciary or consulting relationship. Formal architectural audits, Fractional CTO retainers, and Industry 5.0 / Sovereign AI pilot builds are governed exclusively by a mutually executed Master Services Agreement (MSA) and Statement of Work (SoW).
                </p>
                <p class="tm-card-text mb-0">
                  All proprietary technical disclosures, network topologies, and operational telemetry shared during pre-engagement scoping are treated under strict confidentiality and mutual Non-Disclosure Agreement (NDA) protections.
                </p>
              </div>

              <hr class="tm-divider my-4">

              <!-- Section 4 -->
              <div id="section-4" class="mb-5">
                <h3 class="h4 fw-bold tm-card-title mb-3">4. Acceptable Portal Conduct &amp; Security</h3>
                <p class="tm-card-text mb-3">
                  Users agree not to interfere with the integrity, availability, or security hardening of the SutraWerks infrastructure. Prohibited activities include:
                </p>
                <ul class="list-unstyled tm-card-text small mb-0">
                  <li class="mb-2">&bull; Automated vulnerability scanning, credential stuffing, or denial-of-service probing against portal endpoints.</li>
                  <li class="mb-2">&bull; Submitting forged, malicious, or unsolicited commercial spam through the enterprise contact gateway.</li>
                  <li class="mb-0">&bull; Misrepresenting affiliation with SutraWerks or redistributing proprietary whitepapers behind commercial paywalls.</li>
                </ul>
              </div>

              <hr class="tm-divider my-4">

              <!-- Section 5 -->
              <div id="section-5" class="mb-5">
                <h3 class="h4 fw-bold tm-card-title mb-3">5. Technical Disclaimer &amp; Limitation of Liability</h3>
                <p class="tm-card-text mb-3">
                  Informational articles, benchmark figures, and interactive simulators on this portal are provided &ldquo;as is&rdquo; for architectural illustration. Production deployment of cyber-physical systems, ISO 10816 / IEC 60034 industrial twins, and regulatory compliance controls (EU CRA, NIS2, DPDP) requires formal engineering validation tailored to your specific operational environment.
                </p>
                <p class="tm-card-text mb-0">
                  To the maximum extent permitted by applicable law, SutraWerks shall not be liable for indirect, incidental, or consequential damages arising from reliance on general informational content published on this website outside a formal contractual engagement.
                </p>
              </div>

              <hr class="tm-divider my-4">

              <!-- Section 6 -->
              <div id="section-6">
                <h3 class="h4 fw-bold tm-card-title mb-3">6. Governing Law &amp; Legal Contact</h3>
                <p class="tm-card-text mb-3">
                  These Terms of Service shall be governed by and construed in accordance with the laws of India. Any disputes arising in connection with this portal shall be subject to the exclusive jurisdiction of the competent courts in Bengaluru, Karnataka, India.
                </p>
                <div class="p-3 rounded-3 font-monospace small tm-contact-box">
                  <div class="tm-box-title mb-1"><strong>SutraWerks Legal &amp; Engagement Desk</strong></div>
                  <div class="tm-box-line">Headquarters: Bengaluru, Karnataka, India</div>
                  <div class="tm-box-line">Principal Architect: Satya Prakash Nigam</div>
                  <div class="mt-2"><a href="<?= $escape($url('contact')); ?>" class="text-success text-decoration-none fw-semibold">Contact Engagement Desk &rarr;</a></div>
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