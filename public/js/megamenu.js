/* ============================================================
   MEGA MENU — click toggle (in addition to hover) + outside close
   ============================================================ */
(function () {
    'use strict';

    function initMegaMenu() {
        const nav = document.getElementById('mmNav');
        if (!nav) return;

        const items = nav.querySelectorAll('.mm-has-mega');

        items.forEach(function (item) {
            const toggle = item.querySelector('.mm-link-toggle');
            if (!toggle) return;

            // Click toggles on touch / when hover is unreliable
            toggle.addEventListener('click', function (e) {
                e.stopPropagation();
                const isOpen = item.classList.contains('mm-open');

                // Close any other open menus
                items.forEach(function (other) {
                    if (other !== item) other.classList.remove('mm-open');
                });

                item.classList.toggle('mm-open', !isOpen);
                toggle.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
            });

            // Keyboard access
            item.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    item.classList.remove('mm-open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        });

        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!nav.contains(e.target)) {
                items.forEach(function (item) {
                    item.classList.remove('mm-open');
                    const toggle = item.querySelector('.mm-link-toggle');
                    if (toggle) toggle.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // Prevent the mega panel from closing when clicking inside it
        nav.querySelectorAll('.mm-mega').forEach(function (mega) {
            mega.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        });

        // Close all menus on page restore (bfcache)
        window.addEventListener('pageshow', function () {
            items.forEach(function (item) {
                item.classList.remove('mm-open');
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMegaMenu);
    } else {
        initMegaMenu();
    }
})();