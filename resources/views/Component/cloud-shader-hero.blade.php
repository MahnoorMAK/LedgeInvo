{{--
    Cloud Shader Hero
    Port of Aceternity UI's cloud-shader-hero-demo to Blade + vanilla JS.
    Usage:  @include('components.cloud-shader-hero')
    Or:     <x-cloud-shader-hero />
--}}

<link rel="stylesheet" href="{{ asset('css/cloud-shader-hero.css') }}">

<div class="cs-hero" id="cs-hero">

    {{-- ============ WebGL shader canvas ============ --}}
    <div class="cs-shader" id="cs-shader-mount">
        <canvas id="cs-canvas" class="cs-canvas"></canvas>
    </div>

    {{-- ============ Hero content ============ --}}
    <div class="cs-hero-content">
        <h1 class="cs-title">
            Banking above <br class="cs-title-br" /> the clouds
        </h1>
        <p class="cs-subtitle">
            Altitude gives your finance team one home for cards, payments, and
            forecasting. Close the books in hours, not weeks, with automation
            that works while you sleep.
        </p>
        <div class="cs-actions">
            <a href="#" class="cs-btn-primary">Start for free</a>
            <a href="#" class="cs-btn-secondary">Book a demo</a>
        </div>
        <p class="cs-note">No credit card required &middot; Free 14-day trial</p>
    </div>

    {{-- ============ Dashboard image ============ --}}
    <div class="cs-dashboard-wrap">
        <div class="cs-dashboard-frame">
            <img
                src="https://assets.aceternity.com/screenshots/fintech-dashboard.webp"
                alt="Altitude fintech dashboard"
                class="cs-dashboard-img"
                loading="lazy"
            />
        </div>
    </div>

</div>

<script src="{{ asset('js/cloud-shader-hero.js') }}" defer></script>