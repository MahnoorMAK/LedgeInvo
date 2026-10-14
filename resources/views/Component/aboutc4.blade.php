{{-- resources/views/component/discoverstrategies.blade.php --}}

<section class="discover" id="discoverStrategies">
    <style>
        .discover *,
        .discover *::before,
        .discover *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ---------- Section background (soft slate gradient) ---------- */
        .discover {
            width: 100%;
            padding: 5rem 2rem;
            background: linear-gradient(135deg,
                #f8fafc 0%,
                #eef2ff 35%,
                #e0e7ff 65%,
                #e2e8f0 100%);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #0f172a;                    /* slate-900 */
        }

        .discover__inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ---------- Card ---------- */
        .discover__card {
            background: #ffffff;
            border-radius: 16px;
            padding: 2.2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2.5rem;
            align-items: center;
            box-shadow: 0 30px 60px -30px rgba(15, 23, 42, 0.22);
            border: 1px solid rgba(79, 70, 229, 0.08);
        }

        /* ---------- Image (with scroll reveal) ---------- */
        .discover__image-wrap {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 16 / 11;
            background: #e2e8f0;               /* slate-200 */
        }

        .discover__image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            clip-path: inset(0 0 100% 0);
            will-change: clip-path;
            filter: saturate(0.92) contrast(1.02) brightness(1.02);
        }

        /* ---------- Right column ---------- */
        .discover__content {
            padding-right: 1rem;
        }

        .discover__title {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 500;
            font-size: clamp(1.6rem, 2.6vw, 2.2rem);
            line-height: 1.2;
            letter-spacing: -0.3px;
            color: #0f172a;                    /* slate-900 */
            margin-bottom: 1.2rem;
        }

        .discover__text {
            font-size: 0.9rem;
            line-height: 1.65;
            color: #475569;                    /* slate-600 */
            margin-bottom: 1.8rem;
            max-width: 400px;
        }

        /* ============================================================
           BUTTON — indigo, 3D, with animated shine
        ============================================================ */
        .discover__btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 1.5rem;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 600;
            letter-spacing: 0.2px;
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
            border: none;
            overflow: hidden;
            isolation: isolate;

            /* 3D indigo gradient + depth shadow */
            background: linear-gradient(180deg, #6366f1 0%, #4f46e5 100%);
            box-shadow:
                0 8px 18px -6px rgba(79, 70, 229, 0.55),
                0 2px 0 0 #818cf8 inset,
                0 -2px 0 0 #3730a3 inset,
                0 0 0 1px rgba(255, 255, 255, 0.08) inset;

            transition:
                transform 0.2s ease,
                box-shadow 0.25s ease;
        }

        .discover__btn:hover {
            transform: translateY(-2px);
            box-shadow:
                0 14px 24px -8px rgba(79, 70, 229, 0.65),
                0 2px 0 0 #818cf8 inset,
                0 -2px 0 0 #3730a3 inset,
                0 0 0 1px rgba(255, 255, 255, 0.12) inset;
        }

        .discover__btn:active {
            transform: translateY(0);
            box-shadow:
                0 4px 10px -4px rgba(79, 70, 229, 0.6),
                0 1px 0 0 #818cf8 inset,
                0 -1px 0 0 #3730a3 inset;
        }

        /* Moving shine streak */
        .discover__btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                120deg,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.4) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: skewX(-25deg);
            z-index: 1;
            pointer-events: none;
            animation: shine 3.2s ease-in-out infinite;
        }

        .discover__btn > * {
            position: relative;
            z-index: 2;
        }

        @keyframes shine {
            0%   { left: -75%; }
            55%  { left: 125%; }
            100% { left: 125%; }
        }

        .discover__btn .arrow {
            transition: transform 0.25s ease;
            font-size: 1rem;
            line-height: 1;
        }

        .discover__btn:hover .arrow {
            transform: translateX(4px);
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 800px) {
            .discover__card {
                grid-template-columns: 1fr;
                padding: 1.6rem;
                gap: 1.6rem;
            }
            .discover__content { padding-right: 0; }
            .discover { padding: 3.5rem 1.2rem; }
        }
    </style>

    <div class="discover__inner">
        <div class="discover__card">

            {{-- Left: image (reveals on scroll) --}}
            <div class="discover__image-wrap">
                <img
                    class="discover__image"
                    src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=900&q=80"
                    alt="Accountants working together"
                >
            </div>

            {{-- Right: text + button --}}
            <div class="discover__content">
                <h2 class="discover__title">
                    Discover better strategies<br>
                    for sustainable growth
                </h2>
                <p class="discover__text">
                    Unlock smarter financial solutions with expert guidance and strategic planning that helps your business achieve consistent, sustainable growth.
                </p>

                <a href="/contact" class="discover__btn">
                    <span>Get In Touch</span>
                    <span class="arrow">→</span>
                </a>
            </div>

        </div>
    </div>

    <script>
        (function () {
            function init() {
                var section = document.getElementById('discoverStrategies');
                if (!section) return;

                var image = section.querySelector('.discover__image');
                if (!image) return;

                var ticking = false;

                function update() {
                    var vh = window.innerHeight;
                    var rect = image.getBoundingClientRect();

                    var start = vh * 0.90;
                    var end   = vh * 0.35;

                    var progress = (start - rect.top) / (start - end);
                    progress = Math.max(0, Math.min(1, progress));

                    var bottomInset = (1 - progress) * 100;
                    image.style.clipPath = 'inset(0 0 ' + bottomInset + '% 0)';

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