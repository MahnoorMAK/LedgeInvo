// ============================================================
// C2.JS — Why Us Component Logic
// ============================================================

document.addEventListener('DOMContentLoaded', function () {
    
    // 1. Initialize Scroll Animations
    function initWhyUs() {
        var animatedEls = document.querySelectorAll('.why-us [data-animate]');
        if (!animatedEls.length) return;

        // Fallback if IntersectionObserver is not supported
        if (!('IntersectionObserver' in window)) {
            animatedEls.forEach(function (el) { el.classList.add('is-visible'); });
            runCounters(document);
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');

                    // Trigger counters if this is the stats block
                    if (entry.target.hasAttribute('data-stats')) {
                        runCounters(entry.target);
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -40px 0px'
        });

        animatedEls.forEach(function (el) { observer.observe(el); });
    }

    // 2. Initialize Timeline Progress Bar
    function initProgress() {
        var timeline = document.querySelector('.why-timeline');
        var progress = document.querySelector('[data-progress]');
        if (!timeline || !progress) return;

        function update() {
            var rect = timeline.getBoundingClientRect();
            var vh = window.innerHeight;
            var total = rect.height;
            var scrolled = Math.min(Math.max(vh * 0.6 - rect.top, 0), total);
            var pct = (scrolled / total) * 100;
            progress.style.height = pct + '%';
        }

        window.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        update();
    }

    // 3. Number Counter Logic
    function runCounters(scope) {
        var root = scope || document;
        var counters = root.querySelectorAll('[data-count]');

        counters.forEach(function (el) {
            if (el.dataset.done === '1') return;
            el.dataset.done = '1';

            var target   = parseFloat(el.dataset.count);
            var decimals = parseInt(el.dataset.decimals || '0', 10);
            var prefix   = el.dataset.prefix || '';
            var suffix   = el.dataset.suffix || '';
            var duration = 1600;
            var start    = performance.now();

            function format(n) {
                var str = n.toFixed(decimals);
                if (decimals === 0) {
                    str = str.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                }
                return prefix + str + suffix;
            }

            function tick(now) {
                var elapsed = now - start;
                var progress = Math.min(elapsed / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3); // Ease out cubic
                var current = target * eased;
                el.textContent = format(current);

                if (progress < 1) {
                    requestAnimationFrame(tick);
                } else {
                    el.textContent = format(current);
                }
            }

            requestAnimationFrame(tick);
        });
    }

    // Run everything
    initWhyUs();
    initProgress();
});