{{-- ============================================================
     APEXBOOKS — TAKE CONTROL OF YOUR EMAIL
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/email-cta.css') }}">
    @endpush
@endonce

<section class="eml-cta" id="emailCta">

    {{-- LEFT: Visual & Text --}}
    <div class="eml-cta__visual">
        
        {{-- Ambient background glows --}}
        <div class="eml-cta__glow glow-1"></div>
        <div class="eml-cta__glow glow-2"></div>

        <div class="eml-cta__content">
            <div class="eml-cta__badge">
                <span class="eml-cta__badge-dot"></span>
                Smart Inbox
            </div>

            <h2 class="eml-cta__title">
                Take control of your <br>
                <span class="eml-cta__title-accent">financial email.</span>
            </h2>

            <p class="eml-cta__desc">
                Stop drowning in receipts, invoices, and statements. 
                Apexbooks automatically routes your financial emails into a 
                beautifully organized, searchable dashboard.
            </p>
           
        </div>
    </div>

    {{-- RIGHT: Form --}}
    <div class="eml-cta__form-side">
        <div class="eml-cta__form-card">
            
            <h3 class="eml-cta__form-title">Get early access</h3>
            <p class="eml-cta__form-desc">Connect your inbox and see the magic in under 2 minutes.</p>

            <form class="eml-cta__form" onsubmit="event.preventDefault();">
                
                <div class="eml-cta__group">
                    <label for="eml_name">Full Name</label>
                    <input type="text" id="eml_name" placeholder="Jane Doe" required>
                </div>

                <div class="eml-cta__group">
                    <label for="eml_email">Work Email</label>
                    <div class="eml-cta__input-wrap">
                        <input type="email" id="eml_email" placeholder="jane@company.com" required>
                        <svg class="eml-cta__input-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
                    </div>
                </div>

                <button type="submit" class="eml-cta__submit">
                    <span>Secure My Spot</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>

            </form>

            <div class="eml-cta__trust">
                <div class="eml-cta__avatars">
                    <span class="eml-cta__av" style="background: #8E7AC7;">A</span>
                    <span class="eml-cta__av" style="background: #E05A8E;">M</span>
                    <span class="eml-cta__av" style="background: #5A9DE0;">J</span>
                </div>
                <span class="eml-cta__trust-text">Joined by 4,000+ finance teams.</span>
            </div>

        </div>
    </div>

</section>