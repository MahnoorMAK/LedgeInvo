/* ============================================================
   WHY ACCORDION — expand/collapse + scroll reveal
   ============================================================ */
(function () {
    'use strict';

    function initWhyAccordion() {
        const section = document.getElementById('whySection');
        if (!section) return;

        const items = section.querySelectorAll('.why-item');

        // ---------- Expand/Collapse Logic ----------
        items.forEach(function (item) {
            const trigger = item.querySelector('.why-trigger');
            const panel = item.querySelector('.why-panel');
            if (!trigger || !panel) return;

            trigger.addEventListener('click', function () {
                const isOpen = item.classList.contains('is-open');

                // Close all others (accordion behavior — only one open at a time)
                items.forEach(function (other) {
                    if (other !== item && other.classList.contains('is-open')) {
                        other.classList.remove('is-open');
                        other.querySelector('.why-trigger')?.setAttribute('aria-expanded', 'false');
                        other.querySelector('.why-panel')?.style.setProperty('max-height', '0px');
                    }
                });

                // Toggle current
                if (isOpen) {
                    item.classList.remove('is-open');
                    trigger.setAttribute('aria-expanded', 'false');
                    panel.style.maxHeight = '0px';
                } else {
                    item.classList.add('is-open');
                    trigger.setAttribute('aria-expanded', 'true');
                    panel.style.maxHeight = panel.scrollHeight + 'px';
                }
            });
        });

        // ---------- Set initial max-height for the pre-opened item ----------
        items.forEach(function (item) {
            const panel = item.querySelector('.why-panel');
            if (!panel) return;

            if (item.classList.contains('is-open')) {
                // Delay so entrance finishes first
                setTimeout(function () {
                    panel.style.maxHeight = panel.scrollHeight + 'px';
                }, 400);
            } else {
                panel.style.maxHeight = '0px';
            }
        });

        // Recalculate on resize (in case text wraps differently)
        let resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                items.forEach(function (item) {
                    if (item.classList.contains('is-open')) {
                        const panel = item.querySelector('.why-panel');
                        if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
                    }
                });
            }, 150);
        });

        // ---------- Scroll-triggered entrance ----------
        let revealed = false;
        function reveal() {
            if (revealed) return;
            revealed = true;
            section.classList.add('is-visible');
        }

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        reveal();
                        observer.unobserve(section);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            });

            observer.observe(section);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWhyAccordion);
    } else {
        initWhyAccordion();
    }
})();