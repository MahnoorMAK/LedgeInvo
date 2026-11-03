<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Returns — LedgeInvo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salesinvoice.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sales-returns.css') }}">
</head>
<body>

    <div class="app-layout">
        
        <!-- LEFT SIDEBAR -->
        @include('components.sidebar')

        <!-- RIGHT MAIN CONTENT -->
        <main class="main-content">
            
            <!-- TOP HEADER -->
            <header class="top-header">
                <div class="breadcrumb">
                    <span>Dashboard</span> <span class="sep">›</span> <span class="active">Sales Returns</span>
                </div>
                <div class="top-actions">
                    <span class="lang">🌐 GB English ⌄</span>
                    <div class="avatar-top">R</div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="content-body">
                
                <!-- Title & Add Button -->
                <div class="page-title-row">
                    <div>
                        <h1>Manage Sales Returns</h1>
                        <p>Manage and track your sales returns, processing statuses, and item refund details.</p>
                    </div>
                    <button class="btn-add" id="openModalBtn">+</button>
                </div>

                <!-- TOOLBAR -->
                <div class="toolbar">
                    <div class="search-box">
                        <svg class="s-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" id="searchInput" placeholder="Search by return number...">
                        <button class="btn-search" id="searchBtn">Search</button>
                        <button class="btn-clear-search" id="clearSearchBtn" title="Clear Search" style="background: #f1f5f9; border: 1px solid #cbd5e1; color: #475569; padding: 10px 15px; border-radius: 6px; font-weight: 600; cursor: pointer; margin-left: 5px;">
                            ✕
                        </button>
                    </div>

                    <div class="toolbar-right">
                        <div class="view-toggles">
                            <button class="view-btn active" id="listViewBtn" title="List View">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                            </button>
                            <button class="view-btn" id="gridViewBtn" title="Grid View">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            </button>
                        </div>
                        
                        <!-- Pagination Select -->
                        <select class="per-page" id="perPageSelect">
                            <option value="10">10 per page</option>
                            <option value="20">20 per page</option>
                            <option value="30">30 per page</option>
                            <option value="40">40 per page</option>
                        </select>
                        <button class="btn-filter" id="filterBtn">▽ Filters ⌄</button>
                    </div>
                </div>

                <!-- ADVANCED FILTER PANEL -->
                <div class="advanced-filter-panel" id="filterPanel">
                    <div class="filter-grid">
                        <div class="filter-group">
                            <label>Customer</label>
                            <select>
                                <option value="">All Customers</option>
                                <option>Farwa</option>
                                <option>Arooj</option>
                                <option>Sarah Johnson</option>
                                <option>Michelle Hall</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Warehouse</label>
                            <select>
                                <option value="">All Warehouses</option>
                                <option>West Coast Storage Facility</option>
                                <option>Central Distribution Center</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Status</label>
                            <select>
                                <option value="">All Status</option>
                                <option>Approved</option>
                                <option>Draft</option>
                                <option>Completed</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Date Range</label>
                            <input type="date">
                        </div>
                        <div class="filter-actions">
                            <button class="btn-apply">Apply</button>
                            <button class="btn-clear">Clear</button>
                        </div>
                    </div>
                </div>

                <!-- DATA TABLE -->
                <div class="table-wrap">
                    <table class="invoice-table" id="returnsTable">
                        <thead>
                            <tr>
                                <th>Return Number ↕</th>
                                <th>Customer</th>
                                <th>Warehouse</th>
                                <th>Return Date ↕</th>
                                <th>Total Amount ↕</th>
                                <th>Items</th>
                                <th>Status ↕</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Row 1 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-011</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-red">S</div>
                                        <div>
                                            <span class="c-name">Sarah Johnson</span>
                                            <span class="c-email">sarah.johnson@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-green">West Coast Storage Facility</span></td>
                                <td>📅 2026-07-04</td>
                                <td><strong>$141.60</strong></td>
                                <td>Cordless Drill Machine <span class="item-qty">×1</span></td>
                                <td><span class="status-badge status-paid">Approved</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-010</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-blue">M</div>
                                        <div>
                                            <span class="c-name">Michelle Hall</span>
                                            <span class="c-email">michelle.hall@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-purple">Central Distribution Center</span></td>
                                <td>📅 2026-06-19</td>
                                <td><strong>$141.58</strong></td>
                                <td>Jeans <span class="item-qty">×2</span></td>
                                <td><span class="status-badge status-draft">Draft</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-009</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-red">J</div>
                                        <div>
                                            <span class="c-name">Jennifer Martinez</span>
                                            <span class="c-email">jennifer.m@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-purple">East Coast Logistics Hub</span></td>
                                <td>📅 2026-06-09</td>
                                <td><strong>$260.93</strong></td>
                                <td>Face Cream <span class="item-qty">×5</span></td>
                                <td><span class="status-badge status-posted">Completed</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-008</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-purple">E</div>
                                        <div>
                                            <span class="c-name">Emily Davis</span>
                                            <span class="c-email">emily.davis@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-purple">Central Distribution Center</span></td>
                                <td>📅 2026-05-24</td>
                                <td><strong>$37.74</strong></td>
                                <td>Coffee <span class="item-qty">×2</span></td>
                                <td><span class="status-badge status-paid">Approved</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-007</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-green">F</div>
                                        <div>
                                            <span class="c-name">Farwa</span>
                                            <span class="c-email">farwa@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-green">West Coast Storage Facility</span></td>
                                <td>📅 2026-05-09</td>
                                <td><strong>$129.95</strong></td>
                                <td>Plant Pot <span class="item-qty">×4</span></td>
                                <td><span class="status-badge status-posted">Completed</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 6 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-006</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-orange">A</div>
                                        <div>
                                            <span class="c-name">Arooj</span>
                                            <span class="c-email">arooj@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-purple">Central Distribution Center</span></td>
                                <td>📅 2026-04-15</td>
                                <td><strong>$310.00</strong></td>
                                <td>Wireless Mouse <span class="item-qty">×3</span></td>
                                <td><span class="status-badge status-draft">Draft</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 7 -->
                            <tr>
                                <td><span class="badge">SR-2026-02-005</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-red">H</div>
                                        <div>
                                            <span class="c-name">Hira</span>
                                            <span class="c-email">hira@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="warehouse-badge wh-purple">East Coast Logistics Hub</span></td>
                                <td>📅 2026-04-02</td>
                                <td><strong>$58.00</strong></td>
                                <td>Desk Lamp <span class="item-qty">×1</span></td>
                                <td><span class="status-badge status-paid">Approved</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button class="text-green" title="View">👁️</button>
                                        <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Extra dummy rows to test pagination -->
                            <tr><td><span class="badge">SR-2026-02-004</span></td><td><div class="cust-info"><div class="c-avatar bg-blue">T</div><div><span class="c-name">Test User 1</span><span class="c-email">test1@client.com</span></div></div></td><td><span class="warehouse-badge wh-green">West Coast Storage Facility</span></td><td>📅 2026-03-25</td><td><strong>$100.00</strong></td><td>Test Item <span class="item-qty">×1</span></td><td><span class="status-badge status-draft">Draft</span></td><td class="text-right"><div class="action-btns"><button class="text-green">👁️</button><button class="text-red delete-btn" onclick="deleteRow(this)"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></div></td></tr>
                            <tr><td><span class="badge">SR-2026-02-003</span></td><td><div class="cust-info"><div class="c-avatar bg-blue">T</div><div><span class="c-name">Test User 2</span><span class="c-email">test2@client.com</span></div></div></td><td><span class="warehouse-badge wh-green">West Coast Storage Facility</span></td><td>📅 2026-03-20</td><td><strong>$200.00</strong></td><td>Test Item <span class="item-qty">×1</span></td><td><span class="status-badge status-draft">Draft</span></td><td class="text-right"><div class="action-btns"><button class="text-green">👁️</button><button class="text-red delete-btn" onclick="deleteRow(this)"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></div></td></tr>
                            <tr><td><span class="badge">SR-2026-02-002</span></td><td><div class="cust-info"><div class="c-avatar bg-blue">T</div><div><span class="c-name">Test User 3</span><span class="c-email">test3@client.com</span></div></div></td><td><span class="warehouse-badge wh-green">West Coast Storage Facility</span></td><td>📅 2026-03-15</td><td><strong>$300.00</strong></td><td>Test Item <span class="item-qty">×1</span></td><td><span class="status-badge status-draft">Draft</span></td><td class="text-right"><div class="action-btns"><button class="text-green">👁️</button><button class="text-red delete-btn" onclick="deleteRow(this)"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></div></td></tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL (POPUP) FOR ADDING NEW RETURN -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-box">
            <div class="modal-header">
                <h2>Add New Sales Return</h2>
                <button class="close-btn" id="closeModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <label>Customer Name</label>
                    <input type="text" id="newCustomerName" placeholder="Enter customer name...">
                </div>
                <div class="input-group">
                    <label>Warehouse</label>
                    <select id="newWarehouse">
                        <option>West Coast Storage Facility</option>
                        <option>Central Distribution Center</option>
                        <option>East Coast Logistics Hub</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Return Date</label>
                    <input type="date" id="newReturnDate">
                </div>
                <div class="input-group">
                    <label>Total Amount ($)</label>
                    <input type="number" id="newTotalAmount" placeholder="0.00">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" id="cancelBtn">Cancel</button>
                <button class="btn-save" id="saveReturnBtn">Save Return</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT (PAGINATION, SEARCH & SAVE WORKING) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            // 1. Filter Toggle
            

            // 2. View Toggles
            const listBtn = document.getElementById("listViewBtn");
            const gridBtn = document.getElementById("gridViewBtn");
            if (listBtn && gridBtn) {
                listBtn.addEventListener("click", function() {
                    listBtn.classList.add("active");
                    gridBtn.classList.remove("active");
                });
                gridBtn.addEventListener("click", function() {
                    gridBtn.classList.add("active");
                    listBtn.classList.remove("active");
                });
            }

            // 3. Delete Row
            window.deleteRow = function(button) {
                if (confirm("Kya aap waqai ye return delete karna chahte hain?")) {
                    button.closest('tr').remove();
                    updatePagination(); // Delete ke baad pagination update karega
                }
            };

            // 4. Modal Open/Close
            const modal = document.getElementById("addModal");
            const openBtn = document.getElementById("openModalBtn");
            const closeBtn = document.getElementById("closeModalBtn");
            const cancelBtn = document.getElementById("cancelBtn");

            if (openBtn) openBtn.addEventListener("click", () => modal.classList.add("show"));
            if (closeBtn) closeBtn.addEventListener("click", () => modal.classList.remove("show"));
            if (cancelBtn) cancelBtn.addEventListener("click", () => modal.classList.remove("show"));

            window.addEventListener("click", function (e) {
                if (e.target === modal) modal.classList.remove("show");
            });

            // =========================================
            // 5. PAGINATION LOGIC (WORKING)
            // =========================================
            const perPageSelect = document.getElementById("perPageSelect");
            
            function updatePagination() {
                let rowsPerPage = parseInt(perPageSelect.value) || 10;
                const currentRows = document.querySelectorAll("#tableBody tr");
                
                currentRows.forEach((row, index) => {
                    // Agar row ka number limit se kam hai toh dikhao, warna chupao
                    if (index < rowsPerPage) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            // Dropdown change hone par pagination update karega
            if (perPageSelect) {
                perPageSelect.addEventListener("change", updatePagination);
            }

            // Page load hote hi pagination apply karega
            updatePagination();

            // =========================================
            // 6. SEARCH FUNCTIONALITY
            // =========================================
            const searchInput = document.getElementById("searchInput");
            const searchBtn = document.getElementById("searchBtn");
            const clearSearchBtn = document.getElementById("clearSearchBtn");

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const currentRows = document.querySelectorAll("#tableBody tr");
                
                currentRows.forEach(function(row) {
                    const rowText = row.textContent.toLowerCase();
                    if (rowText.includes(searchTerm)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            if (searchInput) searchInput.addEventListener("keyup", filterTable);
            if (searchBtn) searchBtn.addEventListener("click", (e) => { e.preventDefault(); filterTable(); });
            if (clearSearchBtn) clearSearchBtn.addEventListener("click", (e) => { 
                e.preventDefault(); 
                searchInput.value = ""; 
                updatePagination(); // Clear pe wapas pagination apply karo
            });

            // =========================================
            // 7. CREATE / SAVE NEW RETURN
            // =========================================
            const saveBtn = document.getElementById("saveReturnBtn");
            const newCustomerName = document.getElementById("newCustomerName");
            const newWarehouse = document.getElementById("newWarehouse");
            const newReturnDate = document.getElementById("newReturnDate");
            const newTotalAmount = document.getElementById("newTotalAmount");
            const tableBody = document.getElementById("tableBody");

            if (saveBtn) {
                saveBtn.addEventListener("click", function(e) {
                    e.preventDefault();

                    // Values uthao
                    

                    // Naya Return Number
                  

                    // Naya Row
                    const newRow = `
                        <tr>
                            <td><span class="badge">${invoiceNo}</span></td>
                            <td>
                                <div class="cust-info">
                                    <div class="c-avatar bg-blue">${firstLetter}</div>
                                    <div>
                                        <span class="c-name">${customerVal}</span>
                                        <span class="c-email">${customerVal.toLowerCase().replace(/\s/g, '')}@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="warehouse-badge wh-purple">${warehouseVal}</span></td>
                            <td>📅 ${dateVal}</td>
                            <td><strong>$${parseFloat(amountVal).toFixed(2)}</strong></td>
                            <td>Return Item <span class="item-qty">×1</span></td>
                            <td><span class="status-badge status-draft">Draft</span></td>
                            <td class="text-right">
                                <div class="action-btns">
                                    <button class="text-green" title="View">👁️</button>
                                    <button class="text-red delete-btn" onclick="deleteRow(this)" title="Delete">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;

                    // Table mein add karo (sabse upar)
                    tableBody.insertAdjacentHTML('afterbegin', newRow);

                    // Form clear & Modal band
                   

                    // Pagination update
                    updatePagination();
                });
            }
        });
    </script>
</body>
</html