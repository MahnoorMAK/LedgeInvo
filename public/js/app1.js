/**
 * APP.JS — Global layout behavior
 * - Header: shrink/darken on scroll (throttled)
 * - Header: mobile hamburger menu
 * - Global: reveal-on-scroll for [data-reveal]
 * - Global: pause animations during scroll
 */

(function () {
    'use strict';

    /* ==========================================================
       1. HEADER — SCROLLED STATE
       ========================================================== */
    var header = document.getElementById('site-header');
    var SCROLL_THRESHOLD = 40;
    var ticking = false;

    function updateScrolled() {
        if (!header) return;
        if (window.scrollY > SCROLL_THRESHOLD) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
        ticking = false;
    }

    function onScroll() {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(updateScrolled);
        }
    }

    if (header) {
        window.addEventListener('scroll', onScroll, { passive: true });
        updateScrolled();
    }

    /* ==========================================================
       2. HEADER — MOBILE MENU
       ========================================================== */
    var burger = document.getElementById('hdr-burger');
    var mobile = document.getElementById('hdr-mobile');

    if (header && burger && mobile) {

        function closeMenu() {
            burger.setAttribute('aria-expanded', 'false');
            mobile.hidden = true;
        }

        function openMenu() {
            burger.setAttribute('aria-expanded', 'true');
            mobile.hidden = false;
        }

        burger.addEventListener('click', function () {
            var expanded = burger.getAttribute('aria-expanded') === 'true';
            expanded ? closeMenu() : openMenu();
        });

        mobile.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !mobile.hidden) closeMenu();
        });

        document.addEventListener('click', function (e) {
            if (mobile.hidden) return;
            if (!header.contains(e.target)) closeMenu();
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 900 && !mobile.hidden) closeMenu();
        });
    }

    /* ==========================================================
       3. REVEAL ON SCROLL
       ========================================================== */
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!reduced && 'IntersectionObserver' in window) {
        var revealEls = document.querySelectorAll('[data-reveal]');

        if (revealEls.length) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);

                        setTimeout(function () {
                            entry.target.style.willChange = 'auto';
                        }, 1000);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

            revealEls.forEach(function (el) { io.observe(el); });
        }
    } else {
        document.querySelectorAll('[data-reveal]').forEach(function (el) {
            el.classList.add('is-visible');
        });
    }

    /* ==========================================================
       4. PAUSE ANIMATIONS DURING SCROLL
       ========================================================== */
    (function () {
        var root = document.documentElement;
        var timer = null;

        window.addEventListener('scroll', function () {
            if (!root.classList.contains('is-scrolling')) {
                root.classList.add('is-scrolling');
            }
            clearTimeout(timer);
            timer = setTimeout(function () {
                root.classList.remove('is-scrolling');
            }, 150);
        }, { passive: true });
    })();

    /* ==========================================================
       5. FORM GUARD (demo forms)
       ========================================================== */
    document.querySelectorAll('form[data-demo]').forEach(function (form) {
        form.addEventListener('submit', function (e) { e.preventDefault(); });
    });
})();