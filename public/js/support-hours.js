/**
 * Support Hours
 * - Staggered reveal-on-scroll with 3D card entry
 * - Header reveals first, cards follow one by one
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('support-hours');
    if (!section) return;

    if (section.dataset.supInit === '1') return;
    section.dataset.supInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       REVEAL
       - Header gets its own observer (fires immediately when
         ~40% visible)
       - Each card gets a staggered delay so they rise up one
         by one
       ========================================================== */

    var header       = section.querySelector('.sup__head');
    var cards        = section.querySelectorAll('.sup__card');
    var headerReveal = section.querySelector('.sup__head[data-sup-reveal]');

    // -------- Header --------
    if (headerReveal) {
        if (!reduced && 'IntersectionObserver' in window) {
            var headerIO = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        headerIO.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.35,
                rootMargin: '0px 0px -60px 0px'
            });
            headerIO.observe(headerReveal);
        } else {
            headerReveal.classList.add('is-visible');
        }
    }

    // -------- Cards --------
    if (!reduced && 'IntersectionObserver' in window) {
        // Reveal an entire card as soon as it enters
        var cardIO = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;

                var card  = entry.target;
                var index = Array.prototype.indexOf.call(cards, card);

                // stagger each card by 240ms
                setTimeout(function () {
                    card.classList.add('is-visible');
                }, index * 240);

                cardIO.unobserve(card);
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -70px 0px'
        });

        cards.forEach(function (card) { cardIO.observe(card); });
    } else {
        cards.forEach(function (card) { card.classList.add('is-visible'); });
    }
})();