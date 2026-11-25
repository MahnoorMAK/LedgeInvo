/* ============================================================
   LEDGEINVO — FLOATING CTA CARD
   ============================================================ */
(function () {
    'use strict';

    function initFloatingCTA() {
        const section = document.getElementById('fctaSection');
        if (!section) return;
        if (section.dataset.initialized === 'true') return;
        section.dataset.initialized = 'true';

        let revealed = false;
        function reveal() {
            if (revealed) return;
            revealed = true;
            section.classList.add('is-visible');
        }

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting && entry.intersectionRatio >= 0.2) {
                        reveal();
                        observer.unobserve(section);
                    }
                });
            }, {
                threshold: [0.2, 0.4],
                rootMargin: '0px 0px -60px 0px'
            });
            observer.observe(section);
        } else {
            reveal();
        }
    }

    // Run on DOM ready AND after every page restore (bfcache)
    function boot() {
        initFloatingCTA();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    // Re-init if the component is dynamically inserted
    window.addEventListener('pageshow', boot);
})();