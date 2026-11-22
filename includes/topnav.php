<?php
/**
 * ============================================================================
 * FILE: topnav.php
 * LOCATION: ./includes/topnav.php
 * ============================================================================
 * 
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Unified Sticky Utility Bar & Main Enterprise Navigation for SutraWerks.
 * Powered by dynamic base URL routing and robust active-state highlighting.
 * ============================================================================
 */

declare(strict_types=1);

// Ensure base URL helpers are available
$navBaseUrl = rtrim((string) ($base_url ?? ''), '/');
$navUrl = static fn(string $path): string => $navBaseUrl . '/' . ltrim($path, '/');
$navEscape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

// Determine current request path for clean URL active state highlighting
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $requestUri);
$currentSlug = end($segments);
if ($currentSlug === '' || strcasecmp($currentSlug, basename($navBaseUrl)) === 0) {
    $currentSlug = 'home';
}
?>

<!-- Sticky Header Wrapper (Utility Bar + Main Nav) -->
<div class="sticky-top shadow-sm" style="z-index: 1030;">
  
  <!-- Top Utility Bar -->
  <div class="bg-dark text-light py-1 px-3 border-bottom border-secondary small d-none d-lg-block">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-3">
        <span class="text-success"><i class="bi bi-shield-check-fill me-1"></i>Sovereign Zero-Trust Architecture</span>
        <span class="text-muted">|</span>
        <span class="text-muted"><i class="bi bi-cpu me-1"></i>Industry 5.0 Edge Analytics Ready</span>
      </div>
      <div class="d-flex align-items-center gap-3">
        <span class="text-muted"><i class="bi bi-geo-alt me-1"></i>Bengaluru / Global DACH</span>
        <span class="badge bg-success text-dark font-monospace px-2 py-0">SECURE B2B DESK</span>
      </div>
    </div>
  </div>

  <!-- Main Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sw-navbar py-3">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?= $navEscape($navUrl('')); ?>">
        <span class="badge bg-success rounded-2 px-2 py-1 text-dark">SW</span>
        <span>Sutra<span class="text-success">Werks</span></span>
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#swMainNav" aria-controls="swMainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="swMainNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($currentSlug === 'home') ? 'active text-success fw-semibold' : '' ?>" href="<?= $navEscape($navUrl('')); ?>">Home</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-3 <?= in_array($currentSlug, ['industry-5-0', 'agentic-ai', 'zero-trust', 'platforms']) ? 'active text-success fw-semibold' : '' ?>" href="#" id="navbarProductsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products &amp; Engineering
            </a>
            <ul class="dropdown-menu dropdown-menu-dark shadow border-secondary" aria-labelledby="navbarProductsDropdown">
              <li><a class="dropdown-item py-2" href="<?= $navEscape($navUrl('industry-5-0')); ?>">Sentio&trade; Industry 5.0 Twin</a></li>
              <li><a class="dropdown-item py-2" href="<?= $navEscape($navUrl('agentic-ai')); ?>">Sovereign Agentic AI</a></li>
              <li><a class="dropdown-item py-2" href="<?= $navEscape($navUrl('zero-trust')); ?>">VeritasLens&trade; Zero Trust</a></li>
              <li><hr class="dropdown-divider border-secondary"></li>
              <li><a class="dropdown-item py-2" href="<?= $navEscape($navUrl('platforms')); ?>">E2E Platform Engineering</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link px-3 <?= ($currentSlug === 'consulting') ? 'active text-success fw-semibold' : '' ?>" href="<?= $navEscape($navUrl('consulting')); ?>">Enterprise Consulting</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($currentSlug === 'case-studies') ? 'active text-success fw-semibold' : '' ?>" href="<?= $navEscape($navUrl('case-studies')); ?>">Deployments</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($currentSlug === 'insights') ? 'active text-success fw-semibold' : '' ?>" href="<?= $navEscape($navUrl('insights')); ?>">Insights</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link px-3 <?= ($currentSlug === 'about') ? 'active text-success fw-semibold' : '' ?>" href="<?= $navEscape($navUrl('about')); ?>">Firm</a>
          </li>
          
          <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
            <a class="btn btn-success px-4 py-2 fw-semibold text-dark shadow-sm" href="<?= $navEscape($navUrl('contact')); ?>">Engage Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</div>