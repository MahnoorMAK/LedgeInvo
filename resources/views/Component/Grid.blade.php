{{-- ============================================================
     resources/views/Component/Grid.blade.php
     Standalone Grid Component
     Usage: @include('Component.Grid')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    @endpush
@endonce

<section class="grid-section" id="gridComponent">

    {{-- ============================
         OPTIONAL HEADER
         Remove or keep depending on use
         ============================ --}}
    <div class="grid-header">
        <div class="grid-header__eyebrow">What we offer</div>
        <h2 class="grid-header__title">
            Everything you need to run your finances
        </h2>
    </div>

    {{-- ============================
         GRID TRACK
         ============================ --}}
    <div class="grid-track-wrap">
        <div class="grid-track" data-grid-track>

            {{-- ---------- Card 1 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">01</div>
                    <h3 class="grid-card__title">Automated Bookkeeping</h3>
                    <p class="grid-card__desc">
                        Every transaction categorized, reconciled, and posted
                        to your ledger — automatically, in real time.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- ---------- Card 2 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">02</div>
                    <h3 class="grid-card__title">Real-Time Analytics</h3>
                    <p class="grid-card__desc">
                        Live dashboards that turn raw numbers into the story
                        of your business — cash flow, margins, and growth.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- ---------- Card 3 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">03</div>
                    <h3 class="grid-card__title">Invoicing &amp; Payments</h3>
                    <p class="grid-card__desc">
                        Send branded invoices, accept online payments, and get
                        paid faster — with automatic reminders.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- ---------- Card 4 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">04</div>
                    <h3 class="grid-card__title">Compliance &amp; Tax</h3>
                    <p class="grid-card__desc">
                        Stay audit-ready with built-in tax rules, VAT/GST
                        handling, and secure document storage.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- ---------- Card 5 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">05</div>
                    <h3 class="grid-card__title">Team Collaboration</h3>
                    <p class="grid-card__desc">
                        Give accountants, managers, and owners the right access
                        — with role-based permissions and approvals.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

            {{-- ---------- Card 6 ---------- --}}
            <article class="grid-card">
                <div class="grid-card__media">
                    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1200&auto=format&fit=crop" alt="">
                </div>
                <div class="grid-card__body">
                    <div class="grid-card__eyebrow">06</div>
                    <h3 class="grid-card__title">Integrations</h3>
                    <p class="grid-card__desc">
                        Connect the tools you already use — payroll, CRM,
                        e-commerce, and banking — in a few clicks.
                    </p>
                    <a href="#" class="grid-card__link">
                        Learn more
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>

        </div>
    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/grid.js') }}" defer></script>
    @endpush
@endonce