{{-- ============================================================
     APEXBOOKS — TOP CLIENTS MARQUEE
     Three rows moving in opposite directions
     ============================================================ --}}
<section class="top-clients-section" id="topClientsSection">

    <div class="top-clients-header">
        <h2 class="top-clients-title">Trusted by top teams</h2>
        <p class="top-clients-subtitle">
            Thousands of businesses rely on Apexbooks to keep their finances
            accurate, compliant, and always up to date.
        </p>
    </div>

    <div class="marquee">

        {{-- ROW 1 — moves right --}}
        <div class="marquee-row marquee-row-1">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'chase2k25',      'initial' => 'CH', 'color' => '#8E7AC7', 'posts' => '151', 'views' => '358,920'])
                @include('Component.TopClientCard', ['name' => 'vinodjangid07',  'initial' => 'VD', 'color' => '#5a9de0', 'posts' => '157', 'views' => '899,480'])
                @include('Component.TopClientCard', ['name' => 'Yayal2085',      'initial' => 'YA', 'color' => '#e0a85a', 'posts' => '142', 'views' => '485,580'])
                @include('Component.TopClientCard', ['name' => 'Praashoo7',      'initial' => 'PR', 'color' => '#5ac9a8', 'posts' => '48',  'views' => '462,880'])
                @include('Component.TopClientCard', ['name' => 'Smit-Prajapati', 'initial' => 'SP', 'color' => '#e05a8e', 'posts' => '29',  'views' => '318,720'])
                @include('Component.TopClientCard', ['name' => 'alexruix',       'initial' => 'AX', 'color' => '#8E7AC7', 'posts' => '40',  'views' => '308,640'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'chase2k25',      'initial' => 'CH', 'color' => '#8E7AC7', 'posts' => '151', 'views' => '358,920'])
                @include('Component.TopClientCard', ['name' => 'vinodjangid07',  'initial' => 'VD', 'color' => '#5a9de0', 'posts' => '157', 'views' => '899,480'])
                @include('Component.TopClientCard', ['name' => 'Yayal2085',      'initial' => 'YA', 'color' => '#e0a85a', 'posts' => '142', 'views' => '485,580'])
                @include('Component.TopClientCard', ['name' => 'Praashoo7',      'initial' => 'PR', 'color' => '#5ac9a8', 'posts' => '48',  'views' => '462,880'])
                @include('Component.TopClientCard', ['name' => 'Smit-Prajapati', 'initial' => 'SP', 'color' => '#e05a8e', 'posts' => '29',  'views' => '318,720'])
                @include('Component.TopClientCard', ['name' => 'alexruix',       'initial' => 'AX', 'color' => '#8E7AC7', 'posts' => '40',  'views' => '308,640'])
            </div>
        </div>

        {{-- ROW 2 — moves left --}}
        <div class="marquee-row marquee-row-2">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'satyamchaudhary', 'initial' => 'SC', 'color' => '#5a9de0', 'posts' => '36',  'views' => '300,080'])
                @include('Component.TopClientCard', ['name' => 'adamgiebl',       'initial' => 'AG', 'color' => '#e05a8e', 'posts' => '89',  'views' => '295,320'])
                @include('Component.TopClientCard', ['name' => 'mrhyddenn',       'initial' => 'MR', 'color' => '#5ac9a8', 'posts' => '49',  'views' => '288,110'])
                @include('Component.TopClientCard', ['name' => 'SelfMadeSystem',  'initial' => 'SM', 'color' => '#e0a85a', 'posts' => '80',  'views' => '254,550'])
                @include('Component.TopClientCard', ['name' => 'Galahhad',        'initial' => 'GH', 'color' => '#8E7AC7', 'posts' => '22',  'views' => '236,130'])
                @include('Component.TopClientCard', ['name' => 'Javierrocadev',   'initial' => 'JR', 'color' => '#5a9de0', 'posts' => '67',  'views' => '230,450'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'satyamchaudhary', 'initial' => 'SC', 'color' => '#5a9de0', 'posts' => '36',  'views' => '300,080'])
                @include('Component.TopClientCard', ['name' => 'adamgiebl',       'initial' => 'AG', 'color' => '#e05a8e', 'posts' => '89',  'views' => '295,320'])
                @include('Component.TopClientCard', ['name' => 'mrhyddenn',       'initial' => 'MR', 'color' => '#5ac9a8', 'posts' => '49',  'views' => '288,110'])
                @include('Component.TopClientCard', ['name' => 'SelfMadeSystem',  'initial' => 'SM', 'color' => '#e0a85a', 'posts' => '80',  'views' => '254,550'])
                @include('Component.TopClientCard', ['name' => 'Galahhad',        'initial' => 'GH', 'color' => '#8E7AC7', 'posts' => '22',  'views' => '236,130'])
                @include('Component.TopClientCard', ['name' => 'Javierrocadev',   'initial' => 'JR', 'color' => '#5a9de0', 'posts' => '67',  'views' => '230,450'])
            </div>
        </div>

        {{-- ROW 3 — moves right --}}
        <div class="marquee-row marquee-row-3">
            <div class="marquee-track">
                {{-- original set --}}
                @include('Component.TopClientCard', ['name' => 'JkHuger',       'initial' => 'JK', 'color' => '#e0a85a', 'posts' => '51', 'views' => '214,820'])
                @include('Component.TopClientCard', ['name' => 'cloudstream',   'initial' => 'CS', 'color' => '#5ac9a8', 'posts' => '72', 'views' => '208,440'])
                @include('Component.TopClientCard', ['name' => 'nordwoodinc',   'initial' => 'NW', 'color' => '#e05a8e', 'posts' => '38', 'views' => '198,900'])
                @include('Component.TopClientCard', ['name' => 'quantumleap',   'initial' => 'QL', 'color' => '#8E7AC7', 'posts' => '64', 'views' => '185,320'])
                @include('Component.TopClientCard', ['name' => 'vertexlabs',    'initial' => 'VL', 'color' => '#5a9de0', 'posts' => '94', 'views' => '172,600'])
                @include('Component.TopClientCard', ['name' => 'nimbuswave',    'initial' => 'NB', 'color' => '#e0a85a', 'posts' => '55', 'views' => '160,410'])

                {{-- duplicate set for seamless loop --}}
                @include('Component.TopClientCard', ['name' => 'JkHuger',       'initial' => 'JK', 'color' => '#e0a85a', 'posts' => '51', 'views' => '214,820'])
                @include('Component.TopClientCard', ['name' => 'cloudstream',   'initial' => 'CS', 'color' => '#5ac9a8', 'posts' => '72', 'views' => '208,440'])
                @include('Component.TopClientCard', ['name' => 'nordwoodinc',   'initial' => 'NW', 'color' => '#e05a8e', 'posts' => '38', 'views' => '198,900'])
                @include('Component.TopClientCard', ['name' => 'quantumleap',   'initial' => 'QL', 'color' => '#8E7AC7', 'posts' => '64', 'views' => '185,320'])
                @include('Component.TopClientCard', ['name' => 'vertexlabs',    'initial' => 'VL', 'color' => '#5a9de0', 'posts' => '94', 'views' => '172,600'])
                @include('Component.TopClientCard', ['name' => 'nimbuswave',    'initial' => 'NB', 'color' => '#e0a85a', 'posts' => '55', 'views' => '160,410'])
            </div>
        </div>

    </div>
</section>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/topclients.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/topclients.js') }}" defer></script>
    @endpush
@endonce