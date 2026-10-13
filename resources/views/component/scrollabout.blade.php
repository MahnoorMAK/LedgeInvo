{{-- resources/views/component/scrollabout.blade.php --}}

<section class="scrollabout" id="scrollAbout">
    <style>
        .scrollabout *,
        .scrollabout *::before,
        .scrollabout *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .scrollabout {
            width: 100%;
            background: linear-gradient(180deg, #f8fbff 0%, #eef5ff 100%);
            padding: 5rem 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #0f2547;
        }

        .scrollabout__inner {
            max-width: 1150px;
            margin: 0 auto;
        }

        /* ============================================================
           HEADER — CENTERED + GRADUAL COLOR REVEAL
        ============================================================ */
        .scrollabout__eyebrow {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #93a8c9;
            margin-bottom: 1rem;
            text-align: center;
        }

        .scrollabout__title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 500;
            line-height: 1.2;
            letter-spacing: -0.5px;
            text-align: center;
            max-width: 820px;
            margin: 0 auto 3rem;
            color: #0b1f3d;
        }

        /* Each letter — color is set via inline style by JS (gradual) */
        .scrollabout__title .letter {
            display: inline;
            /* NO transition here — JS interpolates color smoothly per frame */
        }

        /* ============================================================
           LAYOUT — FORM + INFO PANEL
        ============================================================ */
        .scrollabout__layout {
            display: grid;
            grid-template-columns: 1.7fr 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        /* ============================================================
           FORM CARD
        ============================================================ */
        .sa-form-card {
            background: #ffffff;
            border: 1px solid #e0ebfb;
            border-radius: 1rem;
            padding: 2.2rem 2rem 2rem;
            box-shadow: 0 20px 40px -22px rgba(31, 74, 140, 0.25);
        }

        .sa-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem 2.5rem;
            margin-bottom: 1.8rem;
        }

        .sa-field {
            display: flex;
            flex-direction: column;
        }

        .sa-field--full {
            grid-column: 1 / -1;
        }

        .sa-field label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #1f4a8c;
            margin-bottom: 0.55rem;
            letter-spacing: 0.1px;
        }

        .sa-field input,
        .sa-field textarea {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #c8daf8;
            padding: 0.5rem 0 0.7rem;
            font-family: inherit;
            font-size: 0.95rem;
            color: #0f2547;
            outline: none;
            transition: border-color 0.2s;
        }

        .sa-field input::placeholder,
        .sa-field textarea::placeholder {
            color: #93a8c9;
        }

        .sa-field input:focus,
        .sa-field textarea:focus {
            border-bottom-color: #3a7bf0;
        }

        .sa-field textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.5;
            padding-top: 0.6rem;
        }

        .sa-submit-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 0.8rem;
        }

        .sa-submit {
            background: linear-gradient(135deg, #1f4a8c, #3a7bf0);
            color: #ffffff;
            border: none;
            padding: 0.85rem 1.6rem;
            border-radius: 0.6rem;
            font-family: inherit;
            font-size: 0.92rem;
            font-weight: 700;
            letter-spacing: 0.2px;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            cursor: pointer;
            box-shadow: 0 10px 22px -10px rgba(58, 123, 240, 0.55);
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        }

        .sa-submit:hover {
            background: linear-gradient(135deg, #173a70, #2f68d4);
            transform: translateY(-1px);
            box-shadow: 0 14px 26px -10px rgba(58, 123, 240, 0.7);
        }

        /* ============================================================
           INFO PANEL
        ============================================================ */
        .sa-info-card {
            background: #ffffff;
            border: 1px solid #e0ebfb;
            border-radius: 1rem;
            padding: 2rem 1.8rem;
            box-shadow: 0 20px 40px -22px rgba(31, 74, 140, 0.25);
        }

        .sa-info-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #93a8c9;
            margin-bottom: 1.3rem;
        }

        .sa-person {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            margin-bottom: 2rem;
        }

        .sa-person__avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, #e8f1ff, #dbe9ff);
            border: 2px solid #d0e2fa;
        }

        .sa-person__avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .sa-person__name {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0b1f3d;
            margin-bottom: 0.2rem;
        }

        .sa-person__role {
            font-size: 0.85rem;
            color: #52678a;
        }

        .sa-hours-title,
        .sa-office-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0b1f3d;
            margin-bottom: 0.9rem;
        }

        .sa-hours-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
            border-bottom: 1px solid #dce8fa;
            font-size: 0.9rem;
            color: #1f4a8c;
        }

        .sa-hours-row span:first-child {
            font-weight: 600;
        }

        .sa-hours-row span:last-child {
            color: #52678a;
        }

        .sa-office {
            margin-top: 2rem;
        }

        .sa-office p {
            font-size: 0.9rem;
            color: #52678a;
            line-height: 1.5;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 900px) {
            .scrollabout__layout {
                grid-template-columns: 1fr;
            }
            .sa-form-row {
                grid-template-columns: 1fr;
                gap: 1.4rem;
            }
            .scrollabout {
                padding: 3.5rem 1.2rem;
            }
            .sa-form-card,
            .sa-info-card {
                padding: 1.8rem 1.4rem;
            }
        }
    </style>

    <div class="scrollabout__inner">

        {{-- ── Header (centered, letters gradually change color on scroll) ── --}}
        <div class="scrollabout__eyebrow">Get in touch</div>
        <h2 class="scrollabout__title" id="scrollAboutTitle">
            Transform your financial<br>
            challenges into opportunities
        </h2>

        {{-- ── Layout ── --}}
        <div class="scrollabout__layout">

            {{-- ── Form card ── --}}
            <form class="sa-form-card" method="POST" action="{{ url('/contact') }}">
                @csrf

                <div class="sa-form-row">
                    <div class="sa-field">
                        <label for="sa-name">Full name</label>
                        <input type="text" id="sa-name" name="name" required>
                    </div>

                    <div class="sa-field">
                        <label for="sa-email">Email</label>
                        <input type="email" id="sa-email" name="email" required>
                    </div>

                    <div class="sa-field">
                        <label for="sa-phone">Phone</label>
                        <input type="tel" id="sa-phone" name="phone">
                    </div>

                    <div class="sa-field">
                        <label for="sa-address">Address</label>
                        <input type="text" id="sa-address" name="address">
                    </div>

                    <div class="sa-field sa-field--full">
                        <label for="sa-subject">Subject</label>
                        <input type="text" id="sa-subject" name="subject">
                    </div>

                    <div class="sa-field sa-field--full">
                        <label for="sa-message">Message</label>
                        <textarea id="sa-message" name="message"></textarea>
                    </div>
                </div>

                <div class="sa-submit-row">
                    <button type="submit" class="sa-submit">
                        Submit now
                        <span>→</span>
                    </button>
                </div>
            </form>

            {{-- ── Info panel ── --}}
            <aside class="sa-info-card">

                <div class="sa-info-label">Your point of contact</div>

                <div class="sa-person">
                    <div class="sa-person__avatar">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&h=200&fit=crop&crop=faces"
                             alt="Marcus Whitfield">
                    </div>
                    <div>
                        <div class="sa-person__name">Marcus Whitfield</div>
                        <div class="sa-person__role">Senior advisor, New client intake</div>
                    </div>
                </div>

                <div class="sa-hours-title">Office hours :</div>

                <div class="sa-hours-row">
                    <span>Mon – Thu</span>
                    <span>8:00 am – 6:00 pm</span>
                </div>

                <div class="sa-hours-row">
                    <span>Friday</span>
                    <span>8:00 am – 4:00 pm</span>
                </div>

                <div class="sa-office">
                    <div class="sa-office-title">Office :</div>
                    <p>410 Sandtown, California 94001, USA</p>
                </div>

            </aside>

        </div>

    </div>

    {{-- ── Gradual letter-by-letter color interpolation ── --}}
    <script>
        (function () {
            function initTitleReveal() {
                var title = document.getElementById('scrollAboutTitle');
                if (!title) return;

                // ── Step 1: Wrap each character in a <span class="letter"> ──
                var original = title.innerHTML.trim();
                var temp = document.createElement('div');
                temp.innerHTML = original;

                function wrapText(node) {
                    if (node.nodeType === 3) { // text node
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
                        Array.prototype.slice.call(node.childNodes).forEach(wrapText);
                    }
                }
                Array.prototype.slice.call(temp.childNodes).forEach(wrapText);
                title.innerHTML = temp.innerHTML;

                var letters = title.querySelectorAll('.letter');
                if (!letters.length) return;

                // ── Step 2: Color palette (light → dark, blue theme) ──
                // Multiple stops for a smooth gradient as progress increases
                var LIGHT = [200, 218, 248];   // #c8daf8
                var DARK  = [ 11,  31,  61];   // #0b1f3d

                // Helper: interpolate between light and dark
                function mixColor(t) {
                    // t = 0 → light, t = 1 → dark
                    var r = Math.round(LIGHT[0] + (DARK[0] - LIGHT[0]) * t);
                    var g = Math.round(LIGHT[1] + (DARK[1] - LIGHT[1]) * t);
                    var b = Math.round(LIGHT[2] + (DARK[2] - LIGHT[2]) * t);
                    return 'rgb(' + r + ',' + g + ',' + b + ')';
                }

                var ticking = false;

                function update() {
                    var rect = title.getBoundingClientRect();
                    var vh = window.innerHeight;

                    // Overall progress of heading through viewport
                    // 0 = heading just below viewport (light)
                    // 1 = heading well above mid-screen (all dark)
                    var start = vh * 1.0;
                    var end   = vh * 0.25;
                    var progress = (start - rect.top) / (start - end);
                    progress = Math.max(0, Math.min(1, progress));

                    // Give each letter a "reveal threshold" — spread across progress
                    // Add a small head/tail margin so first & last letters also animate smoothly
                    var n = letters.length;
                    var revealStart = 0.05;       // first letter starts darkening at 5% progress
                    var revealEnd   = 0.95;       // last letter finishes darkening at 95% progress
                    var span = revealEnd - revealStart;

                    letters.forEach(function (el, i) {
                        // Position of this letter across the 0..1 progress range
                        var letterStart = revealStart + (i / n) * span;
                        // How long each letter takes to darken (in progress units)
                        var letterSpan = Math.min(0.35, span / n * 4); // small, smooth per-letter span

                        var t = (progress - letterStart) / letterSpan;
                        t = Math.max(0, Math.min(1, t));

                        el.style.color = mixColor(t);
                    });

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
                document.addEventListener('DOMContentLoaded', initTitleReveal);
            } else {
                initTitleReveal();
            }
        })();
    </script>

</section>