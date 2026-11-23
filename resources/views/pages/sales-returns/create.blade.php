<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Sales Return</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sales-returns.css') }}">
</head>
<body>

    <div class="ag-page-wrapper">
        
        <!-- HEADER -->
        <div class="ag-top-header">
            <div>
                <div class="ag-breadcrumb">Dashboard &gt; Sales Returns &gt; Create Sales Return</div>
                <h1 class="ag-title">Create Sales Return</h1>
                <p class="ag-subtitle">Initiate a sales return from a previously posted invoice. Select invoice, specify quantities to return, warehouse, and reasons.</p>
            </div>
            <a href="{{ url('/sales-returns') }}" class="ag-btn-outline">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="ag-layout">
            
            <!-- LEFT COLUMN -->
            <div class="ag-col-left">
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <h3 class="ag-card-title">Sales Return Details</h3>
                        </div>
                    </div>

                    <div class="ag-form-grid">
                        <!-- Return Date -->
                        <div class="form-group">
                            <label class="ag-label">Return Date <span>*</span></label>
                            <input type="text" id="returnDate" class="ag-input" placeholder="Select Date" required>
                        </div>

                        <!-- Original Invoice -->
                        <div class="form-group">
                            <label class="ag-label">Original Invoice <span>*</span></label>
                            <div class="custom-dropdown" id="invoiceDropdown">
                                <div class="custom-dropdown-trigger">
                                    <span>Select Invoice</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="INV-1001">INV-1001 (Nov 15, 2026)</div>
                                    <div class="custom-dropdown-item" data-value="INV-1002">INV-1002 (Nov 16, 2026)</div>
                                    <div class="custom-dropdown-item" data-value="INV-1003">INV-1003 (Nov 17, 2026)</div>
                                </div>
                            </div>
                        </div>

                        <!-- Warehouse -->
                        <div class="form-group">
                            <label class="ag-label">Warehouse <span>*</span></label>
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

                        <!-- Return Reason -->
                        <div class="form-group">
                            <label class="ag-label">Return Reason <span>*</span></label>
                            <div class="custom-dropdown" id="reasonDropdown">
                                <div class="custom-dropdown-trigger">
                                    <span>Select Reason</span>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="custom-dropdown-menu">
                                    <div class="custom-dropdown-item" data-value="Defective">Defective</div>
                                    <div class="custom-dropdown-item" data-value="Wrong Item">Wrong Item</div>
                                    <div class="custom-dropdown-item" data-value="Not as Described">Not as Described</div>
                                    <div class="custom-dropdown-item" data-value="Damaged in Transit">Damaged in Transit</div>
                                </div>
                            </div>
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
                            <div class="ag-icon-box">
                                <i class="fa-solid fa-file-invoice"></i>
                            </div>
                            <h3 class="ag-card-title">Return Summary</h3>
                        </div>
                    </div>
                    <div class="ag-summary-row">
                        <span>Subtotal</span>
                        <span>$0.00</span>
                    </div>
                    <div class="ag-summary-total">
                        <span>Total Amount</span>
                        <span style="color: #7c3aed;">$0.00</span>
                    </div>
                </div>

                <!-- Notes Card -->
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box">
                                <i class="fa-solid fa-pencil"></i>
                            </div>
                            <h3 class="ag-card-title">Additional Notes</h3>
                        </div>
                    </div>
                    <label class="ag-label">Notes</label>
                    <textarea class="ag-input" rows="4" placeholder="Additional notes..."></textarea>
                </div>

                <!-- Actions Card -->
                <div class="ag-card">
                    <div class="ag-card-header">
                        <div class="ag-card-header-left">
                            <div class="ag-icon-box" style="background: #e0f2fe; color: #0ea5e9;">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <h3 class="ag-card-title">0 items selected for return</h3>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-create-return">Create Return</button>
                    <a href="{{ url('/sales-returns') }}" class="btn-cancel-return">Cancel</a>
                </div>

            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/sales-returns.js') }}"></script>

</body>
</html>