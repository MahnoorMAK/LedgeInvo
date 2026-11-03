<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Invoices — LedgeInvo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salesinvoice.css') }}">
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
                    <span>Dashboard</span> <span class="sep">›</span> <span class="active">Sales Invoices</span>
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
                        <h1>Manage Sales Invoices</h1>
                        <p>Manage and track your sales invoices, payments, and balances.</p>
                    </div>
                    <!-- Create Button (ID: openModalBtn) -->
                    <button class="btn-add" id="openModalBtn">+</button>
                </div>

                <!-- TOOLBAR -->
                <div class="toolbar">
                    <div class="search-box">
                        <svg class="s-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" placeholder="Search by invoice number...">
                        <button class="btn-search">Search</button>
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
                        
                        <select class="per-page">
                            <option>10 per page</option>
                            <option>20 per page</option>
                            <option>30 per page</option>
                            <option>40 per page</option>
                        </select>
                        <!-- Filter Button (ID: filterToggleBtn) -->
                        <button class="btn-filter" id="filterToggleBtn">▽ Filters ⌄</button>
                    </div>
                </div>

                <!-- ADVANCED FILTER PANEL (Hidden by default) -->
                <div class="advanced-filter-panel" id="filterPanel">
                    <div class="filter-grid">
                        <div class="filter-group">
                            <label>Customer</label>
                            <select>
                                <option value="">All Customers</option>
                                <option>Maryam Fatima</option>
                                <option>Iman Arshad</option>
                                <option>Ali Khan</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Warehouse</label>
                            <select>
                                <option value="">All Warehouses</option>
                                <option>Main Warehouse</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Status</label>
                            <select>
                                <option value="">All Status</option>
                                <option>Posted</option>
                                <option>Draft</option>
                                <option>Paid</option>
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
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>Invoice Number ↕</th>
                                <th>Customer</th>
                                <th>Invoice Date ↕</th>
                                <th>Due Date ↕</th>
                                <th>Subtotal ↕</th>
                                <th>Tax ↕</th>
                                <th>Total Amount ↕</th>
                                <th>Balance ↕</th>
                                <th>Status ↕</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td><span class="badge">INV-2026-001</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-red">M</div>
                                        <div>
                                            <span class="c-name">Maryam Fatima</span>
                                            <span class="c-email">maryam.fatima@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg class="table-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-07-19
                                    </div>
                                </td>
                                <td class="overdue">
                                    <div class="date-cell">
                                        <svg class="table-icon text-red" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-08-03 <br><small>Overdue</small>
                                    </div>
                                </td>
                                <td>$2,500.00</td>
                                <td>$450.00</td>
                                <td><strong>$2,950.00</strong></td>
                                <td class="bal-due">$2,950.00</td>
                                <td><span class="status-badge status-posted">Posted</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button title="Download">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                        <button title="View" class="text-green">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                        <button title="Delete" class="text-red delete-btn" onclick="deleteRow(this)">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr>
                                <td><span class="badge">INV-2026-002</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-blue">I</div>
                                        <div>
                                            <span class="c-name">Iman Arshad</span>
                                            <span class="c-email">iman.arshad@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg class="table-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-07-15
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg class="table-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-08-15
                                    </div>
                                </td>
                                <td>$750.00</td>
                                <td>$135.00</td>
                                <td><strong>$885.00</strong></td>
                                <td class="bal-due">$885.00</td>
                                <td><span class="status-badge status-draft">Draft</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button title="Download">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                        <button title="View" class="text-green">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                        <button title="Delete" class="text-red delete-btn" onclick="deleteRow(this)">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 3 -->
                            <tr>
                                <td><span class="badge">INV-2026-003</span></td>
                                <td>
                                    <div class="cust-info">
                                        <div class="c-avatar bg-orange">A</div>
                                        <div>
                                            <span class="c-name">Ali Khan</span>
                                            <span class="c-email">ali.khan@client.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg class="table-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-07-10
                                    </div>
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg class="table-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        2026-08-10
                                    </div>
                                </td>
                                <td>$1,500.00</td>
                                <td>$450.00</td>
                                <td><strong>$1,950.00</strong></td>
                                <td class="bal-paid">$0.00</td>
                                <td><span class="status-badge status-paid">Paid</span></td>
                                <td class="text-right">
                                    <div class="action-btns">
                                        <button title="Download">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                        <button title="View" class="text-green">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                        <button title="Delete" class="text-red delete-btn" onclick="deleteRow(this)">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>

    <!-- MODAL (POPUP) FOR CREATING NEW INVOICE -->
    <div class="modal-overlay" id="addInvoiceModal">
        <div class="modal-box">
            <div class="modal-header">
                <h2>Create New Sales Invoice</h2>
                <button class="close-btn" id="closeModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <label>Customer Name</label>
                    <input type="text" placeholder="Enter customer name...">
                </div>
                <div class="input-group">
                    <label>Invoice Date</label>
                    <input type="date">
                </div>
                <div class="input-group">
                    <label>Total Amount ($)</label>
                    <input type="number" placeholder="0.00">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" id="cancelBtn">Cancel</button>
                <button class="btn-save">Save Invoice</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT (PURA WORKING) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            // 1. Filter Toggle (Working)
            const filterBtn = document.getElementById("filterToggleBtn");
            const filterPanel = document.getElementById("filterPanel");
            if (filterBtn && filterPanel) {
                filterBtn.addEventListener("click", function () {
                    filterPanel.classList.toggle("show");
                });
            }

            // 2. Create Button -> Modal Open (Working)
            const modal = document.getElementById("addInvoiceModal");
            const openBtn = document.getElementById("openModalBtn");
            const closeBtn = document.getElementById("closeModalBtn");
            const cancelBtn = document.getElementById("cancelBtn");

            if (openBtn && modal) {
                openBtn.addEventListener("click", function () {
                    modal.classList.add("show");
                });
            }

            // 3. Modal Close (Working)
            if (closeBtn && modal) {
                closeBtn.addEventListener("click", function () {
                    modal.classList.remove("show");
                });
            }
            if (cancelBtn && modal) {
                cancelBtn.addEventListener("click", function () {
                    modal.classList.remove("show");
                });
            }

            // Close modal if clicked outside
            window.addEventListener("click", function (e) {
                if (e.target === modal) {
                    modal.classList.remove("show");
                }
            });

            // 4. View Toggles (Working)
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
        });

        // 5. Delete Row (Working)
        function deleteRow(button) {
            if (confirm("Kya aap waqai ye invoice delete karna chahte hain?")) {
                button.closest('tr').remove();
            }
        }
    </script>
</body>
</html>