/**
 * ============================================================================
 * SUTRAWERKS — ARCHITECTURE INSIGHTS INTERACTIVE SCRIPT
 * ============================================================================
 * @file        insights.js
 * @description Powers combined category filtering and live keyword search
 *              across technical monographs in insights.php.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.in-filter-btn');
    const searchInput = document.getElementById('inSearchInput');
    const articleItems = document.querySelectorAll('.in-article-item');
    const emptyState = document.getElementById('inEmptyState');
    const resetBtn = document.getElementById('inResetFiltersBtn');

    if (!articleItems.length) {
        return;
    }

    let activeCategory = 'all';

    const applyFilters = () => {
        const query = (searchInput ? searchInput.value : '').trim().toLowerCase();
        let visibleCount = 0;

        articleItems.forEach((item) => {
            const category = item.getAttribute('data-category');
            const textContent = item.textContent.toLowerCase();

            const matchesCategory = activeCategory === 'all' || category === activeCategory;
            const matchesSearch = query === '' || textContent.includes(query);

            if (matchesCategory && matchesSearch) {
                item.classList.remove('d-none');
                visibleCount++;
            } else {
                item.classList.add('d-none');
            }
        });

        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.remove('d-none');
            } else {
                emptyState.classList.add('d-none');
            }
        }
    };

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            activeCategory = btn.getAttribute('data-filter') || 'all';

            filterButtons.forEach((b) => {
                b.classList.remove('btn-success', 'text-dark', 'fw-semibold', 'active');
                b.classList.add('btn-outline-light');
            });
            btn.classList.remove('btn-outline-light');
            btn.classList.add('btn-success', 'text-dark', 'fw-semibold', 'active');

            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            activeCategory = 'all';
            if (searchInput) {
                searchInput.value = '';
            }
            filterButtons.forEach((b) => {
                b.classList.remove('btn-success', 'text-dark', 'fw-semibold', 'active');
                b.classList.add('btn-outline-light');
                if (b.getAttribute('data-filter') === 'all') {
                    b.classList.remove('btn-outline-light');
                    b.classList.add('btn-success', 'text-dark', 'fw-semibold', 'active');
                }
            });
            applyFilters();
        });
    }
});