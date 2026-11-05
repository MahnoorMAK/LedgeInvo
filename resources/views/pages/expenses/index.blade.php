<!-- resources/views/pages/expenses/index.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/expense.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Main Page Header -->
    <div class="ag-header-row">
        <div>
            <div class="ag-breadcrumb" style="color: #64748b; font-size: 13px; margin-bottom: 8px;">Dashboard › Accounting › Expenses</div>
            <h1 class="ag-title">Manage Expenses</h1>
            <p class="ag-subtitle">Track your company's expenses and costs.</p>
        </div>
        <button class="ag-btn-create" id="open-modal-btn">+</button>
    </div>

    <!-- EXPENSE TABLE -->
    <div style="background: #fff; border: 1px solid var(--ag-border); border-radius: 10px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background-color: #f8fafc; border-bottom: 1px solid var(--ag-border);">
                <tr>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Expense ID</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Date</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Category</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Amount</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid var(--ag-border);">
                    <td style="padding: 16px; font-size: 14px; font-weight: 500; color: #0f172a;">EXP-2026-001</td>
                    <td style="padding: 16px; font-size: 14px; color: #64748b;">Nov 05, 2026</td>
                    <td style="padding: 16px; font-size: 14px; color: #334155;">Rent Expense</td>
                    <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #ef4444;">- $2,500.00</td>
                    <td style="padding: 16px;">
                        <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Approved</span>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--ag-border);">
                    <td style="padding: 16px; font-size: 14px; font-weight: 500; color: #0f172a;">EXP-2026-002</td>
                    <td style="padding: 16px; font-size: 14px; color: #64748b;">Nov 04, 2026</td>
                    <td style="padding: 16px; font-size: 14px; color: #334155;">Utility Bills</td>
                    <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #ef4444;">- $850.00</td>
                    <td style="padding: 16px;">
                        <span style="background: #fef08a; color: #854d0e; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Pending</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ========================================== -->
    <!-- MODAL (Create Expense Form)                -->
    <!-- ========================================== -->
    <div class="ag-modal-overlay" id="expense-modal">
        <div class="ag-modal">
            <div class="ag-modal-header">
                <h2 class="ag-modal-title">Create Expense</h2>
                <button class="ag-modal-close" id="close-modal-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            
            <form action="#" method="POST">
                @csrf
                <div class="ag-modal-body">
                    <div class="ag-form-grid">
                        <!-- Row 1 -->
                        <div>
                            <label class="ag-label">Expense Date <span>*</span></label>
                            <div class="ag-input-wrapper">
                                <input type="date" class="ag-input" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div>
                            <label class="ag-label">Category <span>*</span></label>
                            <select class="ag-input">
                                <option>Select Category</option>
                                <option>Rent Expense</option>
                                <option>Utility Bills</option>
                                <option>Office Supplies</option>
                            </select>
                        </div>

                        <!-- Row 2 -->
                        <div>
                            <label class="ag-label">Bank Account <span>*</span></label>
                            <select class="ag-input">
                                <option>Select Bank Account</option>
                                <option>Main Bank</option>
                            </select>
                        </div>
                        <div>
                            <label class="ag-label">Chart of Account <span>*</span></label>
                            <select class="ag-input">
                                <option>Select Chart of Account</option>
                                <option>Expense Account</option>
                            </select>
                        </div>

                        <!-- Row 3 -->
                        <div>
                            <label class="ag-label">Amount <span>*</span></label>
                            <div class="ag-input-wrapper">
                                <svg class="ag-input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <input type="number" class="ag-input ag-input-icon-left" placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label class="ag-label">Reference Number</label>
                            <input type="text" class="ag-input" placeholder="Enter Reference Number">
                        </div>

                        <!-- Row 4 -->
                        <div class="ag-form-grid-full">
                            <label class="ag-label">Description</label>
                            <div class="ag-input-wrapper">
                                <textarea class="ag-input ag-textarea" placeholder="Enter Description"></textarea>
                                <button type="button" class="ag-textarea-magic" title="Auto-generate">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ag-modal-footer">
                    <button type="button" class="ag-btn-secondary" id="cancel-modal-btn">Cancel</button>
                    <button type="submit" class="ag-btn-green">Create</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('js/expense.js') }}"></script>
@endsection