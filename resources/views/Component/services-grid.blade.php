{{-- ============================================================
     resources/views/Component/services-grid.blade.php
     Sticky horizontal stepper + flip cards
     Usage: @include('Component.services-grid')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/services-grid.css') }}">
    @endpush
@endonce

<section class="svc-grid-section" id="services-grid" data-svc>

    {{-- ============================
         STICKY STAGE
         ============================ --}}
    <div class="svc-stage" data-svc-stage>

        {{-- Giant watermark --}}
        <div class="svc-stage__watermark" aria-hidden="true">
            <span data-svc-watermark>SERVICES</span>
        </div>

        {{-- Horizontal track holding the 6 cards --}}
        <div class="svc-grid" data-svc-track>

            {{-- Card 1 — Automated Bookkeeping --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="2" width="16" height="20" rx="2"/>
                                <line x1="8" y1="6" x2="16" y2="6"/>
                                <line x1="8" y1="10" x2="16" y2="10"/>
                                <line x1="8" y1="14" x2="12" y2="14"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Automated Bookkeeping</h3>
                        <p class="svc-card__desc">
                            Every transaction categorized, reconciled, and posted to your ledger — automatically, in real time.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> Bank feed sync</li>
                            <li><i class="fa-solid fa-check"></i> Smart categorization</li>
                            <li><i class="fa-solid fa-check"></i> Month-end close in hours</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Card 2 — Real-Time Analytics --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18"/>
                                <path d="M7 14l4-4 4 4 5-6"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Real-Time Analytics</h3>
                        <p class="svc-card__desc">
                            Live dashboards that turn raw numbers into the story of your business — cash flow, margins, and growth.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> Custom KPI dashboards</li>
                            <li><i class="fa-solid fa-check"></i> Cash flow forecasting</li>
                            <li><i class="fa-solid fa-check"></i> Exportable reports</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Card 3 — Invoicing & Payments --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Invoicing &amp; Payments</h3>
                        <p class="svc-card__desc">
                            Send branded invoices, accept online payments, and get paid faster — with automatic reminders.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> Recurring invoices</li>
                            <li><i class="fa-solid fa-check"></i> Multi-currency support</li>
                            <li><i class="fa-solid fa-check"></i> Payment gateway sync</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Card 4 — Compliance & Tax --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Compliance &amp; Tax</h3>
                        <p class="svc-card__desc">
                            Stay audit-ready with built-in tax rules, VAT/GST handling, and secure document storage.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> Tax rule automation</li>
                            <li><i class="fa-solid fa-check"></i> Audit trail</li>
                            <li><i class="fa-solid fa-check"></i> Encrypted records</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Card 5 — Team Collaboration --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Team Collaboration</h3>
                        <p class="svc-card__desc">
                            Give accountants, managers, and owners the right access — with role-based permissions and approvals.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> Role-based access</li>
                            <li><i class="fa-solid fa-check"></i> Approval workflows</li>
                            <li><i class="fa-solid fa-check"></i> Comment threads</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Card 6 — Integrations --}}
            <article class="svc-card" data-svc-card data-svc-slide>
                <div class="svc-card__inner">
                    <div class="svc-card__face svc-card__face--front">
                        <div class="svc-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                            </svg>
                        </div>
                        <h3 class="svc-card__title">Integrations</h3>
                        <p class="svc-card__desc">
                            Connect the tools you already use — payroll, CRM, e-commerce, and banking — in a few clicks.
                        </p>
                        <ul class="svc-card__features">
                            <li><i class="fa-solid fa-check"></i> REST API &amp; webhooks</li>
                            <li><i class="fa-solid fa-check"></i> 40+ native connectors</li>
                            <li><i class="fa-solid fa-check"></i> Zapier &amp; Make support</li>
                        </ul>
                        <a href="#" class="svc-card__link">
                            Learn more
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="svc-card__face svc-card__face--back">
                        <div class="svc-card__back-mark">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L21 7.5L12 13L3 7.5L12 2Z"/>
                                <path d="M3 7.5V16.5L12 22V13L3 7.5Z"/>
                                <path d="M21 7.5V16.5L12 22V13L21 7.5Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </article>

        </div>

    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/services-grid.js') }}" defer></script>
    @endpush
@endonce





