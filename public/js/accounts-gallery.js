/**
 * Accounts Hover-Expand Gallery
 * Ported from React + Framer Motion
 *
 * Behaviour:
 * - Auto-starts with image at index 1 active
 * - On hover (mouseenter) → that item becomes active
 * - On click → that item becomes active
 * - Only one item is active at a time
 * - Width animates via CSS transition
 * - Overlay + caption fade in/out via CSS
 *
 * Respects prefers-reduced-motion (still changes active item,
 * but the CSS transitions are disabled).
 */

(function () {
    'use strict';

    var section = document.getElementById('accounts-gallery');
    if (!section) return;

    if (section.dataset.accInit === '1') return;
    section.dataset.accInit = '1';

    var wrap  = section.querySelector('.acc-gallery-wrap');
    var items = section.querySelectorAll('[data-acc-gallery-item]');

    /* ==========================================================
       ENTRANCE — wrapper fades up after a 0.5s delay
       (mirrors the Framer Motion initial animation)
       ========================================================== */
    requestAnimationFrame(function () {
        wrap.classList.add('is-ready');
    });

    /* ==========================================================
       ACTIVE STATE
       Initial active index = 1 (mirrors React `useState(1)`)
       ========================================================== */
    var activeIndex = 1;

    function setActive(index) {
        if (index === activeIndex) return;

        items.forEach(function (item) {
            var itemIndex = parseInt(item.dataset.accIndex, 10);
            if (itemIndex === index) {
                item.classList.add('is-active');
            } else {
                item.classList.remove('is-active');
            }
        });

        activeIndex = index;
    }

    /* ==========================================================
       BIND: hover + click + keyboard
       ========================================================== */
    items.forEach(function (item) {
        var index = parseInt(item.dataset.accIndex, 10);

        item.addEventListener('mouseenter', function () {
            setActive(index);
        });

        item.addEventListener('click', function () {
            setActive(index);
        });

        // Keyboard support (Enter / Space) for accessibility
        item.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                setActive(index);
            }
        });
    });
})();