/* public/js/hero.js */

/* ============================================================
   HERO SLIDER
   ============================================================ */
(function () {
    // Wait for DOM to load
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.apex-slider .slide');
        const dots = document.querySelectorAll('.apex-slider .dot');
        
        if (!slides.length) return;

        let current = 0;
        let timer = null;
        const INTERVAL = 4000; // 4 seconds

        function goTo(index) {
            slides[current].classList.remove('active');
            dots[current]?.classList.remove('active');

            current = (index + slides.length) % slides.length;

            slides[current].classList.add('active');
            dots[current]?.classList.add('active');
        }

        function next() {
            goTo(current + 1);
        }

        function start() {
            stop();
            timer = setInterval(next, INTERVAL);
        }

        function stop() {
            if (timer) clearInterval(timer);
            timer = null;
        }

        // Dots clickable
        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(parseInt(this.dataset.index, 10));
                start(); // restart timer
            });
        });

        // Pause when tab hidden (saves CPU)
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) stop();
            else start();
        });

        // Start
        start();
    });
})();