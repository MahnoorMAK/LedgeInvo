@extends('Layout.Fizadashboard')

@section('title', 'Manage Sales Invoices')
@section('page-name', 'Sales Invoices')

@section('content')

<style>
    /* =========================================
       Global Theme (Purple) - Inline CSS
       ========================================= */
    :root {
        --ag-purple: #8b5cf6;
        --ag-purple-hover: #7c3aed;
        --ag-purple-light: #f5f3ff;
        --ag-purple-border: #d8b4fe;
        --ag-bg: #f8fafc;
        --ag-border: #e2e8f0;
        --ag-text-main: #0f172a;
        --ag-text-muted: #64748b;
    }

    .ag-page-wrapper {
        padding: 24px 10px;
        font-family: 'Inter', sans-serif;
        color: var(--ag-text-main);
    }

    /* Header */
    .ag-top-header {
        display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;
    }
    .ag-title { margin: 0; font-size: 24px; font-weight: 600; }
    .ag-subtitle { margin: 6px 0 0 0; color: var(--ag-text-muted); font-size: 14px; }

    /* Add Button */
    .btn-add-purple {
        background-color: var(--ag-purple); color: #ffffff; width: 42px; height: 42px;
        border-radius: 8px; display: flex; align-items: center; justify-content: center;
        text-decoration: none; font-size: 20px; transition: 0.2s; box-shadow: 0 4px 10px rgba(139, 92, 246, 0.3);
    }
    .btn-add-purple:hover { background-color: var(--ag-purple-hover); transform: translateY(-2px); }

    /* Table Container */
    .table-container {
        background: #fff; border-radius: 12px; border: 1px solid var(--ag-border);
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); overflow: hidden;
    }

    /* Top Bar Filters */
    .table-header-filters {
        padding: 20px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--ag-border); flex-wrap: wrap; gap: 15px;
    }
    .search-box {
        display: flex; align-items: center; border: 1px solid var(--ag-purple-border); border-radius: 8px; padding: 4px; width: 350px;
        background: var(--ag-purple-light); box-shadow: inset 0 2px 4px 0 rgba(139, 92, 246, 0.05);
    }
    .search-box i { color: var(--ag-purple); margin-left: 10px; }
    .search-box input { border: none; outline: none; padding: 8px; width: 100%; font-size: 14px; background: transparent; color: #1e293b; }
    .btn-search-purple { background: var(--ag-purple); color: #fff; border: none; padding: 8px 20px; border-radius: 6px; cursor: pointer; font-weight: 500; }

    .right-filters { display: flex; gap: 10px; align-items: center; }
    
    /* View Toggle Buttons */
    .view-toggle-group {
        display: flex; background: #fff; border: 1px solid var(--ag-border); border-radius: 8px; overflow: hidden;
    }
    .view-btn {
        background: transparent; border: none; padding: 8px 12px; cursor: pointer; color: var(--ag-text-muted);
        display: flex; align-items: center; justify-content: center; transition: 0.2s;
    }
    .view-btn:hover { background: #f1f5f9; }
    .view-btn.active { background: var(--ag-purple); color: #fff; }

    .drop-btn {
        background: #fff; border: 1px solid var(--ag-border); padding: 8px 15px; border-radius: 8px; 
        font-size: 14px; color: var(--ag-text-muted); cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.2s;
    }
    .drop-btn:hover { background: #f1f5f9; }

    /* Custom Dropdowns */
    .dropdown { position: relative; }
    .dropdown-content {
        display: none; position: absolute; top: 110%; right: 0; background-color: #fff; min-width: 120px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid var(--ag-border); border-radius: 8px; z-index: 100;
    }
    .dropdown-content.show { display: block; }
    .dropdown-content a { color: var(--ag-text-main); padding: 10px 15px; text-decoration: none; display: block; font-size: 13px; }
    .dropdown-content a:hover { background-color: #f1f5f9; color: var(--ag-purple); }

    /* =========================================
       Filter Dropdown Specific Styling (Purple 3D & Blink)
       ========================================= */
    .filter-dropdown-content {
        min-width: 280px; padding: 20px; border-radius: 12px; border: 1px solid var(--ag-purple-border);
        box-shadow: 0 10px 25px rgba(139, 92, 246, 0.15);
    }
    .filter-group label {
        display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 8px;
    }
    
    /* 3D Purple Status Select */
    .filter-group select.form-control {
        width: 100%; padding: 12px 16px; 
        border: 1px solid var(--ag-purple-border); 
        border-radius: 8px; outline: none; font-size: 14px; 
        background: var(--ag-purple-light); 
        box-shadow: inset 0 2px 4px 0 rgba(139, 92, 246, 0.05);
        transition: all 0.3s ease;
        margin-bottom: 15px;
        color: #1e293b;
        cursor: pointer;
    }
    
    /* Blink Animation */
    @keyframes blinkBorder {
        0% { box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.7); border-color: #8b5cf6; }
        50% { box-shadow: 0 0 10px 5px rgba(139, 92, 246, 0); border-color: #c084fc; }
        100% { box-shadow: 0 0 0 0 rgba(139, 92, 246, 0); border-color: #8b5cf6; }
    }

    /* Filter button click hone par select box blink karega */
    .filter-dropdown-content.show .filter-group select.form-control {
        animation: blinkBorder 1.5s infinite;
        border-color: #8b5cf6;
    }

    .filter-group select.form-control:focus {
        background: #fff;
        border-color: #8b5cf6;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
    }

    .filter-actions { display: flex; gap: 10px; justify-content: flex-end; }
    .btn-clear { background: #fff; border: 1px solid #cbd5e1; padding: 8px 15px; border-radius: 6px; cursor: pointer; font-size: 13px;}
    .btn-apply { background: var(--ag-purple); color: #fff; border: none; padding: 8px 15px; border-radius: 6px; cursor: pointer; font-size: 13px;}

    /* Table Styling */
    .table-responsive { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; text-align: left; }
    th { 
        background: #f8fafc; padding: 15px 20px; font-size: 13px; font-weight: 600; 
        color: var(--ag-text-muted); border-bottom: 1px solid var(--ag-border); white-space: nowrap;
    }
    td { padding: 15px 20px; font-size: 14px; color: var(--ag-text-main); border-bottom: 1px solid #f1f5f9; vertical-align: middle; }

    .invoice-badge { 
        background: var(--ag-purple-light); color: var(--ag-purple); border: 1px solid var(--ag-purple-border);
        padding: 4px 10px; border-radius: 6px; font-size: 13px; font-weight: 600; white-space: nowrap;
    }

    /* Customer Cell */
    .customer-cell { display: flex; align-items: center; gap: 12px; }
    .user-avatar { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
    .cell-title { font-weight: 600; color: var(--ag-text-main); }
    .cell-sub { font-size: 12px; color: var(--ag-text-muted); margin-top: 2px; }
    .text-danger { color: #ef4444; }
    .text-success { color: #10b981; }
</style>

<div class="ag-page-wrapper">
    
    <!-- Header -->
    <div class="ag-top-header">
        <div>
            <h1 class="ag-title">Manage Sales Invoices</h1>
            <p class="ag-subtitle">Manage and track your sales invoices, payments, and balances.</p>
        </div>
        <a href="#" class="btn-add-purple" title="Create New Invoice">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <!-- Table Section -->
    <div class="table-container">
        
        <!-- Top Bar Filters -->
        <div class="table-header-filters">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search by invoice number..." id="searchInput">
                <button class="btn-search-purple" id="searchBtn">Search</button>
            </div>
            
            <div class="right-filters">
                <!-- View Toggle Buttons (Fixed Grid Icon) -->
                <div class="view-toggle-group">
                    <button class="view-btn active" title="List View"><i class="fa-solid fa-list"></i></button>
                    <button class="view-btn" title="Grid View"><i class="fa-solid fa-border-all"></i></button>
                </div>
                
                <!-- 10 Per Page Dropdown -->
                <div class="dropdown">
                    <button class="drop-btn" id="perPageBtn">10 per page <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content" id="perPageMenu">
                        <a href="#">10 per page</a>
                        <a href="#">25 per page</a>
                        <a href="#">50 per page</a>
                    </div>
                </div>
                
                <!-- Filter Dropdown -->
                <div class="dropdown">
                    <button class="drop-btn" id="filterToggleBtn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content filter-dropdown-content" id="filterMenu">
                        <div class="filter-group">
                            <label>Status</label>
                            <select class="form-control" id="statusFilter">
                                <option value="all">All Status</option>
                                <option value="paid">Paid</option>
                                <option value="overdue">Overdue</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="filter-actions">
                            <button class="btn-clear" id="clearFilterBtn">Clear</button>
                            <button class="btn-apply" id="applyFilterBtn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="table-responsive">
            <table id="invoiceTable">
                <thead>
                    <tr>
                        <th>Invoice Number <i class="fa-solid fa-sort"></i></th>
                        <th>Customer</th>
                        <th>Invoice Date <i class="fa-solid fa-sort"></i></th>
                        <th>Due Date <i class="fa-solid fa-sort"></i></th>
                        <th>Subtotal <i class="fa-solid fa-sort"></i></th>
                        <th>Tax <i class="fa-solid fa-sort"></i></th>
                        <th>Total Amount <i class="fa-solid fa-sort"></i></th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- ROW 1 -->
                    <tr>
                        <td><span class="invoice-badge">SI-2026-02-018</span></td>
                        <td>
                            <div class="customer-cell">
                                <img src="https://i.pravatar.cc/150?img=5" alt="User" class="user-avatar">
                                <div>
                                    <div class="cell-title">Sarah Johnson</div>
                                    <div class="cell-sub">sarah.johnson@client.com</div>
                                </div>
                            </div>
                        </td>
                        <td>2026-07-19</td>
                        <td>
                            2026-08-03
                            <div class="cell-sub text-danger">Overdue</div>
                        </td>
                        <td>$2,500.00</td>
                        <td>$450.00</td>
                        <td><strong>$2,950.00</strong></td>
                        <td class="text-danger"><strong>$2,950.00</strong></td>
                    </tr>
                    <!-- ROW 2 -->
                    <tr>
                        <td><span class="invoice-badge">SI-2026-02-017</span></td>
                        <td>
                            <div class="customer-cell">
                                <img src="https://i.pravatar.cc/150?img=9" alt="User" class="user-avatar">
                                <div>
                                    <div class="cell-title">Jennifer Martinez</div>
                                    <div class="cell-sub">jennifer.martinez@client.com</div>
                                </div>
                            </div>
                        </td>
                        <td>2026-07-09</td>
                        <td>
                            2026-08-06
                            <div class="cell-sub text-danger">Overdue</div>
                        </td>
                        <td>$750.00</td>
                        <td>$135.00</td>
                        <td><strong>$885.00</strong></td>
                        <td class="text-danger"><strong>$885.00</strong></td>
                    </tr>
                    <!-- ROW 3 -->
                    <tr>
                        <td><span class="invoice-badge">SI-2026-02-016</span></td>
                        <td>
                            <div class="customer-cell">
                                <img src="https://i.pravatar.cc/150?img=16" alt="User" class="user-avatar">
                                <div>
                                    <div class="cell-title">Lisa Anderson</div>
                                    <div class="cell-sub">lisa.anderson@client.com</div>
                                </div>
                            </div>
                        </td>
                        <td>2026-06-29</td>
                        <td>2026-06-29</td>
                        <td>$1,500.00</td>
                        <td>$450.00</td>
                        <td><strong>$1,950.00</strong></td>
                        <td class="text-success"><strong>$0.00</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // 1. Per Page Dropdown Toggle
        const perPageBtn = document.getElementById('perPageBtn');
        const perPageMenu = document.getElementById('perPageMenu');

        if(perPageBtn) {
            perPageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                perPageMenu.classList.toggle('show');
                document.getElementById('filterMenu').classList.remove('show');
            });
        }

        // 2. Filter Dropdown Toggle (Blink Effect ke sath)
        const filterToggleBtn = document.getElementById('filterToggleBtn');
        const filterMenu = document.getElementById('filterMenu');

        if(filterToggleBtn) {
            filterToggleBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                filterMenu.classList.toggle('show');
                document.getElementById('perPageMenu').classList.remove('show');
            });
        }

        // Document click to close dropdowns
        document.addEventListener('click', function(e) {
            if (perPageBtn && !perPageBtn.contains(e.target) && !perPageMenu.contains(e.target)) {
                perPageMenu.classList.remove('show');
            }
            if (filterToggleBtn && !filterToggleBtn.contains(e.target) && !filterMenu.contains(e.target)) {
                filterMenu.classList.remove('show');
            }
        });

        // 3. Search Functionality
        const searchBtn = document.getElementById('searchBtn');
        const searchInput = document.getElementById('searchInput');
        
        if(searchBtn) {
            searchBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let searchTerm = searchInput.value.toLowerCase();
                let rows = document.querySelectorAll('#table-body tr');

                rows.forEach(row => {
                    let text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        }

        // 4. Apply Filter
        const applyFilterBtn = document.getElementById('applyFilterBtn');
        const statusFilter = document.getElementById('statusFilter');
        
        if(applyFilterBtn) {
            applyFilterBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let filterValue = statusFilter.value.toLowerCase();
                let rows = document.querySelectorAll('#table-body tr');

                rows.forEach(row => {
                    let text = row.textContent.toLowerCase();
                    if(filterValue === 'all' || text.includes(filterValue)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
                filterMenu.classList.remove('show');
            });
        }

        // 5. Clear Filter
        const clearFilterBtn = document.getElementById('clearFilterBtn');
        if(clearFilterBtn) {
            clearFilterBtn.addEventListener('click', function() {
                statusFilter.value = 'all';
                let rows = document.querySelectorAll('#table-body tr');
                rows.forEach(row => row.style.display = '');
            });
        }
    });
</script>
@endsection