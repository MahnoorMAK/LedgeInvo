/**
 * APP1.JS — Global layout behavior
 * - Header: shrink/darken + hide/show on scroll
 * - Header: mobile hamburger menu
 * - Header: login dropdown
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
       2. HEADER — HIDE ON SCROLL DOWN
       ========================================================== */
   /* (function () {
        if (!header) return;

        var lastY = window.scrollY;
        var ticking2 = false;
        var HIDE_THRESHOLD = 200;
        var DELTA = 6;

        function updateHide() {
            var y = window.scrollY;
            var diff = y - lastY;

            if (Math.abs(diff) < DELTA) {
                ticking2 = false;
                return;
            }

            if (y > HIDE_THRESHOLD && diff > 0) {
                header.classList.add('is-hidden');
            } else {
                header.classList.remove('is-hidden');
            }

            lastY = y;
            ticking2 = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking2) {
                ticking2 = true;
                requestAnimationFrame(updateHide);
            }
        }, { passive: true });
    })(); */

    /* ==========================================================
       3. HEADER — MOBILE MENU
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
       4. LOGIN DROPDOWN
       ========================================================== */
    (function () {
        var dropdown = document.getElementById('signinDropdown');
        var toggle = document.getElementById('signinToggle');
        if (!dropdown || !toggle) return;

        function closeDropdown() {
            dropdown.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        }
        function openDropdown() {
            dropdown.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
        }

        closeDropdown();
        window.addEventListener('pageshow', closeDropdown);

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = dropdown.classList.contains('is-open');
            isOpen ? closeDropdown() : openDropdown();
        });

        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target)) closeDropdown();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeDropdown();
        });
    })();

    /* ==========================================================
       5. REVEAL ON SCROLL
       Uses a slightly earlier trigger so animations start
       a bit before the element fully enters the viewport.
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
                        }, 1500);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

            revealEls.forEach(function (el) { io.observe(el); });
        }
    } else {
        document.querySelectorAll('[data-reveal]').forEach(function (el) {
            el.classList.add('is-visible');
        });
    }

    /* ==========================================================
       6. PAUSE ANIMATIONS DURING SCROLL
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
            }, 200);
        }, { passive: true });
    })();

    /* ==========================================================
       7. FORM GUARD (demo forms)
       ========================================================== */
    document.querySelectorAll('form[data-demo]').forEach(function (form) {
        form.addEventListener('submit', function (e) { e.preventDefault(); });
    });
  
})();