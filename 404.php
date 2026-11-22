<?php
/**
 * ============================================================================
 * FILE: 404.php
 * LOCATION: ./404.php
 * ============================================================================
 * 
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Custom Enterprise 404 Error Handler for SutraWerks.
 * Renders within the unified App Shell with full navigation and footer.
 * ============================================================================
 */

declare(strict_types=1);

http_response_code(404);
// Enforce zero-trust security headers on error responses
require_once __DIR__ . '/includes/security-headers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found — SutraWerks</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Consolidated App Shell CSS -->
    <link rel="stylesheet" href="/sutrawerks/assets/css/main.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-white">

    <!-- Unified Sticky App Shell Top Navigation -->
    <?php include __DIR__ . '/includes/topnav.php'; ?>

    <!-- Main 404 Content Area -->
    <main class="flex-grow-1 d-flex align-items-center py-5 bg-light">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sw-badge-pill mb-3">
                        <i class="bi bi-exclamation-triangle-fill"></i> HTTP 404 Error
                    </div>
                    <h1 class="display-3 fw-bold text-dark mb-3">Architectural Pathway Not Found</h1>
                    <p class="text-muted lead mb-4">
                        The requested route or endpoint does not exist within the SutraWerks secure portal repository. It may have been relocated or deprecated.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/sutrawerks/" class="btn btn-sw-primary px-4 py-2">
                            <i class="bi bi-house-door me-2"></i>Return to Portal Root
                        </a>
                        <a href="/sutrawerks/contact" class="btn btn-outline-dark px-4 py-2">
                            <i class="bi bi-envelope me-2"></i>Contact Principal Desk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Unified Enterprise Footer -->
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>