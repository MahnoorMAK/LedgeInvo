{{-- ============================================================
     resources/views/Component/support-hours.blade.php
     Support hours · response times · holidays · after-hours
     Usage: @include('Component.support-hours')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/support-hours.css') }}">
    @endpush
@endonce

<section class="sup" id="support-hours" data-sup>

    {{-- Header --}}
    <header class="sup__head" data-sup-reveal>
        <span class="sup__eyebrow">
            <span class="sup__eyebrow-dot"></span>
            Support Hours &amp; Response Times
        </span>
        <h2 class="sup__title">
            When you need us, <span class="sup__title-accent">we're here.</span>
        </h2>
        <p class="sup__subtitle">
            Real humans, real answers — with clear expectations for every channel.
            Here's exactly how and when to reach the right team.
        </p>
    </header>

    {{-- Grid --}}
    <div class="sup__grid">

        {{-- Card 1 — Business Hours --}}
        <article class="sup__card" data-sup-reveal>
            <div class="sup__card-icon sup__card-icon--clock">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <h3 class="sup__card-title">Business Hours</h3>
            <p class="sup__card-desc">
                All support channels are staffed during our core hours.
            </p>

            <ul class="sup__hours">
                <li>
                    <span class="sup__hours-day">Mon – Fri</span>
                    <span class="sup__hours-time">9:00 AM – 6:00 PM GMT</span>
                </li>
                <li>
                    <span class="sup__hours-day">Saturday</span>
                    <span class="sup__hours-time">10:00 AM – 2:00 PM GMT</span>
                </li>
                <li class="sup__hours-closed">
                    <span class="sup__hours-day">Sunday</span>
                    <span class="sup__hours-time">Closed</span>
                </li>
            </ul>

            <div class="sup__tz">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="2" y1="12" x2="22" y2="12"/>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                </svg>
                All times shown in <strong>London (GMT/BST)</strong>
            </div>
        </article>

        {{-- Card 2 — Response Times --}}
        <article class="sup__card" data-sup-reveal>
            <div class="sup__card-icon sup__card-icon--bolt">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                </svg>
            </div>
            <h3 class="sup__card-title">Response Times</h3>
            <p class="sup__card-desc">
                Expected first response, by channel and priority.
            </p>

            <ul class="sup__resp">
                <li>
                    <span class="sup__resp-dot sup__resp-dot--green"></span>
                    <span class="sup__resp-name">Live Chat</span>
                    <span class="sup__resp-time">Under 2 min</span>
                </li>
                <li>
                    <span class="sup__resp-dot sup__resp-dot--blue"></span>
                    <span class="sup__resp-name">Email</span>
                    <span class="sup__resp-time">Under 4 hours</span>
                </li>
                <li>
                    <span class="sup__resp-dot sup__resp-dot--amber"></span>
                    <span class="sup__resp-name">Phone</span>
                    <span class="sup__resp-time">Under 10 min</span>
                </li>
                <li>
                    <span class="sup__resp-dot sup__resp-dot--purple"></span>
                    <span class="sup__resp-name">Priority Clients</span>
                    <span class="sup__resp-time">Under 30 min</span>
                </li>
            </ul>
        </article>

        {{-- Card 3 — Holidays --}}
        <article class="sup__card" data-sup-reveal>
            <div class="sup__card-icon sup__card-icon--calendar">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
            </div>
            <h3 class="sup__card-title">Holiday Schedule</h3>
            <p class="sup__card-desc">
                Our team observes these public holidays — support may be delayed.
            </p>

            <ul class="sup__holidays">
                <li>
                    <span class="sup__holiday-date">Jan 1</span>
                    <span class="sup__holiday-name">New Year's Day</span>
                </li>
                <li>
                    <span class="sup__holiday-date">Mar 29</span>
                    <span class="sup__holiday-name">Good Friday</span>
                </li>
                <li>
                    <span class="sup__holiday-date">May 6</span>
                    <span class="sup__holiday-name">Early May Bank Holiday</span>
                </li>
                <li>
                    <span class="sup__holiday-date">Aug 26</span>
                    <span class="sup__holiday-name">Summer Bank Holiday</span>
                </li>
                <li>
                    <span class="sup__holiday-date">Dec 25–26</span>
                    <span class="sup__holiday-name">Christmas &amp; Boxing Day</span>
                </li>
            </ul>
        </article>

        {{-- Card 4 — Emergency Contact --}}
        <article class="sup__card sup__card--urgent" data-sup-reveal>
            <div class="sup__card-icon sup__card-icon--shield">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M12 8v4"/>
                    <path d="M12 16h.01"/>
                </svg>
            </div>
            <h3 class="sup__card-title">Emergency &amp; After-Hours</h3>
            <p class="sup__card-desc">
                For urgent financial account issues outside business hours —
                unauthorized access, locked accounts, or suspicious activity.
            </p>

            <a href="tel:+15559110000" class="sup__urgent-btn">
                <span class="sup__urgent-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </span>
                <span class="sup__urgent-label">
                    <strong>+1 (555) 911-0000</strong>
                    <small>24/7 emergency line</small>
                </span>
                <span class="sup__urgent-flash" aria-hidden="true"></span>
            </a>

            <div class="sup__urgent-note">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="16" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
                For non-urgent matters, please use our regular channels to keep this line free.
            </div>
        </article>

    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/support-hours.js') }}" defer></script>
    @endpush
@endonce