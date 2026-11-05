<!-- resources/views/pages/revenues/index.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/revenue.css') }}">

<div class="ag-page-wrapper">
    
    <!-- Main Page Header -->
    <div class="ag-header-row">
        <div>
            <div class="ag-breadcrumb" style="color: #64748b; font-size: 13px; margin-bottom: 8px;">Dashboard › Accounting › Revenues</div>
            <h1 class="ag-title">Manage Revenues</h1>
            <p class="ag-subtitle">Track your company's income and revenue sources.</p>
        </div>
        <!-- Button to open modal -->
        <button class="ag-btn-create" id="open-modal-btn">+</button>
    </div>

    <!-- ========================================== -->
    <!-- REVENUE TABLE (Yeh ab yahan show hoga)     -->
    <!-- ========================================== -->
    <div style="background: #fff; border: 1px solid var(--ag-border); border-radius: 10px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background-color: #f8fafc; border-bottom: 1px solid var(--ag-border);">
                <tr>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Revenue ID</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Date</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Category</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Amount</th>
                    <th style="padding: 16px; color: #475569; font-weight: 600; font-size: 13px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data (Baad mein database se aayega) -->
                <tr style="border-bottom: 1px solid var(--ag-border);">
                    <td style="padding: 16px; font-size: 14px; font-weight: 500; color: #0f172a;">REV-2026-001</td>
                    <td style="padding: 16px; font-size: 14px; color: #64748b;">Nov 05, 2026</td>
                    <td style="padding: 16px; font-size: 14px; color: #334155;">Product Sales</td>
                    <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #10b981;">+ $15,000.00</td>
                    <td style="padding: 16px;">
                        <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Approved</span>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--ag-border);">
                    <td style="padding: 16px; font-size: 14px; font-weight: 500; color: #0f172a;">REV-2026-002</td>
                    <td style="padding: 16px; font-size: 14px; color: #64748b;">Nov 04, 2026</td>
                    <td style="padding: 16px; font-size: 14px; color: #334155;">Service Income</td>
                    <td style="padding: 16px; font-size: 14px; font-weight: 600; color: #10b981;">+ $5,500.00</td>
                    <td style="padding: 16px;">
                        <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Approved</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ========================================== -->
    <!-- MODAL (Create Revenue Form)                -->
    <!-- ========================================== -->
    <div class="ag-modal-overlay" id="revenue-modal">
        <div class="ag-modal">
            <div class="ag-modal-header">
                <h2 class="ag-modal-title">Create Revenue</h2>
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
                            <label class="ag-label">Revenue Date <span>*</span></label>
                            <div class="ag-input-wrapper">
                                <input type="date" class="ag-input" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div>
                            <label class="ag-label">Category <span>*</span></label>
                            <select class="ag-input">
                                <option>Select Category</option>
                                <option>Product Sales</option>
                                <option>Service Income</option>
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
                                <option>Revenue Account</option>
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

                        <!-- Row 4: Description -->
                        <div class="ag-form-grid-full">
                            <label class="ag-label">Description</label>
                            <div class="ag-input-wrapper">
                                <textarea class="ag-input ag-textarea" placeholder="Enter Description"></textarea>
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

<script src="{{ asset('js/revenue.js') }}"></script>
@endsection