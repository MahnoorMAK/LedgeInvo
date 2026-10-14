{{-- ============================================================
     resources/views/Component/service-hero.blade.php
     "Cinematic Scrub" hero — video plays forward/reverse on scroll
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/service-hero.css') }}">
    @endpush
@endonce

<section class="svh" id="service-hero" data-svh>

    {{-- ============================
         STICKY VIDEO STAGE
         ============================ --}}
    <div class="svh__stage" data-svh-stage>
        {{-- Video background --}}
        <div class="svh__video-wrap">
            <video
                class="svh__video"
                data-svh-video
                muted
                playsinline
                preload="auto"
                poster="{{ asset('Assets/Poster.jpg') }}">
                <source src="{{ asset('Assets/Vid1.mp4') }}" type="video/mp4">
            </video>

            {{-- Fallback image --}}
            <div class="svh__fallback" data-svh-fallback>
                <img src="{{ asset('Assets/Poster.jpg') }}"
                     alt=""
                     class="svh__fallback-img">
            </div>

            {{-- Purple color grade + text-contrast overlay --}}
            <div class="svh__video-overlay"></div>
            <div class="svh__video-vignette"></div>
            <div class="svh__video-grain"></div>
        </div>

        {{-- Ambient glows --}}
        <div class="svh__glow svh__glow--1" aria-hidden="true"></div>
        <div class="svh__glow svh__glow--2" aria-hidden="true"></div>

        {{-- Particles canvas --}}
        <canvas class="svh__particles" data-svh-particles aria-hidden="true"></canvas>

        {{-- ============================
             TEXT STAGE 1 — Intro
             ============================ --}}
        <div class="svh__act svh__act--intro" data-svh-act="intro">
            <div class="svh__eyebrow">
                <span class="svh__eyebrow-dot"></span>
                <span>Our Services</span>
                <span class="svh__eyebrow-tag">6 in one platform</span>
            </div>

            <h1 class="svh__title">
                <span class="svh__title-line">Your entire</span>
                <span class="svh__title-line svh__title-line--accent">finance stack</span>
                <span class="svh__title-line">in motion.</span>
            </h1>

            <p class="svh__subtitle">
                Six powerful services working together — from bookkeeping to
                compliance — so you can decide with total clarity.
            </p>

            <div class="svh__scroll-hint">
                <span class="svh__scroll-hint-text">Scroll to explore</span>
                <span class="svh__scroll-hint-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12l7 7 7-7"/>
                    </svg>
                </span>
            </div>
        </div>

        {{-- ============================
             TEXT STAGE 2 — Mid
             ============================ --}}
        <div class="svh__act svh__act--mid" data-svh-act="mid">
            <h2 class="svh__act-title">
                Watch your numbers<br>
                <span class="svh__act-title-accent">come alive.</span>
            </h2>
            <p class="svh__act-text">
                Real-time dashboards update the moment money moves.
                No more waiting for month-end to know where you stand.
            </p>
        </div>

        {{-- ============================
             TEXT STAGE 3 — Outro
             ============================ --}}
        <div class="svh__act svh__act--outro" data-svh-act="outro">
            <h2 class="svh__act-title svh__act-title--lg">
                Everything.<br>
                <span class="svh__act-title-accent">In one place.</span>
            </h2>

            <div class="svh__stats">
                <div class="svh__stat">
                    <span class="svh__stat-value" data-count="4000" data-suffix="+">0</span>
                    <span class="svh__stat-label">Teams</span>
                </div>
                <div class="svh__stat-divider"></div>
                <div class="svh__stat">
                    <span class="svh__stat-value" data-count="40" data-suffix="+">0</span>
                    <span class="svh__stat-label">Integrations</span>
                </div>
                <div class="svh__stat-divider"></div>
                <div class="svh__stat">
                    <span class="svh__stat-value" data-count="99.99" data-suffix="%">0</span>
                    <span class="svh__stat-label">Uptime</span>
                </div>
            </div>

            <div class="svh__actions">
                <a href="#services" class="svh__btn svh__btn--primary">
                    <span class="svh__btn-label">Explore Services</span>
                    <span class="svh__btn-flash" aria-hidden="true"></span>
                </a>
                <a href="/contact" class="svh__btn svh__btn--ghost">
                    <span>Talk to Sales</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- ============================
             PROGRESS BAR (bottom)
             ============================ --}}
        <div class="svh__progress" aria-hidden="true">
            <div class="svh__progress-fill" data-svh-progress></div>
        </div>
    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/service-hero.js') }}" defer></script>
    @endpush
@endonce