{{-- ============================================================
     resources/views/Component/pricing.blade.php
     Flexible pricing — 3 tiers with accounting features
     Light purple theme + slow unfold reveal
     Usage: @include('Component.pricing')
     ============================================================ --}}

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    @endpush
@endonce

<section class="prc" id="pricing" data-prc>

    {{-- Header --}}
    <header class="prc__head" data-prc-reveal>
        <h2 class="prc__title">
            Flexible <span class="prc__title-accent">Pricing Plans</span><br>
            for Every Stage
        </h2>
        <p class="prc__subtitle">
            Choose a plan that fits your financial needs—start simple
            and upgrade as you grow.
        </p>
    </header>

    {{-- Billing toggle --}}
    <div class="prc__toggle" data-prc-reveal>
        <button type="button" class="prc__toggle-btn is-active" data-prc-billing="monthly">
            Monthly
        </button>
        <button type="button" class="prc__toggle-btn" data-prc-billing="yearly">
            Yearly
            <span class="prc__toggle-save">Save 20%</span>
        </button>
        <span class="prc__toggle-pill" data-prc-pill></span>
    </div>

    {{-- Cards --}}
    <div class="prc__grid">

        {{-- STARTER --}}
        <article class="prc__card prc__card--left" data-prc-card="left">
            <header class="prc__card-head">
                <h3 class="prc__card-name">Starter</h3>
                <p class="prc__card-desc">
                    For freelancers and solo founders getting their books in order.
                </p>
            </header>

            <div class="prc__price">
                <span class="prc__price-symbol">$</span>
                <span class="prc__price-amount"
                      data-prc-amount
                      data-monthly="19"
                      data-yearly="15">19</span>
                <span class="prc__price-period">/Month</span>
            </div>

            <div class="prc__features">
                <h4 class="prc__features-title">Key Features</h4>
                <ul class="prc__features-list">
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Up to 50 transactions / month</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>1 bank account sync</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Basic invoice creation</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Monthly financial reports</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Email support</li>
                </ul>
            </div>

            <a href="/register" class="prc__cta prc__cta--ghost">Get Started</a>
        </article>

        {{-- PREMIUM (featured) --}}
        <article class="prc__card prc__card--center prc__card--featured" data-prc-card="center">
            <header class="prc__card-head">
                <h3 class="prc__card-name">Premium</h3>
                <p class="prc__card-desc">
                    For growing businesses that need real-time insights and automation.
                </p>
            </header>

            <div class="prc__price">
                <span class="prc__price-symbol">$</span>
                <span class="prc__price-amount"
                      data-prc-amount
                      data-monthly="49"
                      data-yearly="39">49</span>
                <span class="prc__price-period">/Month</span>
            </div>

            <div class="prc__features">
                <h4 class="prc__features-title">Everything in Starter, plus:</h4>
                <ul class="prc__features-list">
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Unlimited transactions</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Up to 5 bank accounts</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Automated bank reconciliation</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>VAT &amp; tax calculations</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Real-time cash flow dashboards</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Recurring invoices &amp; reminders</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Multi-currency support</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Priority email &amp; chat support</li>
                </ul>
            </div>

            <a href="/register" class="prc__cta prc__cta--primary">Get Started</a>
        </article>

        {{-- EXCLUSIVE --}}
        <article class="prc__card prc__card--right" data-prc-card="right">
            <header class="prc__card-head">
                <h3 class="prc__card-name">Exclusive</h3>
                <p class="prc__card-desc">
                    For established firms and teams needing full audit-ready control.
                </p>
            </header>

            <div class="prc__price">
                <span class="prc__price-symbol">$</span>
                <span class="prc__price-amount"
                      data-prc-amount
                      data-monthly="99"
                      data-yearly="79">99</span>
                <span class="prc__price-period">/Month</span>
            </div>

            <div class="prc__features">
                <h4 class="prc__features-title">Everything in Premium, plus:</h4>
                <ul class="prc__features-list">
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Unlimited bank accounts &amp; users</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Full audit trail &amp; compliance logs</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Custom chart of accounts</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Payroll &amp; expense management</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>API access &amp; custom integrations</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Advanced forecasting &amp; budgeting</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>Dedicated account manager</li>
                    <li><span class="prc__check"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>24/7 phone &amp; priority support</li>
                </ul>
            </div>

            <a href="/register" class="prc__cta prc__cta--ghost">Get Started</a>
        </article>

    </div>

</section>

@once
    @push('scripts')
        <script src="{{ asset('js/pricing.js') }}" defer></script>
    @endpush
@endonce