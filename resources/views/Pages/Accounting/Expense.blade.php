@extends('Layout.dashboard')

@section('title', 'Expenses - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Accounting/Expense.css') }}">
@endsection

@section('content')
<div class="expense-page-wrapper">
    
    <!-- Page Header -->
    <div class="ex-header">
        <div>
            <h1 class="ex-title">Manage Expenses</h1>
            <p class="ex-subtitle">Track and manage all business expenses, approve draft transactions, and post them to journal entries.</p>
        </div>
        <a href="#" class="ex-add-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
    </div>

    <!-- Month Slider -->
    <div class="ex-month-slider">
        <button class="ex-month-nav"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
        <div class="ex-month-year">Nov 2026</div>
        <button class="ex-month-nav"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
    </div>
    
    <div class="ex-months-grid">
        <!-- Placeholder for month boxes -->
        <div class="ex-month-box"><span class="ex-m-name">Jan</span><span class="ex-m-date">01</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Feb</span><span class="ex-m-date">02</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Mar</span><span class="ex-m-date">03</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Apr</span><span class="ex-m-date">04</span></div>
        <div class="ex-month-box"><span class="ex-m-name">May</span><span class="ex-m-date">05</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Jun</span><span class="ex-m-date">06</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Jul</span><span class="ex-m-date">07</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Aug</span><span class="ex-m-date">08</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Sep</span><span class="ex-m-date">09</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Oct</span><span class="ex-m-date">10</span></div>
        <div class="ex-month-box active"><span class="ex-m-name">Nov</span><span class="ex-m-date">11</span></div>
        <div class="ex-month-box"><span class="ex-m-name">Dec</span><span class="ex-m-date">12</span></div>
    </div>

    <!-- Main Card -->
    <div class="ex-card">
        
        <!-- Controls Row -->
        <div class="ex-controls">
            <div class="ex-search-group">
                <div class="ex-search-wrapper">
                    <svg class="ex-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="ex-search-input" placeholder="Search expenses...">
                </div>
                <button class="ex-search-btn">Search</button>
            </div>

            <div class="ex-action-group">
                <div class="ex-custom-dropdown" id="perPageDropdown">
                    <button type="button" class="ex-custom-dropdown-btn" id="perPageToggle">
                        <span id="perPageLabel">10 per page</span>
                        <svg class="ex-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <ul class="ex-custom-dropdown-menu" id="perPageMenu">
                        <li class="ex-custom-dropdown-item active" data-value="10">10 per page</li>
                        <li class="ex-custom-dropdown-item" data-value="25">25 per page</li>
                        <li class="ex-custom-dropdown-item" data-value="50">50 per page</li>
                    </ul>
                </div>

                <button class="ex-filter-btn" id="exFilterToggle">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Status Tabs -->
        <div class="ex-tabs">
            <button class="ex-tab-btn active" data-filter="all">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="ex-badge-count">13</span>
            </button>
            <button class="ex-tab-btn" data-filter="draft">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                Draft <span class="ex-badge-count">3</span>
            </button>
            <button class="ex-tab-btn" data-filter="approved">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                Approved <span class="ex-badge-count">4</span>
            </button>
            <button class="ex-tab-btn" data-filter="posted">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Posted <span class="ex-badge-count">6</span>
            </button>
        </div>

        <!-- Filter Panel -->
        <div class="ex-filter-panel" id="exFilterPanel">
            <div class="ex-filter-row">
                <div class="ex-filter-group">
                    <label>Category</label>
                    <input type="text" class="ex-input" id="filterCategory" placeholder="Filter by category">
                </div>
                <div class="ex-filter-group">
                    <label>Bank Account</label>
                    <input type="text" class="ex-input" id="filterBank" placeholder="Filter by bank account">
                </div>
            </div>
            <div class="ex-filter-actions">
                <button class="ex-search-btn ex-btn-apply" id="applyFiltersBtn">Apply</button>
                <button class="ex-search-btn ex-btn-clear" id="clearFiltersBtn">Clear</button>
            </div>
        </div>

        <!-- Table -->
        <div class="ex-table-wrapper">
            <table class="ex-table">
                <thead>
                    <tr>
                        <th>Expense <span class="sort-icon">↕</span></th>
                        <th>Date <span class="sort-icon">↕</span></th>
                        <th>Category</th>
                        <th>Chart of Account / Bank</th>
                        <th>Amount <span class="sort-icon">↕</span></th>
                        <th>Status <span class="sort-icon">↕</span></th>
                        <th>Approved By</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr data-status="approved">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-013</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-06</span></td>
                        <td class="col-category"><span class="ex-category-badge">Travel</span></td>
                        <td>
                            <div class="ex-account-info">5430 - Depreciation Expense</div>
                            <div class="ex-bank-info">Savings Account</div>
                        </td>
                        <td class="ex-fw-bold">$890.00</td>
                        <td><span class="ex-status status-approved">Approved</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr data-status="draft">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-012</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-27</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-blue">Rent</span></td>
                        <td>
                            <div class="ex-account-info">5300 - Rent Expense</div>
                            <div class="ex-bank-info ex-bank-primary">Business Checking Account</div>
                        </td>
                        <td class="ex-fw-bold">$2,200.00</td>
                        <td><span class="ex-status status-draft">Draft</span></td>
                        <td><span class="ex-text-muted">-</span></td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr data-status="posted">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-011</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-04</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-purple">Utilities</span></td>
                        <td>
                            <div class="ex-account-info">5400 - Utilities Expense</div>
                            <div class="ex-bank-info ex-bank-danger">Equipment Loan Account</div>
                        </td>
                        <td class="ex-fw-bold">$1,380.00</td>
                        <td><span class="ex-status status-posted">Posted</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr data-status="approved">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-010</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-20</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-blue">Rent</span></td>
                        <td>
                            <div class="ex-account-info">5300 - Rent Expense</div>
                            <div class="ex-bank-info">Savings Account</div>
                        </td>
                        <td class="ex-fw-bold">$1,500.00</td>
                        <td><span class="ex-status status-approved">Approved</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr data-status="posted">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-009</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-15</span></td>
                        <td class="col-category"><span class="ex-category-badge">Travel</span></td>
                        <td>
                            <div class="ex-account-info">5430 - Depreciation Expense</div>
                            <div class="ex-bank-info">Savings Account</div>
                        </td>
                        <td class="ex-fw-bold">$450.00</td>
                        <td><span class="ex-status status-posted">Posted</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr data-status="draft">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-008</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-10</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-purple">Utilities</span></td>
                        <td>
                            <div class="ex-account-info">5400 - Utilities Expense</div>
                            <div class="ex-bank-info ex-bank-primary">Business Checking Account</div>
                        </td>
                        <td class="ex-fw-bold">$320.00</td>
                        <td><span class="ex-status status-draft">Draft</span></td>
                        <td><span class="ex-text-muted">-</span></td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr data-status="approved">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-007</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-05</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-blue">Rent</span></td>
                        <td>
                            <div class="ex-account-info">5300 - Rent Expense</div>
                            <div class="ex-bank-info">Savings Account</div>
                        </td>
                        <td class="ex-fw-bold">$2,200.00</td>
                        <td><span class="ex-status status-approved">Approved</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr data-status="posted">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-006</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-28</span></td>
                        <td class="col-category"><span class="ex-category-badge">Travel</span></td>
                        <td>
                            <div class="ex-account-info">5430 - Depreciation Expense</div>
                            <div class="ex-bank-info ex-bank-danger">Equipment Loan Account</div>
                        </td>
                        <td class="ex-fw-bold">$1,100.00</td>
                        <td><span class="ex-status status-posted">Posted</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 9 -->
                    <tr data-status="draft">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-005</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-15</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-purple">Utilities</span></td>
                        <td>
                            <div class="ex-account-info">5400 - Utilities Expense</div>
                            <div class="ex-bank-info ex-bank-primary">Business Checking Account</div>
                        </td>
                        <td class="ex-fw-bold">$650.00</td>
                        <td><span class="ex-status status-draft">Draft</span></td>
                        <td><span class="ex-text-muted">-</span></td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                    <!-- Row 10 -->
                    <tr data-status="approved">
                        <td><span class="ex-badge ex-badge-blue">EXP-2026-02-004</span></td>
                        <td><span class="ex-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-02</span></td>
                        <td class="col-category"><span class="ex-category-badge ex-cat-blue">Rent</span></td>
                        <td>
                            <div class="ex-account-info">5300 - Rent Expense</div>
                            <div class="ex-bank-info">Savings Account</div>
                        </td>
                        <td class="ex-fw-bold">$2,200.00</td>
                        <td><span class="ex-status status-approved">Approved</span></td>
                        <td>
                            <div class="ex-user-cell">
                                <div class="ex-avatar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg></div>
                                <div class="ex-user-info"><span class="ex-user-name">Company</span><span class="ex-user-email">company@example.com</span></div>
                            </div>
                        </td>
                        <td class="text-right ex-actions-cell">
                            <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="ex-footer">
            <div class="ex-results-info">Showing 1 to 10 of 13 results</div>
            <div class="ex-pagination">
                <button class="ex-page-btn disabled">&lt; Previous</button>
                <button class="ex-page-btn active">1</button>
                <button class="ex-page-btn">2</button>
                <button class="ex-page-btn">Next &gt;</button>
            </div>
        </div>
    </div>
</div>

<!-- HIDDEN TEMPLATE FOR 3-DOT MENU -->
<template id="action-menu-template">
    <div class="action-dropdown">
        <button class="action-dropdown-item text-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            Document
        </button>
        <button class="action-dropdown-item text-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            View
        </button>
        <button class="action-dropdown-item text-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            Edit
        </button>
        <button class="action-dropdown-item text-danger">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            Delete
        </button>
    </div>
</template>
@endsection

@section('scripts')
    <script src="{{ asset('js/Accounting/Expense.js') }}"></script>
@endsection