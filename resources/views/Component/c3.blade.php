{{-- resources/views/component/prac2.blade.php --}}
<section class="prac2-hero">

  <style>
    /* ============================================================
       SCOPED RESET
    ============================================================ */
    .prac2-hero *,
    .prac2-hero *::before,
    .prac2-hero *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ============================================================
       ROOT SECTION
    ============================================================ */
    .prac2-hero {
      position: relative;
      width: 100%;
      height: 92vh;
      min-height: 680px;
      max-height: 1000px;
      display: flex;
      align-items: center;
      justify-content: center;
      background:
        radial-gradient(ellipse at 50% 30%, #ffffff 0%, #f1f5f9 45%, #e2e8f0 100%);
      font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
      overflow: visible;
      isolation: isolate;
    }

    /* ============================================================
       3D STAGE
    ============================================================ */
    .prac2-hero .prac2-stage {
      position: relative;
      width: 100%;
      max-width: 1600px;
      height: 100%;
      margin: 0 auto;
      perspective: 1800px;
      perspective-origin: 50% 50%;
    }

    /* ============================================================
       FLOATING SLIDER CARD
    ============================================================ */
    .prac2-hero .prac2-float-card {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 1200px;
      height: 660px;
      margin-left: -600px;
      margin-top: -330px;
      border-radius: 32px;
      overflow: hidden;
      transform-style: preserve-3d;
      box-shadow:
        0 60px 120px -30px rgba(15, 23, 42, 0.35),
        0 0 0 1px rgba(148, 163, 184, 0.22),
        0 0 100px rgba(79, 70, 229, 0.10);
      animation: prac2FloatCard 6s ease-in-out infinite;
      will-change: transform;
      z-index: 5;
    }

    @keyframes prac2FloatCard {
      0%   { transform: translateY(0)     rotateX(0deg)    rotateY(0deg)   rotateZ(0deg); }
      25%  { transform: translateY(-20px) rotateX(2deg)    rotateY(-3deg)  rotateZ(0.8deg); }
      50%  { transform: translateY(-10px) rotateX(-1.5deg) rotateY(4deg)   rotateZ(-1deg); }
      75%  { transform: translateY(-24px) rotateX(3deg)    rotateY(1.5deg) rotateZ(1.5deg); }
      100% { transform: translateY(0)     rotateX(0deg)    rotateY(0deg)   rotateZ(0deg); }
    }

    /* ============================================================
       SLIDER TRACK
    ============================================================ */
    .prac2-hero .prac2-slider {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      transition: transform 0.9s cubic-bezier(0.65, 0, 0.35, 1);
      will-change: transform;
      backface-visibility: hidden;
    }

    /* ============================================================
       SLIDE
    ============================================================ */
    .prac2-hero .prac2-slide {
      position: relative;
      min-width: 100%;
      height: 100%;
      overflow: hidden;
      flex-shrink: 0;
    }

    .prac2-hero .prac2-slide img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transform: scale(1.1);
      transition: transform 1.2s ease;
      filter: saturate(0.9) contrast(1.02) brightness(1.05);
    }

    .prac2-hero .prac2-slide.active img { transform: scale(1); }

    .prac2-hero .prac2-slide .prac2-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to top,
        rgba(15, 23, 42, 0.78) 0%,
        rgba(15, 23, 42, 0.35) 45%,
        rgba(15, 23, 42, 0.05) 100%
      );
      z-index: 2;
    }

    /* ============================================================
       CAPTION
    ============================================================ */
    .prac2-hero .prac2-slide-caption {
      position: absolute;
      bottom: 56px;
      left: 56px;
      z-index: 15;
      color: #fff;
      max-width: 60%;
      pointer-events: none;
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .prac2-hero .prac2-slide-caption .prac2-tag {
      display: inline-block;
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 2.8px;
      text-transform: uppercase;
      color: #ffffff;
      background: rgba(79, 70, 229, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.25);
      padding: 7px 18px;
      border-radius: 4px;
      margin-bottom: 16px;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }

    .prac2-hero .prac2-slide-caption .prac2-caption-title {
      font-size: clamp(1.6rem, 3vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 10px;
      color: #ffffff;
      letter-spacing: -0.02em;
      line-height: 1.15;
      text-shadow: 0 2px 12px rgba(0, 0, 0, 0.4);
    }

    .prac2-hero .prac2-slide-caption .prac2-caption-text {
      font-size: clamp(0.9rem, 1.3vw, 1.05rem);
      color: #e2e8f0;
      font-weight: 400;
      line-height: 1.55;
      text-shadow: 0 1px 6px rgba(0, 0, 0, 0.35);
    }

    /* ============================================================
       ORBIT RINGS — 16 rings at different speeds + directions
    ============================================================ */
    .prac2-hero .prac2-orbit {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      z-index: 3;
      transform-style: preserve-3d;
      pointer-events: none;
    }

    .prac2-hero .prac2-orbit-1  { animation: prac2Orbit 22s linear infinite; }
    .prac2-hero .prac2-orbit-2  { animation: prac2Orbit 30s linear infinite reverse; }
    .prac2-hero .prac2-orbit-3  { animation: prac2Orbit 38s linear infinite; }
    .prac2-hero .prac2-orbit-4  { animation: prac2Orbit 26s linear infinite reverse; }
    .prac2-hero .prac2-orbit-5  { animation: prac2Orbit 34s linear infinite; }
    .prac2-hero .prac2-orbit-6  { animation: prac2Orbit 28s linear infinite reverse; }
    .prac2-hero .prac2-orbit-7  { animation: prac2Orbit 40s linear infinite; }
    .prac2-hero .prac2-orbit-8  { animation: prac2Orbit 32s linear infinite reverse; }
    .prac2-hero .prac2-orbit-9  { animation: prac2Orbit 36s linear infinite; }
    .prac2-hero .prac2-orbit-10 { animation: prac2Orbit 24s linear infinite reverse; }
    .prac2-hero .prac2-orbit-11 { animation: prac2Orbit 42s linear infinite; }
    .prac2-hero .prac2-orbit-12 { animation: prac2Orbit 27s linear infinite reverse; }
    .prac2-hero .prac2-orbit-13 { animation: prac2Orbit 45s linear infinite; }
    .prac2-hero .prac2-orbit-14 { animation: prac2Orbit 29s linear infinite reverse; }
    .prac2-hero .prac2-orbit-15 { animation: prac2Orbit 33s linear infinite; }
    .prac2-hero .prac2-orbit-16 { animation: prac2Orbit 25s linear infinite reverse; }

    @keyframes prac2Orbit {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    /* ============================================================
       FLOATING ICON CHIP
    ============================================================ */
    .prac2-hero .prac2-float-obj {
      position: absolute;
      border-radius: 18px;
      overflow: hidden;
      box-shadow:
        0 20px 40px -10px rgba(15, 23, 42, 0.18),
        0 0 0 1px rgba(148, 163, 184, 0.3),
        0 0 40px rgba(79, 70, 229, 0.08);
      animation: prac2FloatObj 5s ease-in-out infinite;
      will-change: transform;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: auto;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .prac2-hero .prac2-float-obj:hover {
      transform: scale(1.08);
      box-shadow:
        0 28px 50px -12px rgba(15, 23, 42, 0.28),
        0 0 0 1px rgba(79, 70, 229, 0.35),
        0 0 60px rgba(79, 70, 229, 0.18);
    }

    .prac2-hero .prac2-icon-obj {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #ffffff, #f1f5f9);
      color: #4f46e5;
    }

    .prac2-hero .prac2-icon-obj svg {
      width: 48%;
      height: 48%;
      stroke: #4f46e5;
      stroke-width: 1.6;
      fill: none;
    }

    @keyframes prac2FloatObj {
      0%, 100% { transform: translateY(0) scale(1); }
      50%      { transform: translateY(-14px) scale(1.03); }
    }

    /* ============================================================
       ICON POSITIONS — 16 icons around the card
       Card occupies roughly ±600px horizontal, ±330px vertical
    ============================================================ */

    /* ---- Ring 1 (inner ring, close to card) ---- */
    .prac2-hero .prac2-obj-1  { width:  96px; height:  96px; top: -400px; left:  420px; animation-delay: 0s;    border-radius: 22px; }
    .prac2-hero .prac2-obj-2  { width:  80px; height:  80px; top:  360px; left:  440px; animation-delay: 1.2s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-3  { width:  88px; height:  88px; top:  340px; left: -460px; animation-delay: 0.6s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-4  { width: 104px; height: 104px; top: -380px; left: -440px; animation-delay: 2s;    border-radius: 22px; }

    /* ---- Ring 2 (mid ring) ---- */
    .prac2-hero .prac2-obj-5  { width:  92px; height:  92px; top: -460px; left:   80px; animation-delay: 0.4s;  border-radius: 50%; }
    .prac2-hero .prac2-obj-6  { width:  76px; height:  76px; top:  460px; left:  -80px; animation-delay: 1.6s;  border-radius: 50%; }
    .prac2-hero .prac2-obj-7  { width: 100px; height: 100px; top: -440px; left:  260px; animation-delay: 2.4s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-8  { width:  82px; height:  82px; top:  430px; left: -260px; animation-delay: 0.9s;  border-radius: 22px; }

    /* ---- Ring 3 (outer ring, further from card) ---- */
    .prac2-hero .prac2-obj-9  { width:  84px; height:  84px; top: -520px; left: -180px; animation-delay: 1.8s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-10 { width:  72px; height:  72px; top:  520px; left:  180px; animation-delay: 0.3s;  border-radius: 50%; }
    .prac2-hero .prac2-obj-11 { width:  90px; height:  90px; top: -540px; left:  380px; animation-delay: 2.1s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-12 { width:  78px; height:  78px; top:  540px; left: -380px; animation-delay: 1.4s;  border-radius: 22px; }

    /* ---- Ring 4 (corner satellites) ---- */
    .prac2-hero .prac2-obj-13 { width:  70px; height:  70px; top: -480px; left: -560px; animation-delay: 0.7s;  border-radius: 50%; }
    .prac2-hero .prac2-obj-14 { width:  68px; height:  68px; top:  480px; left:  560px; animation-delay: 2.2s;  border-radius: 50%; }
    .prac2-hero .prac2-obj-15 { width:  86px; height:  86px; top: -560px; left:  520px; animation-delay: 1.1s;  border-radius: 22px; }
    .prac2-hero .prac2-obj-16 { width:  74px; height:  74px; top:  560px; left: -520px; animation-delay: 2.7s;  border-radius: 22px; }

    /* ============================================================
       HERO TITLE
    ============================================================ */
    .prac2-hero .prac2-hero-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #0f172a;
      z-index: 10;
      pointer-events: none;
      width: 100%;
      padding: 0 20px;
      animation: prac2FloatText 4s ease-in-out infinite;
    }

    @keyframes prac2FloatText {
      0%, 100% { transform: translate(-50%, -50%) translateY(0); }
      50%      { transform: translate(-50%, -50%) translateY(-10px); }
    }

    .prac2-hero .prac2-hero-content .prac2-title {
      font-size: clamp(3.2rem, 9vw, 7.5rem);
      font-weight: 800;
      letter-spacing: 8px;
      color: #ffffff;
      margin-bottom: 0.5rem;
      text-shadow:
        0 2px 20px rgba(15, 23, 42, 0.6),
        0 8px 40px rgba(0, 0, 0, 0.35);
    }

    .prac2-hero .prac2-hero-content .prac2-subtitle {
      font-size: clamp(0.9rem, 1.6vw, 1.15rem);
      font-weight: 500;
      letter-spacing: 8px;
      opacity: 0.9;
      max-width: 680px;
      margin: 0 auto;
      color: #ffffff;
      text-transform: uppercase;
      text-shadow: 0 2px 12px rgba(15, 23, 42, 0.5);
    }

    /* ============================================================
       DOTS
    ============================================================ */
    .prac2-hero .prac2-slider-nav {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 12px;
      z-index: 20;
    }

    .prac2-hero .prac2-nav-dot {
      width: 48px;
      height: 3px;
      background: rgba(255, 255, 255, 0.45);
      border-radius: 3px;
      cursor: pointer;
      transition: background 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .prac2-hero .prac2-nav-dot::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #ffffff;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
    }

    .prac2-hero .prac2-nav-dot.active::after { transform: scaleX(1); }
    .prac2-hero .prac2-nav-dot:hover { background: rgba(255, 255, 255, 0.75); }

    /* ============================================================
       RESPONSIVE
    ============================================================ */

    /* 1400px */
    @media (max-width: 1400px) {
      .prac2-hero .prac2-float-card {
        width: 1100px;
        height: 620px;
        margin-left: -550px;
        margin-top: -310px;
      }
      .prac2-hero .prac2-obj-1  { top: -380px; left:  400px; }
      .prac2-hero .prac2-obj-2  { top:  340px; left:  420px; }
      .prac2-hero .prac2-obj-3  { top:  320px; left: -440px; }
      .prac2-hero .prac2-obj-4  { top: -360px; left: -420px; }
      .prac2-hero .prac2-obj-5  { top: -440px; left:   70px; }
      .prac2-hero .prac2-obj-6  { top:  440px; left:  -70px; }
      .prac2-hero .prac2-obj-7  { top: -420px; left:  240px; }
      .prac2-hero .prac2-obj-8  { top:  410px; left: -240px; }
      .prac2-hero .prac2-obj-9  { top: -490px; left: -160px; }
      .prac2-hero .prac2-obj-10 { top:  490px; left:  160px; }
      .prac2-hero .prac2-obj-11 { top: -500px; left:  360px; }
      .prac2-hero .prac2-obj-12 { top:  500px; left: -360px; }
      .prac2-hero .prac2-obj-13 { top: -440px; left: -520px; }
      .prac2-hero .prac2-obj-14 { top:  440px; left:  520px; }
      .prac2-hero .prac2-obj-15 { top: -510px; left:  480px; }
      .prac2-hero .prac2-obj-16 { top:  510px; left: -480px; }
    }

    /* 1200px */
    @media (max-width: 1200px) {
      .prac2-hero .prac2-float-card {
        width: 92vw;
        height: 56vh;
        margin-left: -46vw;
        margin-top: -28vh;
        border-radius: 26px;
      }
      .prac2-hero .prac2-float-obj { transform: scale(0.85); }
      .prac2-hero .prac2-obj-1  { top: -340px; left:  360px; }
      .prac2-hero .prac2-obj-2  { top:  300px; left:  380px; }
      .prac2-hero .prac2-obj-3  { top:  280px; left: -400px; }
      .prac2-hero .prac2-obj-4  { top: -320px; left: -380px; }
      .prac2-hero .prac2-obj-5  { top: -400px; left:   60px; }
      .prac2-hero .prac2-obj-6  { top:  400px; left:  -60px; }
      .prac2-hero .prac2-obj-7  { top: -380px; left:  220px; }
      .prac2-hero .prac2-obj-8  { top:  370px; left: -220px; }
      .prac2-hero .prac2-obj-9  { top: -440px; left: -140px; }
      .prac2-hero .prac2-obj-10 { top:  440px; left:  140px; }
      .prac2-hero .prac2-obj-11 { top: -450px; left:  320px; }
      .prac2-hero .prac2-obj-12 { top:  450px; left: -320px; }
      .prac2-hero .prac2-obj-13 { top: -400px; left: -460px; }
      .prac2-hero .prac2-obj-14 { top:  400px; left:  460px; }
      .prac2-hero .prac2-obj-15 { top: -460px; left:  420px; }
      .prac2-hero .prac2-obj-16 { top:  460px; left: -420px; }
    }

    /* 900px — hide the outer rings so it doesn't get cluttered */
    @media (max-width: 900px) {
      .prac2-hero {
        height: 82vh;
        min-height: 580px;
      }
      .prac2-hero .prac2-float-card {
        width: 88vw;
        height: 52vh;
        margin-left: -44vw;
        margin-top: -26vh;
      }
      .prac2-hero .prac2-float-obj { transform: scale(0.72); }

      .prac2-hero .prac2-orbit-9,
      .prac2-hero .prac2-orbit-10,
      .prac2-hero .prac2-orbit-11,
      .prac2-hero .prac2-orbit-12,
      .prac2-hero .prac2-orbit-13,
      .prac2-hero .prac2-orbit-14,
      .prac2-hero .prac2-orbit-15,
      .prac2-hero .prac2-orbit-16 {
        display: none;
      }

      .prac2-hero .prac2-obj-1 { top: -260px; left:  220px; }
      .prac2-hero .prac2-obj-2 { top:  240px; left:  240px; }
      .prac2-hero .prac2-obj-3 { top:  220px; left: -230px; }
      .prac2-hero .prac2-obj-4 { top: -240px; left: -220px; }
      .prac2-hero .prac2-obj-5 { top: -300px; left:   50px; }
      .prac2-hero .prac2-obj-6 { top:  280px; left:  -40px; }
      .prac2-hero .prac2-obj-7 { top: -300px; left:  120px; }
      .prac2-hero .prac2-obj-8 { top:  300px; left: -140px; }

      .prac2-hero .prac2-slide-caption { left: 28px; bottom: 36px; }
    }

    /* 600px — keep only the inner ring */
    @media (max-width: 600px) {
      .prac2-hero {
        height: 74vh;
        min-height: 500px;
      }
      .prac2-hero .prac2-float-card {
        width: 90vw;
        height: 44vh;
        margin-left: -45vw;
        margin-top: -22vh;
        border-radius: 20px;
      }
      .prac2-hero .prac2-float-obj { transform: scale(0.6); }

      .prac2-hero .prac2-orbit-5,
      .prac2-hero .prac2-orbit-6,
      .prac2-hero .prac2-orbit-7,
      .prac2-hero .prac2-orbit-8 {
        display: none;
      }

      .prac2-hero .prac2-hero-content .prac2-title { letter-spacing: 4px; }
      .prac2-hero .prac2-hero-content .prac2-subtitle { letter-spacing: 4px; }

      .prac2-hero .prac2-slide-caption {
        left: 20px;
        bottom: 28px;
        max-width: 80%;
      }
    }
  </style>

  <!-- ============================================================
       HERO STAGE
  ============================================================ -->
  <div class="prac2-stage">

    <!-- ============================================================
         ORBITING ICONS — 16 total, 4 rings
    ============================================================ -->

    <!-- 1 — document / ledger -->
    <div class="prac2-orbit prac2-orbit-1">
      <div class="prac2-float-obj prac2-obj-1">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <rect x="4" y="2" width="16" height="20" rx="2" />
            <line x1="8" y1="6" x2="16" y2="6" />
            <line x1="8" y1="10" x2="8" y2="10.01" />
            <line x1="12" y1="10" x2="12" y2="10.01" />
            <line x1="16" y1="10" x2="16" y2="10.01" />
            <line x1="8" y1="14" x2="8" y2="14.01" />
            <line x1="12" y1="14" x2="12" y2="14.01" />
            <line x1="16" y1="14" x2="16" y2="14.01" />
            <line x1="8" y1="18" x2="16" y2="18" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 2 — bar chart -->
    <div class="prac2-orbit prac2-orbit-2">
      <div class="prac2-float-obj prac2-obj-2">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10" />
            <line x1="12" y1="20" x2="12" y2="4" />
            <line x1="6"  y1="20" x2="6"  y2="14" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 3 — dollar sign -->
    <div class="prac2-orbit prac2-orbit-3">
      <div class="prac2-float-obj prac2-obj-3">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23" />
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 4 — document with lines -->
    <div class="prac2-orbit prac2-orbit-4">
      <div class="prac2-float-obj prac2-obj-4">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
            <polyline points="14 2 14 8 20 8" />
            <line x1="16" y1="13" x2="8" y2="13" />
            <line x1="16" y1="17" x2="8" y2="17" />
            <polyline points="10 9 9 9 8 9" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 5 — pie chart -->
    <div class="prac2-orbit prac2-orbit-5">
      <div class="prac2-float-obj prac2-obj-5">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21.21 15.89A10 10 0 1 1 8 2.83" />
            <path d="M22 12A10 10 0 0 0 12 2v10z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 6 — calculator -->
    <div class="prac2-orbit prac2-orbit-6">
      <div class="prac2-float-obj prac2-obj-6">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <rect x="4" y="2" width="16" height="20" rx="2" />
            <line x1="8" y1="6" x2="16" y2="6" />
            <line x1="8" y1="11" x2="8" y2="11.01" />
            <line x1="12" y1="11" x2="12" y2="11.01" />
            <line x1="16" y1="11" x2="16" y2="11.01" />
            <line x1="8" y1="15" x2="8" y2="15.01" />
            <line x1="12" y1="15" x2="12" y2="15.01" />
            <line x1="16" y1="15" x2="16" y2="15.01" />
            <line x1="8" y1="19" x2="16" y2="19" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 7 — trending up -->
    <div class="prac2-orbit prac2-orbit-7">
      <div class="prac2-float-obj prac2-obj-7">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
            <polyline points="17 6 23 6 23 12" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 8 — shield / compliance -->
    <div class="prac2-orbit prac2-orbit-8">
      <div class="prac2-float-obj prac2-obj-8">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            <polyline points="9 12 11 14 15 10" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 9 — wallet -->
    <div class="prac2-orbit prac2-orbit-9">
      <div class="prac2-float-obj prac2-obj-9">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4" />
            <path d="M3 5v14a2 2 0 0 0 2 2h16v-5" />
            <path d="M18 12a2 2 0 0 0 0 4h4v-4z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 10 — credit card -->
    <div class="prac2-orbit prac2-orbit-10">
      <div class="prac2-float-obj prac2-obj-10">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
            <line x1="1" y1="10" x2="23" y2="10" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 11 — receipt -->
    <div class="prac2-orbit prac2-orbit-11">
      <div class="prac2-float-obj prac2-obj-11">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 2v20l2-2 2 2 2-2 2 2 2-2 2 2 2-2 2 2V2l-2 2-2-2-2 2-2-2-2 2-2-2-2 2z" />
            <line x1="8" y1="8" x2="16" y2="8" />
            <line x1="8" y1="12" x2="16" y2="12" />
            <line x1="8" y1="16" x2="13" y2="16" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 12 — coins / stacked -->
    <div class="prac2-orbit prac2-orbit-12">
      <div class="prac2-float-obj prac2-obj-12">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <ellipse cx="12" cy="6" rx="8" ry="3" />
            <path d="M4 6v6c0 1.66 3.58 3 8 3s8-1.34 8-3V6" />
            <path d="M4 12v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 13 — briefcase -->
    <div class="prac2-orbit prac2-orbit-13">
      <div class="prac2-float-obj prac2-obj-13">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 14 — percent -->
    <div class="prac2-orbit prac2-orbit-14">
      <div class="prac2-float-obj prac2-obj-14">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="5" x2="5" y2="19" />
            <circle cx="6.5" cy="6.5" r="2.5" />
            <circle cx="17.5" cy="17.5" r="2.5" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 15 — clipboard / check -->
    <div class="prac2-orbit prac2-orbit-15">
      <div class="prac2-float-obj prac2-obj-15">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
            <rect x="8" y="2" width="8" height="4" rx="1" ry="1" />
            <polyline points="9 13 11 15 15 11" />
          </svg>
        </div>
      </div>
    </div>

    <!-- 16 — globe / network -->
    <div class="prac2-orbit prac2-orbit-16">
      <div class="prac2-float-obj prac2-obj-16">
        <div class="prac2-icon-obj">
          <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10" />
            <line x1="2" y1="12" x2="22" y2="12" />
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Floating slider card -->
    <div class="prac2-float-card" id="prac2FloatCard">
      <div class="prac2-slider" id="prac2Slider">

        <div class="prac2-slide active">
          <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1800&h=1200&fit=crop" alt="Financial planning">
          <div class="prac2-overlay"></div>
        </div>

        <div class="prac2-slide">
          <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1800&h=1200&fit=crop" alt="Data analysis">
          <div class="prac2-overlay"></div>
        </div>

        <div class="prac2-slide">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1800&h=1200&fit=crop" alt="Business meeting">
          <div class="prac2-overlay"></div>
        </div>

        <div class="prac2-slide">
          <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1800&h=1200&fit=crop" alt="Audit and compliance">
          <div class="prac2-overlay"></div>
        </div>

      </div>

      <!-- Caption -->
      <div class="prac2-slide-caption" id="prac2Caption">
        <div class="prac2-tag">Planning</div>
        <div class="prac2-caption-title">Financial Strategy</div>
        <div class="prac2-caption-text">Build a solid financial roadmap for sustainable growth.</div>
      </div>

      <!-- Dots -->
      <div class="prac2-slider-nav" id="prac2NavDots">
        <div class="prac2-nav-dot active" data-index="0"></div>
        <div class="prac2-nav-dot" data-index="1"></div>
        <div class="prac2-nav-dot" data-index="2"></div>
        <div class="prac2-nav-dot" data-index="3"></div>
      </div>
    </div>

    <!-- Hero title -->
    <div class="prac2-hero-content">
      <div class="prac2-title">ACCOUNT</div>
      <div class="prac2-subtitle">Precision · Analysis · Trust</div>
    </div>

  </div>
</section>

<script>
(function () {
  'use strict';

  if (window.__prac2SliderInitialized) return;
  window.__prac2SliderInitialized = true;

  var AUTO_DELAY = 3000;

  function initPrac2Slider() {
    var slider       = document.getElementById('prac2Slider');
    var slides       = document.querySelectorAll('.prac2-hero .prac2-slide');
    var navDots      = document.querySelectorAll('.prac2-hero .prac2-nav-dot');
    var slideCaption = document.getElementById('prac2Caption');

    if (!slider || slides.length === 0) {
      setTimeout(initPrac2Slider, 100);
      return;
    }

    var slideData = [
      { tag: 'Planning',   title: 'Financial Strategy', text: 'Build a solid financial roadmap for sustainable growth.' },
      { tag: 'Analysis',   title: 'Data & Insights',    text: 'Turn complex numbers into clear, actionable insights.' },
      { tag: 'Advisory',   title: 'Client Meetings',    text: 'Collaborate closely to align finances with your goals.' },
      { tag: 'Compliance', title: 'Audit & Assurance',  text: 'Stay compliant with accurate reporting and audits.' }
    ];

    var totalSlides  = slides.length;
    var currentSlide = 0;
    var autoTimer    = null;

    function goToSlide(index) {
      currentSlide = ((index % totalSlides) + totalSlides) % totalSlides;

      slider.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

      for (var i = 0; i < slides.length; i++) {
        slides[i].classList.toggle('active', i === currentSlide);
      }
      for (var j = 0; j < navDots.length; j++) {
        navDots[j].classList.toggle('active', j === currentSlide);
      }

      var data = slideData[currentSlide];
      if (slideCaption && data) {
        slideCaption.style.opacity   = '0';
        slideCaption.style.transform = 'translateY(10px)';

        clearTimeout(goToSlide._t);
        goToSlide._t = setTimeout(function () {
          var tagEl   = slideCaption.querySelector('.prac2-tag');
          var titleEl = slideCaption.querySelector('.prac2-caption-title');
          var textEl  = slideCaption.querySelector('.prac2-caption-text');
          if (tagEl)   tagEl.textContent   = data.tag;
          if (titleEl) titleEl.textContent = data.title;
          if (textEl)  textEl.textContent  = data.text;

          slideCaption.style.opacity   = '1';
          slideCaption.style.transform = 'translateY(0)';
        }, 300);
      }
    }

    function startAuto() {
      stopAuto();
      autoTimer = setInterval(function () {
        goToSlide(currentSlide + 1);
      }, AUTO_DELAY);
    }

    function stopAuto() {
      if (autoTimer) {
        clearInterval(autoTimer);
        autoTimer = null;
      }
    }

    for (var k = 0; k < navDots.length; k++) {
      (function (dot) {
        dot.addEventListener('click', function () {
          var idx = parseInt(dot.getAttribute('data-index'), 10) || 0;
          goToSlide(idx);
          startAuto();
        });
      })(navDots[k]);
    }

    goToSlide(0);
    startAuto();

    var card = document.getElementById('prac2FloatCard');
    if (card) {
      card.addEventListener('mouseenter', stopAuto);
      card.addEventListener('mouseleave', startAuto);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPrac2Slider);
  } else {
    initPrac2Slider();
  }
})();
</script>