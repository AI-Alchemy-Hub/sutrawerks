<?php
/**
 * @file thank-you.php
 * @description Acknowledgment page with 5-second auto-redirect timer and manual return button.
 */
declare(strict_types=1);

require_once __DIR__ . '/includes/security-headers.php';
require_once __DIR__ . '/includes/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$referenceCode = $_SESSION['last_reference_code'] ?? 'SW-ARCHIVED';
unset($_SESSION['last_reference_code']); // consume so it's not reusable

$page_title = 'SutraWerks | Inquiry Received — Thank You';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($page_title); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= $escape($asset('css/main.css')); ?>">
    <!-- 5-Second Auto-Redirect Meta Fallback -->
    <meta http-equiv="refresh" content="5;url=index.php">
</head>
<body class="public-page thank-you-page bg-light d-flex flex-column min-vh-100">

  <?php require_once __DIR__ . '/includes/topnav.php'; ?>

  <main class="flex-grow-d d-flex align-items-center py-5 my-auto">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 text-center">
          <div class="sw-card p-4 p-md-5 bg-white shadow-sm" data-aos="fade-up">
            
            <div class="mb-4 text-success">
              <i class="bi bi-check-circle-fill display-3"></i>
            </div>

            <h1 class="h3 fw-bold mb-3">Engagement Brief Received</h1>
            <p class="text-muted mb-4">
              Thank you for initiating contact with SutraWerks. Your inquiry has been securely recorded and dispatched to our Principal Desk.
            </p>

            <div class="p-3 bg-light border rounded mb-4">
              <span class="d-block small text-muted uppercase tracking-wider mb-1">Secure Reference Code</span>
              <strong class="fs-4 font-monospace text-dark"><?= $escape($referenceCode); ?></strong>
            </div>

            <p class="small text-muted mb-4">
              You will be automatically redirected to the home page in <span id="countdown" class="fw-bold text-dark">5</span> seconds...
            </p>

            <div class="d-grid gap-2">
              <a href="index.php" class="btn btn-sw-primary btn-lg">
                <i class="bi bi-house-door me-2"></i> Return to Home Now
              </a>
              <a href="contact.php" class="btn btn-outline-secondary btn-sm">
                Submit Another Inquiry
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Live countdown timer script
    let secondsLeft = 5;
    const countdownEl = document.getElementById('countdown');
    const timer = setInterval(() => {
      secondsLeft--;
      if (countdownEl) {
        countdownEl.textContent = secondsLeft;
      }
      if (secondsLeft <= 0) {
        clearInterval(timer);
        window.location.href = 'index.php';
      }
    }, 1000);
  </script>
</body>
</html>