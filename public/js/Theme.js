(function () {
    'use strict';

    const THEME_KEY = 'apexbooks-theme';

    // ---- Apply theme to <html> and swap icons ----
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);

        const iconSun = document.getElementById('icon-sun');
        const iconMoon = document.getElementById('icon-moon');

        if (iconSun && iconMoon) {
            if (theme === 'dark') {
                iconSun.classList.remove('hidden');
                iconMoon.classList.add('hidden');
            } else {
                iconSun.classList.add('hidden');
                iconMoon.classList.remove('hidden');
            }
        }
    }

    // ---- Run immediately (prevents white flash) ----
    const savedTheme = localStorage.getItem(THEME_KEY) || 'light';
    applyTheme(savedTheme);

    // ---- Wire up button on DOM ready ----
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('theme-toggle');
        if (!toggleBtn) return;

        toggleBtn.addEventListener('click', function () {
            const current = document.documentElement.getAttribute('data-theme') || 'light';
            const next = current === 'dark' ? 'light' : 'dark';

            applyTheme(next);
            localStorage.setItem(THEME_KEY, next);

            // Optional: save to backend
            // fetch('/api/user/theme', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            //     },
            //     body: JSON.stringify({ theme: next })
            // });
        });
    });
})();