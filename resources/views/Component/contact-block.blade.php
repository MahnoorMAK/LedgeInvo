{{-- ============================================================
     resources/views/Component/contact-block.blade.php
     Contact block — info cards + message form
     Usage: @include('Component.contact-block')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/contact-block.css') }}">
    @endpush
@endonce

<section class="ctb" data-ctb>

    {{-- LEFT: Info cards --}}
    <div class="ctb__info">

        <div class="ctb__card" data-ctb-reveal>
            <div class="ctb__card-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                    <path d="M22 6l-10 7L2 6"/>
                </svg>
            </div>
            <div class="ctb__card-body">
                <h4>Email Us</h4>
                <p>For general inquiries and support requests.</p>
                <a href="mailto:hello@apexbooks.com">
                    hello@apexbooks.com
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="ctb__card" data-ctb-reveal>
            <div class="ctb__card-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                </svg>
            </div>
            <div class="ctb__card-body">
                <h4>Call Us</h4>
                <p>Mon–Fri, 9:00 AM – 6:00 PM (GMT).</p>
                <a href="tel:+15551234567">
                    +1 (555) 123-4567
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="ctb__card" data-ctb-reveal>
            <div class="ctb__card-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
            </div>
            <div class="ctb__card-body">
                <h4>Visit Us</h4>
                <p>128 Financial District, Suite 400<br>New York, NY 10005</p>
                <a href="#">
                    Get directions
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="ctb__card" data-ctb-reveal>
            <div class="ctb__card-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                    <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                </svg>
            </div>
            <div class="ctb__card-body">
                <h4>Priority Support</h4>
                <p>Already a customer? Get faster help from your account dashboard.</p>
                <a href="/login">
                    Sign in to your portal
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>

    {{-- RIGHT: Contact form --}}
    <div class="ctb__form-wrap" data-ctb-reveal>
        <div class="ctb__form-card">

            <h2 class="ctb__form-title">Send us a message</h2>
            <p class="ctb__form-subtitle">
                Fill out the form below and our team will get back to you as soon as possible.
            </p>

            <form action="#" method="POST" id="contactForm" class="ctb__form">
                @csrf

                <div class="ctb__row">
                    <div class="ctb__group">
                        <label for="first_name">First Name <span class="required">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               class="ctb__input" placeholder="Jane" required>
                    </div>
                    <div class="ctb__group">
                        <label for="last_name">Last Name <span class="required">*</span></label>
                        <input type="text" id="last_name" name="last_name"
                               class="ctb__input" placeholder="Doe" required>
                    </div>
                </div>

                <div class="ctb__row">
                    <div class="ctb__group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email"
                               class="ctb__input" placeholder="jane@company.com" required>
                    </div>
                    <div class="ctb__group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone"
                               class="ctb__input" placeholder="+1 (555) 000-0000">
                    </div>
                </div>

                <div class="ctb__group">
                    <label for="message">Message <span class="required">*</span></label>
                    <textarea id="message" name="message" class="ctb__input"
                              placeholder="Tell us a bit about what you need…" required></textarea>
                </div>

                <button type="submit" class="ctb__submit">
                    <span class="ctb__submit-label">Send Message</span>
                    <svg class="ctb__submit-icon" width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                    <span class="ctb__submit-flash" aria-hidden="true"></span>
                </button>
            </form>

        </div>
    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/contact-block.js') }}" defer></script>
    @endpush
@endonce