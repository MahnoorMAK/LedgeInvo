{{-- resources/views/component/why-us.blade.php --}}

{{-- Load CSS for this component --}}
<link rel="stylesheet" href="{{ asset('css/c2.css') }}">

<section class="why-us">
    <div class="why-us__inner">

        {{-- HEADING --}}
        <div class="why-us__head" data-animate>
            <div class="why-us__badge">Why Choose Us?</div>
            <h2>Built for teams that <span>value their time</span></h2>
            <p>Here is why thousands of businesses trust our accounting platform every day.</p>
        </div>

        {{-- TIMELINE --}}
        <div class="why-timeline">
            <div class="why-timeline__progress" data-progress></div>

            {{-- Item 1 --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-content">
                    <h3>Save 20+ Hours Every Week</h3>
                    <p>
                        Stop drowning in spreadsheets. Our automation handles data entry,
                        invoicing, and reconciliation so your team can focus on growth.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Auto-categorize</span>
                        <span class="why-tl-tag">Bank sync</span>
                    </div>
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </div>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=600&fit=crop"
                        alt="Accounting spreadsheet with laptop and charts"
                        loading="lazy"
                    >
                </div>
            </div>

            {{-- Item 2 --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&h=600&fit=crop"
                        alt="Accountant reviewing ledgers and documents"
                        loading="lazy"
                    >
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4z"/>
                        <path d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div class="why-tl-content">
                    <h3>Bank Level Security</h3>
                    <p>
                        Your financial data is protected by 256-bit encryption, SOC 2
                        compliance, and daily encrypted backups, every single day.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">SOC 2</span>
                        <span class="why-tl-tag">256-bit</span>
                    </div>
                </div>
            </div>

            {{-- Item 3 --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-content">
                    <h3>Real-Time Insights</h3>
                    <p>
                        Live dashboards show exactly how your business is doing — cash flow,
                        profit margins, runway, and more — updated every second.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Live dashboard</span>
                        <span class="why-tl-tag">P&amp;L reports</span>
                    </div>
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"/>
                        <path d="M7 14l4-4 4 4 5-5"/>
                    </svg>
                </div>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1543286386-713bdd548da4?w=800&h=600&fit=crop"
                        alt="Financial chart and analytics on screen"
                        loading="lazy"
                    >
                </div>
            </div>

            {{-- Item 4 --}}
            <div class="why-tl-item" data-animate>
                <div class="why-tl-image">
                    <img
                        src="https://images.unsplash.com/photo-1573164713988-8665fc963095?w=800&h=600&fit=crop"
                        alt="Business team discussing financial reports"
                        loading="lazy"
                    >
                </div>
                <div class="why-tl-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="why-tl-content">
                    <h3>Built for Teams</h3>
                    <p>
                        Invite your accountants, assign roles, and collaborate on the
                        same books — live, with full activity history.
                    </p>
                    <div class="why-tl-tags">
                        <span class="why-tl-tag">Multi-user</span>
                        <span class="why-tl-tag">Role based</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- STATS STRIP --}}
        <div class="why-us__stats" data-animate data-stats>
            <div class="why-stat">
                <div class="why-stat__value" data-count="50000" data-suffix="+">0</div>
                <div class="why-stat__label">Active Businesses</div>
            </div>
            <div class="why-stat">
                <div class="why-stat__value" data-count="4.2" data-suffix="B" data-prefix="$" data-decimals="1">0</div>
                <div class="why-stat__label">Processed Monthly</div>
            </div>
            <div class="why-stat">
                <div class="why-stat__value" data-count="99.9" data-suffix="%" data-decimals="1">0</div>
                <div class="why-stat__label">Uptime Guaranteed</div>
            </div>
        </div>

    </div>
</section>

{{-- Load JS for this component --}}
<script src="{{ asset('js/c2.js') }}" defer></script>