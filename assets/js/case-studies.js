/**
 * ============================================================================
 * SUTRAWERKS — REFERENCE DEPLOYMENTS INTERACTIVE SCRIPT
 * ============================================================================
 * @file        case-studies.js
 * @description Powers the interactive case study category filter grid.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.cd-filter-btn');
    const caseItems = document.querySelectorAll('.cd-item');

    if (!filterButtons.length || !caseItems.length) {
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

            // Filter case study cards
            caseItems.forEach((item) => {
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