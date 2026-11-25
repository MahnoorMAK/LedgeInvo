{{-- ============================================================
     resources/views/Component/location-map.blade.php
     Locations · Branch listings · Directions · Regional contacts
     Usage: @include('Component.location-map')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/location-map.css') }}">
    @endpush
@endonce

<section class="loc" id="locations" data-loc>

    {{-- Header --}}
    <header class="loc__head" data-loc-reveal>
        <span class="loc__eyebrow">
            <span class="loc__eyebrow-dot"></span>
            Location &amp; Map
        </span>
        <h2 class="loc__title">
            Find us <span class="loc__title-accent">wherever you are.</span>
        </h2>
        <p class="loc__subtitle">
            Three regional offices across the UK and US — plus remote-first support
            for every timezone. Drop by, or reach your regional team directly.
        </p>
    </header>

    {{-- Map + branch list --}}
    <div class="loc__main" data-loc-reveal>

        {{-- LEFT: Embedded map --}}
        <div class="loc__map-wrap">
            <div class="loc__map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.122!2d-74.0060!3d40.7128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjEiTiA3NMKwMDAnMjEuNiJX!5e0!3m2!1sen!2sus!4v1700000000000"
                    title="Apexbooks New York Office"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    class="loc__map-iframe"></iframe>

                {{-- Overlay: subtle purple tint --}}
                <div class="loc__map-tint" aria-hidden="true"></div>

                {{-- Floating pin info --}}
                <div class="loc__map-badge">
                    <div class="loc__map-badge-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div class="loc__map-badge-text">
                        <strong>Headquarters</strong>
                        <small>New York, USA</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Branch listings --}}
        <div class="loc__branches">

            {{-- Branch 1 --}}
            <article class="loc__branch" data-loc-reveal>
                <div class="loc__branch-top">
                    <span class="loc__branch-tag">Headquarters</span>
                    <span class="loc__branch-status">
                        <span class="loc__branch-dot"></span>
                        Open now
                    </span>
                </div>
                <h3 class="loc__branch-name">New York</h3>
                <p class="loc__branch-address">
                    128 Financial District, Suite 400<br>
                    New York, NY 10005
                </p>
                <div class="loc__branch-meta">
                    <a href="tel:+15551234567" class="loc__branch-link">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        +1 (555) 123-4567
                    </a>
                </div>
                <a href="https://maps.google.com/?q=40.7128,-74.0060" target="_blank" rel="noopener" class="loc__branch-directions">
                    Get directions
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

            {{-- Branch 2 --}}
            <article class="loc__branch" data-loc-reveal>
                <div class="loc__branch-top">
                    <span class="loc__branch-tag loc__branch-tag--alt">UK Office</span>
                    <span class="loc__branch-status">
                        <span class="loc__branch-dot loc__branch-dot--amber"></span>
                        Opens at 9:00 AM
                    </span>
                </div>
                <h3 class="loc__branch-name">London</h3>
                <p class="loc__branch-address">
                    42 Canary Wharf, Level 12<br>
                    London E14 5AB, UK
                </p>
                <div class="loc__branch-meta">
                    <a href="tel:+44203900406" class="loc__branch-link">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        +44 20 3900 406
                    </a>
                </div>
                <a href="https://maps.google.com/?q=51.5050,-0.0235" target="_blank" rel="noopener" class="loc__branch-directions">
                    Get directions
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

            {{-- Branch 3 --}}
            <article class="loc__branch" data-loc-reveal>
                <div class="loc__branch-top">
                    <span class="loc__branch-tag loc__branch-tag--alt2">Remote Hub</span>
                    <span class="loc__branch-status">
                        <span class="loc__branch-dot loc__branch-dot--purple"></span>
                        Always online
                    </span>
                </div>
                <h3 class="loc__branch-name">Manchester</h3>
                <p class="loc__branch-address">
                    Remote-first hub — no walk-in office<br>
                    Serving UK &amp; EU clients
                </p>
                <div class="loc__branch-meta">
                    <a href="mailto:uk@apexbooks.com" class="loc__branch-link">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="M22 6l-10 7L2 6"/>
                        </svg>
                        uk@apexbooks.com
                    </a>
                </div>
                <a href="mailto:uk@apexbooks.com" class="loc__branch-directions">
                    Contact UK team
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

        </div>

    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/location-map.js') }}" defer></script>
    @endpush
@endonce