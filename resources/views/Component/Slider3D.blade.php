{{-- ============================================================
     3D COVERFLOW SLIDER
     ============================================================ --}}
<div class="coverflow" id="coverflow">

    <div class="coverflow-stage">
        <div class="coverflow-item is-active">
            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1200&auto=format&fit=crop" alt="Accounting workspace">
        </div>
        <div class="coverflow-item">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop" alt="Financial analytics">
        </div>
        <div class="coverflow-item">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200&auto=format&fit=crop" alt="Team collaboration">
        </div>
        <div class="coverflow-item">
            <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?q=80&w=1200&auto=format&fit=crop" alt="Growth chart">
        </div>
        <div class="coverflow-item">
            <img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?q=80&w=1200&auto=format&fit=crop" alt="Financial planning">
        </div>
    </div>

    <button class="coverflow-nav coverflow-prev" id="coverflowPrev" aria-label="Previous slide">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"/>
        </svg>
    </button>

    <button class="coverflow-nav coverflow-next" id="coverflowNext" aria-label="Next slide">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"/>
        </svg>
    </button>

    <div class="coverflow-dots" id="coverflowDots">
        <button class="coverflow-dot is-active" data-index="0" aria-label="Slide 1"></button>
        <button class="coverflow-dot" data-index="1" aria-label="Slide 2"></button>
        <button class="coverflow-dot" data-index="2" aria-label="Slide 3"></button>
        <button class="coverflow-dot" data-index="3" aria-label="Slide 4"></button>
        <button class="coverflow-dot" data-index="4" aria-label="Slide 5"></button>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/slider3d.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/slider3d.js') }}"></script>
@endpush