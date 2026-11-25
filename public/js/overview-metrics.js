/* ============================================================
   OVERVIEW + METRICS
   - Header words highlight on scroll
   - Cards fade up + counters start when the grid enters view
   ============================================================ */
(function () {
    'use strict';

    function initOverviewMetrics() {
        const section = document.getElementById('omSection');
        const grid = section ? section.querySelector('.om-grid') : null;
        const title = document.getElementById('omTitle');
        if (!section || !grid || !title) return;

        const words = title.querySelectorAll('.om-word');
        const counters = section.querySelectorAll('.om-counter');
        const cards = section.querySelectorAll('.om-card');

        // ============================================================
        // 1. HEADER — word highlight tied to scroll position
        // ============================================================
        function updateWords() {
            const rect = section.getBoundingClientRect();
            const vh = window.innerHeight;

            // progress 0 → when section top is at bottom of viewport
            // progress 1 → when section top is 30% from top of viewport
            const enterY = vh * 1.4;
            const exitY  = vh * 0;

            let progress = (enterY - rect.top) / (enterY - exitY);
            progress = Math.max(0, Math.min(1, progress));

            const activeCount = Math.ceil(progress * words.length);

            words.forEach(function (word, i) {
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

        // ============================================================
        // 2. GRID — reveal cards + run counters when scrolled into view
        // ============================================================
        let gridRevealed = false;

        function easeOutExpo(t) { return t === 1 ? 1 : 1 - Math.pow(2, -10 * t); }

        function count(el) {
    const target = parseFloat(el.dataset.target || '0');
    const start = performance.now();
    const duration = 3200;

    // Start from empty
    el.textContent = '';

    // Fade the number element in on first frame
    el.style.opacity = '0';
    el.style.transition = 'opacity 0.4s ease';

    requestAnimationFrame(function () {
        el.style.opacity = '1';
    });

    function tick(now) {
        const p = Math.min((now - start) / duration, 1);
        const v = Math.floor(easeOutExpo(p) * target);
        el.textContent = v.toLocaleString();
        if (p < 1) requestAnimationFrame(tick);
        else el.textContent = target.toLocaleString();
    }
    requestAnimationFrame(tick);
}

        function revealGrid() {
            if (gridRevealed) return;
            gridRevealed = true;

            // Add class that triggers card fade-up (see CSS)
            grid.classList.add('is-visible');

            // Start counters slightly after cards begin appearing
            counters.forEach(function (el, i) {
                setTimeout(function () { count(el); }, 350 + i * 150);
            });
        }

        // Fire when the GRID itself enters view (not the whole section)
        if ('IntersectionObserver' in window) {
            const gridObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    // Trigger when 30% of the grid is visible
                    if (entry.isIntersecting && entry.intersectionRatio >= 0.3) {
                        revealGrid();
                        gridObserver.unobserve(grid);
                    }
                });
            }, {
                threshold: [0.1, 0.3, 0.5],
                rootMargin: '0px 0px -80px 0px'
            });

            gridObserver.observe(grid);
        } else {
            // Fallback for old browsers
            revealGrid();
        }

        // ============================================================
        // 3. Optional: also mark section as visible for eyebrow reveal
        // ============================================================
        if ('IntersectionObserver' in window) {
            const sectionObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        section.classList.add('is-visible');
                        sectionObserver.unobserve(section);
                    }
                });
            }, { threshold: 0.1 });
            sectionObserver.observe(section);
        } else {
            section.classList.add('is-visible');
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOverviewMetrics);
    } else {
        initOverviewMetrics();
    }
})();