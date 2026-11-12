/* ============================================================
   3D COVERFLOW SLIDER
   ============================================================ */
(function () {
    'use strict';

    function initCoverflow() {
        const slider = document.getElementById('coverflow');
        if (!slider) return;

        const items = slider.querySelectorAll('.coverflow-item');
        const dots  = slider.querySelectorAll('.coverflow-dot');
        const prevBtn = document.getElementById('coverflowPrev');
        const nextBtn = document.getElementById('coverflowNext');
        if (!items.length) return;

        let current = 0;
        let timer = null;
        let started = false;
        let isAnimating = false;
        const INTERVAL = 4000;
        const TOTAL = items.length;

        function render() {
            items.forEach(function (item, i) {
                item.classList.remove(
                    'is-active', 'is-prev', 'is-next',
                    'is-prev-far', 'is-next-far', 'is-hidden'
                );
                const mod = (((i - current) % TOTAL) + TOTAL) % TOTAL;
                if (mod === 0)              item.classList.add('is-active');
                else if (mod === 1)         item.classList.add('is-next');
                else if (mod === TOTAL - 1) item.classList.add('is-prev');
                else if (mod === 2)         item.classList.add('is-next-far');
                else if (mod === TOTAL - 2) item.classList.add('is-prev-far');
                else                        item.classList.add('is-hidden');
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === current);
            });
        }

        function goTo(index) {
            // Guard: Don't interrupt an ongoing 800ms animation
            if (isAnimating) return;

            let newIndex = ((index % TOTAL) + TOTAL) % TOTAL;
            if (newIndex === current) return;

            isAnimating = true;
            current = newIndex;
            render();

            setTimeout(function () {
                isAnimating = false;
            }, 800); // Matches the 0.8s CSS transition
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function start() { stop(); timer = setInterval(next, INTERVAL); }
        function stop() { if (timer) clearInterval(timer); timer = null; }

        // Controls
        if (nextBtn) nextBtn.addEventListener('click', function () { next(); start(); });
        if (prevBtn) prevBtn.addEventListener('click', function () { prev(); start(); });

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(parseInt(this.dataset.index, 10));
                start();
            });
        });

        items.forEach(function (item, i) {
            item.addEventListener('click', function () {
                if (i === current) return;
                goTo(i);
                start();
            });
        });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) stop();
            else if (started) start();
        });

        /* HOVER PAUSE (Only on images) */
        let hoveredCount = 0;
        function onSlideEnter() { hoveredCount++; stop(); }
        function onSlideLeave() {
            hoveredCount = Math.max(0, hoveredCount - 1);
            if (hoveredCount === 0 && started) start();
        }

        items.forEach(function (item) {
            item.addEventListener('mouseenter', onSlideEnter);
            item.addEventListener('mouseleave', onSlideLeave);
        });

        // Touch swipe
        let touchStartX = 0;
        slider.addEventListener('touchstart', function (e) {
            touchStartX = e.touches[0].clientX;
        }, { passive: true });
        
        slider.addEventListener('touchend', function (e) {
            const delta = e.changedTouches[0].clientX - touchStartX;
            if (Math.abs(delta) > 40) {
                if (delta < 0) next(); else prev();
                start();
            }
        }, { passive: true });

        render();

        // Scroll entrance
        function reveal() {
            if (started) return;
            started = true;
            slider.classList.add('is-visible');
            setTimeout(function () { start(); }, 1200);
        }

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        reveal();
                        observer.unobserve(slider);
                    }
                });
            }, { threshold: 0.35, rootMargin: '0px 0px -60px 0px' });
            observer.observe(slider);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCoverflow);
    } else {
        initCoverflow();
    }
})();