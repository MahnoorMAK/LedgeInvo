/**
 * Self-Service / Help Links component
 * - Staggered reveal-on-scroll for cards
 * - Keyboard-accessible hover preview (focus = hover)
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('self-service');
    if (!section) return;

    if (section.dataset.selfInit === '1') return;
    section.dataset.selfInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       REVEAL — header, then cards one by one
       ========================================================== */
    var revealEls = section.querySelectorAll('[data-self-reveal]');

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var delay = Array.prototype.indexOf.call(revealEls, entry.target) * 140;
                    setTimeout(function () {
                        entry.target.classList.add('is-visible');
                    }, delay);

                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -80px 0px'
        });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }
})();