(function () {
    'use strict';

    const THEME_KEY = 'apexbooks-theme';
    const COLOR_KEY = 'apexbooks-theme-color';
    const FONT_KEY  = 'apexbooks-font';

    // ---- Apply Dark/Light ----
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
        localStorage.setItem(THEME_KEY, theme);
        document.dispatchEvent(new CustomEvent('themeChanged', { detail: theme }));
    }

    // ---- Apply Custom Color ----
    function applyColor(colorName) {
        if (!colorName) return;
        
        if (colorName === 'custom') {
            const hex = localStorage.getItem('apexbooks-custom-color');
            if (hex) {
                document.documentElement.style.setProperty('--primary', hex);
                document.documentElement.style.setProperty('--accent-color', hex);
                document.documentElement.style.setProperty('--primary-hover', hex);
                document.documentElement.style.setProperty('--primary-light', hex + '20');
            }
            return;
        }

        const colorMap = {
            'purple': { main: '#7E6BB5', light: '#F0EDF7', hover: '#6A589D' },
            'ocean':  { main: '#3B82F6', light: '#EFF6FF', hover: '#2563EB' },
            'emerald':{ main: '#10B981', light: '#ECFDF5', hover: '#059669' },
            'sunset': { main: '#F59E0B', light: '#FFFBEB', hover: '#D97706' },
            'rose':   { main: '#F43F5E', light: '#FFF1F2', hover: '#E11D48' },
            'sky':    { main: '#0EA5E9', light: '#F0F9FF', hover: '#0284C7' }
        };

        const selected = colorMap[colorName];
        if (selected) {
            document.documentElement.style.setProperty('--primary', selected.main);
            document.documentElement.style.setProperty('--accent-color', selected.main);
            document.documentElement.style.setProperty('--primary-hover', selected.hover);
            document.documentElement.style.setProperty('--primary-light', selected.light);
        }
    }

    // ---- Apply Custom Font ----
    function applyFont(fontName) {
        if (!fontName) return;
        document.documentElement.style.setProperty('--app-font', fontName);
        document.body.style.fontFamily = fontName;
    }

    // 1. RUN IMMEDIATELY ON PAGE LOAD
    const savedTheme = localStorage.getItem(THEME_KEY) || 'light';
    applyTheme(savedTheme);

    const savedColor = localStorage.getItem(COLOR_KEY);
    if (savedColor) applyColor(savedColor);

    const savedFont = localStorage.getItem(FONT_KEY);
    if (savedFont) applyFont(savedFont);

    // 2. Expose global toggle
    window.toggleSiteTheme = function() {
        const current = document.documentElement.getAttribute('data-theme') || 'light';
        const next = current === 'dark' ? 'light' : 'dark';
        applyTheme(next);
    };

    // 3. Wire up Navbar Toggle
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('theme-toggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', window.toggleSiteTheme);
        }
                // ==========================================
        // Load Custom Site Title
        // ==========================================
        const savedTitle = localStorage.getItem('apexbooks-title');
        if (savedTitle) {
            // Update all elements with the class 'site-logo-text'
            document.querySelectorAll('.site-logo-text').forEach(el => {
                el.textContent = savedTitle;
            });
            // Also update the browser tab title
            if (document.title.includes('Apexbooks')) {
                document.title = document.title.replace('Apexbooks', savedTitle);
            }
        }
    });
})();