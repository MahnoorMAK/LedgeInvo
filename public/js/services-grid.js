/**
 * Services — Sticky horizontal stepper + flip cards
 * - Scroll drives the horizontal translation of the track
 * - Each card flips as soon as it enters view (not on a fixed delay)
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('services-grid');
    if (!section) return;

    if (section.dataset.svcInit === '1') return;
    section.dataset.svcInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var stage       = section.querySelector('[data-svc-stage]');
    var track       = section.querySelector('[data-svc-track]');
    var cards       = section.querySelectorAll('[data-svc-card]');
    var watermark   = section.querySelector('[data-svc-watermark]');

    if (!track || !cards.length) return;

    var CARD_COUNT = cards.length;

    /* ==========================================================
       MOBILE / REDUCED MOTION — reveal all cards immediately
       ========================================================== */
    if (reduced || window.innerWidth <= 900) {
        cards.forEach(function (c) { c.classList.add('is-visible'); });
        return;
    }

    /* ==========================================================
       MEASURE
       ========================================================== */
    var totalScroll   = 0;
    var maxTranslate  = 0;

    function measure() {
        totalScroll = section.offsetHeight - window.innerHeight;
        if (totalScroll < 0) totalScroll = 0;

        // Horizontal distance the track can travel
        var trackW = track.scrollWidth;
        var viewW  = window.innerWidth;
        maxTranslate = trackW - viewW;
        if (maxTranslate < 0) maxTranslate = 0;
    }

    /* ==========================================================
       PROGRESS
       ========================================================== */
    function computeProgress() {
        if (totalScroll <= 0) return 0;

        var rect = section.getBoundingClientRect();
        var p = (-rect.top) / totalScroll;

        if (p < 0) p = 0;
        if (p > 1) p = 1;
        return p;
    }

    /* ==========================================================
       STATE
       ========================================================== */
    var targetProgress  = 0;
    var currentProgress = 0;
    var running         = false;
    var ticking         = false;

    function applyProgress(p) {
        // -------- Horizontal translation --------
        var x = -p * maxTranslate;
        track.style.transform = 'translate3d(' + x.toFixed(2) + 'px, 0, 0)';

        // -------- Watermark drift --------
        if (watermark) {
            watermark.style.transform = 'translateX(' + (p * -8) + 'vw)';
        }

        // -------- Reveal cards that are in view --------
        var vw = window.innerWidth;

        cards.forEach(function (card) {
            if (card.classList.contains('is-visible')) return;
            var r = card.getBoundingClientRect();
            var center = r.left + r.width / 2;
            if (center > -80 && center < vw + 80) {
                card.classList.add('is-visible');
            }
        });
    }

    /* ==========================================================
       ANIMATION LOOP
       ========================================================== */
    function step() {
        var diff = targetProgress - currentProgress;

        if (Math.abs(diff) < 0.0004) {
            currentProgress = targetProgress;
            applyProgress(currentProgress);
            running = false;
            return;
        }

        currentProgress += diff * 0.16;
        applyProgress(currentProgress);
        requestAnimationFrame(step);
    }

    function kick() {
        if (!running) {
            running = true;
            requestAnimationFrame(step);
        }
    }

    /* ==========================================================
       SCROLL
       ========================================================== */
    function onScroll() {
        if (ticking) return;
        ticking = true;

        requestAnimationFrame(function () {
            targetProgress = computeProgress();
            kick();
            ticking = false;
        });
    }

    /* ==========================================================
       INIT
       ========================================================== */
    function init() {
        measure();

        targetProgress  = computeProgress();
        currentProgress = targetProgress;

        applyProgress(currentProgress);

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', function () {
            measure();
            onScroll();
        });
    }

    requestAnimationFrame(init);

    /* ==========================================================
       LEARN MORE CLICK (demo)
       ========================================================== */
    section.querySelectorAll('.svc-card__link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var card = link.closest('.svc-card');
            var title = card ? card.querySelector('.svc-card__title') : null;
            var name = title ? title.textContent.trim() : 'this service';
            console.log('Learn more clicked:', name);
        });
    });
})();