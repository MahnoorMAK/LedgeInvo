<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<nav class="navbar">

    <!-- Left Website Name -->
     <div class="brand">
        LedgeInvo
    </div>


    <!-- Right Side Side Pages -->
     <div class="nav-links">
        <a href="/">login</a>
        <a href="/contact">contact</a>
        <a href="/about">about</a>
    </div>

</nav>


@yield('content')
{{-- resources/views/layout/footer.blade.php --}}

<footer class="acc-footer">
    <div class="acc-footer__inner">

        {{-- LEFT: Brand + description + contact --}}
        <div class="acc-footer__brand">
            <div class="acc-footer__logo">
                <span class="acc-footer__logo-mark">L</span>edgeInvo
            </div>
            <p class="acc-footer__desc">
                The complete financial management solution for modern enterprises.
            </p>
            <ul class="acc-footer__contact">
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="M3 7l9 6 9-6"/>
                    </svg>
                    <a href="mailto:support@accountgo.com">support@LedgeInvo.com</a>
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <a href="tel:+15551234567">+1 (555) 123-4567</a>
                </li>
            </ul>
        </div>

        {{-- MIDDLE: Product links --}}
        <div class="acc-footer__col">
            <h4 class="acc-footer__heading">Product</h4>
            <ul class="acc-footer__links">
                <li><a href="#">Features</a></li>
                <li><a href="#">Demo</a></li>
            </ul>
        </div>

        {{-- MIDDLE: Company links --}}
        <div class="acc-footer__col">
            <h4 class="acc-footer__heading">Company</h4>
            <ul class="acc-footer__links">
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>

        {{-- RIGHT: Newsletter --}}
        <div class="acc-footer__col acc-footer__newsletter">
            <h4 class="acc-footer__heading">Stay Updated</h4>
            <p class="acc-footer__newsletter-desc">
                Subscribe to our newsletter for the latest accounting tips and updates.
            </p>

            <form class="acc-footer__form" onsubmit="event.preventDefault();">
                <input type="email" placeholder="Enter email" aria-label="Email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>

    </div>

    {{-- Divider + copyright --}}
    <div class="acc-footer__bottom">
        <p>© {{ date('Y') }} LedgeInvo. All rights reserved.</p>
    </div>

    <style>
        .acc-footer *,
        .acc-footer *::before,
        .acc-footer *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .acc-footer {
            position: relative;
            width: 100%;
            background: linear-gradient(180deg, #ffffff 0%, #f5f9ff 100%);
            color: #0f2547;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            padding: 4.5rem 2rem 1.5rem;
            overflow: hidden;
            isolation: isolate;
        }

        /* Soft ambient blue glow to match other sections */
        .acc-footer::before {
            content: '';
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, #cfe1ff, transparent 70%);
            filter: blur(100px);
            opacity: 0.5;
            bottom: -180px;
            right: -140px;
            pointer-events: none;
            z-index: 0;
        }

        .acc-footer__inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.4fr 0.8fr 0.8fr 1.4fr;
            gap: 3rem;
            max-width: 1300px;
            margin: 0 auto;
            align-items: start;
        }

        /* ---------- Brand ---------- */
        .acc-footer__logo {
            font-size: 1.6rem;
            font-weight: 800;
            color: #0b1f3d;
            letter-spacing: -0.4px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .acc-footer__logo-mark {
            background: linear-gradient(135deg, #1f4a8c, #3a7bf0, #6aa8ff);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 1px;
        }

        .acc-footer__desc {
            font-size: 0.92rem;
            line-height: 1.6;
            color: #52678a;
            margin-bottom: 1.4rem;
            max-width: 320px;
        }

        .acc-footer__contact {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .acc-footer__contact li {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.92rem;
        }

        .acc-footer__contact svg {
            width: 18px;
            height: 18px;
            color: #3a7bf0;
            flex-shrink: 0;
        }

        .acc-footer__contact a {
            color: #3a527a;
            text-decoration: none;
            transition: color 0.2s ease;
            font-weight: 500;
        }

        .acc-footer__contact a:hover {
            color: #1f4a8c;
        }

        /* ---------- Link columns ---------- */
        .acc-footer__heading {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0b1f3d;
            margin-bottom: 1.2rem;
            letter-spacing: -0.1px;
        }

        .acc-footer__links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .acc-footer__links a {
            color: #52678a;
            text-decoration: none;
            font-size: 0.92rem;
            transition: color 0.2s ease;
        }

        .acc-footer__links a:hover {
            color: #3a7bf0;
        }

        /* ---------- Newsletter ---------- */
        .acc-footer__newsletter-desc {
            font-size: 0.9rem;
            line-height: 1.6;
            color: #52678a;
            margin-bottom: 1rem;
            max-width: 320px;
        }

        .acc-footer__form {
            display: flex;
            max-width: 340px;
            border-radius: 50px;
            overflow: hidden;
            background: #ffffff;
            border: 1.5px solid #dbe6f7;
            box-shadow: 0 8px 22px -12px rgba(31, 74, 140, 0.25);
        }

        .acc-footer__form input {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: #0b1f3d;
            padding: 0.75rem 1.1rem;
            font-size: 0.88rem;
            font-family: inherit;
        }

        .acc-footer__form input::placeholder {
            color: #8ea3c2;
        }

        .acc-footer__form button {
            background: linear-gradient(135deg, #3a7bf0, #1f4a8c);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.88rem;
            border: none;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            font-family: inherit;
            letter-spacing: 0.2px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .acc-footer__form button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px -8px rgba(31, 74, 140, 0.55);
        }

        /* ---------- Bottom bar ---------- */
        .acc-footer__bottom {
            position: relative;
            z-index: 1;
            max-width: 1300px;
            margin: 3rem auto 0;
            padding-top: 1.5rem;
            border-top: 1px solid #e4ecf8;
            text-align: center;
            font-size: 0.85rem;
            color: #7a92b8;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 1000px) {
            .acc-footer__inner {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }
            .acc-footer__brand {
                grid-column: 1 / -1;
            }
            .acc-footer__newsletter {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            .acc-footer {
                padding: 3rem 1.2rem 1.2rem;
            }
            .acc-footer__inner {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .acc-footer__form {
                max-width: 100%;
            }
        }
    </style>
</footer>
