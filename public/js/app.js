// app.js
(function () {
    const dropdown = document.getElementById('signinDropdown');
    const toggle = document.getElementById('signinToggle');
    if (!dropdown || !toggle) return;

    // Reset function — closes the dropdown and resets accessibility state
    function resetDropdown() {
        dropdown.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
    }

    // Run immediately on first load
    resetDropdown();

    // Run again every time the page is shown — including bfcache restores
    window.addEventListener('pageshow', resetDropdown);

    // Toggle on click
    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        const isOpen = dropdown.classList.toggle('open');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Close when clicking outside
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target)) {
            resetDropdown();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            resetDropdown();
        }
    });
})();
/* ============================================================
   THREE-DOT NAV MENU
   ============================================================ */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        const menu = document.getElementById('navDotsMenu');
        const toggle = document.getElementById('navDotsToggle');
        const themeToggleBtn = document.getElementById('themeToggleFromMenu');

        if (!menu || !toggle) return;

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('open');
        });

        document.addEventListener('click', function (e) {
            if (!menu.contains(e.target)) menu.classList.remove('open');
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') menu.classList.remove('open');
        });

        window.addEventListener('pageshow', function () {
            menu.classList.remove('open');
        });

        if (themeToggleBtn) {
            const moonIcon = themeToggleBtn.querySelector('.dots-icon-moon');
            const sunIcon  = themeToggleBtn.querySelector('.dots-icon-sun');

            function updateIcon(theme) {
                if (theme === 'dark') {
                    moonIcon.style.display = 'none';
                    sunIcon.style.display = 'block';
                } else {
                    moonIcon.style.display = 'block';
                    sunIcon.style.display = 'none';
                }
            }

            updateIcon(document.documentElement.getAttribute('data-theme') || 'light');

            themeToggleBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                const current = document.documentElement.getAttribute('data-theme') || 'light';
                const next = current === 'dark' ? 'light' : 'dark';

                document.documentElement.setAttribute('data-theme', next);
                localStorage.setItem('apexbooks-theme', next);
                updateIcon(next);
            });
        }
    });
})();

/* ============================================================
   NAVBAR — slides up slowly and smoothly on scroll down
   ============================================================ */
(function () {
    'use strict';

    const nav = document.querySelector('nav');
    if (!nav) return;

    let lastY = window.scrollY;
    let ticking = false;
    let hidden = false;
    const HIDE_AFTER = 120;   // scroll past this to start hiding
    const MIN_DELTA  = 4;     // must scroll at least this much

    function update() {
        const y = window.scrollY;
        const delta = y - lastY;

        if (y > HIDE_AFTER && delta > MIN_DELTA && !hidden) {
            nav.classList.add('is-hidden');
            hidden = true;
        } else if ((delta < -MIN_DELTA || y < 60) && hidden) {
            nav.classList.remove('is-hidden');
            hidden = false;
        }

        lastY = y;
        ticking = false;
    }

    window.addEventListener('scroll', function () {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    }, { passive: true });
})();