<!-- resources/views/pages/sales-returns/create.blade.php -->
@extends('layout.app') 

@section('content')
<style>
    /* Force Purple Theme */
    :root { --purple: #8b5cf6 !important; --purple-light: #f3e8ff !important; --shadow: 0 10px 25px -5px rgba(139, 92, 246, 0.3) !important; }
    
    .ag-page-wrapper { background-color: #f8fafc !important; padding: 24px 32px !important; font-family: 'Inter', sans-serif !important; color: #0f172a !important; min-height: 100vh !important; }
    .ag-top-header { display: flex !important; justify-content: space-between !important; align-items: flex-start !important; margin-bottom: 24px !important; }
    .ag-breadcrumb { color: #64748b !important; font-size: 13px !important; margin-bottom: 8px !important; }
    .ag-title { margin: 0 !important; font-size: 24px !important; font-weight: 600 !important; }
    .ag-subtitle { margin: 6px 0 0 0 !important; color: #64748b !important; font-size: 14px !important; }
    
    .ag-btn-outline { background: #fff !important; border: 1px solid #cbd5e1 !important; color: #475569 !important; padding: 10px 20px !important; border-radius: 8px !important; font-weight: 500 !important; cursor: pointer !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 6px !important; font-size: 14px !important; transition: all 0.2s !important; }
    .ag-btn-outline:hover { border-color: var(--purple) !important; color: var(--purple) !important; }
    
    .ag-btn-green { background: var(--purple) !important; color: white !important; border: none !important; padding: 12px 20px !important; border-radius: 8px !important; font-weight: 600 !important; cursor: pointer !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; gap: 8px !important; font-size: 14px !important; transition: all 0.2s !important; width: 100% !important; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3) !important; }
    .ag-btn-green:hover { background: #7c3aed !important; transform: translateY(-2px) !important; }
    .ag-btn-disabled { background: #d8b4fe !important; cursor: not-allowed !important; box-shadow: none !important; transform: none !important; }
    
    .ag-layout { display: flex !important; gap: 24px !important; align-items: flex-start !important; }
    .ag-col-left { flex: 1 !important; min-width: 0 !important; }
    .ag-col-right { width: 320px !important; flex-shrink: 0 !important; }
    
    /* Curve Shape Cards with 3D Shadow */
    .ag-card { background: #ffffff !important; border: 1px solid #e2e8f0 !important; border-radius: 16px !important; padding: 24px !important; margin-bottom: 24px !important; box-shadow: 0 4px 20px rgba(0,0,0,0.03) !important; }
    .ag-card-header { display: flex !important; align-items: center !important; border-bottom: 1px solid #e2e8f0 !important; padding-bottom: 16px !important; margin-bottom: 20px !important; justify-content: space-between !important; }
    .ag-card-header-left { display: flex !important; align-items: center !important; gap: 12px !important; }
    .ag-icon-box { width: 40px !important; height: 40px !important; background: var(--purple-light) !important; color: var(--purple) !important; border-radius: 8px !important; display: flex !important; align-items: center !important; justify-content: center !important; flex-shrink: 0 !important; font-size: 20px !important; }
    .ag-card-title { margin: 0 !important; font-size: 16px !important; font-weight: 600 !important; }
    
    .ag-form-grid { display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 20px !important; }
    .ag-label { display: block !important; margin-bottom: 8px !important; color: #334155 !important; font-size: 13px !important; font-weight: 600 !important; }
    
    /* Input Styling */
    .ag-input { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; outline: none !important; font-size: 14px !important; color: #334155 !important; transition: all 0.3s ease !important; background: #fff !important; box-sizing: border-box !important; }
    .ag-input:focus { border-color: var(--purple) !important; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15) !important; }

    /* CUSTOM DATE PICKER (3D Shadow) */
    .custom-datepicker-wrapper { position: relative !important; z-index: 10 !important; }
    .custom-date-display { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; background: #fff !important; color: #334155 !important; font-size: 14px !important; cursor: pointer !important; display: flex !important; justify-content: space-between !important; align-items: center !important; transition: all 0.2s ease !important; }
    .custom-date-display:hover { border-color: var(--purple) !important; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.1) !important; }
    .custom-date-display svg { width: 16px !important; height: 16px !important; stroke: var(--purple) !important; }
    
    .custom-calendar { position: absolute !important; top: 105% !important; left: 0 !important; width: 290px !important; background: #fff !important; border: 1px solid #e2e8f0 !important; border-radius: 12px !important; box-shadow: var(--shadow) !important; z-index: 9999 !important; display: none !important; padding: 16px !important; }
    .custom-calendar.open { display: block !important; }
    .cal-header { display: flex !important; justify-content: space-between !important; align-items: center !important; margin-bottom: 12px !important; }
    .cal-header button { background: none !important; border: none !important; cursor: pointer !important; color: var(--purple) !important; padding: 4px 8px !important; font-size: 20px !important; border-radius: 4px !important; transition: 0.2s !important; }
    .cal-header button:hover { background: var(--purple-light) !important; }
    .cal-header span { font-weight: 700 !important; color: var(--purple) !important; font-size: 15px !important; }
    .cal-days-grid { display: grid !important; grid-template-columns: repeat(7, 1fr) !important; gap: 4px !important; text-align: center !important; }
    .cal-day-name { font-size: 11px !important; color: #94a3b8 !important; font-weight: 700 !important; margin-bottom: 8px !important; }
    .cal-day { padding: 8px 0 !important; font-size: 13px !important; color: #334155 !important; border-radius: 6px !important; cursor: pointer !important; transition: 0.2s !important; pointer-events: auto !important; }
    .cal-day:hover { background: var(--purple) !important; color: #fff !important; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3) !important; }
    .cal-day.filler { visibility: hidden !important; }

    /* CUSTOM DROPDOWN */
    .custom-dropdown { position: relative !important; width: 100% !important; z-index: 10 !important; }
    .custom-dropdown-trigger { width: 100% !important; padding: 10px 14px !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; background: #fff !important; color: #334155 !important; font-size: 14px !important; cursor: pointer !important; display: flex !important; justify-content: space-between !important; align-items: center !important; transition: all 0.2s ease !important; }
    .custom-dropdown-trigger:hover { transform: translateY(-2px) !important; border-color: var(--purple) !important; box-shadow: 0 4px 12px rgba(139, 92, 246, 0.2) !important; background-color: #f8fafc !important; }
    .custom-dropdown.open .custom-dropdown-trigger { border-color: var(--purple) !important; box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15) !important; }
    .custom-dropdown-trigger svg { width: 16px !important; height: 16px !important; stroke: var(--purple) !important; transition: transform 0.2s !important; }
    .custom-dropdown.open .custom-dropdown-trigger svg { transform: rotate(180deg) !important; }
    .custom-dropdown-menu { position: absolute !important; top: 105% !important; left: 0 !important; width: 100% !important; background: #fff !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; margin-top: 4px !important; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1) !important; z-index: 9999 !important; display: none !important; overflow: hidden !important; max-height: 200px !important; overflow-y: auto !important; }
    .custom-dropdown.open .custom-dropdown-menu { display: block !important; }
    .custom-dropdown-item { padding: 10px 14px !important; font-size: 14px !important; color: #334155 !important; cursor: pointer !important; transition: 0.1s !important; }
    .custom-dropdown-item:hover { background-color: var(--purple-light) !important; color: var(--purple) !important; font-weight: 600 !important; }

    /* Table Styling */
    .ag-table { width: 100% !important; border-collapse: collapse !important; }
    .ag-table th { text-align: left !important; padding: 12px 10px !important; color: #475569 !important; font-size: 13px !important; font-weight: 600 !important; border-bottom: 1px solid #e2e8f0 !important; }
    .ag-table td { padding: 12px 10px !important; border-bottom: 1px solid #f1f5f9 !important; vertical-align: middle !important; }
    .ag-table td input { padding: 8px 10px !important; border: 1px solid #cbd5e1 !important; border-radius: 6px !important; width: 100% !important; box-sizing: border-box !important; }
    .ag-table td input:focus { border-color: var(--purple) !important; outline: none !important; box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.2) !important; }

    /* Summary */
    .ag-summary-row { display: flex !important; justify-content: space-between !important; margin-bottom: 12px !important; color: #475569 !important; font-size: 14px !important; }
    .ag-summary-total { display: flex !important; justify-content: space-between !important; margin-top: 16px !important; padding-top: 16px !important; border-top: 1px solid #e2e8f0 !important; font-size: 18px !important; font-weight: 700 !important; color: #0f172a !important; }
    .ag-summary-total span:last-child { color: var(--purple) !important; }
</style>

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
                        <div class="ag-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <h2 class="ag-card-title">Sales Return Details</h2>
                    </div>
                </div>
                
                <div class="ag-form-grid">
                    <!-- CUSTOM DATE PICKER (3D Shadow) -->
                    <div>
                        <label class="ag-label">Return Date *</label>
                        <div class="custom-datepicker-wrapper">
                            <div class="custom-date-display" onclick="toggleCalendar('cal-return')">
                                <span class="date-text" id="text-return">{{ date('m/d/Y') }}</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                            <div class="custom-calendar" id="cal-return">
                                <div class="cal-header">
                                    <button type="button" onclick="changeMonth('cal-return', -1)">‹</button>
                                    <span class="month-year">Loading...</span>
                                    <button type="button" onclick="changeMonth('cal-return', 1)">›</button>
                                </div>
                                <div class="cal-days-grid"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Original Invoice Dropdown -->
                    <div>
                        <label class="ag-label">Original Invoice *</label>
                        <div class="custom-dropdown" id="dd-invoice">
                            <div class="custom-dropdown-trigger" onclick="toggleDropdown('dd-invoice')">
                                <span>Select Invoice</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" onclick="loadReturnItems('INV-001', this)">INV-001</div>
                                <div class="custom-dropdown-item" onclick="loadReturnItems('INV-002', this)">INV-002</div>
                                <div class="custom-dropdown-item" onclick="loadReturnItems('INV-003', this)">INV-003</div>
                            </div>
                        </div>
                    </div>

                    <!-- Warehouse Dropdown -->
                    <div>
                        <label class="ag-label">Warehouse *</label>
                        <div class="custom-dropdown" id="dd-warehouse">
                            <div class="custom-dropdown-trigger" onclick="toggleDropdown('dd-warehouse')">
                                <span>Select Warehouse</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" onclick="selectItem('dd-warehouse', this)">Main Warehouse</div>
                                <div class="custom-dropdown-item" onclick="selectItem('dd-warehouse', this)">Secondary Warehouse</div>
                            </div>
                        </div>
                    </div>

                    <!-- Return Reason Dropdown -->
                    <div>
                        <label class="ag-label">Return Reason *</label>
                        <div class="custom-dropdown" id="dd-reason">
                            <div class="custom-dropdown-trigger" onclick="toggleDropdown('dd-reason')">
                                <span>Select Reason</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </div>
                            <div class="custom-dropdown-menu">
                                <div class="custom-dropdown-item" onclick="selectItem('dd-reason', this)">Defective</div>
                                <div class="custom-dropdown-item" onclick="selectItem('dd-reason', this)">Wrong Item</div>
                                <div class="custom-dropdown-item" onclick="selectItem('dd-reason', this)">Customer Changed Mind</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Items Table (Initially Hidden) -->
            <div class="ag-card" id="items-card" style="display: none;">
                <div class="ag-card-header">
                    <div class="ag-card-header-left">
                        <div class="ag-icon-box">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        </div>
                        <h2 class="ag-card-title">Return Items</h2>
                    </div>
                </div>

                <table class="ag-table">
                    <thead>
                        <tr>
                            <th style="width: 35%;">Product</th>
                            <th style="width: 15%;">Original Qty</th>
                            <th style="width: 15%;">Return Qty</th>
                            <th style="width: 15%;">Price</th>
                            <th style="width: 20%;">Total</th>
                        </tr>
                    </thead>
                    <tbody id="items-table-body">
                        <!-- Items will load here via JS -->
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
                        <div class="ag-icon-box" style="background: #f0fdf4;">🧾</div>
                        <h2 class="ag-card-title">Return Summary</h2>
                    </div>
                </div>
                
                <div class="ag-summary-row">
                    <span>Subtotal</span>
                    <span id="summary-subtotal" style="font-weight: 600; color: #0f172a;">$0.00</span>
                </div>
                
                <div class="ag-summary-total">
                    <span>Total Amount</span>
                    <span id="summary-total">$0.00</span>
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
                <div style="display: flex; align-items: center; gap: 8px; color: #64748b; font-size: 13px; margin-bottom: 16px;">
                    🛒 <span id="item-count-text">0</span> items selected for return
                </div>
                
                <button id="create-btn" class="ag-btn-green ag-btn-disabled" disabled>Create Return</button>
                
                <button class="ag-btn-outline" style="width: 100%; margin-top: 12px; justify-content: center;">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/sales-returns.js') }}"></script>
@endpush