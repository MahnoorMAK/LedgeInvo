<!-- resources/views/pages/account-types/index.blade.php -->
@extends('layout.app') 

@section('content')
<style>
    /* ===== CSS EXACT AS SCREENSHOT ===== */
    :root {
        --ag-green: #10b981;
        --ag-green-hover: #059669;
        --ag-border: #e2e8f0;
        --ag-text-main: #0f172a;
        --ag-text-muted: #64748b;
    }

    .ag-page-wrapper {
        background-color: #f8fafc;
        padding: 24px 32px;
        font-family: 'Inter', sans-serif;
        color: var(--ag-text-main);
        min-height: 100vh;
        position: relative;
    }

    .ag-header-row {
        display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;
    }
    .ag-breadcrumb { color: var(--ag-text-muted); font-size: 13px; margin-bottom: 8px; }
    .ag-title { margin: 0; font-size: 24px; font-weight: 600; }
    .ag-subtitle { margin: 6px 0 0 0; color: var(--ag-text-muted); font-size: 14px; }

    .ag-btn-create {
        background: var(--ag-green); color: white; border: none; width: 40px; height: 40px;
        border-radius: 8px; cursor: pointer; font-size: 22px; display: flex;
        align-items: center; justify-content: center; box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.4);
    }

    /* Modal Overlay */
    .ag-modal-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(15, 23, 42, 0.4);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        display: none; 
        align-items: center; justify-content: center; z-index: 1000;
        padding: 20px;
    }

    /* Modal Box */
    .ag-modal {
        background: #ffffff; border-radius: 10px; width: 100%; max-width: 500px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        display: flex; flex-direction: column; 
        max-height: 95vh; overflow: hidden;
        animation: modalFadeIn 0.2s ease-out;
    }

    @keyframes modalFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .ag-modal-header {
        display: flex; justify-content: space-between; align-items: center;
        padding: 20px 24px; border-bottom: 1px solid var(--ag-border); background: #fff;
    }
    .ag-modal-title { margin: 0; font-size: 18px; font-weight: 600; color: var(--ag-text-main); }
    .ag-modal-close { background: none; border: none; color: #64748b; cursor: pointer; padding: 4px; }
    .ag-modal-close:hover { color: #ef4444; }

    /* Body & Forms */
    .ag-modal-body { padding: 24px; overflow-y: auto; }

    .ag-form-group { margin-bottom: 20px; }

    .ag-label { display: block; margin-bottom: 8px; color: #334155; font-size: 14px; font-weight: 500; }
    .ag-label span { color: #ef4444; }

    .ag-input {
        width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px;
        outline: none; font-size: 14px; color: #334155; background: #fff; box-sizing: border-box;
    }
    .ag-input:focus { border-color: var(--ag-green); box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }
    .ag-input::placeholder { color: #94a3b8; }
    .ag-input:disabled { background: #f8fafc; color: #94a3b8; cursor: not-allowed; }

    /* Custom Radio Buttons */
    .ag-radio-group { display: flex; gap: 20px; align-items: center; margin-top: 4px; }
    .ag-radio-label {
        display: flex; align-items: center; gap: 8px; cursor: pointer;
        font-size: 14px; color: #334155;
    }
    .ag-radio-label input[type="radio"] {
        appearance: none; -webkit-appearance: none; width: 16px; height: 16px;
        border: 2px solid #10b981; border-radius: 50%; outline: none; cursor: pointer;
        position: relative; margin: 0;
    }
    .ag-radio-label input[type="radio"]:not(:checked) { border-color: #cbd5e1; }
    .ag-radio-label input[type="radio"]:checked::after {
        content: ''; position: absolute; top: 50%; left: 50%;
        transform: translate(-50%, -50%); width: 8px; height: 8px;
        background-color: var(--ag-green); border-radius: 50%;
    }

    /* Footer Buttons */
    .ag-modal-footer {
        display: flex; justify-content: flex-end; gap: 12px;
        padding: 16px 24px; border-top: 1px solid var(--ag-border); background: #fff;
    }
    .ag-btn-secondary {
        background: #fff; border: 1px solid #cbd5e1; color: #475569; padding: 10px 20px;
        border-radius: 6px; font-weight: 500; cursor: pointer; font-size: 14px;
    }
    .ag-btn-secondary:hover { background: #f8fafc; }
    .ag-btn-green {
        background: var(--ag-green); color: white; border: none; padding: 10px 20px;
        border-radius: 6px; font-weight: 500; cursor: pointer; font-size: 14px;
    }
    .ag-btn-green:hover { background: var(--ag-green-hover); }

    /* Table Icon */
    .ag-table-icon { color: #3b82f6; cursor: pointer; display: inline-flex; }
</style>

<div class="ag-page-wrapper">
    
    <!-- Main Page Header -->
    <div class="ag-header-row">
        <div>
            <div class="ag-breadcrumb">Dashboard › Accounting › System Setup › Account Types</div>
            <h1 class="ag-title">System Setup</h1>
            <p class="ag-subtitle">Manage your account types and categories.</p>
        </div>
        <button class="ag-btn-create" id="open-modal-btn">+</button>
    </div>

    <!-- Background Table -->
    <div style="background: #fff; border: 1px solid var(--ag-border); border-radius: 10px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc; border-bottom: 1px solid var(--ag-border);">
                <tr>
                    <th style="padding: 16px; color: #475569; font-size: 13px; font-weight: 600;">Category Name</th>
                    <th style="padding: 16px; color: #475569; font-size: 13px; font-weight: 600;">Is Active</th>
                    <th style="padding: 16px; color: #475569; font-size: 13px; font-weight: 600;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 16px; font-size: 14px;">Assets</td>
                    <td style="padding: 16px;"><span style="background: #ecfdf5; color: #047857; padding: 4px 10px; border-radius: 20px; font-size: 12px;">Active</span></td>
                    <td style="padding: 16px;">
                        <!-- SVG Edit Icon -->
                        <span class="ag-table-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 16px; font-size: 14px;">Liabilities</td>
                    <td style="padding: 16px;"><span style="background: #ecfdf5; color: #047857; padding: 4px 10px; border-radius: 20px; font-size: 12px;">Active</span></td>
                    <td style="padding: 16px;">
                        <!-- SVG Edit Icon -->
                        <span class="ag-table-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- MODAL -->
    <div class="ag-modal-overlay" id="account-type-modal">
        <div class="ag-modal">
            <div class="ag-modal-header">
                <h2 class="ag-modal-title">Create Account Type</h2>
                <button class="ag-modal-close" id="close-modal-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            
            <form action="#" method="POST">
                @csrf
                <div class="ag-modal-body">
                    
                    <div class="ag-form-group">
                        <label class="ag-label">Category <span>*</span></label>
                        <select class="ag-input">
                            <option value="">Select Category</option>
                            <option value="asset">Asset</option>
                            <option value="liability">Liability</option>
                            <option value="equity">Equity</option>
                            <option value="revenue">Revenue</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>

                    <div class="ag-form-group">
                        <label class="ag-label">Name <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Enter Name">
                    </div>

                    <div class="ag-form-group">
                        <label class="ag-label">Code <span>*</span></label>
                        <input type="text" class="ag-input" placeholder="Auto-generated from name" disabled>
                    </div>

                    <div class="ag-form-group">
                        <label class="ag-label">Normal Balance</label>
                        <div class="ag-radio-group">
                            <label class="ag-radio-label">
                                <input type="radio" name="normal_balance" value="debit" checked>
                                debit
                            </label>
                            <label class="ag-radio-label">
                                <input type="radio" name="normal_balance" value="credit">
                                credit
                            </label>
                        </div>
                    </div>

                    <div class="ag-form-group">
                        <label class="ag-label">Description</label>
                        <textarea class="ag-input" rows="3" placeholder="Enter Description"></textarea>
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
@endsection

<!-- JS FILE LINK (Yeh tareeqa 100% kaam karta hai) -->
@push('scripts')
<script src="{{ asset('js/account-types.js') }}"></script>
@endpush