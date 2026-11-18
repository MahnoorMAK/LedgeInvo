{{-- resources/views/component/prac3.blade.php --}}

{{-- Load CSS for this component --}}
<link rel="stylesheet" href="{{ asset('css/c1.css') }}">

<section class="prac3-hero">
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

{{-- Load JS for this component (if needed for future interactions) --}}
<script src="{{ asset('js/c1.js') }}" defer></script>