{{-- ============================================================
     LEDGEINVO — FLOATING CTA CARD
     2-column split: image left, text + button right
     ============================================================ --}}
<section class="fcta-section" id="fctaSection">

    <div class="fcta-card" id="fctaCard">

        {{-- Left: image --}}
        <div class="fcta-image">
            <img
                src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?q=80&w=1600&auto=format&fit=crop"
                alt="Hands reviewing spreadsheets and a calculator">
            <div class="fcta-image-overlay"></div>
        </div>

        {{-- Right: content --}}
        <div class="fcta-content">
            <div class="fcta-inner">

                <div class="fcta-eyebrow">Ready to grow</div>

                <h2 class="fcta-title">
                    Discover better strategies for sustainable growth
                </h2>

                <p class="fcta-desc">
                    Unlock smarter financial solutions with expert guidance and
                    strategic planning that helps your business achieve consistent,
                    sustainable growth.
                </p>

                <a href="/Contact" class="fcta-btn">
                    <span>Get In Touch</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>

            </div>
        </div>

    </div>
</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/floating-cta.css') }}">
    @endpush

    {{-- Load the script directly with the component — guarantees it loads --}}
    <script src="{{ asset('js/floating-cta.js') }}" defer></script>
@endonce