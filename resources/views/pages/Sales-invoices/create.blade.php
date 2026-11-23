@extends('Layout.Fizadashboard')

@section('title', 'Create Sales Invoice')
@section('page-name', 'Create Sales Invoice')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sales-invoices.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <div class="ag-page-wrapper">
        
        <!-- Header -->
        <div class="ag-top-header">
            <div>
                <div class="ag-breadcrumb">Dashboard &gt; Sales Invoice &gt; Create Sales Invoice</div>
                <h1 class="ag-title">Create Sales Invoice</h1>
                <p class="ag-subtitle">Create a new sales invoice by entering the customer details, items, and terms.</p>
            </div>
            <a href="{{ url('/sales-invoices') }}" class="ag-btn-outline">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="ag-layout">
            
            <!-- Left Column -->
            <div class="ag-col-left">
                
                <!-- Invoice Details Card -->
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <h3 class="ag-card-title">Sales Invoice Details</h3>
                        </div>
                        <div style="display: flex; gap: 15px; font-size: 13px; color: #475569;">
                            <label style="cursor: pointer; display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="invoiceType" checked style="accent-color: #7c3aed;"> Product Wise
                            </label>
                            <label style="cursor: pointer; display: flex; align-items: center; gap: 5px;">
                                <input type="radio" name="invoiceType" style="accent-color: #7c3aed;"> Service Wise
                            </label>
                        </div>
                    </div>

                    <div class="ag-form-grid">
                        <!-- Invoice Date -->
                        <div>
                            <label class="ag-label">Invoice Date <span style="color:#ef4444;">*</span></label>
                            <input type="text" id="invoiceDate" class="ag-input" placeholder="Select Date" required>
                        </div>

                        <!-- Due Date -->
                        <div>
                            <label class="ag-label">Due Date <span style="color:#ef4444;">*</span></label>
                            <input type="text" id="dueDate" class="ag-input" placeholder="Select Date" required>
                        </div>

                        <!-- Customer Dropdown -->
                        <div>
                            <label class="ag-label">Customer <span style="color:#ef4444;">*</span></label>
                            <div class="custom-dropdown" id="customerDropdown">
                                <div class="custom-dropdown-trigger">
                                    <span>Select Customer</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="Customer A">Customer A</div>
                                    <div class="custom-dropdown-item" data-value="Customer B">Customer B</div>
                                    <div class="custom-dropdown-item" data-value="Customer C">Customer C</div>
                                </div>
                            </div>
                        </div>

                        <!-- Warehouse Dropdown -->
                        <div>
                            <label class="ag-label">Warehouse <span style="color:#ef4444;">*</span></label>
                            <div class="custom-dropdown" id="warehouseDropdown">
                                <div class="custom-dropdown-trigger">
                                    <span>Select Warehouse</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="Main Warehouse">Main Warehouse</div>
                                    <div class="custom-dropdown-item" data-value="Secondary Warehouse">Secondary Warehouse</div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Terms -->
                        <div>
                            <label class="ag-label">Payment Terms</label>
                            <input type="text" class="ag-input" placeholder="e.g., Net 30">
                        </div>

                        <!-- Notes -->
                        <div>
                            <label class="ag-label">Notes</label>
                            <textarea class="ag-input" rows="1" placeholder="Additional notes..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Items Table Card -->
                <div class="ag-card">
                    <div class="ag-card-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: none; padding-bottom: 0; margin-bottom: 20px;">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-solid fa-cube"></i>
                            </div>
                            <h3 class="ag-card-title">Sales Invoice Items</h3>
                        </div>
                        <button type="button" class="ag-btn-purple" id="add-item-btn">
                            <i class="fa-solid fa-plus"></i> Add Item
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="ag-table">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Product <span style="color:#ef4444;">*</span></th>
                                    <th style="width: 10%;">Qty <span style="color:#ef4444;">*</span></th>
                                    <th style="width: 15%;">Unit Price <span style="color:#ef4444;">*</span></th>
                                    <th style="width: 15%;">Discount %</th>
                                    <th style="width: 15%;">Tax</th>
                                    <th style="width: 15%;">Total</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="items-table-body">
                                <tr>
                                    <td>
                                        <select class="ag-input">
                                            <option>Select Product</option>
                                            <option>Product 1</option>
                                            <option>Product 2</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="ag-input qty-input" value="1"></td>
                                    <td><input type="number" class="ag-input price-input" value="0"></td>
                                    <td><input type="number" class="ag-input discount-input" value="0"></td>
                                    <td><span style="color: #64748b; font-size: 13px;">No tax</span></td>
                                    <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
                                    <td style="text-align: center;">
                                        <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px;">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="button" class="ag-btn-dashed" id="add-another-item-btn" style="margin-top: 20px;">
                        <i class="fa-solid fa-plus"></i> Add another item
                    </button>
                    
                    <div class="ag-bottom-bar">
                        <div class="ag-item-count" id="item-count">
                            <i class="fa-regular fa-circle-check" style="color: #7c3aed;"></i>
                            <span>1 item added</span>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <a href="{{ url('/sales-invoices') }}" class="ag-btn-outline">Cancel</a>
                            <button type="submit" class="ag-btn-purple">Create Invoice</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column -->
            <div class="ag-col-right">
                
                <!-- Invoice Summary -->
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <h3 class="ag-card-title">Invoice Summary</h3>
                        </div>
                    </div>

                    <div class="ag-summary-row">
                        <span>Subtotal</span>
                        <span id="summary-subtotal">$0.00</span>
                    </div>
                    <div class="ag-summary-row">
                        <span>Discount</span>
                        <span id="summary-discount" style="color: #ef4444;">-$0.00</span>
                    </div>
                    <div class="ag-summary-row">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </div>
                    <div class="ag-summary-total">
                        <span>Total</span>
                        <span id="summary-total">$0.00</span>
                    </div>
                </div>

                <!-- Payment Terms Card -->
                <div class="ag-card" style="margin-top: 20px;">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <h3 class="ag-card-title">Payment Terms</h3>
                        </div>
                    </div>
                    <p style="font-size: 13px; color: #64748b; font-style: italic; margin: 0;">No payment terms specified.</p>
                </div>

                <!-- Additional Notes Card -->
                <div class="ag-card" style="margin-top: 20px;">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </div>
                            <h3 class="ag-card-title">Additional Notes</h3>
                        </div>
                    </div>
                    <p style="font-size: 13px; color: #64748b; font-style: italic; margin: 0;">No additional notes.</p>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/sales-invoices.js') }}"></script>
@endsection