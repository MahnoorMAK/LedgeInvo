/* =========================================================
   Home Page Scripts
   ========================================================= */

(function () {
    'use strict';

    // Placeholder for page-specific interactions.
    // Add your home-page JS here (e.g. button clicks, animations).

    document.addEventListener('DOMContentLoaded', function () {
        // Example: hook up "Start for free" and "Book a demo"
        const startBtn = document.querySelector('.hero-buttons .btn-primary');
        const demoBtn  = document.querySelector('.hero-buttons .btn-secondary');

        if (startBtn) {
            startBtn.addEventListener('click', function () {
                // TODO: navigate to signup
                // window.location.href = '/signup';
            });
        }

        if (demoBtn) {
            demoBtn.addEventListener('click', function () {
                // TODO: navigate to demo booking
                // window.location.href = '/demo';
            });
        }
    });
})();