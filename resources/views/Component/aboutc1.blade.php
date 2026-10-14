
<section class="hero">
    {{-- Background image + light overlay --}}
    <div class="hero__bg"></div>

>

    {{-- Hero content --}}
    <div class="hero__content">
        <p class="hero__eyebrow">About LedgeInvo</p>
        <h1 class="hero__title">
            Building stronger<br>
            financial foundations<br>
            through expertise
        </h1>
    </div>

    {{-- Trusted partners badge --}}
    <div class="hero__badge">
        <div class="hero__avatars">
            <img src="https://i.pravatar.cc/60?img=1" alt="">
            <img src="https://i.pravatar.cc/60?img=5" alt="">
            <img src="https://i.pravatar.cc/60?img=9" alt="">
        </div>
        <span><strong>4.5k</strong> trusted partners</span>
    </div>
</section>

<style>
* { margin: 0; padding: 0; box-sizing: border-box; }

.hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    font-family: 'Inter', system-ui, sans-serif;
    color: #ffffff;
    background: #0f172a; /* slate-900 fallback */
}

/* Background image — accounting themed */
.hero__bg {
    position: absolute;
    inset: 0;
    background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1600&q=80');
    background-size: cover;
    background-position: center;
    z-index: 0;
    filter: saturate(0.9) brightness(1.05);
}

/* Light indigo gradient overlay — matches the light professional palette */
.hero__bg::after {
    content: '';
    position: absolute;
    inset: 0;
    background:
        linear-gradient(180deg,
            rgba(15, 23, 42, 0.55) 0%,
            rgba(30, 41, 59, 0.35) 35%,
            rgba(30, 41, 59, 0.5) 65%,
            rgba(15, 23, 42, 0.82) 100%
        );
}

/* Navbar */
.hero__nav {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 3rem;
}

.hero__logo {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffffff;
    text-decoration: none;
    letter-spacing: 0.5px;
}

.hero__logo svg { width: 24px; height: 24px; }

.hero__menu {
    display: flex;
    gap: 2rem;
    list-style: none;
}

.hero__menu a {
    color: #ffffff;
    text-decoration: none;
    font-size: 0.92rem;
    font-weight: 500;
    opacity: 0.92;
    transition: opacity 0.2s, color 0.2s;
}

.hero__menu a:hover {
    opacity: 1;
    color: #c7d2fe;
}

.hero__cta {
    background: #ffffff;
    color: #4f46e5;
    padding: 0.7rem 1.4rem;
    border-radius: 999px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
}

.hero__cta:hover {
    transform: translateY(-1px);
    background: #eef2ff;
    box-shadow: 0 10px 24px -10px rgba(79, 70, 229, 0.55);
}

/* Hero content */
.hero__content {
    position: relative;
    z-index: 5;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 3rem;
    max-width: 720px;
}

.hero__eyebrow {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #c7d2fe;
    opacity: 0.95;
    margin-bottom: 1.5rem;
}

.hero__title {
    font-family: 'Playfair Display', serif;
    font-weight: 500;
    font-size: clamp(2.4rem, 5vw, 4rem);
    line-height: 1.08;
    letter-spacing: -0.5px;
    color: #ffffff;
    text-shadow: 0 4px 30px rgba(15, 23, 42, 0.55);
}

/* Bottom badge */
.hero__badge {
    position: relative;
    z-index: 5;
    display: flex;
    align-items: center;
    gap: 0.9rem;
    padding: 1.5rem 3rem 2rem;
    font-size: 0.95rem;
    color: #e2e8f0;
}

.hero__badge strong {
    color: #ffffff;
    font-weight: 700;
}

.hero__avatars { display: flex; }

.hero__avatars img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 2px solid #ffffff;
    object-fit: cover;
    margin-left: -10px;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.4);
}

.hero__avatars img:first-child { margin-left: 0; }

/* Responsive */
@media (max-width: 900px) {
    .hero__nav { padding: 1.2rem 1.5rem; }
    .hero__menu { display: none; }
    .hero__content { padding: 0 1.5rem; }
    .hero__badge { padding: 1.2rem 1.5rem 1.5rem; }
}

@media (max-width: 480px) {
    .hero__logo { font-size: 1.25rem; }
    .hero__cta { padding: 0.55rem 1.1rem; font-size: 0.82rem; }
    .hero__eyebrow { font-size: 0.65rem; letter-spacing: 2px; }
}
</style>