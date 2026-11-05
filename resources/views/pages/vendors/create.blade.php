<!-- resources/views/pages/vendors/create.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

<div class="ag-page-wrapper">
    
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Accounting › Vendors › Create</div>
            <h1 class="ag-title">Create Vendor</h1>
            <p class="ag-subtitle">Add a new vendor with their general profile, billing, and shipping details.</p>
        </div>
        <a href="#" class="ag-btn-outline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back
        </a>
    </div>

    <div class="ag-card">
        
        <!-- Wizard Header -->
        <div class="ag-wizard-header">
            <div class="ag-step active" id="step-indicator-1">
                <div class="ag-step-circle">1</div>
                General Info
            </div>
            <div class="ag-step-line"></div>
            <div class="ag-step" id="step-indicator-2">
                <div class="ag-step-circle">2</div>
                Billing Address
            </div>
            <div class="ag-step-line"></div>
            <div class="ag-step" id="step-indicator-3">
                <div class="ag-step-circle">3</div>
                Shipping Address & Notes
            </div>
        </div>

        <form action="#" method="POST">
            @csrf
            
            <!-- STEP 1: General Info -->
            <div id="step-1" class="wizard-step">
                <div class="ag-form-grid">
                    <div>
                        <label class="ag-label">User <span>*</span></label>
                        <select class="ag-input">
                            <option>Select a user</option>
                            <option>User 1</option>
                        </select>
                        <span class="ag-help-text">Create user here. <a href="#">Create user</a><br>Note: Only users with vendor role who are not already assigned to other vendors will appear in this list.</span>
                    </div>
                    <div>
                        <label class="ag-label">Contact Person <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter contact person name">
                    </div>
                    
                    <div>
                        <label class="ag-label">Company Name <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter company name">
                    </div>
                    <div>
                        <label class="ag-label">Email <span>*</span></label>
                        <input type="email" class="ag-input" placeholder="Enter email address">
                    </div>
                    
                    <div>
                        <label class="ag-label">Tax Number</label>
                        <input type="text" class="ag-input" placeholder="Enter tax number">
                    </div>
                    <div>
                        <label class="ag-label">Mobile Number</label>
                        <input type="text" class="ag-input" placeholder="+1234567890">
                        <span class="ag-help-text">Format: +[country code][phone number]</span>
                    </div>

                    <div class="ag-form-grid-full">
                        <label class="ag-label">Payment Terms</label>
                        <input type="text" class="ag-input" placeholder="e.g., Net 30">
                    </div>
                </div>
            </div>

            <!-- STEP 2: Billing Address -->
            <div id="step-2" class="wizard-step" style="display: none;">
                <div class="ag-form-grid">
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Billing Address Line 1 <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Street address, P.O. box, company name">
                    </div>
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Billing Address Line 2</label>
                        <input type="text" class="ag-input" placeholder="Apartment, suite, unit, building, floor, etc.">
                    </div>
                    <div>
                        <label class="ag-label">City <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter city">
                    </div>
                    <div>
                        <label class="ag-label">State / Province <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter state">
                    </div>
                    <div>
                        <label class="ag-label">Postal / Zip Code <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter zip code">
                    </div>
                    <div>
                        <label class="ag-label">Country <span>*</span></label>
                        <select class="ag-input">
                            <option>Select Country</option>
                            <option>Pakistan</option>
                            <option>USA</option>
                            <option>UK</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Shipping Address & Notes -->
            <div id="step-3" class="wizard-step" style="display: none;">
                <div class="ag-form-grid">
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Shipping Address Line 1</label>
                        <input type="text" class="ag-input" placeholder="Street address, P.O. box, company name">
                    </div>
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Shipping Address Line 2</label>
                        <input type="text" class="ag-input" placeholder="Apartment, suite, unit, building, floor, etc.">
                    </div>
                    <div>
                        <label class="ag-label">City</label>
                        <input type="text" class="ag-input" placeholder="Enter city">
                    </div>
                    <div>
                        <label class="ag-label">State / Province</label>
                        <input type="text" class="ag-input" placeholder="Enter state">
                    </div>
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Additional Notes</label>
                        <textarea class="ag-input" rows="3" placeholder="Any additional information about this vendor..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="ag-footer-btns">
                <button type="button" class="ag-btn-secondary" id="btn-prev" style="display: none;">Previous</button>
                <button type="button" class="ag-btn-green" id="btn-next">Next</button>
                <button type="submit" class="ag-btn-green" id="btn-submit" style="display: none;">Create Vendor</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/vendor.js') }}"></script>
@endsection