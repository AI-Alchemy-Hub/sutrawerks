<?php
/**
 * ============================================================================
 * FILE: 500.php
 * LOCATION: ./500.php
 * ============================================================================
 * 
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Custom Enterprise 500 Internal Server Error Handler for SutraWerks.
 * Prevents stack trace leakage while maintaining unified App Shell UX.
 * ============================================================================
 */

declare(strict_types=1);

http_response_code(500);
if (is_file(__DIR__ . '/includes/security-headers.php')) {
    require_once __DIR__ . '/includes/security-headers.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Telemetry Notice — SutraWerks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/sutrawerks/assets/css/main.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-white">

    <?php if (is_file(__DIR__ . '/includes/topnav.php')) { include __DIR__ . '/includes/topnav.php'; } ?>

    <main class="flex-grow-1 d-flex align-items-center py-5 bg-light">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sw-badge-pill mb-3">
                        <i class="bi bi-cpu-fill"></i> HTTP 500 Service Notice
                    </div>
                    <h1 class="display-4 fw-bold text-dark mb-3">Temporary Runtime Interruption</h1>
                    <p class="text-muted lead mb-4">
                        An unexpected internal processing condition occurred. Our engineering telemetry has logged the event—no sensitive data was exposed.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/sutrawerks/" class="btn btn-sw-primary px-4 py-2">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reload Portal Root
                        </a>
                        <a href="/sutrawerks/contact" class="btn btn-outline-dark px-4 py-2">
                            <i class="bi bi-envelope me-2"></i>Notify Principal Desk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php if (is_file(__DIR__ . '/includes/footer.php')) { include __DIR__ . '/includes/footer.php'; } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>