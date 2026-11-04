<!-- resources/views/pages/sales-invoices/cards.blade.php -->
@extends('layout.app') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

<div class="ag-page-wrapper">
    
    <div class="ag-top-header">
        <div>
            <div class="ag-breadcrumb">Dashboard › Sales Invoice › Create Sales Invoice</div>
            <h1 class="ag-title">Create Sales Invoice</h1>
            <p class="ag-subtitle">Create a new sales invoice by entering the customer details, items, and terms.</p>
        </div>
        <a href="#" class="ag-btn-outline">← Back</a>
    </div>

    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #bbf7d0;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sales-invoices.store') }}" method="POST">
        @csrf
        
        <div class="ag-layout">
            
            <div class="ag-col-left">
                
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">📅</div>
                            <h2 class="ag-card-title">Sales Invoice Details</h2>
                        </div>
                        
                        <!-- Radio Buttons -->
                        <div class="ag-radio-group">
                            <label class="ag-radio-label active" id="label-product">
                                <input type="radio" name="invoice_type" value="product" checked>
                                <span class="ag-radio-dot"></span> Product Wise
                            </label>
                            <label class="ag-radio-label" id="label-service">
                                <input type="radio" name="invoice_type" value="service">
                                <span class="ag-radio-dot"></span> Service Wise
                            </label>
                        </div>
                    </div>
                    
                    <div class="ag-form-grid">
                        <div>
                            <label class="ag-label">Invoice Date *</label>
                            <input type="date" name="invoice_date" class="ag-input" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div>
                            <label class="ag-label">Due Date</label>
                            <input type="date" name="due_date" class="ag-input">
                        </div>
                        <div>
                            <label class="ag-label">Customer *</label>
                            <select name="customer_name" class="ag-input" required>
                                <option value="">Select Customer</option>
                                <option value="Customer A">Customer A</option>
                                <option value="Customer B">Customer B</option>
                            </select>
                        </div>
                        
                        <!-- Product Wise Field (Warehouse) -->
                        <div id="warehouse-field">
                            <label class="ag-label">Warehouse *</label>
                            <select name="warehouse" class="ag-input">
                                <option value="">Select Warehouse</option>
                                <option value="Main Warehouse">Main Warehouse</option>
                                <option value="Secondary Warehouse">Secondary Warehouse</option>
                            </select>
                        </div>

                        <!-- Service Wise Field (Jab Service select hoga tab dikhega) -->
                        <div id="service-field" style="display: none;">
                            <label class="ag-label">Service Type *</label>
                            <select name="service_type" class="ag-input">
                                <option value="">Select Service Type</option>
                                <option value="Consulting">Consulting</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Installation">Installation</option>
                            </select>
                        </div>

                        <div>
                            <label class="ag-label">Payment Terms</label>
                            <input type="text" name="payment_terms" class="ag-input" placeholder="e.g., Net 30">
                        </div>
                        <div>
                            <label class="ag-label">Notes</label>
                            <textarea name="notes" class="ag-input" rows="1" placeholder="Additional notes..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Items Section -->
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">📦</div>
                            <h2 class="ag-card-title" id="items-title">Sales Invoice Items (Product)</h2>
                        </div>
                        <button type="button" id="add-item-btn" class="ag-btn-green" style="padding: 8px 16px; font-size: 13px;">+ Add Item</button>
                    </div>

                    <table class="ag-table">
                        <thead>
                            <tr>
                                <th style="width: 30%;" id="col-product-title">Product *</th>
                                <th style="width: 12%;">Qty *</th>
                                <th style="width: 18%;">Unit Price *</th>
                                <th style="width: 15%;">Discount %</th>
                                <th style="width: 10%;">Tax</th>
                                <th style="width: 10%;">Total</th>
                                <th style="width: 5%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="items-table-body">
                            <tr>
                                <td>
                                    <select class="ag-input item-select" style="padding: 8px 10px;">
                                        <option>Select Product</option>
                                    </select>
                                </td>
                                <td><input type="number" class="ag-input qty-input" value="1" style="padding: 8px 10px;"></td>
                                <td><input type="number" class="ag-input price-input" value="0" style="padding: 8px 10px;"></td>
                                <td><input type="number" class="ag-input discount-input" value="0" style="padding: 8px 10px;"></td>
                                <td><span style="color: #94a3b8; font-size: 13px;">No tax</span></td>
                                <td><strong class="row-total" style="color: #0f172a; font-size: 14px;">$0.00</strong></td>
                                <td style="text-align: center;">
                                    <button type="button" class="remove-row" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 18px;">🗑️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" id="add-another-item-btn" class="ag-add-item-dashed">+ Add another item</button>
                </div>
                
            </div>

            <div class="ag-col-right">
                
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box" style="background: #f0fdf4;">🧾</div>
                            <h2 class="ag-card-title">Invoice Summary</h2>
                        </div>
                    </div>
                    
                    <div class="ag-summary-row">
                        <span>Subtotal</span>
                        <span id="summary-subtotal" style="font-weight: 600; color: #0f172a;">$0.00</span>
                    </div>
                    <div class="ag-summary-row">
                        <span>Discount</span>
                        <span style="font-weight: 600; color: #ef4444;">-$0.00</span>
                    </div>
                    <div class="ag-summary-row">
                        <span>Tax</span>
                        <span style="font-weight: 600; color: #0f172a;">$0.00</span>
                    </div>
                    
                    <div class="ag-summary-total">
                        <span>Total</span>
                        <input type="hidden" name="total_amount" id="total-amount-input" value="0">
                        <span id="summary-total">$0.00</span>
                    </div>
                </div>

                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">⏱️</div>
                            <h2 class="ag-card-title">Payment Terms</h2>
                        </div>
                    </div>
                    <p style="color: #94a3b8; font-size: 13px; margin: 0;">No payment terms specified.</p>
                </div>

                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">📝</div>
                            <h2 class="ag-card-title">Additional Notes</h2>
                        </div>
                    </div>
                    <p style="color: #94a3b8; font-size: 13px; margin: 0;">No additional notes.</p>
                </div>

            </div>
        </div>

        <div class="ag-bottom-actions">
            <div id="item-count-display" class="ag-items-count" style="display: none;">
                <span style="font-size: 18px;">✔️</span> 1 item added
            </div>
            <div class="ag-final-buttons">
                <a href="#" class="ag-btn-outline">Cancel</a>
                <button type="submit" class="ag-btn-green">Create Invoice</button>
            </div>
        </div>
    </form>

</div>

<script src="{{ asset('js/cards.js') }}"></script>
@endsection