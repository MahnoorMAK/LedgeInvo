/* ============================================================
   MISSION + VALUES
   - Photo slides in when mission block is in view
   - Text words highlight progressively on scroll (like OverviewMetrics)
   - Values row reveals separately with stagger
   ============================================================ */
(function () {
    'use strict';

    function initMissionValues() {
        const mission = document.getElementById('mvMission');
        const values  = document.getElementById('mvValues');
        const title   = document.getElementById('mvTitle');
        const desc    = document.getElementById('mvDesc');
        if (!mission || !values || !title || !desc) return;

        // All words across both the title and paragraph, in order
        const titleWords = title.querySelectorAll('.mv-word');
        const descWords  = desc.querySelectorAll('.mv-word');
        const allWords   = Array.from(titleWords).concat(Array.from(descWords));

        // ------------------------------------------------------------
        // 1. Word highlight tied to scroll position
        // ------------------------------------------------------------
        function updateWords() {
            const rect = mission.getBoundingClientRect();
            const vh = window.innerHeight;

            // Enter: mission top at bottom of viewport
            // Exit:  mission top at 5% from top of viewport
            // Slow range = words highlight gradually as you scroll
            const enterY = vh * 1.1;
            const exitY  = vh * 0.05;

            let progress = (enterY - rect.top) / (enterY - exitY);
            progress = Math.max(0, Math.min(1, progress));

            const activeCount = Math.ceil(progress * allWords.length);

            allWords.forEach(function (word, i) {
                word.classList.toggle('is-active', i < activeCount);
            });
        }

        let scrollTicking = false;
        function onScroll() {
            if (scrollTicking) return;
            scrollTicking = true;
            requestAnimationFrame(function () {
                updateWords();
                scrollTicking = false;
            });
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        updateWords();

        // ------------------------------------------------------------
        // 2. Mission reveal — triggers photo slide-in
        // ------------------------------------------------------------
        let missionRevealed = false;

        function revealMission() {
            if (missionRevealed) return;
            missionRevealed = true;
            mission.classList.add('is-visible');
        }

        // ------------------------------------------------------------
        // 3. Values reveal — triggers 4-card stagger
        // ------------------------------------------------------------
        let valuesRevealed = false;

        function revealValues() {
            if (valuesRevealed) return;
            valuesRevealed = true;
            values.classList.add('is-visible');
        }

        // ------------------------------------------------------------
        // Observers
        // ------------------------------------------------------------
        if ('IntersectionObserver' in window) {
            const missionObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting && entry.intersectionRatio >= 0.2) {
                        revealMission();
                        missionObserver.unobserve(mission);
                    }
                });
            }, {
                threshold: [0.2, 0.4],
                rootMargin: '0px 0px -60px 0px'
            });
            missionObserver.observe(mission);

            const valuesObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting && entry.intersectionRatio >= 0.2) {
                        revealValues();
                        valuesObserver.unobserve(values);
                    }
                });
            }, {
                threshold: [0.2, 0.4],
                rootMargin: '0px 0px -60px 0px'
            });
            valuesObserver.observe(values);
        } else {
            revealMission();
            revealValues();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMissionValues);
    } else {
        initMissionValues();
    }
})();