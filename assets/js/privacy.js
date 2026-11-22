/**
 * ============================================================================
 * SUTRAWERKS — PRIVACY POLICY INTERACTIVE SCRIPT
 * ============================================================================
 * @file        privacy.js
 * @description Smooth scrolling behavior for privacy policy anchor navigation.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const tocLinks = document.querySelectorAll('.pr-sidebar-nav a');

    if (!tocLinks.length) {
        return;
    }

    tocLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            const targetId = link.getAttribute('href');
            if (targetId && targetId.startsWith('#')) {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});