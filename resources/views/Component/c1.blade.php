{{-- resources/views/component/prac3.blade.php --}}
<section class="prac3-hero">

  <style>
    /* ============================================================
       SCOPED RESET
    ============================================================ */
    .prac3-hero *,
    .prac3-hero *::before,
    .prac3-hero *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ============================================================
       ROOT SECTION — pure white, no extra vertical space
    ============================================================ */
    .prac3-hero {
      position: relative;
      width: 100%;
      background: #ffffff;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: #0f2547;
      overflow: hidden;
      isolation: isolate;
      padding: 0;
      margin: 0;
      line-height: 0;
    }

    .prac3-hero .prac3-hero-wrap {
      position: relative;
      z-index: 5;
      display: flex;
      align-items: center;
      justify-content: center;
      max-width: 1320px;
      margin: 0 auto;
      padding: 2rem 2.5rem;
      perspective: 2200px;
      perspective-origin: 50% 50%;
      overflow: visible;
      line-height: 1.5;
    }

    .prac3-hero .prac3-hero-inner {
      position: relative;
      width: 100%;
      display: grid;
      grid-template-columns: 1fr 1.15fr;
      align-items: center;
      gap: 3rem;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      overflow: visible;
    }

    /* ============================================================
       LEFT: TEXT CONTENT
    ============================================================ */
    .prac3-hero .prac3-hero-copy {
      z-index: 5;
      max-width: 540px;
      animation: prac3CopySlide 1s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes prac3CopySlide {
      0%   { opacity: 0; transform: translate3d(-25px, 15px, 0); }
      100% { opacity: 1; transform: translate3d(0, 0, 0); }
    }

    .prac3-hero .prac3-hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.45rem;
      padding: 0.4rem 0.95rem;
      background: rgba(31, 74, 140, 0.07);
      border: 1px solid rgba(31, 74, 140, 0.22);
      border-radius: 40px;
      color: #1f4a8c;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.9px;
      text-transform: uppercase;
      margin-bottom: 1.3rem;
    }

    .prac3-hero .prac3-hero-badge::before {
      content: '';
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #3a7bf0;
      box-shadow: 0 0 8px #3a7bf0;
      animation: prac3PulseDot 2s ease-in-out infinite;
    }

    @keyframes prac3PulseDot {
      0%, 100% { opacity: 1; transform: scale(1); }
      50%      { opacity: 0.5; transform: scale(1.3); }
    }

    .prac3-hero .prac3-hero-copy h1 {
      font-size: clamp(2rem, 3.4vw, 2.85rem);
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -1px;
      color: #0b1f3d;
      margin-bottom: 1.1rem;
    }

    .prac3-hero .prac3-hero-copy h1 span {
      background: linear-gradient(135deg, #1f4a8c 0%, #3a7bf0 60%, #6aa8ff 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .prac3-hero .prac3-hero-copy p {
      font-size: 1rem;
      line-height: 1.65;
      color: #52678a;
      margin-bottom: 1.9rem;
      max-width: 470px;
    }

    .prac3-hero .prac3-hero-actions {
      display: flex;
      gap: 0.85rem;
      flex-wrap: wrap;
      margin-bottom: 2rem;
    }

    /* ============================================================
       BUTTONS — with silver shine animation
       Both buttons share the shimmer effect, but each keeps its
       own base gradient underneath.
    ============================================================ */

    /* --- Shared button base --- */
    .prac3-hero .prac3-btn-primary,
    .prac3-hero .prac3-btn-secondary {
      position: relative;
      overflow: hidden;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0.85rem 1.9rem;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.92rem;
      letter-spacing: 0.2px;
      transition: transform 0.25s ease, box-shadow 0.25s ease,
                  border-color 0.25s ease, background 0.25s ease;
      isolation: isolate;
      /* subtle silver outline so both feel metallic */
      outline: 1px solid rgba(255, 255, 255, 0.35);
      outline-offset: -1px;
    }

    /* --- Silver shimmer overlay (both buttons) --- */
    .prac3-hero .prac3-btn-primary::before,
    .prac3-hero .prac3-btn-secondary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -120%;
      width: 60%;
      height: 100%;
      background: linear-gradient(
        100deg,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.35) 30%,
        rgba(220, 230, 255, 0.75) 50%,
        rgba(255, 255, 255, 0.35) 70%,
        rgba(255, 255, 255, 0) 100%
      );
      transform: skewX(-20deg);
      pointer-events: none;
      z-index: 2;
      animation: prac3SilverShine 3.2s ease-in-out infinite;
    }

    /* Stagger the secondary button's shine slightly for elegance */
    .prac3-hero .prac3-btn-secondary::before {
      animation-delay: 0.35s;
    }

    @keyframes prac3SilverShine {
      0%   { left: -120%; }
      55%  { left: 130%;  }
      100% { left: 130%;  }
    }

    /* --- Silver rim highlight (both) --- */
    .prac3-hero .prac3-btn-primary::after,
    .prac3-hero .prac3-btn-secondary::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      padding: 1px;
      background: linear-gradient(
        135deg,
        rgba(255, 255, 255, 0.9) 0%,
        rgba(200, 215, 245, 0.4) 25%,
        rgba(255, 255, 255, 0.85) 50%,
        rgba(190, 205, 240, 0.35) 75%,
        rgba(255, 255, 255, 0.9) 100%
      );
      -webkit-mask:
        linear-gradient(#000 0 0) content-box,
        linear-gradient(#000 0 0);
      -webkit-mask-composite: xor;
              mask-composite: exclude;
      pointer-events: none;
      z-index: 3;
      animation: prac3RimPulse 3.2s ease-in-out infinite;
    }

    @keyframes prac3RimPulse {
      0%, 100% { opacity: 0.75; }
      50%      { opacity: 1;    }
    }

    /* --- PRIMARY button (blue gradient + silver shine) --- */
    .prac3-hero .prac3-btn-primary {
      background: linear-gradient(135deg, #3a7bf0, #1f4a8c);
      color: #ffffff;
      box-shadow: 0 14px 26px -10px rgba(31, 74, 140, 0.55);
    }
    .prac3-hero .prac3-btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 18px 32px -10px rgba(31, 74, 140, 0.75);
    }

    /* --- SECONDARY button (white + silver shine) --- */
    .prac3-hero .prac3-btn-secondary {
      background: #ffffff;
      color: #1f4a8c;
      border: 1.5px solid rgba(58, 123, 240, 0.35);
    }
    .prac3-hero .prac3-btn-secondary:hover {
      transform: translateY(-2px);
      border-color: #3a7bf0;
      background: #f5f9ff;
    }

    /* Slight text lift above shimmer so text stays crisp */
    .prac3-hero .prac3-btn-primary span,
    .prac3-hero .prac3-btn-secondary span {
      position: relative;
      z-index: 4;
    }

    .prac3-hero .prac3-hero-stats {
      display: flex;
      gap: 2.4rem;
      padding-top: 1.5rem;
      border-top: 1px solid #e4ecf8;
    }

    .prac3-hero .prac3-stat-value {
      font-size: 1.35rem;
      font-weight: 800;
      color: #0b1f3d;
      letter-spacing: -0.4px;
      line-height: 1.1;
    }

    .prac3-hero .prac3-stat-label {
      font-size: 0.7rem;
      color: #7a92b8;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 0.3rem;
      font-weight: 600;
    }

    /* ============================================================
       RIGHT: 3D SLIDER STAGE
    ============================================================ */
    .prac3-hero .prac3-slider-stage {
      position: relative;
      width: 100%;
      max-width: 640px;
      aspect-ratio: 1 / 1;
      justify-self: center;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      animation: prac3StageSway 18s ease-in-out infinite;
      overflow: visible;
    }

    @keyframes prac3StageSway {
      0%, 100% { transform: rotateY(-4deg) rotateX(1.5deg); }
      50%      { transform: rotateY(4deg)  rotateX(-1.5deg); }
    }

    .prac3-hero .prac3-card3d {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 260px;
      height: 360px;
      margin: -180px 0 0 -130px;
      border-radius: 24px;
      overflow: hidden;
      background: #ffffff;
      box-shadow:
        0 40px 70px -25px rgba(31, 74, 140, 0.5),
        0 0 0 1px rgba(180, 205, 240, 0.55);
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      transform-style: preserve-3d;
      will-change: transform;
    }

    .prac3-hero .prac3-card3d img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: saturate(1.06) contrast(1.02);
    }

    .prac3-hero .prac3-card3d::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        160deg,
        rgba(31, 74, 140, 0.10) 0%,
        rgba(58, 123, 240, 0.02) 50%,
        rgba(31, 74, 140, 0.14) 100%
      );
      mix-blend-mode: multiply;
      pointer-events: none;
    }

    .prac3-hero .prac3-card-badge {
      position: absolute;
      bottom: 0.9rem;
      left: 0.9rem;
      right: 0.9rem;
      padding: 0.7rem 0.95rem;
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 14px;
      box-shadow: 0 8px 18px -6px rgba(31, 74, 140, 0.28);
      transform: translateZ(30px);
      z-index: 3;
    }

    .prac3-hero .prac3-card-badge-title {
      font-size: 0.88rem;
      font-weight: 700;
      color: #1f4a8c;
      letter-spacing: 0.2px;
    }

    .prac3-hero .prac3-card-badge-sub {
      font-size: 0.72rem;
      color: #7a92b8;
      margin-top: 0.15rem;
      letter-spacing: 0.3px;
    }

    .prac3-hero .prac3-card3d:nth-child(1) { animation: prac3Rotate1 18s linear infinite; }
    .prac3-hero .prac3-card3d:nth-child(2) { animation: prac3Rotate2 18s linear infinite; }
    .prac3-hero .prac3-card3d:nth-child(3) { animation: prac3Rotate3 18s linear infinite; }
    .prac3-hero .prac3-card3d:nth-child(4) { animation: prac3Rotate4 18s linear infinite; }

    @keyframes prac3Rotate1 {
      0%   { transform: rotateY(0deg)   translateZ(220px) rotateY(0deg);   opacity: 1; }
      100% { transform: rotateY(360deg) translateZ(220px) rotateY(-360deg); opacity: 1; }
    }
    @keyframes prac3Rotate2 {
      0%   { transform: rotateY(90deg)  translateZ(220px) rotateY(-90deg);  opacity: 1; }
      100% { transform: rotateY(450deg) translateZ(220px) rotateY(-450deg); opacity: 1; }
    }
    @keyframes prac3Rotate3 {
      0%   { transform: rotateY(180deg) translateZ(220px) rotateY(-180deg); opacity: 1; }
      100% { transform: rotateY(540deg) translateZ(220px) rotateY(-540deg); opacity: 1; }
    }
    @keyframes prac3Rotate4 {
      0%   { transform: rotateY(270deg) translateZ(220px) rotateY(-270deg); opacity: 1; }
      100% { transform: rotateY(630deg) translateZ(220px) rotateY(-630deg); opacity: 1; }
    }

    .prac3-hero .prac3-slider-stage:hover .prac3-card3d,
    .prac3-hero .prac3-slider-stage:hover {
      animation-play-state: paused;
    }

    .prac3-hero .prac3-slider-stage::before {
      content: '';
      position: absolute;
      inset: 10%;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(58, 123, 240, 0.12) 0%, rgba(58, 123, 240, 0) 70%);
      filter: blur(35px);
      z-index: 0;
      pointer-events: none;
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 1100px) {
      .prac3-hero .prac3-hero-inner {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
      }
      .prac3-hero .prac3-slider-stage {
        max-width: 520px;
      }
      .prac3-hero .prac3-card3d {
        width: 220px;
        height: 300px;
        margin: -150px 0 0 -110px;
      }
      .prac3-hero .prac3-card3d:nth-child(1) { animation: prac3Rotate1m 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(2) { animation: prac3Rotate2m 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(3) { animation: prac3Rotate3m 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(4) { animation: prac3Rotate4m 18s linear infinite; }

      @keyframes prac3Rotate1m {
        0%   { transform: rotateY(0deg)   translateZ(185px) rotateY(0deg); }
        100% { transform: rotateY(360deg) translateZ(185px) rotateY(-360deg); }
      }
      @keyframes prac3Rotate2m {
        0%   { transform: rotateY(90deg)  translateZ(185px) rotateY(-90deg); }
        100% { transform: rotateY(450deg) translateZ(185px) rotateY(-450deg); }
      }
      @keyframes prac3Rotate3m {
        0%   { transform: rotateY(180deg) translateZ(185px) rotateY(-180deg); }
        100% { transform: rotateY(540deg) translateZ(185px) rotateY(-540deg); }
      }
      @keyframes prac3Rotate4m {
        0%   { transform: rotateY(270deg) translateZ(185px) rotateY(-270deg); }
        100% { transform: rotateY(630deg) translateZ(185px) rotateY(-630deg); }
      }
    }

    @media (max-width: 1000px) {
      .prac3-hero .prac3-hero-wrap {
        padding: 2rem 1.5rem;
      }
      .prac3-hero .prac3-hero-inner {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
      .prac3-hero .prac3-hero-copy {
        max-width: 100%;
        text-align: center;
        margin: 0 auto;
      }
      .prac3-hero .prac3-hero-copy p {
        margin-left: auto;
        margin-right: auto;
      }
      .prac3-hero .prac3-hero-actions { justify-content: center; }
      .prac3-hero .prac3-hero-stats { justify-content: center; }
      .prac3-hero .prac3-slider-stage {
        max-width: 540px;
        order: -1;
      }
    }

    @media (max-width: 600px) {
      .prac3-hero .prac3-hero-wrap {
        padding: 1.5rem 1rem;
      }
      .prac3-hero .prac3-hero-copy h1 {
        font-size: 1.65rem;
      }
      .prac3-hero .prac3-hero-copy p {
        font-size: 0.92rem;
      }
      .prac3-hero .prac3-slider-stage {
        max-width: 380px;
      }
      .prac3-hero .prac3-card3d {
        width: 160px;
        height: 220px;
        margin: -110px 0 0 -80px;
        border-radius: 16px;
      }
      .prac3-hero .prac3-card-badge-title { font-size: 0.7rem; }
      .prac3-hero .prac3-card-badge-sub { font-size: 0.6rem; }
      .prac3-hero .prac3-card-badge { padding: 0.45rem 0.6rem; }
      .prac3-hero .prac3-hero-stats { gap: 1.3rem; }
      .prac3-hero .prac3-stat-value { font-size: 1.05rem; }
      .prac3-hero .prac3-hero-actions { flex-direction: column; }
      .prac3-hero .prac3-btn-primary,
      .prac3-hero .prac3-btn-secondary {
        width: 100%;
        padding: 0.75rem 1.2rem;
        font-size: 0.85rem;
      }

      .prac3-hero .prac3-card3d:nth-child(1) { animation: prac3Rotate1s 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(2) { animation: prac3Rotate2s 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(3) { animation: prac3Rotate3s 18s linear infinite; }
      .prac3-hero .prac3-card3d:nth-child(4) { animation: prac3Rotate4s 18s linear infinite; }

      @keyframes prac3Rotate1s {
        0%   { transform: rotateY(0deg)   translateZ(135px) rotateY(0deg); }
        100% { transform: rotateY(360deg) translateZ(135px) rotateY(-360deg); }
      }
      @keyframes prac3Rotate2s {
        0%   { transform: rotateY(90deg)  translateZ(135px) rotateY(-90deg); }
        100% { transform: rotateY(450deg) translateZ(135px) rotateY(-450deg); }
      }
      @keyframes prac3Rotate3s {
        0%   { transform: rotateY(180deg) translateZ(135px) rotateY(-180deg); }
        100% { transform: rotateY(540deg) translateZ(135px) rotateY(-540deg); }
      }
      @keyframes prac3Rotate4s {
        0%   { transform: rotateY(270deg) translateZ(135px) rotateY(-270deg); }
        100% { transform: rotateY(630deg) translateZ(135px) rotateY(-630deg); }
      }
    }
  </style>

  <!-- ============================================================
       HERO WRAP
  ============================================================ -->
  <div class="prac3-hero-wrap">
    <div class="prac3-hero-inner">

      <!-- LEFT: Text -->
      <div class="prac3-hero-copy">
        <div class="prac3-hero-badge">New · v2.0 Released</div>
        <h1>Smart accounting for <span>modern teams</span></h1>
        <p>
          Automate invoices, track expenses, and close your books faster with a
          cloud accounting platform built for growing businesses.
        </p>
        <div class="prac3-hero-actions">
          <a href="#" class="prac3-btn-primary"><span>Start Free Trial</span></a>
          <a href="#" class="prac3-btn-secondary"><span>Watch Demo</span></a>
        </div>
        <div class="prac3-hero-stats">
          <div>
            <div class="prac3-stat-value">99.9%</div>
            <div class="prac3-stat-label">Uptime</div>
          </div>
          <div>
            <div class="prac3-stat-value">$4.2B</div>
            <div class="prac3-stat-label">Processed</div>
          </div>
          <div>
            <div class="prac3-stat-value">24/7</div>
            <div class="prac3-stat-label">Support</div>
          </div>
        </div>
      </div>

      <!-- RIGHT: 3D Rotating Slider -->
      <div class="prac3-slider-stage">

        <div class="prac3-card3d">
          <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=700&h=900&fit=crop" alt="Financial dashboard analytics">
          <div class="prac3-card-badge">
            <div class="prac3-card-badge-title">Live Dashboard</div>
            <div class="prac3-card-badge-sub">Real-time insights</div>
          </div>
        </div>

        <div class="prac3-card3d">
          <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=700&h=900&fit=crop" alt="Bookkeeping and ledgers">
          <div class="prac3-card-badge">
            <div class="prac3-card-badge-title">Smart Ledgers</div>
            <div class="prac3-card-badge-sub">Auto-categorized</div>
          </div>
        </div>

        <div class="prac3-card3d">
          <img src="https://images.unsplash.com/photo-1589391886645-d51941baf7fb?w=700&h=900&fit=crop" alt="Invoice and tax documents">
          <div class="prac3-card-badge">
            <div class="prac3-card-badge-title">Instant Invoicing</div>
            <div class="prac3-card-badge-sub">Send & get paid</div>
          </div>
        </div>

        <div class="prac3-card3d">
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=700&h=900&fit=crop" alt="Team reviewing financial reports">
          <div class="prac3-card-badge">
            <div class="prac3-card-badge-title">Team Sync</div>
            <div class="prac3-card-badge-sub">Collaborate live</div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>