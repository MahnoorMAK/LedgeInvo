{{-- resources/views/component/aboutcompany.blade.php --}}

<section class="about-stats" id="aboutStats">
    <style>
        .about-stats *,
        .about-stats *::before,
        .about-stats *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .about-stats {
            width: 100%;
            background: #f8fafc; /* slate-50 */
            padding: 6rem 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #0f172a; /* slate-900 */
        }

        .about-stats__inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ============================================================
           HEADER
        ============================================================ */
        .about-stats__eyebrow {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #4f46e5; /* indigo accent */
            margin-bottom: 1.2rem;
            text-align: center;
        }

        .about-stats__heading {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: clamp(1.8rem, 3.4vw, 2.8rem);
            line-height: 1.25;
            letter-spacing: -0.4px;
            text-align: center;
            max-width: 850px;
            margin: 0 auto 4rem;
            color: #0f172a;
        }

        .about-stats .letter { display: inline; }

        /* ============================================================
           CARDS — all same width AND same height
        ============================================================ */
        .about-stats__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            align-items: stretch;
        }

        .stat-card {
            border-radius: 14px;
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            height: 420px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px -8px rgba(15, 23, 42, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(15, 23, 42, 0.15);
        }

        .stat-card--beige {
            background: linear-gradient(145deg, #eef2ff 0%, #e0e7ff 100%);
            border: 1px solid rgba(79, 70, 229, 0.12);
        }

        .stat-card--pink {
            background: linear-gradient(145deg, #f1f5f9 0%, #e2e8f0 100%);
            border: 1px solid rgba(148, 163, 184, 0.25);
        }

        .stat-card__value {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: clamp(3.5rem, 6vw, 5rem);
            line-height: 1;
            letter-spacing: -2px;
            color: #4f46e5; /* indigo accent for the number */
            margin-bottom: 1rem;
            display: flex;
            align-items: baseline;
        }

        .stat-card__suffix { font-size: 0.7em; margin-left: 2px; color: #4f46e5; }

        .stat-card__title {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: 1.05rem;
            color: #0f172a;
            margin-bottom: 1.2rem;
        }

        .stat-card__desc {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #475569; /* slate-600 */
            flex: 1;
        }

        .stat-card__footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1.2rem;
            border-top: 1px solid rgba(79, 70, 229, 0.15);
            font-size: 0.9rem;
            color: #0f172a;
        }

        .stat-card__footer svg {
            width: 20px;
            height: 20px;
            opacity: 0.8;
            color: #4f46e5;
        }

        /* Image card */
        .stat-card--image {
            padding: 0;
            background: #0f172a;
        }

        .stat-card--image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: saturate(0.9) contrast(1.02) brightness(1.02);
        }

        .stat-card__overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            padding: 1.75rem;
            background: linear-gradient(180deg,
                rgba(15, 23, 42, 0) 55%,
                rgba(15, 23, 42, 0.78) 100%);
        }

        .stat-card__caption {
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.2px;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 900px) {
            .about-stats__grid {
                grid-template-columns: 1fr 1fr;
            }
            .stat-card--image {
                grid-column: 1 / -1;
                height: 320px;
            }
            .about-stats { padding: 4rem 1.2rem; }
        }
        @media (max-width: 600px) {
            .about-stats__grid { grid-template-columns: 1fr; }
            .stat-card { height: 380px; }
            .stat-card--image { height: 300px; }
        }
    </style>

    <div class="about-stats__inner">

        <p class="about-stats__eyebrow" data-reveal>About Our Company</p>

        <h2 class="about-stats__heading" data-reveal>
            Helping individuals and businesses build a stronger financial future through expert insights strategic planning and proven solutions
        </h2>

        <div class="about-stats__grid">

            <div class="stat-card stat-card--beige">
                <div class="stat-card__value">
                    <span class="counter" data-target="98" data-duration="1800">0</span><span class="stat-card__suffix">%</span>
                </div>
                <h3 class="stat-card__title" data-reveal>Client satisfaction rate</h3>
                <p class="stat-card__desc" data-reveal>
                    Achieving high client satisfaction through expert advice and proven results
                </p>
                <div class="stat-card__footer">
                    <span>Globally</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card stat-card--pink">
                <div class="stat-card__value">
                    <span class="counter" data-target="40" data-duration="1800">0</span><span class="stat-card__suffix">+</span>
                </div>
                <h3 class="stat-card__title" data-reveal>Industries supported</h3>
                <p class="stat-card__desc" data-reveal>
                    Trusted financial expertise supporting businesses across different sectors
                </p>
                <div class="stat-card__footer">
                    <span>All industry</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M3 20V8l6-4 6 4v12"/>
                        <path d="M15 12h6v8h-6z"/>
                        <path d="M9 12v2M9 16v2"/>
                    </svg>
                </div>
            </div>

            <div class="stat-card stat-card--image">
                <img
                    src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=900&q=80"
                    alt="Professional at work"
                >
                <div class="stat-card__overlay">
                    <p class="stat-card__caption" data-reveal data-reveal-light="255,255,255" data-reveal-dark="255,255,255">
                        Join us and create meaningful impact
                    </p>
                </div>
            </div>

        </div>
    </div>

    <script>
        (function () {
            function init() {
                var section = document.getElementById('aboutStats');
                if (!section) return;

                var textEls   = section.querySelectorAll('[data-reveal]');
                var counters  = section.querySelectorAll('.counter');
                if (!textEls.length) return;

                /* ---- Step 1: Wrap each character ---- */
                function wrapNode(node) {
                    if (node.nodeType === 3) {
                        var frag = document.createDocumentFragment();
                        node.textContent.split('').forEach(function (ch) {
                            if (ch === ' ') {
                                frag.appendChild(document.createTextNode(' '));
                            } else {
                                var span = document.createElement('span');
                                span.className = 'letter';
                                span.textContent = ch;
                                frag.appendChild(span);
                            }
                        });
                        node.parentNode.replaceChild(frag, node);
                    } else if (node.nodeType === 1) {
                        Array.prototype.slice.call(node.childNodes).forEach(wrapNode);
                    }
                }

                textEls.forEach(function (el) {
                    Array.prototype.slice.call(el.childNodes).forEach(wrapNode);
                    el._letters = el.querySelectorAll('.letter');

                    var lightRGB = [203, 213, 225]; /* slate-300 — light start */
                    var darkRGB  = [ 15,  23,  42]; /* slate-900 — dark end  */

                    if (el.dataset.revealLight) {
                        lightRGB = el.dataset.revealLight.split(',').map(Number);
                    }
                    if (el.dataset.revealDark) {
                        darkRGB = el.dataset.revealDark.split(',').map(Number);
                    }
                    el._light = lightRGB;
                    el._dark  = darkRGB;
                });

                function mixColor(el, t) {
                    var L = el._light, D = el._dark;
                    var r = Math.round(L[0] + (D[0] - L[0]) * t);
                    var g = Math.round(L[1] + (D[1] - L[1]) * t);
                    var b = Math.round(L[2] + (D[2] - L[2]) * t);
                    return 'rgb(' + r + ',' + g + ',' + b + ')';
                }

                var ticking = false;

                function update() {
                    var vh = window.innerHeight;

                    textEls.forEach(function (el) {
                        var letters = el._letters;
                        if (!letters.length) return;

                        var rect = el.getBoundingClientRect();
                        var start = vh * 1.0;
                        var end   = vh * 0.25;
                        var progress = (start - rect.top) / (start - end);
                        progress = Math.max(0, Math.min(1, progress));

                        var n = letters.length;
                        var revealStart = 0.05;
                        var revealEnd   = 0.95;
                        var span = revealEnd - revealStart;

                        for (var i = 0; i < n; i++) {
                            var letterStart = revealStart + (i / n) * span;
                            var letterSpan  = Math.min(0.35, (span / n) * 4);

                            var t = (progress - letterStart) / letterSpan;
                            t = Math.max(0, Math.min(1, t));

                            letters[i].style.color = mixColor(el, t);
                        }
                    });

                    ticking = false;
                }

                function onScroll() {
                    if (!ticking) {
                        window.requestAnimationFrame(update);
                        ticking = true;
                    }
                }

                function countUp(el) {
                    if (el.dataset.counted === '1') return;
                    el.dataset.counted = '1';
                    var target   = parseInt(el.dataset.target, 10) || 0;
                    var duration = parseInt(el.dataset.duration, 10) || 1500;
                    var start    = performance.now();

                    (function step(now) {
                        var p = Math.min((now - start) / duration, 1);
                        var eased = 1 - Math.pow(1 - p, 3);
                        el.textContent = Math.floor(eased * target);
                        if (p < 1) requestAnimationFrame(step);
                        else el.textContent = target;
                    })(start);
                }

                var counterObs = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) {
                            counters.forEach(countUp);
                            counterObs.disconnect();
                        }
                    });
                }, { threshold: 0.3 });
                counterObs.observe(section);

                window.addEventListener('scroll', onScroll, { passive: true });
                window.addEventListener('resize', onScroll);
                update();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();
    </script>

</section>