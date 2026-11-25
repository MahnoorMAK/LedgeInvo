{{-- ============================================================
     LEDGEINVO — HERO SECTION
     Full-width accounting hero with dark overlay + social proof
     ============================================================ --}}
<section class="ah-hero" id="ahHero">

    {{-- Background image --}}
    <div class="ah-hero-bg">
        <img
            src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=2400&auto=format&fit=crop"
            alt="Financial desk with spreadsheets and calculator">
        <div class="ah-hero-overlay"></div>
        <div class="ah-hero-grain"></div>
    </div>

    {{-- Content --}}
    <div class="ah-hero-content">
        <div class="ah-hero-inner">

            {{-- Category label --}}
            <div class="ah-hero-eyebrow">
                <span class="ah-hero-eyebrow-line"></span>
                <span>About LedgeInvo</span>
            </div>

            {{-- Headline --}}
            <h1 class="ah-hero-title">
                Building <em>stronger</em> financial foundations through expertise
            </h1>

            {{-- Social proof pill --}}
            <div class="ah-hero-social">
                <div class="ah-avatars">
                    <div class="ah-avatar ah-avatar-1"><span>SC</span></div>
                    <div class="ah-avatar ah-avatar-2"><span>JR</span></div>
                    <div class="ah-avatar ah-avatar-3"><span>MK</span></div>
                    <div class="ah-avatar ah-avatar-4"><span>AB</span></div>
                    <div class="ah-avatar ah-avatar-more"><span>+4k</span></div>
                </div>
                <div class="ah-hero-social-text">
                    <span class="ah-hero-social-count">4.5k</span>
                    <span class="ah-hero-social-label">trusted partners</span>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom fade for a cleaner transition --}}
    <div class="ah-hero-fade"></div>

</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/hero-accounting.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/hero-accounting.js') }}" defer></script>
    @endpush
@endonce