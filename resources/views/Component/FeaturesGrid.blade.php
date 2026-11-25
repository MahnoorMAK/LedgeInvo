{{-- ============================================================
     APEXBOOKS — FEATURES GRID
     6 feature cards with animated entrance
     ============================================================ --}}
<section class="features-section">

    <div class="features-header">
        <h2 class="features-title">Powerful Financial Features</h2>
        <p class="features-subtitle">
            Everything your business needs to manage finances, inventory,
            and growth in one integrated platform.
        </p>
    </div>

    <div class="features-grid" id="featuresGrid">

        {{-- Card 1 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h11l5 5v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"/>
                    <path d="M15 4v5h5"/>
                    <path d="M8 13h8M8 17h5"/>
                </svg>
            </div>
            <h3 class="feature-title">Double Entry Accounting</h3>
            <p class="feature-desc">
                Maintain impeccable financial records with our industry-standard
                double-entry ledger system, designed to ensure every transaction
                is perfectly balanced and audit-ready for total compliance.
            </p>
        </div>

        {{-- Card 2 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <path d="M14 2v6h6"/>
                    <path d="M9 13l2 2 4-4"/>
                    <path d="M9 17h6"/>
                </svg>
            </div>
            <h3 class="feature-title">Contract Management</h3>
            <p class="feature-desc">
                Streamline your legal workflows by creating, tracking, and
                managing all business contracts digitally. Set automated
                reminders for renewals and keep all documents secure.
            </p>
        </div>

        {{-- Card 3 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <path d="M16 2v4M8 2v4M3 10h18"/>
                    <path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/>
                </svg>
            </div>
            <h3 class="feature-title">Budget Planning</h3>
            <p class="feature-desc">
                Take command of your company's financial future with robust
                budgeting tools. Analyze variance in real-time and adjust
                departmental allocations to maximize efficiency.
            </p>
        </div>

        {{-- Card 4 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21h18"/>
                    <path d="M5 21V7l8-4v18"/>
                    <path d="M19 21V11l-6-4"/>
                    <path d="M9 9h.01M9 12h.01M9 15h.01M9 18h.01"/>
                </svg>
            </div>
            <h3 class="feature-title">Asset Tracking</h3>
            <p class="feature-desc">
                Gain complete visibility over your physical and functional
                assets. Automatically calculate depreciation, track location
                history, and schedule maintenance to prolong asset lifecycles.
            </p>
        </div>

        {{-- Card 5 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <circle cx="12" cy="12" r="6"/>
                    <circle cx="12" cy="12" r="2"/>
                </svg>
            </div>
            <h3 class="feature-title">Goal Tracking</h3>
            <p class="feature-desc">
                Define clear financial targets and monitor progress with
                dynamic, real-time dashboards. Empower your teams to stay
                aligned with organizational objectives through visual indicators.
            </p>
        </div>

        {{-- Card 6 --}}
        <div class="feature-card">
            <div class="feature-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                    <circle cx="12" cy="12" r="2"/>
                    <path d="M6 12h.01M18 12h.01"/>
                </svg>
            </div>
            <h3 class="feature-title">Retainer Invoicing</h3>
            <p class="feature-desc">
                Simplify long-term client engagements with automated retainer
                invoicing. Track usage against pre-paid amounts and generate
                transparent reports to build trust with your clients.
            </p>
        </div>

    </div>
</section>

{{-- Load once --}}
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/features.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/features.js') }}" defer></script>
    @endpush
@endonce