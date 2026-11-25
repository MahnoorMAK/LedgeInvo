{{-- resources/views/component/why-us.blade.php --}}

<section class="why-us">
    <style>
        .why-us *,
        .why-us *::before,
        .why-us *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .why-us {
            position: relative;
            width: 100%;
            background: linear-gradient(180deg, #f8fbff 0%, #eef5ff 100%);
            padding: 6rem 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #0f2547;
            overflow: hidden;
        }

        .why-us::before,
        .why-us::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.55;
            pointer-events: none;
            z-index: 0;
        }
        .why-us::before {
            width: 460px;
            height: 460px;
            background: radial-gradient(circle, #cfe1ff, transparent 70%);
            top: -120px;
            left: -120px;
        }
        .why-us::after {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #dbe9ff, transparent 70%);
            bottom: -140px;
            right: -140px;
        }

        .why-us__inner {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ============================================================
           HEADING
        ============================================================ */
        .why-us__head {
            text-align: center;
            max-width: 660px;
            margin: 0 auto 4rem;
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .why-us__head.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .why-us__badge {
            display: inline-block;
            padding: 0.4rem 0.95rem;
            background: rgba(31, 74, 140, 0.08);
            border: 1px solid rgba(31, 74, 140, 0.22);
            border-radius: 40px;
            color: #1f4a8c;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.9px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .why-us__head h2 {
            font-size: clamp(1.8rem, 3.6vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.8px;
            color: #0b1f3d;
            margin-bottom: 0.9rem;
        }

        .why-us__head h2 span {
            background: linear-gradient(135deg, #1f4a8c, #3a7bf0, #6aa8ff);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .why-us__head p {
            font-size: 1.02rem;
            line-height: 1.6;
            color: #52678a;
        }

        .why-us__accent {
            width: 120px;
            height: 3px;
            margin: 1.6rem auto 0;
            border-radius: 3px;
            background: linear-gradient(90deg,
                transparent 0%,
                #3a7bf0 30%,
                #6aa8ff 50%,
                #3a7bf0 70%,
                transparent 100%
            );
            background-size: 200% 100%;
            animation: whyAccentFlow 3s linear infinite;
        }

        @keyframes whyAccentFlow {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* ============================================================
           TIMELINE
        ============================================================ */
        .why-timeline {
            position: relative;
            padding: 1rem 0;
            z-index: 1;
        }

        /* Grey base line — runs BEHIND the circles */
        .why-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            background: linear-gradient(
                180deg,
                transparent 0%,
                #c8daf8 6%,
                #c8daf8 94%,
                transparent 100%
            );
            z-index: 1;
        }

        /* Blue progress line — runs BEHIND the circles */
        .why-timeline__progress {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 3px;
            height: 0;
            background: linear-gradient(180deg, #3a7bf0, #6aa8ff);
            border-radius: 3px;
            box-shadow: 0 0 16px rgba(58, 123, 240, 0.6);
            transition: height 0.4s ease-out;
            z-index: 1;
        }

        /* ============================================================
           TIMELINE ITEM — TEXT ⇄ IMAGE PARALLEL
        ============================================================ */
        .why-tl-item {
            position: relative;
            display: flex;
            align-items: stretch;
            justify-content: center;
            gap: 0;
            margin-bottom: 5rem;
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.9s ease, transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
            z-index: 2;              /* ⬅ above the line */
        }

        .why-tl-item:last-child { margin-bottom: 0; }

        .why-tl-item.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- Two parallel slots ---------- */
        .why-tl-content,
        .why-tl-image {
            width: calc(50% - 40px);
            flex: 0 0 calc(50% - 40px);
            display: flex;
            flex-direction: column;
        }

        .why-tl-content {
            justify-content: flex-start;
        }

        /* ---------- ODD rows: text LEFT, image RIGHT ---------- */
        .why-tl-item:nth-child(odd) .why-tl-content {
            order: 1;
            text-align: right;
            padding-right: 2.5rem;
            align-items: flex-end;
        }
        .why-tl-item:nth-child(odd) .why-tl-image {
            order: 3;
            padding-left: 2.5rem;
        }
        .why-tl-item:nth-child(odd) .why-tl-tags {
            justify-content: flex-end;
        }

        /* ---------- EVEN rows: image LEFT, text RIGHT ---------- */
        .why-tl-item:nth-child(even) .why-tl-content {
            order: 3;
            text-align: left;
            padding-left: 2.5rem;
            align-items: flex-start;
        }
        .why-tl-item:nth-child(even) .why-tl-image {
            order: 1;
            padding-right: 2.5rem;
        }
        .why-tl-item:nth-child(even) .why-tl-tags {
            justify-content: flex-start;
        }

        /* ============================================================
           CENTER DOT — perfect circle, sits ON TOP of the line
        ============================================================ */
        .why-tl-dot {
            order: 2;
            flex: 0 0 80px;
            width: 58px;
            height: 58px;
            min-width: 58px;
            min-height: 58px;
            max-width: 58px;
            max-height: 58px;
            aspect-ratio: 1 / 1;
            margin: 0 auto;
            border-radius: 50%;
            background: #ffffff;         /* solid white — hides line behind */
            border: 3px solid #3a7bf0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f4a8c;
            box-shadow:
                0 0 0 8px rgba(58, 123, 240, 0.10),
                0 8px 20px -6px rgba(31, 74, 140, 0.35);
            position: relative;
            z-index: 3;
            align-self: center;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .why-tl-dot svg {
            width: 24px;
            height: 24px;
            flex: 0 0 auto;
            position: relative;
            z-index: 4;
        }

        .why-tl-dot::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            border: 2px solid rgba(58, 123, 240, 0.5);
            animation: whyDotPulse 2.6s ease-out infinite;
            pointer-events: none;
            z-index: 2;
        }

        @keyframes whyDotPulse {
            0%   { transform: scale(1);    opacity: 0.8; }
            70%  { transform: scale(1.55); opacity: 0;   }
            100% { transform: scale(1.55); opacity: 0;   }
        }

        .why-tl-item:hover .why-tl-dot {
            transform: scale(1.08);
            box-shadow:
                0 0 0 12px rgba(58, 123, 240, 0.15),
                0 12px 26px -6px rgba(31, 74, 140, 0.5);
        }

        /* ---------- Text content ---------- */
        .why-tl-content h3 {
            font-size: clamp(1.2rem, 2vw, 1.4rem);
            font-weight: 800;
            color: #0b1f3d;
            margin-bottom: 0.6rem;
            letter-spacing: -0.4px;
            line-height: 1.3;
        }

        .why-tl-content p {
            font-size: 0.95rem;
            line-height: 1.7;
            color: #52678a;
            margin-bottom: 0.9rem;
        }

        .why-tl-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
        }

        .why-tl-tag {
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.3rem 0.7rem;
            border-radius: 40px;
            background: rgba(58, 123, 240, 0.10);
            color: #1f4a8c;
            border: 1px solid rgba(58, 123, 240, 0.22);
            letter-spacing: 0.3px;
        }

        /* ---------- Image — stretches to match text height ---------- */
        .why-tl-image {
            position: relative;
            min-height: 260px;
        }

        .why-tl-image img {
            width: 100%;
            height: 100%;
            min-height: 260px;
            object-fit: cover;
            display: block;
            border-radius: 20px;
            box-shadow:
                0 25px 50px -20px rgba(31, 74, 140, 0.4),
                0 0 0 1px rgba(180, 205, 240, 0.5);
            transition: transform 0.5s ease;
        }

        .why-tl-item:hover .why-tl-image img {
            transform: scale(1.04);
        }

        .why-tl-image::before {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: linear-gradient(135deg, #3a7bf0, #6aa8ff);
            z-index: -1;
            box-shadow: 0 12px 24px -8px rgba(58, 123, 240, 0.6);
            bottom: -14px;
        }

        .why-tl-item:nth-child(odd) .why-tl-image::before {
            right: -14px;
        }
        .why-tl-item:nth-child(even) .why-tl-image::before {
            left: -14px;
        }

        .why-tl-image::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 26px;
            right: 26px;
            height: 20px;
            background: radial-gradient(ellipse, rgba(58, 123, 240, 0.35), transparent 70%);
            filter: blur(12px);
            z-index: -2;
        }

        /* ============================================================
           STATS STRIP
        ============================================================ */
        .why-us__stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 5rem;
            padding: 2.5rem 2rem;
            border-radius: 24px;
            background: #ffffff;
            border: 1px solid #e0ebfb;
            box-shadow: 0 20px 40px -22px rgba(31, 74, 140, 0.3);
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .why-us__stats.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .why-stat { text-align: center; }

        .why-stat__value {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 800;
            color: #1f4a8c;
            letter-spacing: -0.6px;
            line-height: 1.1;
            margin-bottom: 0.4rem;
        }

        .why-stat__label {
            font-size: 0.78rem;
            color: #7a92b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* ============================================================
           RESPONSIVE — stack on mobile
        ============================================================ */
        @media (max-width: 900px) {
            .why-timeline::before,
            .why-timeline__progress { left: 24px; }

            .why-tl-item {
                display: grid;
                grid-template-columns: 48px 1fr;
                gap: 1.5rem;
                margin-bottom: 3.5rem;
            }

            .why-tl-item:nth-child(odd) .why-tl-content,
            .why-tl-item:nth-child(even) .why-tl-content {
                order: 0;
                grid-column: 2;
                text-align: left;
                padding: 0;
                width: 100%;
                flex: none;
                align-items: flex-start;
            }

            .why-tl-item:nth-child(odd) .why-tl-image,
            .why-tl-item:nth-child(even) .why-tl-image {
                order: 0;
                grid-column: 2;
                padding: 0;
                width: 100%;
                flex: none;
                margin-top: 0.5rem;
            }

            .why-tl-item:nth-child(odd) .why-tl-image img,
            .why-tl-item:nth-child(even) .why-tl-image img {
                max-width: 100%;
                height: 220px;
                min-height: 220px;
            }

            .why-tl-dot {
                order: 0;
                grid-column: 1;
                grid-row: 1 / span 2;
                justify-self: start;
                align-self: start;
                width: 48px;
                height: 48px;
                min-width: 48px;
                min-height: 48px;
                max-width: 48px;
                max-height: 48px;
                flex: none;
                margin: 0;
                aspect-ratio: 1 / 1;
            }

            .why-tl-item:nth-child(odd) .why-tl-tags,
            .why-tl-item:nth-child(even) .why-tl-tags {
                justify-content: flex-start;
            }

            .why-tl-item:nth-child(odd) .why-tl-image::before,
            .why-tl-item:nth-child(even) .why-tl-image::before {
                left: -10px;
                right: auto;
            }
        }

        @media (max-width: 600px) {
            .why-us {
                padding: 4rem 1.2rem;
            }
            .why-us__stats {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 2rem 1.2rem;
            }
            .why-tl-image img {
                height: 200px;
                min-height: 200px;
            }
        }
    </style>

    <div class="why-us__inner">

        {{-- HEADING --}}
        <div class="why-us__head" data-animate>
            <div class="why-us__badge">Why Choose Us?</div>
            <h2>Built for teams that <span>value their time</span></h2>
            <p>Here is why thousands of businesses trust our accounting platform every day.</p>
        </div>

        {{-- TIMELINE --}}
        <div class="why-timeline">
            <div class="why-timeline__progress" data-progress></div>

            {{-- Item 1 — text LEFT, image RIGHT --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-content">
                    <h3>Save 20+ Hours Every Week</h3>
                    <p>
                        Stop drowning in spreadsheets. Our automation handles data entry,
                        invoicing, and reconciliation so your team can focus on growth.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Auto-categorize</span>
                        <span class="why-tl-tag">Bank sync</span>
                    </div>
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </div>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop"
                        alt="Accounting spreadsheet with laptop and charts"
                        loading="lazy"
                    >
                </div>
            </div>

            {{-- Item 2 — image LEFT, text RIGHT --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=600&fit=crop"
                        alt="Accountant reviewing ledgers and documents"
                        loading="lazy"
                    >
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div class="why-tl-content">
                    <h3>Bank Level Security</h3>
                    <p>
                        Your financial data is protected by 256-bit encryption, SOC 2
                        compliance, and daily encrypted backups, every single day.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">SOC 2</span>
                        <span class="why-tl-tag">256-bit</span>
                    </div>
                </div>
            </div>

            {{-- Item 3 — text LEFT, image RIGHT --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-content">
                    <h3>Real-Time Insights</h3>
                    <p>
                        Live dashboards show exactly how your business is doing — cash flow,
                        profit margins, runway, and more — updated every second.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Live dashboard</span>
                        <span class="why-tl-tag">P&amp;L reports</span>
                    </div>
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"/>
                        <path d="M7 14l4-4 4 4 5-5"/>
                    </svg>
                </div>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1543286386-713bdd548da4?w=800&h=600&fit=crop"
                        alt="Financial chart and analytics on screen"
                        loading="lazy"
                    >
                </div>
            </div>

            {{-- Item 4 — image LEFT, text RIGHT --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&h=600&fit=crop"
                        alt="Business team discussing financial reports"
                        loading="lazy"
                    >
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="why-tl-content">
                    <h3>Built for Teams</h3>
                    <p>
                        Invite your accountants, assign roles, and collaborate on the
                        same books — live, with full activity history.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Multi-user</span>
                        <span class="why-tl-tag">Role based</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- STATS STRIP --}}
        <div class="why-us__stats" data-animate data-stats>
            <div class="why-stat">
                <div class="why-stat__value" data-count="50000" data-suffix="+">0</div>
                <div class="why-stat__label">Active Businesses</div>
            </div>
            <div class="why-stat">
                <div class="why-stat__value" data-count="4.2" data-suffix="B" data-prefix="$" data-decimals="1">0</div>
                <div class="why-stat__label">Processed Monthly</div>
            </div>
            <div class="why-stat">
                <div class="why-stat__value" data-count="99.9" data-suffix="%" data-decimals="1">0</div>
                <div class="why-stat__label">Uptime Guaranteed</div>
            </div>
        </div>

    </div>

    {{-- Inline script --}}
    <script>
        (function () {
            function initWhyUs() {
                var animatedEls = document.querySelectorAll('.why-us [data-animate]');
                if (!animatedEls.length) return;

                if (!('IntersectionObserver' in window)) {
                    animatedEls.forEach(function (el) { el.classList.add('is-visible'); });
                    runCounters(document);
                    return;
                }

                var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');

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
                        var eased = 1 - Math.pow(1 - progress, 3);
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

            function boot() {
                initWhyUs();
                initProgress();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', boot);
            } else {
                boot();
            }
        })();
    </script>

</section>