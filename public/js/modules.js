/* ============================================================
   MODULES TABS — slow cross-fade + scroll reveal
   ============================================================ */
(function () {
    'use strict';

    function initModulesTabs() {
        const section = document.getElementById('modulesSection');
        if (!section) return;

        const tabs = section.querySelectorAll('.modules-tab');
        const panels = section.querySelectorAll('.modules-panel');
        if (!tabs.length || !panels.length) return;

        let switching = false;

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                if (switching) return;
                if (tab.classList.contains('is-active')) return;

                const target = tab.dataset.tab;
                switching = true;

                // Update tab states
                tabs.forEach(function (t) {
                    t.classList.remove('is-active');
                    t.setAttribute('aria-selected', 'false');
                });
                tab.classList.add('is-active');
                tab.setAttribute('aria-selected', 'true');

                // Update panel states
                panels.forEach(function (panel) {
                    if (panel.dataset.panel === target) {
                        panel.classList.add('is-active');
                    } else {
                        panel.classList.remove('is-active');
                    }
                });

                // Unlock after the transition duration (1s + small buffer)
                setTimeout(function () { switching = false; }, 1000);
            });
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
        document.addEventListener('DOMContentLoaded', initModulesTabs);
    } else {
        initModulesTabs();
    }
})();