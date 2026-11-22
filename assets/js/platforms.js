/**
 * ============================================================================
 * SUTRAWERKS — E2E PLATFORM ENGINEERING INTERACTIVE SCRIPT
 * ============================================================================
 * @file        platforms.js
 * @description Powers the interactive Reference Architecture Blueprint filter.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.pf-filter-btn');
    const blueprintItems = document.querySelectorAll('.pf-blueprint-item');

    if (!filterButtons.length || !blueprintItems.length) {
        return;
    }

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetFilter = btn.getAttribute('data-filter');

            // Update active button styling
            filterButtons.forEach((b) => {
                b.classList.remove('btn-success', 'text-dark', 'fw-semibold', 'active');
                b.classList.add('btn-outline-light');
            });
            btn.classList.remove('btn-outline-light');
            btn.classList.add('btn-success', 'text-dark', 'fw-semibold', 'active');

            // Filter blueprint cards
            blueprintItems.forEach((item) => {
                const category = item.getAttribute('data-category');
                if (targetFilter === 'all' || category === targetFilter) {
                    item.classList.remove('d-none');
                } else {
                    item.classList.add('d-none');
                }
            });
        });
    });
});