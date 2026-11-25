{{-- resources/views/component/hero.blade.php --}}
<section class="hero-section">

  <style>
    /* Scope all styles to this component */
    .hero-section * { margin: 0; padding: 0; box-sizing: border-box; }

    .hero-section {
      position: relative;
      width: 100%;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, #d4d9c4 0%, #e8e4d9 35%, #f0e6dc 65%, #e5d5cc 100%);
      font-family: system-ui, sans-serif;
      color: #4a4530;
      overflow-x: hidden;
      padding-bottom: 1.5rem;
    }

    /* ---------- HERO WRAP ---------- */
    .hero-section .hero-wrap {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1.5rem;
      margin: 1.5rem 0;
    }

    .hero-section .hero {
      position: relative;
      width: 100%;
      max-width: 1300px;
      height: 70vh;
      min-height: 480px;
      border-radius: 2rem;
      overflow: hidden;
      box-shadow: 0 25px 60px -20px rgba(80, 90, 60, 0.5),
                  0 0 0 1px rgba(180, 190, 150, 0.35);
    }

    /* Image slides */
    .hero-section .slide {
      position: absolute;
      inset: 0;
      opacity: 0;
      animation: heroSlideshow 20s infinite;
      background-size: cover;
      background-position: center;
    }

    .hero-section .slide:nth-child(1) {
      background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1600&h=900&fit=crop');
      animation-delay: 0s;
    }
    .hero-section .slide:nth-child(2) {
      background-image: url('https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=1600&h=900&fit=crop');
      animation-delay: -5s;
    }
    .hero-section .slide:nth-child(3) {
      background-image: url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1600&h=900&fit=crop');
      animation-delay: -10s;
    }
    .hero-section .slide:nth-child(4) {
      background-image: url('https://images.unsplash.com/photo-1439066615861-d1af74d74000?w=1600&h=900&fit=crop');
      animation-delay: -15s;
    }

    @keyframes heroSlideshow {
      0%    { opacity: 0; transform: scale(1.08); }
      5%    { opacity: 1; }
      25%   { opacity: 1; transform: scale(1.0); }
      30%   { opacity: 0; transform: scale(1.02); }
      100%  { opacity: 0; transform: scale(1.08); }
    }

    /* Natural warm tint overlay on slides */
    .hero-section .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        135deg,
        rgba(210, 220, 180, 0.18) 0%,
        rgba(240, 220, 190, 0.15) 50%,
        rgba(200, 180, 160, 0.20) 100%
      );
      z-index: 2;
      pointer-events: none;
      mix-blend-mode: soft-light;
    }

    /* Bottom vignette for depth */
    .hero-section .hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(60, 70, 40, 0.35), transparent 45%);
      z-index: 2;
      pointer-events: none;
    }

    /* Hero text */
    .hero-section .hero-text {
      position: absolute;
      bottom: 3rem;
      left: 3rem;
      z-index: 3;
      color: #fff;
      max-width: 60%;
    }

    .hero-section .hero-text h1 {
      font-size: clamp(2rem, 5vw, 3.4rem);
      font-weight: 300;
      letter-spacing: 2px;
      margin-bottom: 0.6rem;
      text-shadow: 0 4px 25px rgba(0, 0, 0, 0.5);
    }

    .hero-section .hero-text p {
      font-size: clamp(0.9rem, 1.6vw, 1.1rem);
      font-weight: 300;
      letter-spacing: 1px;
      color: rgba(255, 250, 240, 0.95);
      text-shadow: 0 2px 15px rgba(0, 0, 0, 0.5);
    }

    /* Slide indicator dots */
    .hero-section .dots {
      position: absolute;
      bottom: 1.5rem;
      right: 2rem;
      z-index: 3;
      display: flex;
      gap: 0.6rem;
    }

    .hero-section .dots span {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: rgba(255, 250, 240, 0.5);
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
    }

    .hero-section .dots span:nth-child(1) { animation: heroDot1 20s infinite; }
    .hero-section .dots span:nth-child(2) { animation: heroDot2 20s infinite; }
    .hero-section .dots span:nth-child(3) { animation: heroDot3 20s infinite; }
    .hero-section .dots span:nth-child(4) { animation: heroDot4 20s infinite; }

    @keyframes heroDot1 { 0%,24%{background:#fff;} 25%,100%{background:rgba(255,250,240,0.4);} }
    @keyframes heroDot2 { 0%,24%{background:rgba(255,250,240,0.4);} 25%,49%{background:#fff;} 50%,100%{background:rgba(255,250,240,0.4);} }
    @keyframes heroDot3 { 0%,49%{background:rgba(255,250,240,0.4);} 50%,74%{background:#fff;} 75%,100%{background:rgba(255,250,240,0.4);} }
    @keyframes heroDot4 { 0%,74%{background:rgba(255,250,240,0.4);} 75%,100%{background:#fff;} }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 700px) {
      .hero-section .hero-text { left: 1.5rem; bottom: 2rem; max-width: 85%; }
      .hero-section .hero { height: 60vh; min-height: 400px; }
    }
  </style>

  <!-- ---------- HERO WITH SLIDESHOW ---------- -->
  <div class="hero-wrap">
    <div class="hero">
      <div class="slide"></div>
      <div class="slide"></div>
      <div class="slide"></div>
      <div class="slide"></div>

      <div class="hero-text">
        <h1>Into the Wild</h1>
        <p>Where the earth breathes and the sky whispers</p>
      </div>

      <div class="dots">
        <span></span><span></span><span></span><span></span>
      </div>
    </div>
  </div>

</section>