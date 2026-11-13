/* ============================================================
   ABOUT HERO — word-by-word reveal + parallax
   ============================================================ */
(function () {
    'use strict';

    function initAboutHero() {
        const hero = document.getElementById('aboutHero');
        if (!hero) return;

        const bg = hero.querySelector('.about-hero-bg');
        const words = hero.querySelectorAll('.about-hero-word');
        const heroTitle = hero.querySelector('.about-hero-title');

        // ------------------------------------------------------------
        // 1. WORD-BY-WORD REVEAL on load
        // ------------------------------------------------------------
        function revealWords() {
            hero.classList.add('is-loaded');

            words.forEach(function (word, i) {
                setTimeout(function () {
                    word.style.opacity = '1';
                    word.style.transform = 'translateY(0)';
                }, 300 + i * 120); // 120ms stagger between words
            });
        }

        // Trigger the reveal once the page is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', revealWords);
        } else {
            // Small delay so the browser has painted the first frame
            setTimeout(revealWords, 100);
        }

        // ------------------------------------------------------------
        // 2. PARALLAX — background stays fixed, image shifts subtly on scroll
        // ------------------------------------------------------------
        let ticking = false;

        function onScroll() {
            if (ticking) return;
            ticking = true;

            requestAnimationFrame(function () {
                const rect = hero.getBoundingClientRect();
                const heroTop = rect.top;

                // Only run parallax while the hero is in view
                if (heroTop < window.innerHeight && rect.bottom > 0) {
                    // Shift the background image down as the user scrolls
                    // (creates a "fixed background" effect without position:fixed)
                    const offset = Math.min(Math.max(heroTop, -window.innerHeight), 0);
                    if (bg) {
                        bg.style.transform = 'translateY(' + (-offset * 0.35) + 'px)';
                    }
                }

                ticking = false;
            });
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAboutHero);
    } else {
        initAboutHero();
    }
})();