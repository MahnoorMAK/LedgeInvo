/**
 * Service Hero — "Cinematic Scrub" (V2)
 * - Handles the "plays 1s then stops" bug
 * - Waits for actual duration before scrubbing
 * - No autoplay fighting
 * - Fallback-safe
 */

(function () {
    'use strict';

    var section = document.getElementById('service-hero');
    if (!section) return;

    if (section.dataset.svhInit === '1') return;
    section.dataset.svhInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var video = section.querySelector('[data-svh-video]');
    var fallback = section.querySelector('[data-svh-fallback]');
    var progressFill = section.querySelector('[data-svh-progress]');
    var acts = {
        intro: section.querySelector('[data-svh-act="intro"]'),
        mid:   section.querySelector('[data-svh-act="mid"]'),
        outro: section.querySelector('[data-svh-act="outro"]')
    };

    /* ==========================================================
       CRITICAL: Force the video into a controlled state
       — Disable autoplay, loop, and playback entirely.
       — We only ever set currentTime. The video never "plays".
       ========================================================== */
    if (video) {
        video.pause();
        video.autoplay = false;
        video.loop = false;
        video.controls = false;
        video.setAttribute('playsinline', '');
        video.setAttribute('muted', '');
        video.muted = true;
    }

    /* ==========================================================
       VIDEO READINESS — the safest way to know when we can scrub
       ========================================================== */
    var videoReady = false;
    var videoDuration = 0;

    function markReady() {
        if (!video) return;
        var d = video.duration;
        if (!d || isNaN(d) || !isFinite(d) || d <= 0) {
            // Duration not ready yet — try again shortly
            setTimeout(markReady, 100);
            return;
        }

        videoDuration = d;
        videoReady = true;

        // Pause again to be 100% sure
        try { video.pause(); } catch (e) {}

        // Hide fallback poster
        if (fallback) fallback.classList.add('is-hidden');

        // Force an initial frame so the video isn't black
        try { video.currentTime = 0.001; } catch (e) {}

        // Recompute now that we're ready
        update();
    }

    if (video) {
        if (video.readyState >= 1) {
            // Metadata already loaded (cached / fast load)
            markReady();
        } else {
            video.addEventListener('loadedmetadata', markReady, { once: true });

            // Aggressive fallback: poll in case loadedmetadata never fires
            // (some browsers with lazy video loading skip it)
            var pollCount = 0;
            var pollTimer = setInterval(function () {
                pollCount++;
                if (video.duration && !isNaN(video.duration) && video.duration > 0) {
                    clearInterval(pollTimer);
                    markReady();
                } else if (pollCount > 50) {
                    // 5 seconds of waiting — give up, keep poster
                    clearInterval(pollTimer);
                }
            }, 100);
        }

        video.addEventListener('error', function () {
            if (video) video.style.display = 'none';
            if (fallback) fallback.classList.remove('is-hidden');
        });

        // Some browsers pause the video after a seek when autoplay is disabled.
        // Ensure it stays paused.
        video.addEventListener('play', function () {
            video.pause();
        });
    }

    /* ==========================================================
       SCROLL PROGRESS + VIDEO SCRUB
       ========================================================== */
    var scrollProgress = 0;
    var targetVideoTime = 0;
    var currentVideoTime = 0;
    var lastSetTime = -1;
    var ticking = false;

    function computeScrollProgress() {
        var rect = section.getBoundingClientRect();
        var totalScrollable = section.offsetHeight - window.innerHeight;
        if (totalScrollable <= 0) return 0;
        var scrolled = -rect.top;
        var p = scrolled / totalScrollable;
        return Math.max(0, Math.min(1, p));
    }

    function onScroll() {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(update);
    }

    function update() {
        ticking = false;
        scrollProgress = computeScrollProgress();

        // ---- Progress bar ----
        if (progressFill) {
            progressFill.style.width = (scrollProgress * 100) + '%';
        }

        // ---- Video scrub ----
        // CRITICAL: only scrub when we have a valid duration
        if (video && videoReady && videoDuration > 0) {
            targetVideoTime = scrollProgress * Math.max(videoDuration - 0.1, 0);

            // Lerp toward target for smoothness
            var diff = targetVideoTime - currentVideoTime;
            if (Math.abs(diff) < 0.01) {
                currentVideoTime = targetVideoTime;
            } else {
                currentVideoTime += diff * 0.18;
            }

            // Only seek if the change is meaningful (avoids thrashing)
            if (Math.abs(currentVideoTime - lastSetTime) > 0.02) {
                try {
                    video.currentTime = currentVideoTime;
                    lastSetTime = currentVideoTime;
                } catch (e) {
                    // Silent — some browsers throw if seeking too rapidly
                }
            }
        }

        updateActs(scrollProgress);
    }

    function updateActs(p) {
        var introOpacity = smoothstep(0.30, 0.42, p, true);
        var midOpacity   = smoothstep(0.28, 0.42, p) * smoothstep(0.62, 0.74, p, true);
        var outroOpacity = smoothstep(0.60, 0.75, p);

        if (acts.intro) {
            acts.intro.style.opacity = introOpacity;
            acts.intro.style.transform =
                'translateY(' + ((1 - introOpacity) * -40) + 'px) scale(' +
                (1 - (1 - introOpacity) * 0.06) + ')';
            acts.intro.style.pointerEvents = introOpacity > 0.4 ? 'auto' : 'none';
        }
        if (acts.mid) {
            acts.mid.style.opacity = midOpacity;
            acts.mid.style.transform =
                'translateY(' + ((1 - midOpacity) * 30) + 'px)';
            acts.mid.style.pointerEvents = midOpacity > 0.4 ? 'auto' : 'none';
        }
        if (acts.outro) {
            acts.outro.style.opacity = outroOpacity;
            acts.outro.style.transform =
                'translateY(' + ((1 - outroOpacity) * 30) + 'px)';
            acts.outro.style.pointerEvents = outroOpacity > 0.4 ? 'auto' : 'none';
        }

        if (outroOpacity > 0.8 && !countersStarted) {
            countersStarted = true;
            startCounters();
        }
    }

    function smoothstep(a, b, x, reverse) {
        var t = (x - a) / (b - a);
        if (t < 0) t = 0;
        if (t > 1) t = 1;
        t = t * t * (3 - 2 * t);
        return reverse ? 1 - t : t;
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();

    /* ==========================================================
       COUNTERS
       ========================================================== */
    var countersStarted = false;

    function startCounters() {
        var counters = section.querySelectorAll('[data-count]');
        counters.forEach(function (el) {
            var target = parseFloat(el.dataset.count);
            var suffix = el.dataset.suffix || '';
            var duration = 1600;
            var start = performance.now();

            function tick(now) {
                var t = Math.min((now - start) / duration, 1);
                var eased = t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
                var value = target * eased;
                el.textContent = formatNumber(value, target) + suffix;
                if (t < 1) requestAnimationFrame(tick);
                else el.textContent = formatNumber(target, target) + suffix;
            }
            function formatNumber(n, tgt) {
                if (tgt < 100) return n.toFixed(2).replace(/\.?0+$/, '');
                return Math.floor(n).toLocaleString();
            }
            requestAnimationFrame(tick);
        });
    }

    /* ==========================================================
       PARTICLES
       ========================================================== */
    if (!reduced) {
        var canvas = section.querySelector('[data-svh-particles]');
        if (canvas) initParticles(canvas);
    }

    function initParticles(canvas) {
        var ctx = canvas.getContext('2d');
        if (!ctx) return;

        var dpr = Math.min(window.devicePixelRatio || 1, 2);
        var particles = [];
        var COUNT = 50;
        var animId = null;
        var visible = true;

        function resize() {
            var rect = section.getBoundingClientRect();
            var w = rect.width, h = rect.height;
            canvas.width = w * dpr;
            canvas.height = h * dpr;
            canvas.style.width = w + 'px';
            canvas.style.height = h + 'px';
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.scale(dpr, dpr);
            build(w, h);
        }

        function build(w, h) {
            particles = [];
            for (var i = 0; i < COUNT; i++) {
                particles.push({
                    x: Math.random() * w,
                    y: Math.random() * h,
                    r: Math.random() * 1.8 + 0.4,
                    vx: (Math.random() - 0.5) * 0.35,
                    vy: (Math.random() - 0.5) * 0.35,
                    hue: Math.random() > 0.7 ? 'magenta' : 'violet',
                    alpha: Math.random() * 0.5 + 0.3
                });
            }
        }

        function draw() {
            var rect = section.getBoundingClientRect();
            var w = rect.width, h = rect.height;
            ctx.clearRect(0, 0, w, h);

            particles.forEach(function (p) {
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < 0) p.x = w;
                if (p.x > w) p.x = 0;
                if (p.y < 0) p.y = h;
                if (p.y > h) p.y = 0;

                var color = p.hue === 'magenta'
                    ? 'rgba(232, 121, 249, ' + p.alpha + ')'
                    : 'rgba(168, 85, 247, ' + p.alpha + ')';
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = color;
                ctx.shadowColor = color;
                ctx.shadowBlur = 12;
                ctx.fill();
            });
            ctx.shadowBlur = 0;

            for (var i = 0; i < particles.length; i++) {
                for (var j = i + 1; j < particles.length; j++) {
                    var dx = particles[i].x - particles[j].x;
                    var dy = particles[i].y - particles[j].y;
                    var d = Math.sqrt(dx * dx + dy * dy);
                    if (d < 130) {
                        var a = (1 - d / 130) * 0.16;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = 'rgba(168, 85, 247, ' + a + ')';
                        ctx.lineWidth = 0.6;
                        ctx.stroke();
                    }
                }
            }

            if (visible) animId = requestAnimationFrame(draw);
        }

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                visible = false;
                if (animId) cancelAnimationFrame(animId);
                animId = null;
            } else {
                visible = true;
                if (!animId) draw();
            }
        });

        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        if (!visible) {
                            visible = true;
                            if (!animId) draw();
                        }
                    } else {
                        visible = false;
                        if (animId) { cancelAnimationFrame(animId); animId = null; }
                    }
                });
            }, { threshold: 0 });
            io.observe(section);
        }

        resize();
        draw();

        var rt;
        window.addEventListener('resize', function () {
            clearTimeout(rt);
            rt = setTimeout(resize, 200);
        });
    }
})();