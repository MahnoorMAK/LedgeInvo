<!-- resources/views/pages/sales-returns/create.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/returns.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Header Area -->
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Sales Returns › Create Sales Return</div>
            <h1 class="ag-title">Create Sales Return</h1>
            <p class="ag-subtitle">Initiate a sales return from a previously posted invoice. Select invoice, specify quantities to return, warehouse, and reasons.</p>
        </div>
        <a href="#" class="ag-btn-outline">← Back</a>
    </div>

    <!-- Main Layout -->
    <div class="ag-layout">
        
        <!-- LEFT COLUMN -->
        <div class="ag-col-left">
            
            <!-- Card 1: Details -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">📅</div>
                        <h2 class="ag-card-title">Sales Return Details</h2>
                    </div>
                </div>
                
                <div class="ag-form-grid">
                    <div>
                        <label class="ag-label">Return Date *</label>
                        <input type="date" class="ag-input" value="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="ag-label">Original Invoice *</label>
                        <select class="ag-input">
                            <option>Select Invoice</option>
                            <option>INV-001</option>
                            <option>INV-002</option>
                        </select>
                    </div>
                    <div>
                        <label class="ag-label">Warehouse *</label>
                        <select class="ag-input">
                            <option>Select Warehouse</option>
                            <option>Main Warehouse</option>
                        </select>
                    </div>
                    <div>
                        <label class="ag-label">Return Reason *</label>
                        <select class="ag-input">
                            <option>Defective</option>
                            <option>Wrong Item</option>
                            <option>Customer Changed Mind</option>
                        </select>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- RIGHT COLUMN -->
        <div class="ag-col-right">
            
            <!-- Summary Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box" style="background: #f0fdf4;">🧾</div>
                        <h2 class="ag-card-title">Return Summary</h2>
                    </div>
                </div>
                
                <div class="ag-summary-row">
                    <span>Subtotal</span>
                    <span style="font-weight: 600; color: #0f172a;">$0.00</span>
                </div>
                
                <div class="ag-summary-total">
                    <span>Total Amount</span>
                    <span>$0.00</span>
                </div>
            </div>

            <!-- Additional Notes Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">📝</div>
                        <h2 class="ag-card-title">Additional Notes</h2>
                    </div>
                </div>
                <label class="ag-label">Notes</label>
                <textarea class="ag-input" rows="4" placeholder="Additional notes..."></textarea>
            </div>

            <!-- Actions Card -->
            <div class="ag-card">
                <div style="display: flex; align-items: center; gap: 8px; color: var(--ag-text-muted); font-size: 13px; margin-bottom: 16px;">
                    🛒 0 items selected for return
                </div>
                
                <button class="ag-btn-green ag-btn-disabled" disabled>Create Return</button>
                
                <button class="ag-btn-outline" style="width: 100%; margin-top: 12px; justify-content: center;">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endsection