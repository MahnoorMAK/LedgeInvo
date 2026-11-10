@extends('Layout.dashboard')

@section('title', 'Purchase Invoices - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Purchase/invoice.css') }}">
@endsection

@section('content')
<div class="purchase-invoice-wrapper">
    
    <!-- Page Header -->
    <div class="pi-header">
        <div>
            <h1 class="pi-title">Manage Purchase Invoices</h1>
            <p class="pi-subtitle">Manage and track your purchase invoices, payments, and balances.</p>
        </div>
        <a href="#" class="pi-add-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
    </div>

    <!-- Main Card -->
    <div class="pi-card">
        
        <!-- Controls Row -->
        <div class="pi-controls">
            <div class="pi-search-group">
                <div class="pi-search-wrapper">
                    <svg class="pi-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="pi-search-input" placeholder="Search by invoice number...">
                </div>
                <button class="pi-search-btn">Search</button>
            </div>

            <div class="pi-action-group">
                <!-- View Toggles (List / Grid) -->
                <div class="pi-view-toggle">
                    <button class="pi-view-btn active" title="List View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="pi-view-btn" title="Grid View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <!-- Custom Dropdown (Per Page) -->
                <div class="pi-custom-dropdown" id="perPageDropdown">
                    <button type="button" class="pi-custom-dropdown-btn" id="perPageToggle">
                        <span id="perPageLabel">10 per page</span>
                        <svg class="pi-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <ul class="pi-custom-dropdown-menu" id="perPageMenu">
                        <li class="pi-custom-dropdown-item active" data-value="10">10 per page</li>
                        <li class="pi-custom-dropdown-item" data-value="25">25 per page</li>
                        <li class="pi-custom-dropdown-item" data-value="50">50 per page</li>
                    </ul>
                </div>

                <!-- Filter Toggle -->
                <button class="pi-filter-btn" id="piFilterToggle">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Filter Panel -->
        <div class="pi-filter-panel" id="piFilterPanel">
            <div class="pi-filter-row">
                <!-- Vendor Filter -->
                <div class="pi-filter-group">
                    <label>Vendor</label>
                    <div class="pi-custom-dropdown filter-dropdown" data-filter="vendor" id="vendorDropdown">
                        <button type="button" class="pi-custom-dropdown-btn" id="vendorBtn" tabindex="0">
                            <span class="dropdown-label" id="vendorLabel">Filter by vendor</span>
                            <svg class="pi-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <ul class="pi-custom-dropdown-menu" id="vendorMenu" tabindex="-1">
                            <li class="pi-custom-dropdown-item active" data-value="" tabindex="0">Filter by vendor</li>
                            <li class="pi-custom-dropdown-item" data-value="Sam Supplier" tabindex="0">Sam Supplier</li>
                            <li class="pi-custom-dropdown-item" data-value="Alex Vendor" tabindex="0">Alex Vendor</li>
                            <li class="pi-custom-dropdown-item" data-value="Quality Parts Corp" tabindex="0">Quality Parts Corp</li>
                            <li class="pi-custom-dropdown-item" data-value="Elite Vendors Group" tabindex="0">Elite Vendors Group</li>
                        </ul>
                    </div>
                </div>

                <!-- Warehouse Filter -->
                <div class="pi-filter-group">
                    <label>Warehouse</label>
                    <div class="pi-custom-dropdown filter-dropdown" data-filter="warehouse" id="warehouseDropdown">
                        <button type="button" class="pi-custom-dropdown-btn" id="warehouseBtn" tabindex="0">
                            <span class="dropdown-label" id="warehouseLabel">Filter by warehouse</span>
                            <svg class="pi-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <ul class="pi-custom-dropdown-menu" id="warehouseMenu" tabindex="-1">
                            <li class="pi-custom-dropdown-item active" data-value="" tabindex="0">Filter by warehouse</li>
                            <li class="pi-custom-dropdown-item" data-value="Main Warehouse" tabindex="0">Main Warehouse</li>
                            <li class="pi-custom-dropdown-item" data-value="Secondary Warehouse" tabindex="0">Secondary Warehouse</li>
                        </ul>
                    </div>
                </div>

                <!-- Status Filter -->
                <div class="pi-filter-group">
                    <label>Status</label>
                    <div class="pi-custom-dropdown filter-dropdown" data-filter="status" id="statusDropdown">
                        <button type="button" class="pi-custom-dropdown-btn" id="statusBtn" tabindex="0">
                            <span class="dropdown-label" id="statusLabel">Filter by status</span>
                            <svg class="pi-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <ul class="pi-custom-dropdown-menu" id="statusMenu" tabindex="-1">
                            <li class="pi-custom-dropdown-item active" data-value="" tabindex="0">Filter by status</li>
                            <li class="pi-custom-dropdown-item" data-value="Paid" tabindex="0">Paid</li>
                            <li class="pi-custom-dropdown-item" data-value="Posted" tabindex="0">Posted</li>
                            <li class="pi-custom-dropdown-item" data-value="Draft" tabindex="0">Draft</li>
                        </ul>
                    </div>
                </div>

                    <!-- Date Range -->
                    <div class="pi-filter-group">
                        <label>Date Range</label>
                        <div class="pi-date-picker-wrapper">
                            <div class="pi-date-input-mock" id="dateRangeDisplay" tabindex="0">
                                <svg class="pi-date-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span id="dateRangeText">Select date range</span>
                            </div>
                            
                            <div class="pi-calendar-dropdown" id="calendarDropdown">
                                <div class="pi-cal-header">
                                    <button type="button" class="pi-cal-nav" id="calPrev" tabindex="0">‹</button>
                                    <span class="pi-cal-month" id="calMonthLabel">October 2026</span>
                                    <button type="button" class="pi-cal-nav" id="calNext" tabindex="0">›</button>
                                </div>
                                <div class="pi-cal-grid">
                                    <div class="pi-cal-days-header"><span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span></div>
                                    <div class="pi-cal-days" id="calDaysGrid"></div>
                                </div>
                                <div class="pi-cal-footer">
                                    <button type="button" class="pi-btn-clear-cal" id="clearCalBtn" tabindex="0">Clear</button>
                                    <button type="button" class="pi-btn-apply-cal" id="applyCalBtn" tabindex="0">Apply Dates</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="pi-filter-actions">
                <button class="pi-search-btn pi-btn-apply" id="applyFiltersBtn" tabindex="0">Apply</button>
                <button class="pi-search-btn pi-btn-clear" id="clearFiltersBtn" tabindex="0">Clear</button>
            </div>
        </div>

        <!-- Table -->
        <div class="pi-table-wrapper">
            <table class="pi-table">
                <thead>
                    <tr>
                        <th>Invoice Number <span class="sort-icon">↕</span></th>
                        <th>Vendor</th>
                        <th>Invoice Date <span class="sort-icon">↕</span></th>
                        <th>Due Date <span class="sort-icon">↕</span></th>
                        <th>Subtotal <span class="sort-icon">↕</span></th>
                        <th>Tax <span class="sort-icon">↕</span></th>
                        <th>Total Amount <span class="sort-icon">↕</span></th>
                        <th>Balance <span class="sort-icon">↕</span></th>
                        <th>Status <span class="sort-icon">↕</span></th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-02-016</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=sam" alt="Sam" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Sam Supplier</span>
                                    <span class="pi-user-email">sam.supplier@vendor.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-04</div></span></td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-19</div></span></td>
                        <td>$960.00</td>
                        <td>$378.00</td>
                        <td class="pi-fw-bold">$1,338.00</td>
                        <td class="pi-balance">$0.00</td>
                        <td><span class="pi-status status-paid">Paid</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-02-015</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=alex" alt="Alex" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Alex Vendor</span>
                                    <span class="pi-user-email">alex.vendor@supplier.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-27</div></span></td>
                        <td><span class="pi-date text-danger"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-11</div><span class="pi-overdue">Overdue</span></span></td>
                        <td>$1,300.00</td>
                        <td>$234.00</td>
                        <td class="pi-fw-bold">$1,534.00</td>
                        <td class="pi-balance text-orange">$1,534.00</td>
                        <td><span class="pi-status status-posted">Posted</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-02-014</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=quality" alt="Quality" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Quality Parts Corp</span>
                                    <span class="pi-user-email">support@qualityparts.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-19</div></span></td>
                        <td><span class="pi-date text-danger"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-04</div><span class="pi-overdue">Overdue</span></span></td>
                        <td>$1,825.00</td>
                        <td>$821.25</td>
                        <td class="pi-fw-bold">$2,646.25</td>
                        <td class="pi-balance text-orange">$2,646.25</td>
                        <td><span class="pi-status status-posted">Posted</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Row 4 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-02-013</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=elite" alt="Elite" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Elite Vendors Group</span>
                                    <span class="pi-user-email">orders@elitevendors.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-10</div></span></td>
                        <td><span class="pi-date text-danger"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-23</div><span class="pi-overdue">Overdue</span></span></td>
                        <td>$3,750.00</td>
                        <td>$1,125.00</td>
                        <td class="pi-fw-bold">$4,875.00</td>
                        <td class="pi-balance text-orange">$4,875.00</td>
                        <td><span class="pi-status status-draft">Draft</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-02-012</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=prime" alt="Prime" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Prime Materials Ltd</span>
                                    <span class="pi-user-email">sales@primematerials.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-04</div></span></td>
                        <td><span class="pi-date text-danger"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-19</div><span class="pi-overdue">Overdue</span></span></td>
                        <td>$1,800.00</td>
                        <td>$810.00</td>
                        <td class="pi-fw-bold">$2,610.00</td>
                        <td class="pi-balance text-orange">$2,610.00</td>
                        <td><span class="pi-status status-posted">Posted</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-01-011</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=tech" alt="Tech" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Tech Solutions Inc</span>
                                    <span class="pi-user-email">hello@techsolutions.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-22</div></span></td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-22</div></span></td>
                        <td>$550.00</td>
                        <td>$110.00</td>
                        <td class="pi-fw-bold">$660.00</td>
                        <td class="pi-balance">$0.00</td>
                        <td><span class="pi-status status-paid">Paid</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-01-010</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=global" alt="Global" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Global Logistics</span>
                                    <span class="pi-user-email">contact@globallogistics.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-15</div></span></td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-15</div></span></td>
                        <td>$2,100.00</td>
                        <td>$420.00</td>
                        <td class="pi-fw-bold">$2,520.00</td>
                        <td class="pi-balance">$0.00</td>
                        <td><span class="pi-status status-paid">Paid</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-01-009</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=office" alt="Office" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Office Supplies Co</span>
                                    <span class="pi-user-email">sales@officesupplies.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-10</div></span></td>
                        <td><span class="pi-date text-danger"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-10</div><span class="pi-overdue">Overdue</span></span></td>
                        <td>$450.00</td>
                        <td>$90.00</td>
                        <td class="pi-fw-bold">$540.00</td>
                        <td class="pi-balance text-orange">$540.00</td>
                        <td><span class="pi-status status-posted">Posted</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 9 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-01-008</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=furniture" alt="Furniture" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Modern Furniture Ltd</span>
                                    <span class="pi-user-email">info@modernfurniture.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-05</div></span></td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-05</div></span></td>
                        <td>$3,200.00</td>
                        <td>$640.00</td>
                        <td class="pi-fw-bold">$3,840.00</td>
                        <td class="pi-balance">$0.00</td>
                        <td><span class="pi-status status-paid">Paid</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 10 -->
                    <tr>
                        <td><span class="pi-badge">PI-2026-01-007</span></td>
                        <td>
                            <div class="pi-user-cell">
                                <img src="https://i.pravatar.cc/150?u=marketing" alt="Marketing" class="pi-avatar">
                                <div class="pi-user-info">
                                    <span class="pi-user-name">Marketing Agency</span>
                                    <span class="pi-user-email">hello@marketingagency.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-03-28</div></span></td>
                        <td><span class="pi-date"><div class="pi-date-top"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-28</div></span></td>
                        <td>$850.00</td>
                        <td>$170.00</td>
                        <td class="pi-fw-bold">$1,020.00</td>
                        <td class="pi-balance">$0.00</td>
                        <td><span class="pi-status status-paid">Paid</span></td>
                        <td class="text-right pi-actions-cell">
                            <button class="action-menu-btn" title="Actions">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="pi-footer">
            <div class="pi-results-info">Showing 1 to 10 of 16 results</div>
            <div class="pi-pagination">
                <button class="pi-page-btn disabled">&lt; Previous</button>
                <button class="pi-page-btn active">1</button>
                <button class="pi-page-btn">2</button>
                <button class="pi-page-btn">Next &gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/Purchase/Invoice.js') }}"></script>
@endsection