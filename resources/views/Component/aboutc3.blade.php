{{-- resources/views/component/whatdrivesus.blade.php --}}

<section class="wdu" id="whatDrivesUs">
    <style>
        .wdu *,
        .wdu *::before,
        .wdu *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wdu {
            width: 100%;
            background: #f8fafc;                 /* slate-50 */
            padding: 6rem 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #1a120e;
            overflow: hidden;
        }

        .wdu__inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ============================================================
           TOP — SMALL IMAGE LEFT + TEXT RIGHT
        ============================================================ */
        .wdu__top {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 4rem;
            align-items: start;
            margin-bottom: 5rem;
        }

        /* ---------- Image (small, portrait) ---------- */
        .wdu__image-wrap {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            width: 100%;
            aspect-ratio: 4 / 5;
            background: #e2e8f0;                 /* slate-200 */
            box-shadow: 0 20px 40px -16px rgba(15, 23, 42, 0.18);
        }

        .wdu__image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            clip-path: inset(0 0 100% 0);
            will-change: clip-path;
            filter: saturate(0.92) contrast(1.02) brightness(1.02);
        }

        /* ---------- Right column ---------- */
        .wdu__right {
            display: flex;
            flex-direction: column;
            padding-top: 0.5rem;
        }

        .wdu__eyebrow {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #4f46e5;                      /* indigo accent */
            margin-bottom: 1.2rem;
        }

        .wdu__heading {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: clamp(1.6rem, 2.6vw, 2.2rem);
            line-height: 1.22;
            letter-spacing: -0.3px;
            color: #0f172a;                      /* slate-900 */
            margin-bottom: 2rem;
            max-width: 520px;
        }

        .wdu__heading .letter { display: inline; }

        .wdu__paragraph {
            font-size: 0.92rem;
            line-height: 1.7;
            color: #475569;                      /* slate-600 */
            max-width: 460px;
        }

        /* ============================================================
           BOTTOM — 4 FEATURE COLUMNS
        ============================================================ */
        .wdu__features {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            border-top: 1px solid rgba(79, 70, 229, 0.18);   /* indigo tint */
            padding-top: 3rem;
        }

        .wdu__feature {
            display: flex;
            flex-direction: column;
        }

        .wdu__feature-num {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #4f46e5;                      /* indigo accent */
            margin-bottom: 3.5rem;
        }

        .wdu__feature-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: 1.1rem;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .wdu__feature-desc {
            font-size: 0.86rem;
            line-height: 1.6;
            color: #64748b;                      /* slate-500 */
        }

        /* ============================================================
           LINE-BY-LINE REVEAL
        ============================================================ */
        .wdu [data-line] {
            opacity: 0;
            transform: translateY(22px);
            transition:
                opacity 0.7s ease-out,
                transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .wdu [data-line].is-shown {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 900px) {
            .wdu__top {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                margin-bottom: 4rem;
            }
            .wdu__image-wrap {
                max-width: 320px;
                margin: 0 auto;
            }
            .wdu__right { padding-top: 0; }
            .wdu__features {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem 1.5rem;
            }
            .wdu { padding: 4rem 1.2rem; }
        }
        @media (max-width: 600px) {
            .wdu__features { grid-template-columns: 1fr; }
            .wdu__feature-num { margin-bottom: 1.5rem; }
        }
    </style>

    <div class="wdu__inner">

        {{-- ── TOP ROW ── --}}
        <div class="wdu__top">

            {{-- Image --}}
            <div class="wdu__image-wrap">
                <img
                    class="wdu__image"
                    src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=700&q=80"
                    alt="Financial advisor"
                >
            </div>

            {{-- Right column --}}
            <div class="wdu__right">
                <p class="wdu__eyebrow" data-line>What Drives Us</p>

                <h2 class="wdu__heading" data-reveal>
                    Guiding businesses with expert insights and customized financial strategies for success
                </h2>

                <p class="wdu__paragraph" data-line>
                    Guided by integrity, expertise, and a dedication to excellence, we deliver tailored financial solutions that support sustainable success. We focus on understanding each client's unique goals and creating strategies that drive measurable impact over time.
                </p>
            </div>

        </div>

        {{-- ── BOTTOM ROW — 4 FEATURES ── --}}
        <div class="wdu__features">

            <div class="wdu__feature">
                <span class="wdu__feature-num" data-line>[ 01 ]</span>
                <h3 class="wdu__feature-title" data-line>Integrity first</h3>
                <p class="wdu__feature-desc" data-line>
                    We build every client relationship on honesty, transparency and trust.
                </p>
            </div>

            <div class="wdu__feature">
                <span class="wdu__feature-num" data-line>[ 02 ]</span>
                <h3 class="wdu__feature-title" data-line>Client-centered approach</h3>
                <p class="wdu__feature-desc" data-line>
                    Your financial objectives shape every solution we recommend.
                </p>
            </div>

            <div class="wdu__feature">
                <span class="wdu__feature-num" data-line>[ 03 ]</span>
                <h3 class="wdu__feature-title" data-line>Strategic excellence</h3>
                <p class="wdu__feature-desc" data-line>
                    We deliver practical financial solutions backed by expert insights.
                </p>
            </div>

            <div class="wdu__feature">
                <span class="wdu__feature-num" data-line>[ 04 ]</span>
                <h3 class="wdu__feature-title" data-line>Long-term success</h3>
                <p class="wdu__feature-desc" data-line>
                    Our focus is creating sustainable growth and lasting financial value.
                </p>
            </div>

        </div>

    </div>

    <script>
        (function () {
            function init() {
                var section = document.getElementById('whatDrivesUs');
                if (!section) return;

                var image      = section.querySelector('.wdu__image');
                var heading    = section.querySelector('.wdu__heading');
                var lineEls    = section.querySelectorAll('[data-line]');

                /* ============================================================
                   1. WRAP HEADING LETTERS
                ============================================================ */
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
                Array.prototype.slice.call(heading.childNodes).forEach(wrapNode);
                var letters = heading.querySelectorAll('.letter');

                /* Palette: slate-300 → slate-900 (light to dark) */
                var LIGHT = [203, 213, 225];   /* slate-300 */
                var DARK  = [ 15,  23,  42];   /* slate-900 */

                function mixColor(t) {
                    var r = Math.round(LIGHT[0] + (DARK[0] - LIGHT[0]) * t);
                    var g = Math.round(LIGHT[1] + (DARK[1] - LIGHT[1]) * t);
                    var b = Math.round(LIGHT[2] + (DARK[2] - LIGHT[2]) * t);
                    return 'rgb(' + r + ',' + g + ',' + b + ')';
                }

                /* ============================================================
                   2. LINE-BY-LINE REVEAL
                ============================================================ */
                var lineObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            var el = entry.target;

                            var siblings = Array.prototype.slice.call(
                                el.parentNode.querySelectorAll('[data-line]')
                            );
                            var idx = siblings.indexOf(el);
                            var delay = Math.max(0, idx) * 120;

                            setTimeout(function () {
                                el.classList.add('is-shown');
                            }, delay);

                            lineObserver.unobserve(el);
                        }
                    });
                }, {
                    threshold: 0.15,
                    rootMargin: '0px 0px -8% 0px'
                });

                lineEls.forEach(function (el) {
                    lineObserver.observe(el);
                });

                /* ============================================================
                   3. SCROLL-DRIVEN: image reveal + heading colors
                ============================================================ */
                var ticking = false;

                function update() {
                    var vh = window.innerHeight;

                    /* --- Image reveal --- */
                    if (image) {
                        var iRect = image.getBoundingClientRect();
                        var iStart = vh * 0.90;
                        var iEnd   = vh * 0.40;
                        var iP = (iStart - iRect.top) / (iStart - iEnd);
                        iP = Math.max(0, Math.min(1, iP));

                        var bottomInset = (1 - iP) * 100;
                        image.style.clipPath = 'inset(0 0 ' + bottomInset + '% 0)';
                    }

                    /* --- Heading letters light → dark --- */
                    if (letters.length) {
                        var hRect = heading.getBoundingClientRect();
                        var hStart = vh * 1.0;
                        var hEnd   = vh * 0.30;
                        var hP = (hStart - hRect.top) / (hStart - hEnd);
                        hP = Math.max(0, Math.min(1, hP));

                        var n = letters.length;
                        var revealStart = 0.05;
                        var revealEnd   = 0.95;
                        var span = revealEnd - revealStart;

                        for (var i = 0; i < n; i++) {
                            var letterStart = revealStart + (i / n) * span;
                            var letterSpan  = Math.min(0.35, (span / n) * 4);
                            var t = (hP - letterStart) / letterSpan;
                            t = Math.max(0, Math.min(1, t));
                            letters[i].style.color = mixColor(t);
                        }
                    }

                    ticking = false;
                }

                function onScroll() {
                    if (!ticking) {
                        window.requestAnimationFrame(update);
                        ticking = true;
                    }
                }

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