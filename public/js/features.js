/* ============================================================
   FEATURES GRID — scroll-triggered stagger reveal
   ============================================================ */
(function () {
    'use strict';

    function initFeaturesGrid() {
        const grid = document.getElementById('featuresGrid');
        if (!grid) return;

        let revealed = false;

        function reveal() {
            if (revealed) return;
            revealed = true;
            grid.classList.add('is-visible');
        }

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        reveal();
                        observer.unobserve(grid);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -80px 0px'
            });

            observer.observe(grid);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFeaturesGrid);
    } else {
        initFeaturesGrid();
    }
})();