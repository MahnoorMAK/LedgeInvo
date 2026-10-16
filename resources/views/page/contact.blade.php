{{-- resources/views/page/contact.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contact Us | LedgeInvo</title>

    {{-- Google Fonts: Playfair Display (serif) + Inter (sans) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #ffffff;
        }

        /* ============================================================
           HERO SECTION
        ============================================================ */
        .hero {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: #2a1f1c;
        }

        .hero__bg {
            position: absolute;
            inset: 0;
            background-image: url('https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=1600&q=80');
            background-size: cover;
            background-position: center;
            z-index: 0;
        }

        .hero__bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg,
                    rgba(20, 10, 5, 0.55) 0%,
                    rgba(20, 10, 5, 0.35) 35%,
                    rgba(20, 10, 5, 0.55) 65%,
                    rgba(20, 10, 5, 0.85) 100%
                );
        }

        /* ============================================================
           NAVBAR
        ============================================================ */
        .navbar {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 2.5rem;
            width: 100%;
        }

        .navbar__logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.45rem;
            text-decoration: none;
        }

        .navbar__logo-mark {
            width: 26px;
            height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .navbar__logo-mark svg {
            width: 100%;
            height: 100%;
        }

        .navbar__menu {
            display: flex;
            align-items: center;
            gap: 2.2rem;
            list-style: none;
        }

        .navbar__menu a {
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.2px;
            opacity: 0.92;
            transition: opacity 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .navbar__menu a:hover {
            opacity: 1;
        }

        .navbar__menu .caret {
            font-size: 0.7rem;
            opacity: 0.85;
        }

        .navbar__cta {
            background: #ffffff;
            color: #1a120e;
            padding: 0.7rem 1.4rem;
            border-radius: 999px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .navbar__cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px -10px rgba(0, 0, 0, 0.6);
        }

        .navbar__cta .arrow {
            transition: transform 0.25s;
        }

        .navbar__cta:hover .arrow {
            transform: translateX(3px);
        }

        /* ============================================================
           HERO CONTENT
        ============================================================ */
        .hero__content {
            position: relative;
            z-index: 5;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            text-align: center;
            padding: 0 1.5rem 6rem;
        }

        .hero__eyebrow {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #ffffff;
            opacity: 0.9;
            margin-bottom: 1.2rem;
        }

        .hero__title {
            font-family: 'Playfair Display', serif;
            font-weight: 500;
            font-size: clamp(2.6rem, 6.5vw, 5.2rem);
            line-height: 1.05;
            letter-spacing: -0.5px;
            color: #ffffff;
            max-width: 1000px;
            text-shadow: 0 4px 30px rgba(0, 0, 0, 0.35);
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 900px) {
            .navbar {
                padding: 1.2rem 1.5rem;
            }

            .navbar__menu {
                display: none;
            }

            .hero__content {
                padding-bottom: 4rem;
            }
        }

        @media (max-width: 480px) {
            .navbar__logo {
                font-size: 1.25rem;
            }

            .navbar__cta {
                padding: 0.55rem 1.1rem;
                font-size: 0.82rem;
            }

            .hero__eyebrow {
                font-size: 0.65rem;
                letter-spacing: 2px;
            }
        }
    </style>
</head>
<body>

<section class="hero">

    {{-- Background image + dark overlay --}}
    <div class="hero__bg"></div>

    {{-- ── Navbar ── --}}
    <nav class="navbar">
        <a href="/" class="navbar__logo">
            <span class="navbar__logo-mark">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 4h18L3 20h18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            LedgeInvo
        </a>

        <ul class="navbar__menu">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/pages">Pages <span class="caret">▾</span></a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <a href="/contact" class="navbar__cta">
            Let's talk
            <span class="arrow">→</span>
        </a>
    </nav>

    {{-- ── Hero content ── --}}
    <div class="hero__content">
        <div class="hero__eyebrow">Contact Us</div>
        <h1 class="hero__title">
            Have questions?<br>
            We're here to help
        </h1>
    </div>

</section>

{{-- ✅ All includes moved INSIDE <body>, before </body> --}}
@include('component.scrollabout')
@include('component.faqs')
@include('component.popupmsg')

</body>
</html>