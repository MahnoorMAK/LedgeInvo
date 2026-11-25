{{-- ============================================================
     APEXBOOKS — HERO SECTION
     ============================================================ --}}
<section class="apex-hero">

    {{-- ==================== LEFT: TEXT ==================== --}}
    <div class="apex-hero-text">

        <div class="apex-hero-badge">
            <span class="badge-dot"></span>
            Trusted by 12,000+ finance teams
        </div>

        <h1 class="apex-hero-title">
            Financial clarity<br>
            <span class="accent">for modern business.</span>
        </h1>

        <p class="apex-hero-subtitle">
            Automate your accounting, understand your numbers in real time,
            and make confident decisions — all from a single platform built
            for the way modern teams work.
        </p>

        <div class="apex-hero-actions">
            <a href="/register" class="apex-btn-primary">
                Get started free
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor"><path d="M10.3 3.3a1 1 0 0 1 1.4 0l6 6a1 1 0 0 1 0 1.4l-6 6a1 1 0 0 1-1.4-1.4L14.6 11H3a1 1 0 1 1 0-2h11.6L10.3 4.7a1 1 0 0 1 0-1.4z"/></svg>
            </a>
            <a href="/Service" class="apex-btn-ghost">
                See how it works
            </a>
        </div>

        <div class="apex-hero-stats">
            <div class="stat">
                <div class="stat-value">$2.4B+</div>
                <div class="stat-label">Reconciled annually</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <div class="stat-value">99.98%</div>
                <div class="stat-label">Uptime guarantee</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <div class="stat-value">4.9/5</div>
                <div class="stat-label">Customer rating</div>
            </div>
        </div>
    </div>

    {{-- ==================== RIGHT: SLIDER ==================== --}}
    <div class="apex-hero-visual">

        {{-- Frame stack (aesthetic depth) --}}
        <div class="apex-frame-stack">
            <div class="frame frame-behind-1"></div>
            <div class="frame frame-behind-2"></div>
            <div class="frame frame-behind-3"></div>
        </div>

        {{-- Slider --}}
        <div class="apex-slider">
            <div class="slider-track">

                {{-- Slide 1 --}}
                <div class="slide active">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1600&auto=format&fit=crop" alt="Accounting workspace">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Real-time dashboards</span>
                        <span class="slide-caption-sub">Live financial KPIs at a glance</span>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1600&auto=format&fit=crop" alt="Financial analytics">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Advanced analytics</span>
                        <span class="slide-caption-sub">See the story behind your numbers</span>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1600&auto=format&fit=crop" alt="Team collaboration">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Built for teams</span>
                        <span class="slide-caption-sub">Collaborate on the numbers that matter</span>
                    </div>
                </div>

                {{-- Slide 4 --}}
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=1600&auto=format&fit=crop" alt="Growth chart">
                    <div class="slide-caption">
                        <span class="slide-caption-title">Grow with confidence</span>
                        <span class="slide-caption-sub">Reports that turn data into decisions</span>
                    </div>
                </div>

            </div>

            {{-- Progress dots --}}
            <div class="slider-dots">
                <button class="dot active" data-index="0"></button>
                <button class="dot" data-index="1"></button>
                <button class="dot" data-index="2"></button>
                <button class="dot" data-index="3"></button>
            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
        @endpush
@push('scripts')
    <script src="{{ asset('js/hero.js') }}"></script>
@endpush
</section>