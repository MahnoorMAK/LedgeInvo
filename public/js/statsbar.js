/* ============================================================
   STATS NAVBAR
   Bar spreads slowly (GPU), text appears fast, numbers count fast.
   ============================================================ */
(function () {
    'use strict';

    function initStatsBar() {
        const section = document.getElementById('statsBar');
        if (!section) return;

        const items = section.querySelectorAll('.stats-nav-item');
        if (!items.length) return;

        let hasAnimated = false;

        // Easing function
        function easeOutExpo(t) {
            return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        }

        // We bundle all counters into one single RAF loop to save CPU
        function animateAllNumbers(counters) {
            const startTime = performance.now();
            const maxDuration = 1800; // Extended to 1.8s for a smoother, less frantic count

            function tick(now) {
                let allDone = true;

                counters.forEach(function (c) {
                    const elapsed = now - startTime - c.delay;
                    
                    if (elapsed < 0) {
                        allDone = false;
                        return; // Wait for this counter's delay
                    }

                    const progress = Math.min(elapsed / maxDuration, 1);
                    
                    if (progress < 1) allDone = false;

                    const eased = easeOutExpo(progress);
                    const value = eased * c.target;

                    if (c.decimals > 0) {
                        c.numberEl.textContent = value.toFixed(c.decimals);
                    } else {
                        c.numberEl.textContent = Math.floor(value).toLocaleString();
                    }

                    // Force final exact value on completion
                    if (progress === 1) {
                        c.numberEl.textContent = c.decimals > 0
                            ? c.target.toFixed(c.decimals)
                            : Math.floor(c.target).toLocaleString();
                    }
                });

                if (!allDone) {
                    requestAnimationFrame(tick);
                }
            }

            requestAnimationFrame(tick);
        }

        function reveal() {
            if (hasAnimated) return;
            hasAnimated = true;

            section.classList.add('is-visible');

            const counters = [];

            items.forEach(function (item, i) {
                const target = parseFloat(item.dataset.target || '0');
                const decimals = parseInt(item.dataset.decimals || '0', 10);
                const numberEl = item.querySelector('.stats-nav-number');

                counters.push({
                    numberEl: numberEl,
                    target: target,
                    decimals: decimals,
                    delay: 300 + (i * 400) // Stagger: 300ms, 700ms, 1100ms, 1500ms
                });
            });

            // Fire the single unified animation loop
            animateAllNumbers(counters);
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
                threshold: 0.3,
                rootMargin: '0px 0px -50px 0px'
            });

            observer.observe(section);
        } else {
            reveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initStatsBar);
    } else {
        initStatsBar();
    }
})();