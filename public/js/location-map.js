/**
 * Location & Map component
 * - Staggered reveal-on-scroll for header + branches
 * - Pauses map iframe updates when off-screen (perf)
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('locations');
    if (!section) return;

    if (section.dataset.locInit === '1') return;
    section.dataset.locInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       REVEAL — header first, then branches one by one
       ========================================================== */
    var revealEls = section.querySelectorAll('[data-loc-reveal]');

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var delay = Array.prototype.indexOf.call(revealEls, entry.target) * 160;
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
