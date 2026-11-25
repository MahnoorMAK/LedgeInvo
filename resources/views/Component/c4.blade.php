{{-- resources/views/component/prac1.blade.php --}}
<section class="prac1-hero">

  <style>
    /* ============================================================
       SCOPED RESET
    ============================================================ */
    .prac1-hero *,
    .prac1-hero *::before,
    .prac1-hero *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* ============================================================
       ROOT SECTION
    ============================================================ */
    .prac1-hero {
      position: relative;
      width: 100%;
      padding: 5rem 2rem;
      background:
        radial-gradient(ellipse at 15% 20%, rgba(102, 126, 234, 0.12), transparent 55%),
        radial-gradient(ellipse at 85% 80%, rgba(118, 75, 162, 0.10), transparent 55%),
        linear-gradient(135deg, #f5f7ff 0%, #eef1ff 45%, #e8ecff 70%, #e2e7ff 100%);
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: #2d3142;
      overflow: hidden;
      isolation: isolate;
    }

    /* ============================================================
       HERO LAYOUT
    ============================================================ */
    .prac1-hero .prac1-hero__inner {
      position: relative;
      width: 100%;
      max-width: 1300px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 4rem;
      perspective: 2000px;
      perspective-origin: 60% 50%;
    }

    /* ============================================================
       LEFT — TEXT COLUMN
    ============================================================ */
    .prac1-hero .prac1-hero__copy {
      flex: 1;
      max-width: 540px;
      z-index: 5;
      display: flex;
      flex-direction: column;
    }

    /* ---- Eyebrow ---- */
    .prac1-hero .prac1-hero__eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #4c5fd5;
      margin-bottom: 1.75rem;
    }

    .prac1-hero .prac1-hero__eyebrow::before {
      content: '';
      width: 32px;
      height: 1px;
      background: linear-gradient(90deg, #667eea, transparent);
    }

    .prac1-hero .prac1-hero__eyebrow::after {
      content: '';
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: #667eea;
      box-shadow: 0 0 12px #667eea;
      animation: prac1PulseDot 2s ease-in-out infinite;
    }

    @keyframes prac1PulseDot {
      0%, 100% { opacity: 1; transform: scale(1); }
      50%      { opacity: 0.4; transform: scale(1.4); }
    }

    /* ---- Headline (restyled treatment, same font) ---- */
    .prac1-hero .prac1-hero__title {
      font-family: inherit;
      font-size: clamp(2.4rem, 5.2vw, 3.8rem);
      font-weight: 800;
      line-height: 1.05;
      letter-spacing: -1.5px;
      color: #1a1f36;
      margin-bottom: 1.8rem;
    }

    .prac1-hero .prac1-hero__title em {
      font-style: normal;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* ---- Paragraph (restyled) ---- */
    .prac1-hero .prac1-hero__text {
      font-size: 1rem;
      line-height: 1.8;
      color: #5a6178;
      margin-bottom: 2.5rem;
      max-width: 480px;
      font-weight: 400;
      letter-spacing: -0.1px;
    }

    /* ============================================================
       STATS ROW (restyled)
    ============================================================ */
    .prac1-hero .prac1-hero__stats {
      display: flex;
      gap: 0;
      padding-top: 2rem;
      border-top: 1px solid rgba(76, 95, 213, 0.18);
    }

    .prac1-hero .prac1-hero__stat {
      flex: 1;
      padding-right: 1.5rem;
      position: relative;
    }

    .prac1-hero .prac1-hero__stat + .prac1-hero__stat {
      padding-left: 1.5rem;
    }

    .prac1-hero .prac1-hero__stat + .prac1-hero__stat::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0.35rem;
      bottom: 0.35rem;
      width: 1px;
      background: rgba(76, 95, 213, 0.18);
    }

    .prac1-hero .prac1-hero__stat-value {
      font-family: inherit;
      font-size: 1.7rem;
      font-weight: 800;
      color: #1a1f36;
      letter-spacing: -0.6px;
      line-height: 1;
      margin-bottom: 0.5rem;
    }

    .prac1-hero .prac1-hero__stat-label {
      font-size: 0.7rem;
      font-family: inherit;
      color: #8a91a8;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-weight: 600;
    }

    /* ============================================================
       RIGHT — FANNED CARD DECK (unchanged)
    ============================================================ */
    .prac1-hero .prac1-hero__deck-stage {
      position: relative;
      flex: 0 0 480px;
      height: 480px;
      perspective: 2000px;
    }

    .prac1-hero .prac1-hero__deck {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300px;
      height: 400px;
      margin: -200px 0 0 -150px;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      transform: rotateY(-18deg) rotateX(6deg);
      transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__deck {
      transform: rotateY(-6deg) rotateX(2deg);
    }

    .prac1-hero .prac1-hero__card {
      position: absolute;
      inset: 0;
      border-radius: 22px;
      overflow: hidden;
      background: #ffffff;
      transform-style: preserve-3d;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      box-shadow:
        0 30px 60px -20px rgba(102, 126, 234, 0.45),
        0 0 0 1px rgba(102, 126, 234, 0.22);
      transition: transform 0.9s cubic-bezier(0.22, 1, 0.36, 1),
                  filter 0.5s ease,
                  box-shadow 0.5s ease;
      will-change: transform, filter;
      cursor: pointer;
    }

    .prac1-hero .prac1-hero__card:nth-child(1) {
      transform: translate3d(-70px, 0, 0) rotateZ(-8deg) rotateY(8deg);
      z-index: 1;
    }
    .prac1-hero .prac1-hero__card:nth-child(2) {
      transform: translate3d(-35px, -10px, 20px) rotateZ(-4deg) rotateY(4deg);
      z-index: 2;
    }
    .prac1-hero .prac1-hero__card:nth-child(3) {
      transform: translate3d(0, -20px, 40px) rotateZ(0deg) rotateY(0deg);
      z-index: 3;
    }
    .prac1-hero .prac1-hero__card:nth-child(4) {
      transform: translate3d(35px, -10px, 20px) rotateZ(4deg) rotateY(-4deg);
      z-index: 2;
    }
    .prac1-hero .prac1-hero__card:nth-child(5) {
      transform: translate3d(70px, 0, 0) rotateZ(8deg) rotateY(-8deg);
      z-index: 1;
    }

    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(1) {
      transform: translate3d(-190px, -20px, 20px) rotateZ(-16deg) rotateY(14deg);
      filter: brightness(0.95) blur(0.5px);
    }
    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(2) {
      transform: translate3d(-95px, -30px, 60px) rotateZ(-8deg) rotateY(7deg);
    }
    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(3) {
      transform: translate3d(0, -45px, 90px) rotateZ(0deg) rotateY(0deg);
      box-shadow:
        0 55px 100px -25px rgba(102, 126, 234, 0.6),
        0 0 0 1px rgba(102, 126, 234, 0.5);
    }
    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(4) {
      transform: translate3d(95px, -30px, 60px) rotateZ(8deg) rotateY(-7deg);
    }
    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(5) {
      transform: translate3d(190px, -20px, 20px) rotateZ(16deg) rotateY(-14deg);
      filter: brightness(0.95) blur(0.5px);
    }

    .prac1-hero .prac1-hero__card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: saturate(1.05) brightness(1.02);
      transition: transform 0.7s ease;
    }

    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card:nth-child(3) img {
      transform: scale(1.08);
    }

    .prac1-hero .prac1-hero__card::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(120% 80% at 50% 0%, rgba(102, 126, 234, 0.28), transparent 55%),
        linear-gradient(160deg,
          rgba(102, 126, 234, 0.18) 0%,
          rgba(118, 75, 162, 0.06) 50%,
          rgba(102, 126, 234, 0.22) 100%);
      mix-blend-mode: multiply;
      pointer-events: none;
      z-index: 2;
    }

    .prac1-hero .prac1-hero__card::after {
      content: '';
      position: absolute;
      top: 0;
      left: -70%;
      width: 45%;
      height: 100%;
      background: linear-gradient(115deg,
        transparent 0%,
        rgba(255, 255, 255, 0.5) 50%,
        transparent 100%);
      transform: skewX(-18deg);
      transition: left 0.9s ease;
      pointer-events: none;
      z-index: 4;
    }

    .prac1-hero .prac1-hero__deck-stage:hover .prac1-hero__card::after {
      left: 140%;
    }

    .prac1-hero .prac1-hero__card-badge {
      position: absolute;
      bottom: 0.85rem;
      left: 0.85rem;
      right: 0.85rem;
      padding: 0.7rem 0.95rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-radius: 14px;
      box-shadow: 0 10px 25px -8px rgba(102, 126, 234, 0.35);
      transform: translateZ(40px);
      z-index: 5;
    }

    .prac1-hero .prac1-hero__card-badge-title {
      font-size: 0.85rem;
      font-weight: 700;
      color: #2d3142;
      letter-spacing: 0.3px;
    }

    .prac1-hero .prac1-hero__card-badge-sub {
      font-size: 0.72rem;
      color: #4c5fd5;
      margin-top: 0.15rem;
      letter-spacing: 0.5px;
    }

    .prac1-hero .prac1-hero__deck-stage::after {
      content: '';
      position: absolute;
      left: 50%;
      bottom: 6%;
      width: 420px;
      height: 45px;
      transform: translateX(-50%) rotateX(74deg);
      background: radial-gradient(ellipse at center,
        rgba(102, 126, 234, 0.5), transparent 70%);
      filter: blur(16px);
      pointer-events: none;
      transition: width 0.9s ease;
    }

    .prac1-hero .prac1-hero__deck-stage:hover::after {
      width: 560px;
    }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 1000px) {
      .prac1-hero {
        padding: 4rem 1.5rem;
      }
      .prac1-hero .prac1-hero__inner {
        flex-direction: column;
        gap: 3rem;
      }
      .prac1-hero .prac1-hero__copy {
        max-width: 100%;
        text-align: center;
        align-items: center;
      }
      .prac1-hero .prac1-hero__eyebrow {
        justify-content: center;
      }
      .prac1-hero .prac1-hero__text {
        margin-left: auto;
        margin-right: auto;
      }
      .prac1-hero .prac1-hero__stats {
        justify-content: center;
        width: 100%;
      }
      .prac1-hero .prac1-hero__deck-stage {
        flex: 0 0 auto;
        width: 100%;
        height: 420px;
      }
    }

    @media (max-width: 600px) {
      .prac1-hero {
        padding: 3rem 1rem;
      }
      .prac1-hero .prac1-hero__deck {
        width: 200px;
        height: 280px;
        margin: -140px 0 0 -100px;
      }
      .prac1-hero .prac1-hero__deck-stage {
        height: 360px;
      }
      .prac1-hero .prac1-hero__deck-stage::after {
        width: 260px;
      }
      .prac1-hero .prac1-hero__deck-stage:hover::after {
        width: 340px;
      }
      .prac1-hero .prac1-hero__stats {
        flex-direction: column;
        gap: 1rem;
        padding-top: 1.4rem;
      }
      .prac1-hero .prac1-hero__stat {
        padding: 0;
        text-align: center;
      }
      .prac1-hero .prac1-hero__stat + .prac1-hero__stat {
        padding-left: 0;
      }
      .prac1-hero .prac1-hero__stat + .prac1-hero__stat::before {
        display: none;
      }
      .prac1-hero .prac1-hero__stat-value {
        font-size: 1.4rem;
      }
    }
  </style>

  <!-- ============================================================
       HERO CONTENT
  ============================================================ -->
  <div class="prac1-hero__inner">

    <!-- LEFT: Text -->
    <div class="prac1-hero__copy">

      <!-- Eyebrow -->
      <div class="prac1-hero__eyebrow">LedgeInvo</div>

      <!-- Headline -->
      <h1 class="prac1-hero__title">
        Your books, <em>always balanced</em>
      </h1>

      <!-- Paragraph -->
      <p class="prac1-hero__text">
        Close the month in hours, not weeks. FinBooks keeps every ledger in sync so you can focus on growing your business.
      </p>

      <!-- Stats -->
      <div class="prac1-hero__stats">
        <div class="prac1-hero__stat">
          <div class="prac1-hero__stat-value">12k+</div>
          <div class="prac1-hero__stat-label">Businesses</div>
        </div>
        <div class="prac1-hero__stat">
          <div class="prac1-hero__stat-value">$18B</div>
          <div class="prac1-hero__stat-label">Reconciled</div>
        </div>
        <div class="prac1-hero__stat">
          <div class="prac1-hero__stat-value">4.9★</div>
          <div class="prac1-hero__stat-label">G2 Rating</div>
        </div>
      </div>

    </div>

    <!-- RIGHT: Fanned card deck (unchanged) -->
    <div class="prac1-hero__deck-stage">
      <div class="prac1-hero__deck">

        <div class="prac1-hero__card">
          <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&h=800&fit=crop" alt="Accounting desk with ledgers">
          <div class="prac1-hero__card-badge">
            <div class="prac1-hero__card-badge-title">Invoices</div>
            <div class="prac1-hero__card-badge-sub">Auto-send &amp; chase</div>
          </div>
        </div>

        <div class="prac1-hero__card">
          <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=800&fit=crop" alt="Writing in a ledger">
          <div class="prac1-hero__card-badge">
            <div class="prac1-hero__card-badge-title">Ledgers</div>
            <div class="prac1-hero__card-badge-sub">Live &amp; always in sync</div>
          </div>
        </div>

        <div class="prac1-hero__card">
          <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?w=600&h=800&fit=crop" alt="Analytics on a warm desk">
          <div class="prac1-hero__card-badge">
            <div class="prac1-hero__card-badge-title">Analytics</div>
            <div class="prac1-hero__card-badge-sub">Cash-flow at a glance</div>
          </div>
        </div>

        <div class="prac1-hero__card">
          <img src="https://images.unsplash.com/photo-1589391886645-d51941baf7fb?w=600&h=800&fit=crop" alt="Tax and payroll documents">
          <div class="prac1-hero__card-badge">
            <div class="prac1-hero__card-badge-title">Tax &amp; Payroll</div>
            <div class="prac1-hero__card-badge-sub">Filed on time, every time</div>
          </div>
        </div>

        <div class="prac1-hero__card">
          <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&h=800&fit=crop" alt="Team reviewing financial reports">
          <div class="prac1-hero__card-badge">
            <div class="prac1-hero__card-badge-title">Reports</div>
            <div class="prac1-hero__card-badge-sub">Board-ready in one click</div>
          </div>
        </div>

      </div>
    </div>

  </div>

</section>