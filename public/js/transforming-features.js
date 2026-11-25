/* ============================================================
   TRANSFORMING FEATURES — scroll reveal with stagger
   ============================================================ */
(function () {
    'use strict';

    function initTransformingFeatures() {
        const section = document.getElementById('tfSection');
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
                    // Fire only when 20% of the section is in the viewport
                    // and the section's top has passed the 65% mark of the screen.
                    // This ensures the first row is fully visible when it starts.
                    const rect = entry.target.getBoundingClientRect();
                    const vh = window.innerHeight;
                    const topPassed = rect.top < vh * 0.65;

                    if (entry.isIntersecting && entry.intersectionRatio >= 0.15 && topPassed) {
                        reveal();
                        observer.unobserve(section);
                    }
                });
            }, {
                threshold: [0.15, 0.3, 0.5],
                rootMargin: '0px 0px -80px 0px'
            });
            observer.observe(section);
        } else {
            reveal();
        }
    }

    function boot() {
        initTransformingFeatures();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    window.addEventListener('pageshow', boot);
})();