<!-- ============================================================
     LAYOUT DEFINITION
     ============================================================ -->
{% extends "base.html" %}

{% block layout %}
  <div class="contact-page-layout">
    <div class="contact-page-inner">
      {% block content %}{% endblock %}
    </div>
  </div>
{% endblock %}


<!-- ============================================================
     SECTION: ACCOUNTING CONTACT HERO
     ============================================================ -->
{% block content %}
<section class="acct-contact-hero">

  <!-- ==========================================================
       SECTION STYLES (scoped)
       ========================================================== -->
  <style>
    /* ---------- base / reset (scoped) ---------- */
    .acct-contact-hero {
      box-sizing: border-box;
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      width: 100%;
      max-width: 1320px;
      margin: 0 auto;
      background: linear-gradient(135deg, #f8fafc 0%, #ffffff 50%, #f1f7ff 100%);
      border-radius: 2.5rem;
      box-shadow:
        0 30px 60px -20px rgba(11, 27, 51, 0.18),
        0 10px 25px -10px rgba(29, 78, 216, 0.12);
      overflow: hidden;
      position: relative;
      isolation: isolate;
      transition: box-shadow 0.5s ease;
    }

    .acct-contact-hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background:
        radial-gradient(900px 400px at 100% 0%, rgba(37, 99, 235, 0.08), transparent 60%),
        radial-gradient(700px 400px at 0% 100%, rgba(29, 78, 216, 0.06), transparent 60%);
      pointer-events: none;
      z-index: 0;
    }

    .acct-contact-hero *,
    .acct-contact-hero *::before,
    .acct-contact-hero *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .acct-contact-hero:hover {
      box-shadow:
        0 40px 80px -25px rgba(11, 27, 51, 0.22),
        0 15px 35px -12px rgba(29, 78, 216, 0.18);
    }

    /* ---------- grid ---------- */
    .acct-hero-grid {
      display: grid;
      grid-template-columns: 1.05fr 0.95fr;
      align-items: center;
      gap: 1.5rem;
      padding: 3rem 2.5rem 3rem 3rem;
      position: relative;
      z-index: 1;
    }

    /* ---------- left column ---------- */
    .acct-hero-content { padding-right: 1rem; }

    .acct-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: #eef5ff;
      color: #1d4ed8;
      font-size: 0.85rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      padding: 0.5rem 1.1rem;
      border-radius: 40px;
      margin-bottom: 1.75rem;
      border: 1px solid rgba(29, 78, 216, 0.15);
      transition: background 0.25s, border-color 0.25s, transform 0.25s;
    }

    .acct-badge::before {
      content: "";
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #22c55e;
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
      animation: acctPulse 2s ease-in-out infinite;
    }

    @keyframes acctPulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.6; transform: scale(0.9); }
    }

    .acct-badge:hover {
      background: #dbeafe;
      border-color: #1d4ed8;
      transform: translateY(-1px);
    }

    .acct-hero-content h1 {
      font-size: 3.15rem;
      font-weight: 700;
      line-height: 1.15;
      color: #0b1b33;
      letter-spacing: -0.025em;
      margin-bottom: 1.4rem;
    }

    .acct-hero-content h1 span {
      background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .acct-hero-description {
      font-size: 1.12rem;
      color: #475569;
      line-height: 1.65;
      margin-bottom: 2.25rem;
      max-width: 92%;
      font-weight: 400;
    }

    /* ---------- CTA buttons ---------- */
    .acct-cta-group {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 1.25rem;
      margin-bottom: 2.5rem;
    }

    .acct-btn-primary {
      position: relative;
      background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: white;
      font-weight: 600;
      font-size: 1rem;
      padding: 1.05rem 2.35rem;
      border-radius: 60px;
      cursor: pointer;
      box-shadow:
        0 10px 22px -6px rgba(29, 78, 216, 0.45),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
      transition: all 0.35s cubic-bezier(0.2, 0.9, 0.4, 1);
      letter-spacing: 0.01em;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      line-height: 1;
      font-family: inherit;
      overflow: hidden;
    }

    .acct-btn-primary::after {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
      transition: left 0.6s ease;
    }

    .acct-btn-primary:hover {
      transform: translateY(-3px);
      box-shadow:
        0 20px 30px -8px rgba(29, 78, 216, 0.55),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
    }

    .acct-btn-primary:hover::after { left: 100%; }
    .acct-btn-primary:active { transform: translateY(-1px); }

    .acct-btn-outline {
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1.5px solid #cbd5e1;
      color: #1e293b;
      font-weight: 600;
      font-size: 1rem;
      padding: 1.05rem 2rem;
      border-radius: 60px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.55rem;
      line-height: 1;
      font-family: inherit;
    }

    .acct-btn-outline:hover {
      border-color: #1d4ed8;
      background: #f0f6ff;
      color: #1d4ed8;
      transform: translateY(-2px);
      box-shadow: 0 10px 20px -10px rgba(29, 78, 216, 0.3);
    }

    /* ---------- trust markers ---------- */
    .acct-trust {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      padding-top: 1.75rem;
      border-top: 1px solid rgba(148, 163, 184, 0.2);
      max-width: 92%;
    }

    .acct-trust-item { display: flex; flex-direction: column; gap: 0.15rem; }

    .acct-trust-number {
      font-size: 1.4rem;
      font-weight: 700;
      color: #0b1b33;
      letter-spacing: -0.02em;
    }

    .acct-trust-label {
      font-size: 0.8rem;
      color: #64748b;
      font-weight: 500;
      letter-spacing: 0.02em;
      text-transform: uppercase;
    }

    .acct-trust-divider {
      width: 1px;
      height: 32px;
      background: rgba(148, 163, 184, 0.3);
    }

    /* ==========================================================
       RIGHT COLUMN – 3D auto slider
       ========================================================== */
    .acct-hero-visual {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 520px;
      perspective: 1400px;
    }

    .acct-glow {
      position: absolute;
      width: 420px;
      height: 420px;
      background: radial-gradient(circle, rgba(37, 99, 235, 0.18) 0%, transparent 70%);
      border-radius: 50%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 0;
      pointer-events: none;
      filter: blur(20px);
    }

    .acct-slider-stage {
      position: relative;
      width: 100%;
      max-width: 460px;
      height: 460px;
      transform-style: preserve-3d;
      transition: transform 0.8s cubic-bezier(0.25, 0.8, 0.3, 1);
    }

    .acct-hero-visual:hover .acct-slider-stage {
      transform: rotateY(-6deg) rotateX(4deg) scale(1.02);
    }

    /* slides */
    .acct-slide {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transform: translateZ(-100px) scale(0.85) rotateY(15deg);
      transition:
        opacity 0.9s cubic-bezier(0.25, 0.8, 0.3, 1),
        transform 0.9s cubic-bezier(0.25, 0.8, 0.3, 1);
      pointer-events: none;
      backface-visibility: hidden;
    }

    .acct-slide.acct-active {
      opacity: 1;
      transform: translateZ(0) scale(1) rotateY(0deg);
      pointer-events: auto;
      z-index: 3;
    }

    .acct-slide-card {
      position: relative;
      width: 88%;
      height: 88%;
      border-radius: 2rem;
      overflow: hidden;
      box-shadow:
        0 40px 60px -20px rgba(11, 27, 51, 0.4),
        0 20px 30px -15px rgba(29, 78, 216, 0.25),
        inset 0 0 0 1px rgba(255, 255, 255, 0.6);
      background: #ffffff;
      transform-style: preserve-3d;
      transition: transform 0.8s cubic-bezier(0.25, 0.8, 0.3, 1);
    }

    .acct-slide-card::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(145deg, rgba(255, 255, 255, 0.25) 0%, transparent 45%);
      pointer-events: none;
      z-index: 2;
    }

    .acct-slide-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 1.2s cubic-bezier(0.25, 0.8, 0.3, 1);
    }

    .acct-slide.acct-active .acct-slide-card { transform: translateZ(40px); }
    .acct-slide.acct-active .acct-slide-card img { transform: scale(1.05); }

    /* floating mini-cards */
    .acct-float-card {
      position: absolute;
      border-radius: 1.25rem;
      overflow: hidden;
      border: 3px solid #ffffff;
      box-shadow: 0 18px 35px -12px rgba(11, 27, 51, 0.35);
      transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.3, 1), box-shadow 0.6s ease;
      z-index: 4;
      background: #f8fafc;
    }

    .acct-float-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .acct-float-invoice {
      width: 110px;
      height: 140px;
      bottom: 18px;
      left: -6px;
      transform: rotate(-8deg);
      animation: acctFloat1 6s ease-in-out infinite;
    }

    .acct-float-chart {
      width: 130px;
      height: 95px;
      top: 22px;
      right: -10px;
      transform: rotate(6deg);
      animation: acctFloat2 7s ease-in-out infinite;
    }

    @keyframes acctFloat1 {
      0%, 100% { transform: rotate(-8deg) translateY(0); }
      50% { transform: rotate(-8deg) translateY(-10px); }
    }

    @keyframes acctFloat2 {
      0%, 100% { transform: rotate(6deg) translateY(0); }
      50% { transform: rotate(6deg) translateY(10px); }
    }

    .acct-hero-visual:hover .acct-float-invoice {
      transform: rotate(-12deg) translate(-10px, -14px) scale(1.06);
      box-shadow: 0 25px 45px -15px rgba(11, 27, 51, 0.45);
    }

    .acct-hero-visual:hover .acct-float-chart {
      transform: rotate(10deg) translate(12px, -10px) scale(1.06);
      box-shadow: 0 25px 45px -15px rgba(11, 27, 51, 0.45);
    }

    /* dots */
    .acct-slider-dots {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 0.6rem;
      z-index: 10;
      padding: 0.5rem 0.9rem;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 40px;
      border: 1px solid rgba(255, 255, 255, 0.8);
      box-shadow: 0 8px 20px -8px rgba(11, 27, 51, 0.15);
    }

    .acct-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #cbd5e1;
      cursor: pointer;
      transition: all 0.35s cubic-bezier(0.25, 0.8, 0.3, 1);
      border: none;
      padding: 0;
    }

    .acct-dot.acct-dot-active {
      width: 26px;
      border-radius: 10px;
      background: linear-gradient(90deg, #1d4ed8, #3b82f6);
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.45);
    }

    .acct-dot:hover { background: #94a3b8; }
    .acct-dot.acct-dot-active:hover { background: linear-gradient(90deg, #1d4ed8, #3b82f6); }

    /* counter */
    .acct-slide-counter {
      position: absolute;
      top: 30px;
      left: 30px;
      z-index: 10;
      font-size: 0.8rem;
      font-weight: 600;
      color: #0b1b33;
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 0.4rem 0.9rem;
      border-radius: 40px;
      border: 1px solid rgba(255, 255, 255, 0.9);
      letter-spacing: 0.05em;
      box-shadow: 0 6px 14px -6px rgba(11, 27, 51, 0.15);
    }

    .acct-slide-counter span { color: #1d4ed8; }

    /* ---------- responsive ---------- */
    @media (max-width: 1100px) {
      .acct-hero-content h1 { font-size: 2.7rem; }
      .acct-hero-grid { padding: 2.5rem 2rem 2.5rem 2.5rem; }
    }

    @media (max-width: 900px) {
      .acct-hero-grid {
        grid-template-columns: 1fr;
        gap: 3rem;
        padding: 2.5rem 2rem 3rem;
      }
      .acct-hero-content { padding-right: 0; text-align: center; }
      .acct-hero-description,
      .acct-trust { max-width: 100%; margin-left: auto; margin-right: auto; }
      .acct-cta-group { justify-content: center; }
      .acct-trust { justify-content: center; }
      .acct-hero-visual { min-height: 460px; }
      .acct-slider-stage { max-width: 400px; height: 400px; }
      .acct-float-invoice { left: 4%; }
      .acct-float-chart { right: 4%; }
    }

    @media (max-width: 520px) {
      .acct-contact-hero { border-radius: 2rem; }
      .acct-hero-grid { padding: 2rem 1.25rem 2.5rem; }
      .acct-hero-content h1 { font-size: 2.1rem; }
      .acct-hero-description { font-size: 1rem; }
      .acct-btn-primary,
      .acct-btn-outline {
        padding: 0.9rem 1.6rem;
        font-size: 0.95rem;
        width: 100%;
        justify-content: center;
      }
      .acct-cta-group { flex-direction: column; gap: 0.85rem; }
      .acct-slider-stage { max-width: 320px; height: 340px; }
      .acct-hero-visual { min-height: 380px; }
      .acct-float-invoice { width: 80px; height: 105px; }
      .acct-float-chart { width: 100px; height: 75px; }
      .acct-trust { flex-wrap: wrap; gap: 1rem; }
      .acct-trust-divider { display: none; }
      .acct-slider-dots { bottom: 16px; }
      .acct-slide-counter { top: 16px; left: 16px; }
    }

    @media (prefers-reduced-motion: reduce) {
      .acct-contact-hero *,
      .acct-contact-hero *::before,
      .acct-contact-hero *::after {
        transition-duration: 0.01ms !important;
        animation-duration: 0.01ms !important;
      }
    }
  </style>

  <!-- ==========================================================
       SECTION MARKUP
       ========================================================== -->
  <div class="acct-hero-grid">

    <!-- LEFT: text -->
    <div class="acct-hero-content">
      <div class="acct-badge">Trusted by 2,400+ businesses</div>

      <h1>
        Let’s talk <span>numbers</span>,<br>
        invoices &amp; growth.
      </h1>

      <p class="acct-hero-description">
        Bookkeeping, tax planning, or invoice management — our chartered
        accountants are ready. Reach out and we’ll respond within 2 hours.
      </p>

      <div class="acct-cta-group">
        <button class="acct-btn-primary" type="button">Send message →</button>
        <button class="acct-btn-outline" type="button">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
          </svg>
          Book a call
        </button>
      </div>

      <div class="acct-trust">
        <div class="acct-trust-item">
          <div class="acct-trust-number">$2.4B+</div>
          <div class="acct-trust-label">Managed</div>
        </div>
        <div class="acct-trust-divider"></div>
        <div class="acct-trust-item">
          <div class="acct-trust-number">4.9/5</div>
          <div class="acct-trust-label">Client rating</div>
        </div>
        <div class="acct-trust-divider"></div>
        <div class="acct-trust-item">
          <div class="acct-trust-number">24h</div>
          <div class="acct-trust-label">Response</div>
        </div>
      </div>
    </div>

    <!-- RIGHT: 3D auto slider -->
    <div class="acct-hero-visual">
      <div class="acct-glow"></div>

      <div class="acct-slide-counter" aria-hidden="true">
        <span class="acct-slide-current">01</span> / <span class="acct-slide-total">04</span>
      </div>

      <div class="acct-slider-stage" id="acctSliderStage">

        <div class="acct-slide acct-active" data-slide="0">
          <div class="acct-slide-card">
            <img src="https://images.pexels.com/photos/7821702/pexels-photo-7821702.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Professional accountant reviewing financial documents" loading="lazy">
          </div>
        </div>

        <div class="acct-slide" data-slide="1">
          <div class="acct-slide-card">
            <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Accounting team collaborating in a meeting" loading="lazy">
          </div>
        </div>

        <div class="acct-slide" data-slide="2">
          <div class="acct-slide-card">
            <img src="https://images.pexels.com/photos/6863332/pexels-photo-6863332.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Detailed invoice with numbers and charts" loading="lazy">
          </div>
        </div>

        <div class="acct-slide" data-slide="3">
          <div class="acct-slide-card">
            <img src="https://images.pexels.com/photos/6693661/pexels-photo-6693661.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Financial advisor explaining invoice details to client" loading="lazy">
          </div>
        </div>

        <div class="acct-float-card acct-float-invoice" aria-hidden="true">
          <img src="https://images.pexels.com/photos/6693661/pexels-photo-6693661.jpeg?auto=compress&cs=tinysrgb&w=400" alt="" loading="lazy">
        </div>

        <div class="acct-float-card acct-float-chart" aria-hidden="true">
          <img src="https://images.pexels.com/photos/6863332/pexels-photo-6863332.jpeg?auto=compress&cs=tinysrgb&w=400" alt="" loading="lazy">
        </div>

      </div>

      <div class="acct-slider-dots" role="tablist" aria-label="Slider navigation">
        <button class="acct-dot acct-dot-active" data-dot="0" role="tab" aria-label="Slide 1" aria-selected="true"></button>
        <button class="acct-dot" data-dot="1" role="tab" aria-label="Slide 2" aria-selected="false"></button>
        <button class="acct-dot" data-dot="2" role="tab" aria-label="Slide 3" aria-selected="false"></button>
        <button class="acct-dot" data-dot="3" role="tab" aria-label="Slide 4" aria-selected="false"></button>
      </div>
    </div>

  </div>

  <!-- ==========================================================
       SECTION SCRIPT (auto slider + 3D parallax)
       ========================================================== -->
  <script>
    (function () {
      const hero = document.querySelector('.acct-contact-hero');
      if (!hero) return;

      const slides = hero.querySelectorAll('.acct-slide');
      const dots = hero.querySelectorAll('.acct-dot');
      const counterCurrent = hero.querySelector('.acct-slide-current');
      const counterTotal = hero.querySelector('.acct-slide-total');
      const stage = hero.querySelector('.acct-slider-stage');
      const visual = hero.querySelector('.acct-hero-visual');

      const total = slides.length;
      let current = 0;
      let timer = null;
      const INTERVAL = 3000;

      if (counterTotal) counterTotal.textContent = String(total).padStart(2, '0');

      function goTo(index) {
        if (index === current) return;

        slides[current].classList.remove('acct-active');
        dots[current].classList.remove('acct-dot-active');
        dots[current].setAttribute('aria-selected', 'false');

        current = (index + total) % total;

        slides[current].classList.add('acct-active');
        dots[current].classList.add('acct-dot-active');
        dots[current].setAttribute('aria-selected', 'true');

        if (counterCurrent) {
          counterCurrent.textContent = String(current + 1).padStart(2, '0');
        }
      }

      function next() { goTo(current + 1); }

      function start() {
        stop();
        timer = setInterval(next, INTERVAL);
      }

      function stop() {
        if (timer) {
          clearInterval(timer);
          timer = null;
        }
      }

      dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
          const idx = parseInt(dot.getAttribute('data-dot'), 10);
          goTo(idx);
          start();
        });
      });

      hero.addEventListener('mouseenter', stop);
      hero.addEventListener('mouseleave', start);

      document.addEventListener('visibilitychange', function () {
        if (document.hidden) stop();
        else start();
      });

      hero.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft') { goTo(current - 1); start(); }
        else if (e.key === 'ArrowRight') { goTo(current + 1); start(); }
      });

      if (stage && visual && window.matchMedia('(hover: hover)').matches) {
        visual.addEventListener('mousemove', function (e) {
          const rect = this.getBoundingClientRect();
          const x = (e.clientX - rect.left) / rect.width - 0.5;
          const y = (e.clientY - rect.top) / rect.height - 0.5;
          stage.style.transform =
            'rotateY(' + (x * 10) + 'deg) rotateX(' + (-y * 8) + 'deg) scale(1.02)';
        });

        visual.addEventListener('mouseleave', function () {
          stage.style.transform = '';
        });
      }

      start();
    })();
  </script>

</section>
{% endblock %}