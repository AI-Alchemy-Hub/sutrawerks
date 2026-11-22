/**
 * ============================================================================
 * SUTRAWERKS — TERMS OF SERVICE INTERACTIVE SCRIPT
 * ============================================================================
 * @file        terms.js
 * @description Smooth scrolling and active section highlighting for the
 *              sticky table-of-contents sidebar in terms.php.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const tocLinks = document.querySelectorAll('.tm-sidebar-nav a');

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

                    tocLinks.forEach((l) => l.classList.remove('active'));
                    link.classList.add('active');

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});