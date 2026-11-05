<!-- resources/views/pages/vendor-payments/create.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/vendor-payments.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Header -->
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Accounting › Vendor Payments › Create Payment</div>
            <h1 class="ag-title">Create Vendor Payment</h1>
            <p class="ag-subtitle">Create a new vendor payment, select outstanding bills, apply debit notes, and allocate payment amounts.</p>
        </div>
        <a href="#" class="ag-btn-outline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back
        </a>
    </div>

    <!-- Card 1: Payment Details -->
    <div class="ag-card">
        <div class="ag-card-header">
            <div class="ag-icon-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <div class="ag-card-title-wrap">
                <h2 class="ag-card-title">Payment Details</h2>
                <p class="ag-card-desc">Enter the date, vendor, bank account, and payment reference information.</p>
            </div>
        </div>
        
        <div class="ag-form-grid">
            <!-- Payment Date -->
            <div>
                <label class="ag-label">Payment Date <span>*</span></label>
                <div class="ag-input-wrapper">
                    <input type="date" class="ag-input" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <!-- Vendor -->
            <div>
                <label class="ag-label">Vendor <span>*</span></label>
                <div class="ag-input-wrapper">
                    <select class="ag-input">
                        <option value="">Select Vendor</option>
                        <option value="1">Vendor A (Supplier)</option>
                        <option value="2">Vendor B (Supplier)</option>
                    </select>
                    <svg class="ag-select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>

            <!-- Bank Account -->
            <div>
                <label class="ag-label">Bank Account <span>*</span></label>
                <div class="ag-input-wrapper">
                    <select class="ag-input">
                        <option value="">Select Bank Account</option>
                        <option value="1">Main Bank</option>
                    </select>
                    <svg class="ag-select-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>

            <!-- Reference Number -->
            <div>
                <label class="ag-label">Reference Number</label>
                <div class="ag-input-wrapper">
                    <svg class="ag-input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                    <input type="text" class="ag-input ag-input-icon-left" placeholder="e.g., Check number, bank ref">
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Empty State -->
    <div class="ag-empty-state">
        <div class="ag-empty-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>
        <h3 class="ag-empty-title">Select a Vendor</h3>
        <p class="ag-empty-text">Please select a vendor from the details panel above to load their outstanding bills and available debit notes.</p>
    </div>

</div>
@endsection