{{-- ============================================================
     LEDGEINVO — OVERVIEW + METRICS
     Light section: serif heading + 3-column card grid
     ============================================================ --}}
<section class="om-section" id="omSection">

    {{-- ---------- Header ---------- --}}
    <div class="om-header">
        <div class="om-eyebrow">About our company</div>

        <h2 class="om-title" id="omTitle">
            <span class="om-word">Helping</span>
            <span class="om-word">individuals</span>
            <span class="om-word">and</span>
            <span class="om-word">businesses</span>
            <span class="om-word">build</span>
            <span class="om-word">a</span>
            <span class="om-word">stronger</span>
            <span class="om-word">financial</span>
            <span class="om-word">future</span>
            <span class="om-word">through</span>
            <span class="om-word">expert</span>
            <span class="om-word">insights,</span>
            <span class="om-word">strategic</span>
            <span class="om-word">planning</span>
            <span class="om-word">and</span>
            <span class="om-word">proven</span>
            <span class="om-word">solutions</span>
        </h2>
    </div>

    {{-- ---------- Card grid ---------- --}}
    <div class="om-grid">

        {{-- Card 1 — 98% --}}
        <div class="om-card om-card-stat">
            <div class="om-stat-top">
                <div class="om-stat-value">
                    <span class="om-counter" data-target="98">0</span><span class="om-stat-suffix">%</span>
                </div>
                <div class="om-stat-title">Client satisfaction rate</div>
            </div>
            <div class="om-stat-desc">
                Measured across every active engagement, from onboarding to long-term advisory.
            </div>
            <div class="om-stat-tag">Globally</div>
        </div>

        {{-- Card 2 — 40+ --}}
        <div class="om-card om-card-stat">
            <div class="om-stat-top">
                <div class="om-stat-value">
                    <span class="om-counter" data-target="40">0</span><span class="om-stat-suffix">+</span>
                </div>
                <div class="om-stat-title">Industries supported</div>
            </div>
            <div class="om-stat-desc">
                From professional services and retail to SaaS, manufacturing, and beyond.
            </div>
            <div class="om-stat-tag">All industry</div>
        </div>

        {{-- Card 3 — Portrait CTA --}}
        <div class="om-card om-card-cta">
            <img
                src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1200&auto=format&fit=crop"
                alt="Professional financial advisor">
            <div class="om-cta-overlay"></div>
            <div class="om-cta-content">
                <div class="om-cta-title">Join us and create meaningful impact</div>
                <div class="om-cta-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/overview-metrics.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/overview-metrics.js') }}" defer></script>
    @endpush
@endonce