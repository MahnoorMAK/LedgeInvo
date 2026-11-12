{{-- ============================================================
     LEDGEINVO — TRANSFORMING FEATURES
     Three alternating rows: text card + image card
     ============================================================ --}}
<section class="tf-section" id="tfSection">

    {{-- ==================== HEADER ==================== --}}
    <div class="tf-header">
        <h2 class="tf-title">
            Transforming financial challenges into growth opportunities
        </h2>
    </div>

    {{-- ==================== ROWS ==================== --}}
    <div class="tf-rows">

        {{-- ========== Row 1 — Text left, Image right ========== --}}
        <div class="tf-row">
            <div class="tf-card tf-card-text">
                <div class="tf-card-content">
                    <div class="tf-card-text-left">
                        <h3 class="tf-card-title">Financial experts</h3>
                        <p class="tf-card-desc">Providing reliable advice backed by industry knowledge.</p>
                    </div>
                    <a href="/Contact" class="tf-arrow-btn" aria-label="Learn more about our financial experts">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="tf-card tf-card-image">
                <img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?q=80&w=1600&auto=format&fit=crop"
     alt="Professional woman at a modern desk"
     style="object-position: center 30%;">
            </div>
        </div>

        {{-- ========== Row 2 — Image left, Text right ========== --}}
        <div class="tf-row tf-row-reverse">
            <div class="tf-card tf-card-text">
                <div class="tf-card-content">
                    <div class="tf-card-text-left">
                        <h3 class="tf-card-title">Personalized solutions</h3>
                        <p class="tf-card-desc">Strategies designed around your specific financial goals.</p>
                    </div>
                    <a href="/Contact" class="tf-arrow-btn" aria-label="Learn more about personalized solutions">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="tf-card tf-card-image">
                <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=1600&auto=format&fit=crop"
     alt="Male professional working on a tablet in a bright office"
     style="object-position: center 30%;">
            </div>
        </div>

        {{-- ========== Row 3 — Text left, Image right ========== --}}
        <div class="tf-row">
            <div class="tf-card tf-card-text">
                <div class="tf-card-content">
                    <div class="tf-card-text-left">
                        <h3 class="tf-card-title">Long-term partnership</h3>
                        <p class="tf-card-desc">Building relationships focused on continuous success.</p>
                    </div>
                    <a href="/Contact" class="tf-arrow-btn" aria-label="Learn more about long-term partnership">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="tf-card tf-card-image">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=1600&auto=format&fit=crop"
     alt="Two colleagues collaborating at a laptop"
     style="object-position: center 30%;">
            </div>
        </div>

    </div>

</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/transforming-features.css') }}">
    @endpush
    <script src="{{ asset('js/transforming-features.js') }}" defer></script>
@endonce