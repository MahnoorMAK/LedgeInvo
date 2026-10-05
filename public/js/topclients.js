/* ============================================================
   TOP CLIENTS — scroll-triggered reveal
   (Marquee itself is pure CSS)
   ============================================================ */
(function () {
    'use strict';

    function initTopClients() {
        const section = document.getElementById('topClientsSection');
        if (!section) return;

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
                threshold: 0.1,
                rootMargin: '0px 0px -60px 0px'
            });

            observer.observe(section);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTopClients);
    } else {
        initTopClients();
    }
})();