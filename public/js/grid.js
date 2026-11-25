/* ============================================================
   GRID COMPONENT
   Continuous horizontal marquee with per-card hover pause
   - Duplicates track for seamless loop
   - Reveals cards as they enter the viewport
   - Pauses ONLY when the cursor is over a card
   - Dims sibling cards while one is hovered
   - Respects prefers-reduced-motion
   ============================================================ */
(function () {
    'use strict';

    function initGrid() {
        var section = document.getElementById('gridComponent');
        if (!section) return;

        // Guard against double-init
        if (section.dataset.gridInit === '1') return;
        section.dataset.gridInit = '1';

        var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        var track = section.querySelector('[data-grid-track]');
        if (!track) return;

        // Reduced motion → show everything statically
        if (reduced) return;

        // Mobile → no marquee (grid layout takes over)
        if (window.innerWidth <= 900) {
            return;
        }

        /* ------------------------------------------------------
           1. Duplicate track content for a seamless loop
           ------------------------------------------------------ */
        var originalHTML = track.innerHTML;
        track.innerHTML = originalHTML + originalHTML;

        /* ------------------------------------------------------
           2. Reveal cards as they enter viewport
           ------------------------------------------------------ */
        var cards = track.querySelectorAll('.grid-card');

        if ('IntersectionObserver' in window) {
            var revealObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            });

            cards.forEach(function (c) { revealObserver.observe(c); });
        } else {
            cards.forEach(function (c) { c.classList.add('is-visible'); });
        }

        /* ------------------------------------------------------
           3. Continuous marquee loop
           ------------------------------------------------------ */
        var SPEED = 1.4;      // px per frame — increase for faster motion
        var offset = 0;
        var halfWidth = 0;
        var paused = false;
        var rafId = null;

        function measure() {
            halfWidth = track.scrollWidth / 2;
        }

        function tick() {
            if (!paused) {
                offset -= SPEED;

                if (-offset >= halfWidth) {
                    offset += halfWidth;
                }

                track.style.transform = 'translate3d(' + offset + 'px, 0, 0)';
            }

            rafId = requestAnimationFrame(tick);
        }

        /* ------------------------------------------------------
           4. Hover — pause + prominent highlight on a single card
           ------------------------------------------------------ */
        var hoveredCount = 0;

        function onCardEnter(e) {
            hoveredCount++;
            paused = true;

            // Mark the track so CSS can dim siblings
            track.classList.add('has-hover');
            e.currentTarget.classList.add('is-hovered');
        }

        function onCardLeave(e) {
            hoveredCount = Math.max(0, hoveredCount - 1);

            if (hoveredCount === 0) {
                paused = false;
                track.classList.remove('has-hover');
            }

            e.currentTarget.classList.remove('is-hovered');
        }

        // Attach to every card — INCLUDING the duplicated set
        var allCards = track.querySelectorAll('.grid-card');
        allCards.forEach(function (card) {
            card.addEventListener('mouseenter', onCardEnter);
            card.addEventListener('mouseleave', onCardLeave);
        });

        /* ------------------------------------------------------
           5. Touch pause — only while touching a card
           ------------------------------------------------------ */
        var touchActive = false;

        allCards.forEach(function (card) {
            card.addEventListener('touchstart', function () {
                touchActive = true;
                paused = true;
            }, { passive: true });

            card.addEventListener('touchend', function () {
                touchActive = false;
                if (hoveredCount === 0) paused = false;
            }, { passive: true });
        });

        /* ------------------------------------------------------
           6. Pause when tab hidden
           ------------------------------------------------------ */
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                paused = true;
            } else if (hoveredCount === 0 && !touchActive) {
                paused = false;
            }
        });

        /* ------------------------------------------------------
           7. Re-measure on resize
           ------------------------------------------------------ */
        window.addEventListener('resize', function () {
            measure();

            // If we've resized to mobile, stop the loop
            if (window.innerWidth <= 900) {
                if (rafId) cancelAnimationFrame(rafId);
                track.style.transform = '';
                track.classList.remove('has-hover');
                allCards.forEach(function (c) { c.classList.remove('is-hovered'); });
                return;
            }

            // Restart if we came back to desktop and the loop was stopped
            if (!rafId) {
                tick();
            }
        });

        /* ------------------------------------------------------
           8. Init
           ------------------------------------------------------ */
        function start() {
            measure();
            if (rafId) cancelAnimationFrame(rafId);
            tick();
        }

        if (document.readyState === 'complete') {
            start();
        } else {
            window.addEventListener('load', start);
        }

        /* ------------------------------------------------------
           9. Demo click handler (optional)
           ------------------------------------------------------ */
        track.querySelectorAll('.grid-card__link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var card = link.closest('.grid-card');
                var title = card ? card.querySelector('.grid-card__title') : null;
                var name = title ? title.textContent.trim() : 'this item';
                console.log('Learn more clicked:', name);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGrid);
    } else {
        initGrid();
    }

    window.addEventListener('pageshow', initGrid);
})();