/**
 * Pricing Component
 * - Slow unfold reveal (left card opens rightward, right card opens leftward,
 *   center card zooms from far away)
 * - Cards only start revealing once the ENTIRE grid is in the viewport
 * - Monthly / yearly toggle
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.getElementById('pricing');
    if (!section) return;

    if (section.dataset.prcInit === '1') return;
    section.dataset.prcInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ==========================================================
       1. SCROLL-TRIGGERED REVEAL
       - Header + toggle fade in early
       - Cards wait until the ENTIRE grid is in view
       ========================================================== */

    var revealEls = section.querySelectorAll('[data-prc-reveal]');
    var grid       = section.querySelector('.prc__grid');
    var leftCard   = section.querySelector('[data-prc-card="left"]');
    var centerCard = section.querySelector('[data-prc-card="center"]');
    var rightCard  = section.querySelector('[data-prc-card="right"]');

    var hasRevealed = false;

    function revealCards() {
        if (hasRevealed) return;
        hasRevealed = true;

        setTimeout(function () {
            if (leftCard)   leftCard.classList.add('is-visible');
            if (centerCard) centerCard.classList.add('is-visible');
            if (rightCard)  rightCard.classList.add('is-visible');
        }, 500);
    }

    function revealAll() {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
        revealCards();
    }

    if (!reduced && 'IntersectionObserver' in window) {

        // ---- Step 1: header + toggle ----
        var headerIO = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    revealEls.forEach(function (el) {
                        el.classList.add('is-visible');
                    });
                    headerIO.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.4,
            rootMargin: '0px 0px -80px 0px'
        });

        revealEls.forEach(function (el) {
            headerIO.observe(el);
        });

        // ---- Step 2: cards — only when the grid is fully visible ----
        if (grid) {
            var gridIO = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        revealCards();
                        gridIO.unobserve(entry.target);
                    }
                });
            }, {
                
                rootMargin: '0px 0px -100px 0px'
            });

            gridIO.observe(grid);
        }
    } else {
        revealAll();
    }

    /* ==========================================================
       2. BILLING TOGGLE (Monthly / Yearly)
       ========================================================== */

    var toggleBtns = section.querySelectorAll('[data-prc-billing]');
    var pill       = section.querySelector('[data-prc-pill]');
    var amounts    = section.querySelectorAll('[data-prc-amount]');

    function positionPill(activeBtn) {
        if (!pill || !activeBtn) return;
        var btnRect    = activeBtn.getBoundingClientRect();
        var parentRect = activeBtn.parentElement.getBoundingClientRect();

        var leftOffset = btnRect.left - parentRect.left;
        var width      = btnRect.width;

        pill.style.transform = 'translateX(' + leftOffset + 'px)';
        pill.style.width     = width + 'px';
    }

    function setBilling(mode) {
        toggleBtns.forEach(function (btn) {
            var isActive = btn.dataset.prcBilling === mode;
            btn.classList.toggle('is-active', isActive);
            if (isActive) positionPill(btn);
        });

        amounts.forEach(function (el) {
            var val = el.dataset[mode] || el.dataset.monthly;
            if (!val) return;

            el.style.transition = 'opacity 0.2s ease';
            el.style.opacity = '0';
            setTimeout(function () {
                el.textContent = val;
                el.style.opacity = '1';
            }, 180);
        });
    }

    toggleBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            setBilling(btn.dataset.prcBilling);
        });
    });

    // Initial pill position (after layout settles)
    var initialBtn = section.querySelector('[data-prc-billing].is-active');
    if (initialBtn) {
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                positionPill(initialBtn);
            });
        });
    }

    // Reposition pill on resize
    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            var active = section.querySelector('[data-prc-billing].is-active');
            if (active) positionPill(active);
        }, 150);
    });
})();