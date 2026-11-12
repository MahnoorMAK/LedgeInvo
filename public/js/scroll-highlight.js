/* ============================================================
   SCROLL HIGHLIGHT HEADING
   Each word lights up as the section passes through the viewport
   ============================================================ */
(function () {
    'use strict';

    function initScrollHighlight() {
        const section = document.getElementById('scrollHighlight');
        const heading = document.getElementById('scrollHighlightHeading');
        if (!section || !heading) return;

        const words = heading.querySelectorAll('.sh-word');
        if (!words.length) return;

        // Remove any pre-existing active state
        words.forEach(function (w) { w.classList.remove('is-active'); });

        // ------------------------------------------------------------
        // Eyebrow reveal when section enters view
        // ------------------------------------------------------------
        let revealed = false;
        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !revealed) {
                    revealed = true;
                    section.classList.add('is-visible');
                }
            });
        }, { threshold: 0.15 });
        revealObserver.observe(section);

        // ------------------------------------------------------------
        // Word highlight based on scroll
        // ------------------------------------------------------------
        function updateWords() {
            const rect = section.getBoundingClientRect();
            const vh = window.innerHeight;

            // We want progress = 0 when the section's TOP has just
            // entered the bottom of the viewport, and progress = 1
            // when the section's TOP reaches the middle of the viewport.
            //
            // rect.top = vh          → section just entered at bottom    → progress 0
            // rect.top = vh * 0.35   → section top is 35% from top       → progress 1

            const enterY = vh;         // section top is at bottom of screen
            const exitY  = vh * 0.35;  // section top is 35% down from top

            let progress = (enterY - rect.top) / (enterY - exitY);
            progress = Math.max(0, Math.min(1, progress));

            // How many words to highlight
            const activeCount = Math.ceil(progress * words.length);

            words.forEach(function (word, i) {
                if (i < activeCount) {
                    word.classList.add('is-active');
                } else {
                    word.classList.remove('is-active');
                }
            });
        }

        let ticking = false;
        function onScroll() {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(function () {
                updateWords();
                ticking = false;
            });
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);

        // Run once on load — words start gray because section is below fold
        updateWords();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollHighlight);
    } else {
        initScrollHighlight();
    }
})();