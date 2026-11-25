{{-- ============================================================
     APEXBOOKS — MODULES TABS
     Tabs + two-column panel with image on the right
     ============================================================ --}}
<section class="modules-section" id="modulesSection">

    <div class="modules-header">
        <h2 class="modules-title">Complete Business Modules</h2>
        <p class="modules-subtitle">
            Discover our comprehensive modules designed to streamline every
            aspect of your business operations.
        </p>
    </div>

    {{-- Tab bar --}}
    <div class="modules-tabs" role="tablist">
        <button class="modules-tab is-active" data-tab="accounting" role="tab" aria-selected="true">Accounting</button>
        <button class="modules-tab" data-tab="retainer" role="tab" aria-selected="false">Retainer</button>
        <button class="modules-tab" data-tab="contract" role="tab" aria-selected="false">Contract</button>
        <button class="modules-tab" data-tab="assets" role="tab" aria-selected="false">Assets</button>
        <button class="modules-tab" data-tab="budget" role="tab" aria-selected="false">Budget</button>
    </div>

    {{-- Panels --}}
    <div class="modules-panels">

        {{-- Panel: Accounting --}}
        <div class="modules-panel is-active" data-panel="accounting">
            <div class="modules-panel-text">
                <h3>Comprehensive Financial Management</h3>
                <p>
                    Experience the precision of a fully integrated double-entry
                    accounting system deeply integrated into your daily operations.
                    Automate complex bookkeeping tasks, manage comprehensive accounts
                    payable and receivable, and generate detailed financial reports
                    on demand.
                </p>
                <p>
                    From real-time balance sheets to granular profit and loss
                    statements, gain a 360-degree view of your organization's
                    financial health — ensuring every decision is backed by
                    accurate data.
                </p>
            </div>
            <div class="modules-panel-visual">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1400&auto=format&fit=crop" alt="Accounting dashboard">
            </div>
        </div>

        {{-- Panel: Retainer --}}
        <div class="modules-panel" data-panel="retainer">
            <div class="modules-panel-text">
                <h3>Effortless Retainer Management</h3>
                <p>
                    Simplify long-term client engagements with automated retainer
                    invoicing. Track prepaid balances, monitor usage in real time,
                    and generate transparent reports that build trust with your
                    clients.
                </p>
                <p>
                    Automatic top-up reminders, granular consumption tracking, and
                    seamless recurring billing mean you never miss an invoice again.
                </p>
            </div>
            <div class="modules-panel-visual">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1400&auto=format&fit=crop" alt="Retainer management">
            </div>
        </div>

        {{-- Panel: Contract --}}
        <div class="modules-panel" data-panel="contract">
            <div class="modules-panel-text">
                <h3>Digital Contract Lifecycle</h3>
                <p>
                    Create, review, and manage every business contract from a single
                    organized workspace. Version control, e-signature integration,
                    and automated renewal reminders keep your legal operations
                    moving without friction.
                </p>
                <p>
                    Search inside any document, get alerts before expiry dates,
                    and store everything with bank-grade encryption.
                </p>
            </div>
            <div class="modules-panel-visual">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1400&auto=format&fit=crop" alt="Contract management">
            </div>
        </div>

        {{-- Panel: Assets --}}
        <div class="modules-panel" data-panel="assets">
            <div class="modules-panel-text">
                <h3>Complete Asset Visibility</h3>
                <p>
                    Track every physical and digital asset across your organization.
                    Automatic depreciation schedules, lifecycle alerts, and location
                    history keep your fixed-asset register always accurate.
                </p>
                <p>
                    Generate compliance-ready asset reports for auditors and
                    stakeholders in seconds — not days.
                </p>
            </div>
            <div class="modules-panel-visual">
                <img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?q=80&w=1400&auto=format&fit=crop" alt="Asset tracking">
            </div>
        </div>

        {{-- Panel: Budget --}}
        <div class="modules-panel" data-panel="budget">
            <div class="modules-panel-text">
                <h3>Strategic Budget Planning</h3>
                <p>
                    Build detailed budgets at company, department, or project level.
                    Compare plans against actuals in real time and see exactly where
                    you're over or under — before the quarter ends.
                </p>
                <p>
                    Forecast scenarios, model headcount changes, and share
                    dashboards with stakeholders in a single click.
                </p>
            </div>
            <div class="modules-panel-visual">
                <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07?q=80&w=1400&auto=format&fit=crop" alt="Budget planning">
            </div>
        </div>

    </div>
</section>

{{-- Load once --}}
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/modules.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/modules.js') }}" defer></script>
    @endpush
@endonce