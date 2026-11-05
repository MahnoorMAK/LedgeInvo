<!-- resources/views/pages/journal-entries/create.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/journal.css') }}">

<div class="ag-page-wrapper">
    
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Double Entry › Ledger Summary › Create Manual Journal Entry</div>
            <h1 class="ag-title">Create Manual Journal Entry</h1>
            <p class="ag-subtitle">Create a new manual journal entry by specifying dates, accounts, and debit/credit line items.</p>
        </div>
        <a href="#" class="ag-btn-outline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back
        </a>
    </div>

    <div class="ag-layout">
        
        <!-- LEFT COLUMN -->
        <div class="ag-col-left">
            
            <!-- Card 1: Details -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <h2 class="ag-card-title">Journal Entry Details</h2>
                    </div>
                </div>
                
                <div class="ag-form-grid">
                    <div>
                        <label class="ag-label">Journal Date *</label>
                        <input type="date" class="ag-input" value="{{ date('Y-m-d') }}">
                    </div>
                    <div>
                        <label class="ag-label">Reference Type *</label>
                        <input type="text" class="ag-input" placeholder="e.g., adjustment, correction">
                    </div>
                    <div class="ag-form-grid-full">
                        <label class="ag-label">Description *</label>
                        <textarea class="ag-input" rows="2" placeholder="Enter description (minimum 5 characters)..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Card 2: Line Items -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h2 class="ag-card-title">Journal Line Items</h2>
                    </div>
                    <button type="button" id="add-line-btn" class="ag-btn-green" style="padding: 8px 16px; font-size: 13px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Add Item
                    </button>
                </div>

                <table class="ag-table">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Account *</th>
                            <th style="width: 30%;">Description</th>
                            <th style="width: 15%;">Debit</th>
                            <th style="width: 15%;">Credit</th>
                            <th style="width: 10%; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="journal-items-body">
                        <tr>
                            <td>
                                <select class="ag-input" style="padding: 8px 10px;">
                                    <option>Select Account</option>
                                    <option>Cash</option>
                                    <option>Bank</option>
                                    <option>Sales Revenue</option>
                                </select>
                            </td>
                            <td><input type="text" class="ag-input" placeholder="Line description" style="padding: 8px 10px;"></td>
                            <td><input type="number" class="ag-input debit-input" value="0" style="padding: 8px 10px;"></td>
                            <td><input type="number" class="ag-input credit-input" value="0" style="padding: 8px 10px;"></td>
                            <td style="text-align: center;">
                                <!-- SVG Trash Icon -->
                                <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px;">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <!-- RIGHT COLUMN -->
        <div class="ag-col-right">
            
            <!-- Summary Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box" style="background: #f0fdf4;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <h2 class="ag-card-title">Journal Summary</h2>
                    </div>
                </div>
                
                <div class="ag-summary-row">
                    <span>Total Debit</span>
                    <strong id="total-debit">$0.00</strong>
                </div>
                <div class="ag-summary-row">
                    <span>Total Credit</span>
                    <strong id="total-credit">$0.00</strong>
                </div>
                
                <div class="ag-summary-total" style="align-items: center;">
                    <span>Balance Status</span>
                    <span id="balance-status" class="ag-badge-danger">Unbalanced</span>
                </div>
                
                <div class="ag-summary-row" style="margin-top: 12px; font-weight: 600; color: var(--ag-red);">
                    <span>Difference</span>
                    <span id="difference-amount">$0.00</span>
                </div>
            </div>

            <!-- Reference Details Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        </div>
                        <h2 class="ag-card-title">Reference Details</h2>
                    </div>
                </div>
                <div class="ag-summary-row">
                    <span>Reference Type</span>
                    <span style="color: #94a3b8; font-size: 13px;">No reference specified.</span>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/journal.js') }}"></script>
@endsection