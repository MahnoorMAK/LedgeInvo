<!-- resources/views/pages/balance-sheet/index.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/balance-sheet.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Header Area -->
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Accounting & Finance › Balance Sheets</div>
            <h1 class="ag-title">Balance Sheet</h1>
            <p class="ag-subtitle">Statement of Financial Position as of {{ date('F d, Y') }}</p>
        </div>
        <a href="#" class="ag-btn-outline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Reports
        </a>
    </div>

    <div class="ag-layout">
        
        <!-- LEFT COLUMN: ASSETS -->
        <div class="ag-col-left">
            
            <!-- Filter Card -->
            <div class="ag-card" style="padding: 16px 24px;">
                <div class="ag-form-grid" style="align-items: center;">
                    <div>
                        <label class="ag-label" style="margin-bottom: 4px; font-size: 11px; text-transform: uppercase; color: #64748b;">As of Date</label>
                        <input type="date" class="ag-input" value="{{ date('Y-m-d') }}" style="border: none; padding: 0; font-weight: 600; font-size: 15px;">
                    </div>
                    <div style="text-align: right;">
                        <span class="ag-badge-success" style="display: inline-flex; align-items: center; gap: 4px;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Balanced
                        </span>
                    </div>
                </div>
            </div>

            <!-- Assets Table Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h2 class="ag-card-title">Assets</h2>
                    </div>
                </div>

                <table class="ag-table">
                    <tbody>
                        <!-- Current Assets Section -->
                        <tr style="background-color: #f8fafc;">
                            <td colspan="2" style="font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Current Assets</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 24px;">Cash & Cash Equivalents</td>
                            <td style="text-align: right; font-weight: 500;">$ 15,000.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 24px;">Accounts Receivable</td>
                            <td style="text-align: right; font-weight: 500;">$ 5,500.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 24px;">Inventory</td>
                            <td style="text-align: right; font-weight: 500;">$ 12,000.00</td>
                        </tr>
                        <tr style="border-bottom: none;">
                            <td style="padding-left: 24px; font-weight: 600; color: #0f172a;">Total Current Assets</td>
                            <td style="text-align: right; font-weight: 600; color: #0f172a;">$ 32,500.00</td>
                        </tr>

                        <!-- Fixed Assets Section -->
                        <tr style="background-color: #f8fafc; border-top: 1px solid #e2e8f0;">
                            <td colspan="2" style="font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Fixed Assets</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 24px;">Property, Plant & Equipment</td>
                            <td style="text-align: right; font-weight: 500;">$ 50,000.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 24px;">Less: Accumulated Depreciation</td>
                            <td style="text-align: right; font-weight: 500; color: #ef4444;">($ 5,000.00)</td>
                        </tr>
                        <tr style="border-bottom: none;">
                            <td style="padding-left: 24px; font-weight: 600; color: #0f172a;">Total Fixed Assets</td>
                            <td style="text-align: right; font-weight: 600; color: #0f172a;">$ 45,000.00</td>
                        </tr>
                    </tbody>
                    <tfoot style="border-top: 2px solid #0f172a;">
                        <tr>
                            <td style="font-weight: 700; font-size: 16px; padding-top: 16px; color: #0f172a;">TOTAL ASSETS</td>
                            <td style="text-align: right; font-weight: 700; font-size: 16px; padding-top: 16px; color: var(--ag-green);">$ 77,500.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>

        <!-- RIGHT COLUMN: LIABILITIES & EQUITY -->
        <div class="ag-col-right">
            
            <!-- Liabilities Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box" style="background: #fef2f2; color: #ef4444;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </div>
                        <h2 class="ag-card-title">Liabilities</h2>
                    </div>
                </div>
                
                <table class="ag-table">
                    <tbody>
                        <tr style="background-color: #f8fafc;">
                            <td colspan="2" style="font-weight: 600; color: #475569; font-size: 12px; text-transform: uppercase;">Current Liabilities</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 12px;">Accounts Payable</td>
                            <td style="text-align: right; font-weight: 500;">$ 8,500.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 12px;">Short-term Loans</td>
                            <td style="text-align: right; font-weight: 500;">$ 2,000.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 12px; font-weight: 600; color: #0f172a; border-bottom: none;">Total Liabilities</td>
                            <td style="text-align: right; font-weight: 600; color: #0f172a; border-bottom: none;">$ 10,500.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Equity Card -->
            <div class="ag-card">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box" style="background: #f0fdf4; color: #10b981;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <h2 class="ag-card-title">Equity</h2>
                    </div>
                </div>
                
                <table class="ag-table">
                    <tbody>
                        <tr>
                            <td style="padding-left: 12px;">Owner's Capital</td>
                            <td style="text-align: right; font-weight: 500;">$ 50,000.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 12px;">Retained Earnings</td>
                            <td style="text-align: right; font-weight: 500;">$ 17,000.00</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 12px; font-weight: 600; color: #0f172a; border-bottom: none;">Total Equity</td>
                            <td style="text-align: right; font-weight: 600; color: #0f172a; border-bottom: none;">$ 67,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Total L&E Summary -->
            <div class="ag-card" style="background: #0f172a; color: #fff; border: none;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <div style="font-size: 12px; color: #94a3b8; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Total Liabilities & Equity</div>
                        <div style="font-size: 24px; font-weight: 700; color: #10b981;">$ 77,500.00</div>
                    </div>
                    <div style="background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 8px; border-radius: 50%;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection