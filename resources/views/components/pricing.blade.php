{{-- resources/views/components/pricing.blade.php --}}

<!-- Push CSS to Head (Layout mein load hoga) -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush

<!-- Pricing Section HTML -->
<section class="pricing-section">
    <div class="pricing-container">
        <div class="pricing-header">
            <h2>Simple, Transparent Pricing</h2>
            <p>Choose the plan that fits your business needs.</p>
        </div>

        <!-- Toggle Monthly/Yearly -->
        <div class="pricing-toggle">
            <span id="monthlyText" class="active-price-text">Monthly</span>
            <label class="toggle-switch">
                <input type="checkbox" id="pricingToggle">
                <span class="slider-toggle"></span>
            </label>
            <span id="yearlyText">Yearly <small>(Save 20%)</small></span>
        </div>

        <div class="pricing-grid">
            <!-- Cards (Same as before) -->
            <div class="price-card">
                <h3>Basic</h3>
                <div class="price-amount" data-monthly="$19" data-yearly="$15">$19</div>
                <span class="price-duration">per month</span>
                <ul class="price-features">
                    <li><i class="fa-solid fa-check"></i> 1 User Account</li>
                    <li><i class="fa-solid fa-check"></i> Basic Accounting</li>
                    <li><i class="fa-solid fa-check"></i> 5 Invoices/Month</li>
                    <li><i class="fa-solid fa-check"></i> Email Support</li>
                </ul>
                <a href="#" class="btn-pricing">Get Started</a>
            </div>
            
            <!-- Add Pro and Enterprise cards here... -->
        </div>
    </div>
</section>

<!-- Push JS to Bottom (Layout mein load hoga) -->
@push('scripts')
    <script src="{{ asset('js/pricing.js') }}"></script>
@endpush