{{-- resources/views/Component/gallery.blade.php --}}

<link rel="stylesheet" href="{{ asset('css/flash.css') }}?v={{ time() }}">

<div id="apex-flash-screen" style="display: flex;">
    
    <div class="flash-particles">
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
        <span class="particle"></span>
    </div>

    {{-- ✅ ADD THE SPARKLES HERE ✅ --}}
    <div class="flash-sparkles">
        <span class="sparkle s1"></span>
        <span class="sparkle s2"></span>
        <span class="sparkle s3"></span>
        <span class="sparkle s4"></span>
        <span class="sparkle s5"></span>
        <span class="sparkle s6"></span>
    </div>

    <div class="flash-content-wrapper">
        
        {{-- The Logo Image --}}
        <div class="flash-logo">
            <img src="{{ asset('Assets/img15.jpeg') }}" alt="Ledgeinvo Logo" class="flash-logo-img">
        </div>

        {{-- The Letters (L comes first) --}}
        <div class="flash-row">
            @php
                $letters = [
                    ['src' => 'Assets/img6.jpeg'],  // L
                    ['src' => 'Assets/img7.jpeg'],  // E
                    ['src' => 'Assets/img8.jpeg'],  // D
                    ['src' => 'Assets/img9.jpeg'],  // G
                    ['src' => 'Assets/img10.jpeg'], // E
                    ['src' => 'Assets/img11.jpeg'], // I
                    ['src' => 'Assets/img12.jpeg'], // N
                    ['src' => 'Assets/img13.jpeg'], // V
                    ['src' => 'Assets/Poster.jpg'], // O
                ];
            @endphp

            @foreach ($letters as $index => $item)
                <div class="flash-item">
                    <div class="flash-clip">
                        <img src="{{ asset($item['src']) }}" alt="Flash Image" class="flash-img">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="{{ asset('js/flash.js') }}?v={{ time() }}" defer></script>