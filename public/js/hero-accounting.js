/* ============================================================
   HERO ACCOUNTING — load reveal + subtle parallax
   ============================================================ */
(function () {
    'use strict';

    function initHeroAccounting() {
        const hero = document.getElementById('ahHero');
        if (!hero) return;

        const bg = hero.querySelector('.ah-hero-bg');
        const content = hero.querySelector('.ah-hero-content');

        // ------------------------------------------------------------
        // 1. REVEAL on load — eyebrow → headline → pill
        //    Each element's own CSS transition handles the timing.
        //    We just add .is-loaded to kick them off.
        // ------------------------------------------------------------
        function reveal() {
            hero.classList.add('is-loaded');
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(reveal, 100);
            });
        } else {
            setTimeout(reveal, 100);
        }

        // ------------------------------------------------------------
        // 2. SUBTLE PARALLAX on scroll — background stays put,
        //    content drifts down slowly
        // ------------------------------------------------------------
        let ticking = false;
        let currentY = 0;
        let targetY = 0;

        function lerp(a, b, t) { return a + (b - a) * t; }

        function raf() {
            currentY = lerp(currentY, targetY, 0.12);

            if (content) content.style.transform = 'translateY(' + (currentY * 0.35) + 'px)';
            if (bg)      bg.style.transform      = 'translateY(' + (currentY * 0.18) + 'px)';

            if (Math.abs(currentY - targetY) > 0.5) {
                requestAnimationFrame(raf);
            } else {
                ticking = false;
            }
        }

        function onScroll() {
            const rect = hero.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > window.innerHeight) return;

            targetY = window.scrollY;

            if (!ticking) {
                ticking = true;
                requestAnimationFrame(raf);
            }
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeroAccounting);
    } else {
        initHeroAccounting();
    }
})();