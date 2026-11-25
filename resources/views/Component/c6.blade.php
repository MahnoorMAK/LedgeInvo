{{-- resources/views/components/component.blade.php --}}

<div class="hero-slider-container" id="heroSlider">
    {{-- 5 Sliding Image Rows --}}
    <div class="slider-rows">
        @php
            $rows = [
                [
                    'dir' => 'left',
                    'accent' => '#4f46e5',
                    'glow' => 'rgba(79, 70, 229, 0.35)',
                    'images' => [
                        'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224154-26032ffc0d07?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1580519542036-c47de6196ba5?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1591696205602-2f950c417cb9?w=400&h=300&fit=crop',
                    ]
                ],
                [
                    'dir' => 'right',
                    'accent' => '#059669',
                    'glow' => 'rgba(5, 150, 105, 0.35)',
                    'images' => [
                        'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224311-beee415c201f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224154-22dec7ec8818?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1620714223084-8fcacc6dfd8d?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=400&h=300&fit=crop',
                    ]
                ],
                [
                    'dir' => 'left',
                    'accent' => '#dc2626',
                    'glow' => 'rgba(220, 38, 38, 0.35)',
                    'images' => [
                        'https://images.unsplash.com/photo-1580048915913-4f8f5cb481c4?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1543286386-713bdd548da4?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=300&fit=crop',
                    ]
                ],
                [
                    'dir' => 'right',
                    'accent' => '#d97706',
                    'glow' => 'rgba(217, 119, 6, 0.35)',
                    'images' => [
                        'https://images.unsplash.com/photo-1579621970795-87facc2f976d?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224154-22dec7ec8818?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224311-beee415c201f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
                    ]
                ],
                [
                    'dir' => 'left',
                    'accent' => '#0891b2',
                    'glow' => 'rgba(8, 145, 178, 0.35)',
                    'images' => [
                        'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1620714223084-8fcacc6dfd8d?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1580519542036-c47de6196ba5?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1591696205602-2f950c417cb9?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop',
                        'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=300&fit=crop',
                    ]
                ],
            ];
        @endphp

        @foreach($rows as $index => $row)
            <div class="slider-row slider-row-{{ $index + 1 }}"
                 data-accent="{{ $row['accent'] }}"
                 style="--row-accent: {{ $row['accent'] }}; --row-glow: {{ $row['glow'] }};">
                <div class="slider-track slider-track--{{ $row['dir'] }}">
                    @foreach($row['images'] as $img)
                        <div class="slide-card">
                            <img src="{{ $img }}" alt="Accounting visual" loading="lazy">
                        </div>
                    @endforeach
                    @foreach($row['images'] as $img)
                        <div class="slide-card">
                            <img src="{{ $img }}" alt="Accounting visual" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .hero-slider-container {
        position: relative;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .slider-rows {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 28px;
        height: 100%;
        padding: 40px 0;
        box-sizing: border-box;
    }

    /* ============================================
       SCROLL-TRIGGERED POP-UP ANIMATION
       Rows start hidden and pop in when scrolled into view.
       ============================================ */
    .slider-row {
        position: relative;
        width: 100%;
        overflow: hidden;
        height: 140px;
        flex-shrink: 0;

        /* Pre-reveal state */
        opacity: 0;
        transform: translateY(80px) scale(0.9);
        filter: blur(8px);
        transition:
            opacity 1s cubic-bezier(0.34, 1.56, 0.64, 1),
            transform 1s cubic-bezier(0.34, 1.56, 0.64, 1),
            filter 0.9s ease;
        will-change: opacity, transform, filter;
    }

    /* Revealed state (set by IntersectionObserver) */
    .slider-row.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
    }

    /* Staggered delays — rows pop one after another */
    .slider-row-1.is-visible { transition-delay: 0.00s; }
    .slider-row-2.is-visible { transition-delay: 0.12s; }
    .slider-row-3.is-visible { transition-delay: 0.24s; }
    .slider-row-4.is-visible { transition-delay: 0.36s; }
    .slider-row-5.is-visible { transition-delay: 0.48s; }

    /* Colored accent bar at bottom of row */
    .slider-row::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 3px;
        background: linear-gradient(
            90deg,
            transparent 0%,
            var(--row-accent) 20%,
            var(--row-accent) 80%,
            transparent 100%
        );
        opacity: 0.7;
        pointer-events: none;
    }

    .slider-track {
        display: flex;
        gap: 18px;
        width: max-content;
        will-change: transform;
        padding: 6px 0;
    }

    .slider-track--left  { animation: slideLeft  40s linear infinite; }
    .slider-track--right { animation: slideRight 40s linear infinite; }

    .slider-row-1 .slider-track { animation-duration: 45s; }
    .slider-row-2 .slider-track { animation-duration: 38s; }
    .slider-row-3 .slider-track { animation-duration: 50s; }
    .slider-row-4 .slider-track { animation-duration: 42s; }
    .slider-row-5 .slider-track { animation-duration: 48s; }

    .slider-row:hover .slider-track {
        animation-play-state: paused;
    }

    .slide-card {
        flex-shrink: 0;
        width: 210px;
        height: 140px;
        border-radius: 14px;
        overflow: hidden;
        background: #f8f9fa;
        position: relative;
        border: 2px solid var(--row-accent);
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, 0.8) inset,
            0 8px 20px -6px var(--row-glow),
            0 4px 12px rgba(0, 0, 0, 0.08);
        transition:
            transform 0.4s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.4s ease;
    }

    .slide-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
    }

    .slide-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, transparent 55%, var(--row-accent) 160%);
        mix-blend-mode: multiply;
        opacity: 0.55;
        pointer-events: none;
        z-index: 2;
    }

    .slide-card::after {
        content: '';
        position: absolute;
        top: 10px;
        right: 10px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--row-accent);
        box-shadow: 0 0 10px var(--row-accent);
        z-index: 3;
        opacity: 0.9;
    }

    .slide-card:hover {
        transform: translateY(-6px) scale(1.04);
        box-shadow:
            0 0 0 1px rgba(255, 255, 255, 0.9) inset,
            0 16px 32px -8px var(--row-glow),
            0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .slide-card:hover img { transform: scale(1.08); }

    @keyframes slideLeft {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }

    @keyframes slideRight {
        from { transform: translateX(-50%); }
        to   { transform: translateX(0); }
    }

    @media (max-width: 768px) {
        .slider-rows { gap: 20px; padding: 24px 0; }
        .slider-row { height: 100px; }
        .slide-card { width: 150px; height: 100px; }
    }

    @media (max-width: 480px) {
        .slider-rows { gap: 14px; padding: 16px 0; }
        .slider-row { height: 80px; }
        .slide-card { width: 120px; height: 80px; }
    }

    /* Respect reduced motion — show everything without animation */
    @media (prefers-reduced-motion: reduce) {
        .slider-track { animation: none !important; }
        .slider-row {
            opacity: 1 !important;
            transform: none !important;
            filter: none !important;
            transition: none !important;
        }
    }
</style>

{{-- ============================================
     SCROLL-TRIGGERED POP-UP SCRIPT
     Uses IntersectionObserver to detect when each row
     enters the viewport, then adds .is-visible to trigger
     the CSS transition (pop-up + blur-out + scale-in).
     Self-contained — does NOT rely on @stack('scripts').
     ============================================ --}}
<script>
    (function () {
        function initScrollPopUp() {
            var rows = document.querySelectorAll('.slider-row');
            if (!rows.length) return;

            // Fallback for very old browsers — just show everything
            if (!('IntersectionObserver' in window)) {
                rows.forEach(function (r) { r.classList.add('is-visible'); });
                return;
            }

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // reveal once
                    }
                });
            }, {
                threshold: 0.15,                   // 15% visible → trigger
                rootMargin: '0px 0px -60px 0px'    // trigger slightly before fully in view
            });

            rows.forEach(function (row) { observer.observe(row); });

            // Safety net — if anything is still hidden after 3s, reveal it
            setTimeout(function () {
                rows.forEach(function (r) {
                    if (!r.classList.contains('is-visible')) {
                        r.classList.add('is-visible');
                    }
                });
            }, 3000);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initScrollPopUp);
        } else {
            initScrollPopUp();
        }
    })();
</script>