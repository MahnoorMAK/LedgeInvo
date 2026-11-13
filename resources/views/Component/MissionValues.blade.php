{{-- ============================================================
     LEDGEINVO — MISSION + VALUES
     ============================================================ --}}
<section class="mv-section" id="mvSection">

    {{-- ==================== MISSION BLOCK ==================== --}}
    <div class="mv-mission" id="mvMission">

        {{-- Left: portrait photo --}}
        <div class="mv-photo">
            <div class="mv-photo-frame">
                <img
                    src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=1200&auto=format&fit=crop"
                    alt="Smiling financial professional">
            </div>
        </div>

        {{-- Right: text --}}
        <div class="mv-text">
            <div class="mv-eyebrow mv-reveal">What drives us</div>

            <h2 class="mv-title" id="mvTitle">
                <span class="mv-word">Guiding</span>
                <span class="mv-word">businesses</span>
                <span class="mv-word">with</span>
                <span class="mv-word">expert</span>
                <span class="mv-word">insights</span>
                <span class="mv-word">and</span>
                <span class="mv-word">customized</span>
                <span class="mv-word">financial</span>
                <span class="mv-word">strategies</span>
                <span class="mv-word">for</span>
                <span class="mv-word">success</span>
            </h2>

            <p class="mv-desc" id="mvDesc">
                <span class="mv-word">Integrity,</span>
                <span class="mv-word">expertise,</span>
                <span class="mv-word">and</span>
                <span class="mv-word">tailored</span>
                <span class="mv-word">solutions</span>
                <span class="mv-word">sit</span>
                <span class="mv-word">at</span>
                <span class="mv-word">the</span>
                <span class="mv-word">heart</span>
                <span class="mv-word">of</span>
                <span class="mv-word">everything</span>
                <span class="mv-word">we</span>
                <span class="mv-word">do.</span>
                <span class="mv-word">Every</span>
                <span class="mv-word">engagement</span>
                <span class="mv-word">starts</span>
                <span class="mv-word">with</span>
                <span class="mv-word">understanding</span>
                <span class="mv-word">your</span>
                <span class="mv-word">goals</span>
                <span class="mv-word">—</span>
                <span class="mv-word">and</span>
                <span class="mv-word">ends</span>
                <span class="mv-word">with</span>
                <span class="mv-word">a</span>
                <span class="mv-word">strategy</span>
                <span class="mv-word">built</span>
                <span class="mv-word">around</span>
                <span class="mv-word">them.</span>
                <span class="mv-word">No</span>
                <span class="mv-word">templates,</span>
                <span class="mv-word">no</span>
                <span class="mv-word">shortcuts,</span>
                <span class="mv-word">just</span>
                <span class="mv-word">finance</span>
                <span class="mv-word">that</span>
                <span class="mv-word">works</span>
                <span class="mv-word">for</span>
                <span class="mv-word">your</span>
                <span class="mv-word">business.</span>
            </p>

            <a href="/Contact" class="mv-link mv-reveal">
                <span>Talk to our team</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

    </div>

    {{-- ==================== CORE VALUES ROW ==================== --}}
    <div class="mv-values" id="mvValues">

        @foreach ([
            [
                'n' => '01',
                'title' => 'Integrity first',
                'desc' => 'We build every client relationship on honesty, transparency and trust.',
            ],
            [
                'n' => '02',
                'title' => 'Client-centered approach',
                'desc' => 'Your financial objectives shape every solution we recommend.',
            ],
            [
                'n' => '03',
                'title' => 'Strategic excellence',
                'desc' => 'We deliver practical financial solutions backed by expert insights.',
            ],
            [
                'n' => '04',
                'title' => 'Long-term success',
                'desc' => 'Our focus is creating sustainable growth and lasting financial value.',
            ],
        ] as $v)
            <div class="mv-value">
                <div class="mv-value-number">[ {{ $v['n'] }} ]</div>
                <h3 class="mv-value-title">{{ $v['title'] }}</h3>
                <p class="mv-value-desc">{{ $v['desc'] }}</p>
            </div>
        @endforeach

    </div>

</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/mission-values.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/mission-values.js') }}" defer></script>
    @endpush
@endonce