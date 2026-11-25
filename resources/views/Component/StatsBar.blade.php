{{-- ============================================================
     APEXBOOKS — ANIMATED STATS NAVBAR
     Vertical block on the right → expands left block-by-block
     ============================================================ --}}
<section class="stats-nav-section" id="statsBar">
    
    {{-- Background ambient glows --}}
    <div class="stats-nav-glow glow-1"></div>
    <div class="stats-nav-glow glow-2"></div>

    {{-- The expanding block --}}
    <div class="stats-nav-block">
        
        <div class="stats-nav-inner">

            {{-- Item 1 --}}
            <div class="stats-nav-item" data-target="10000" data-suffix="+">
                <div class="stats-nav-value">
                    <span class="stats-nav-number">0</span><span class="stats-nav-suffix">+</span>
                </div>
                <div class="stats-nav-label">Businesses</div>
            </div>

            {{-- Item 2 --}}
            <div class="stats-nav-item" data-target="99.9" data-suffix="%" data-decimals="1">
                <div class="stats-nav-value">
                    <span class="stats-nav-number">0</span><span class="stats-nav-suffix">%</span>
                </div>
                <div class="stats-nav-label">Uptime</div>
            </div>

            {{-- Item 3 --}}
            <div class="stats-nav-item" data-target="24" data-suffix="/7">
                <div class="stats-nav-value">
                    <span class="stats-nav-number">0</span><span class="stats-nav-suffix">/7</span>
                </div>
                <div class="stats-nav-label">Support</div>
            </div>

            {{-- Item 4 --}}
            <div class="stats-nav-item" data-target="50" data-suffix="+">
                <div class="stats-nav-value">
                    <span class="stats-nav-number">0</span><span class="stats-nav-suffix">+</span>
                </div>
                <div class="stats-nav-label">Countries</div>
            </div>

        </div>
    </div>
</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/statsbar.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/statsbar.js') }}" defer></script>
    @endpush
@endonce