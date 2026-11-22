<?php
/**
 * ============================================================================
 * FILE: footer.php
 * LOCATION: ./includes/footer.php
 * ============================================================================
 * 
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Unified Enterprise Footer and Back-to-Top Component for SutraWerks.
 * Pure HTML/PHP view partial (no script tags or closing document tags).
 * ============================================================================
 */

declare(strict_types=1);

$footerBaseUrl = rtrim((string) ($base_url ?? ''), '/');
$footerUrl     = static fn(string $path): string => $footerBaseUrl . '/' . ltrim($path, '/');
$footerEscape  = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>

<!-- Footer -->
<footer id="footer" class="sw-footer text-light pt-5 pb-4">
    <div class="footer-top border-bottom border-secondary border-opacity-25 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <a href="<?= $footerEscape($footerUrl('')); ?>" class="footer__brand text-decoration-none d-flex align-items-center gap-2 mb-3">
                        <span class="fs-4 fw-bold text-white">Sutra<span class="text-success">Werks</span></span>
                    </a>
                    <p class="small text-muted mb-0">
                        Clean, Green, Lean, Secure and Ethical Engineering — now and always. Industry 5.0 consulting, E2E products, and platform engineering headquartered in Bengaluru, India, serving global enterprise clients.
                    </p>
                </div>
                
                <div class="col-6 col-lg-2 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Products</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('industry-5-0')); ?>" class="text-decoration-none text-muted link-light">Sentio&trade; Digital Twin</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('agentic-ai')); ?>" class="text-decoration-none text-muted link-light">Sovereign Agentic AI</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('zero-trust')); ?>" class="text-decoration-none text-muted link-light">VeritasLens&trade; Zero Trust</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('platforms')); ?>" class="text-decoration-none text-muted link-light">B2B / B2C Platforms</a></li>
                    </ul>
                </div>
                
                <div class="col-6 col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Firm</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('consulting')); ?>" class="text-decoration-none text-muted link-light">Enterprise Consulting</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('case-studies')); ?>" class="text-decoration-none text-muted link-light">Reference Deployments</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('insights')); ?>" class="text-decoration-none text-muted link-light">Architecture Insights</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('about')); ?>" class="text-decoration-none text-muted link-light">Principal Leadership</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Governance &amp; Legal</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('contact')); ?>" class="text-decoration-none text-muted link-light">Contact &amp; Onboarding</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('privacy')); ?>" class="text-decoration-none text-muted link-light">Privacy Policy (GDPR / DPDP)</a></li>
                        <li class="mb-2"><a href="<?= $footerEscape($footerUrl('terms')); ?>" class="text-decoration-none text-muted link-light">Master Engagement Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom container pt-3 d-flex flex-column flex-md-row justify-content-between align-items-center small text-muted">
        <div>&copy; <?= date('Y'); ?> <strong>SutraWerks</strong>. All rights reserved.</div>
        <div>Bengaluru, India &bull; Conceived, Developed &amp; Maintained by <a href="https://spnigam.in" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">Satya Prakash Nigam</a> &nbsp;|&nbsp; Powered by <a href="https://www.aialchemyhub.in" target="_blank" rel="noopener noreferrer" class="text-success text-decoration-none">AI Alchemy Hub</a></div>
    </div>
</footer>

<!-- Back to Top Button -->
<button type="button" id="swBackToTop" class="sw-back-to-top btn btn-success position-fixed bottom-0 end-0 m-4 rounded-circle shadow" aria-label="Back to top" title="Back to top" style="z-index: 1080;">
  <i class="bi bi-arrow-up"></i>
</button>