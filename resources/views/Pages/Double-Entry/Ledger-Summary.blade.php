@extends('layout.dashboard')
@section('title', 'Ledger Summary')
@section('content')
    <section id="ledger-app">
    <style>
        /* Base Styles */
        #ledger-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #333;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: 0 auto;
            font-size: 14px;
        }
        #ledger-app * { box-sizing: border-box; }
        
        /* Header */
        .header-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px; }
        .title-area h2 { margin: 0 0 4px 0; font-size: 20px; font-weight: 600; color: #111; }
        .title-area p { margin: 0; color: #6b7280; font-size: 13px; }
        
        /* Buttons */
        .btn { padding: 8px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; }
        .btn:hover { background: #f3f4f6; }
        .btn-primary { background: #10b981; color: white; border-color: #10b981; }
        .btn-primary:hover { background: #059669; border-color: #059669; }
        
        /* Toolbar */
        .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 16px; flex-wrap: wrap; }
        .search-group { display: flex; gap: 8px; flex: 1; max-width: 400px; }
        .search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .search-input:focus { border-color: #10b981; box-shadow: 0 0 0 2px rgba(16,185,129,0.2); }
        .filter-group { display: flex; gap: 12px; align-items: center; }
        .select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }
        
        /* Table */
        .table-wrapper { overflow-x: auto; border: 1px solid #e5e7eb; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 12px 16px; border-bottom: 1px solid #e5e7eb; }
        th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; user-select: none; }
        th:hover { background: #f3f4f6; }
        th .sort-icon { font-size: 10px; color: #9ca3af; margin-left: 4px; }
        tbody tr:hover { background: #f9fafb; }
        
        /* Cell Specifics */
        .badge { display: inline-block; padding: 2px 8px; border-radius: 12px; font-size: 11px; font-weight: 500; border: 1px solid transparent; }
        .badge-blue { background: #e0f2fe; color: #0369a1; border-color: #bae6fd; }
        .badge-yellow { background: #fef9c3; color: #854d0e; border-color: #fef08a; }
        .badge-green { background: #dcfce7; color: #166534; border-color: #bbf7d0; }
        .text-red { color: #dc2626; }
        .text-green { color: #16a34a; }
        .text-muted { color: #9ca3af; }
        
        /* Pagination */
        .pagination-area { display: flex; justify-content: space-between; align-items: center; margin-top: 16px; font-size: 13px; color: #6b7280; }
        .page-controls { display: flex; gap: 4px; align-items: center; }
        .page-btn { padding: 6px 10px; border: 1px solid #e5e7eb; background: #fff; border-radius: 4px; cursor: pointer; font-size: 13px; color: #4b5563; }
        .page-btn:hover:not(:disabled) { background: #f3f4f6; }
        .page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .page-btn.active { background: #10b981; color: white; border-color: #10b981; }
        
        /* Expandable Row Details */
        .details-row td { padding: 0; border-bottom: 1px solid #e5e7eb; background: #fafafa; }
        .details-content { padding: 16px; font-size: 13px; color: #555; display: flex; gap: 40px; }
        .expand-btn { cursor: pointer; color: #6b7280; font-weight: bold; transition: transform 0.2s; display: inline-block; width: 16px; text-align: center; }
        .expand-btn.open { transform: rotate(90deg); }
        
        /* Toast Notification */
        #toast { visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 4px; padding: 12px; position: fixed; z-index: 1000; bottom: 30px; left: 50%; transform: translateX(-50%); font-size: 14px; opacity: 0; transition: opacity 0.3s, visibility 0.3s; }
        #toast.show { visibility: visible; opacity: 1; }
    </style>

    <!-- Header -->
    <div class="header-top">
        <div class="title-area">
            <h2>Ledger Summary</h2>
            <p>View and analyze general ledger transaction details, balance records, debit and credit summaries.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <button class="btn" id="downloadPdfBtn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Download PDF
            </button>
            <button class="btn btn-primary" id="addJournalBtn">+</button>
        </div>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="search-group">
            <input type="text" id="searchInput" class="search-input" placeholder="Search journal entries...">
            <button class="btn btn-primary" id="searchBtn">Search</button>
        </div>
        <div class="filter-group">
            <select class="select-input" id="pageSizeSelect">
                <option value="10">10 per page</option>
                <option value="20">20 per page</option>
                <option value="50">50 per page</option>
            </select>
            <button class="btn" id="filterBtn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                Filters
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th style="width: 40px;"></th>
                    <th data-sort="journal">#Journal <span class="sort-icon">↕</span></th>
                    <th data-sort="date">Date <span class="sort-icon">↕</span></th>
                    <th data-sort="type">Type <span class="sort-icon">↕</span></th>
                    <th data-sort="reference">Reference</th>
                    <th data-sort="description">Description</th>
                    <th data-sort="debit" style="text-align: right;">Total Debit <span class="sort-icon">↕</span></th>
                    <th data-sort="credit" style="text-align: right;">Total Credit <span class="sort-icon">↕</span></th>
                    <th data-sort="status">Status <span class="sort-icon">↕</span></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Rows will be injected by JS -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-area">
        <div id="pageInfo">Showing 1 to 10 of 108 results</div>
        <div class="page-controls" id="paginationControls">
            <button class="page-btn" id="prevPage" disabled>Previous</button>
            <div id="pageNumbers" style="display: flex; gap: 4px;"></div>
            <button class="page-btn" id="nextPage">Next</button>
        </div>
    </div>

    <!-- Toast Notification for Interactions -->
    <div id="toast"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mock Data (108 items generated)
            const rawData = [
                { id: "JE-2026-032", date: "2026-07-19", type: "Automatic", refType: "Service Invoice", refColor: "badge-yellow", desc: "Service Invoice #SI-2026-02-018", debit: 2950.00, credit: 2950.00, status: "Posted" },
                { id: "JE-2026-059", date: "2026-07-06", type: "Automatic", refType: "Bank Transfer", refColor: "badge-yellow", desc: "Bank Transfer #BT-2026-02-015", debit: 6813.00, credit: 6813.00, status: "Posted" },
                { id: "JE-2026-048", date: "2026-07-06", type: "Automatic", refType: "Stock Transfer", refColor: "badge-green", desc: "Stock Transfer #16 - Mountain Region Warehouse to Central...", debit: 180.00, credit: 180.00, status: "Posted" },
                { id: "JE-2026-031", date: "2026-06-29", type: "Automatic", refType: "Service Invoice", refColor: "badge-yellow", desc: "Service Invoice #SI-2026-02-016", debit: 1950.00, credit: 1950.00, status: "Posted" },
                { id: "JE-2026-058", date: "2026-06-24", type: "Automatic", refType: "Bank Transfer", refColor: "badge-yellow", desc: "Bank Transfer #BT-2026-02-014", debit: 5010.00, credit: 5010.00, status: "Posted" },
                { id: "JE-2026-047", date: "2026-06-18", type: "Automatic", refType: "Stock Transfer", refColor: "badge-green", desc: "Stock Transfer #15 - Southern Distribution Hub to Northeast...", debit: 625.00, credit: 625.00, status: "Posted" },
                { id: "JE-2026-030", date: "2026-06-14", type: "Automatic", refType: "Sales Invoice Cogs", refColor: "badge-yellow", desc: "COGS for Sales Invoice #SI-2026-02-014", debit: 578.00, credit: 578.00, status: "Posted" },
                { id: "JE-2026-029", date: "2026-06-14", type: "Automatic", refType: "Sales Invoice", refColor: "badge-blue", desc: "Sales Invoice #SI-2026-02-014", debit: 1325.25, credit: 1325.25, status: "Posted" },
                { id: "JE-2026-046", date: "2026-06-12", type: "Automatic", refType: "Stock Transfer", refColor: "badge-green", desc: "Stock Transfer #14 - Northern California Facility to Southwest...", debit: 480.00, credit: 480.00, status: "Posted" }
            ];

            // Generate more mock data to simulate 108 results
            const allData = [];
            for(let i=0; i<12; i++) {
                rawData.forEach(item => {
                    const newItem = {...item};
                    newItem.id = item.id.replace(/\d+$/, match => (parseInt(match) + (i * 10)).toString().padStart(3, '0'));
                    allData.push(newItem);
                });
            }

            // App State
            let state = {
                data: allData,
                filteredData: [...allData],
                currentPage: 1,
                pageSize: 10,
                sortColumn: null,
                sortAsc: true,
                searchQuery: ''
            };

            // DOM Elements
            const tableBody = document.getElementById('tableBody');
            const pageInfo = document.getElementById('pageInfo');
            const prevPageBtn = document.getElementById('prevPage');
            const nextPageBtn = document.getElementById('nextPage');
            const pageNumbers = document.getElementById('pageNumbers');
            const searchInput = document.getElementById('searchInput');
            const searchBtn = document.getElementById('searchBtn');
            const pageSizeSelect = document.getElementById('pageSizeSelect');
            const toast = document.getElementById('toast');

            // Helper: Format Currency
            const formatMoney = (amount) => "$" + amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});

            // Helper: Toast
            const showToast = (msg) => {
                toast.textContent = msg;
                toast.className = "show";
                setTimeout(() => { toast.className = toast.className.replace("show", ""); }, 3000);
            };

            // Function: Render Table
            const renderTable = () => {
                // Calculate Pagination
                const start = (state.currentPage - 1) * state.pageSize;
                const end = start + state.pageSize;
                const paginatedData = state.filteredData.slice(start, end);

                // Generate Rows
                tableBody.innerHTML = '';
                if (paginatedData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="10" style="text-align:center; padding: 24px; color: #6b7280;">No entries found.</td></tr>`;
                }

                paginatedData.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><span class="expand-btn" onclick="toggleDetails(this)">›</span></td>
                        <td><span class="badge badge-blue">${row.id}</span></td>
                        <td style="color: #6b7280; font-size: 13px;">📅 ${row.date}</td>
                        <td><span class="badge badge-blue" style="background:#f0f9ff; color:#0369a1; border:none;">${row.type}</span></td>
                        <td><span class="badge ${row.refColor}">${row.refType}</span></td>
                        <td style="font-size: 13px;">${row.desc}</td>
                        <td style="text-align: right; font-weight: 500;" class="text-red">${formatMoney(row.debit)}</td>
                        <td style="text-align: right; font-weight: 500;" class="text-green">${formatMoney(row.credit)}</td>
                        <td><span class="badge badge-green" style="background:#ecfdf5; color:#059669; border:none;">${row.status}</span></td>
                        <td class="text-muted">-</td>
                    `;
                    tableBody.appendChild(tr);
                });

                // Update Pagination Info
                const total = state.filteredData.length;
                const showingTo = total === 0 ? 0 : end > total ? total : end;
                pageInfo.textContent = `Showing ${total === 0 ? 0 : start + 1} to ${showingTo} of ${total} results`;

                // Render Pagination Buttons
                renderPagination();
            };

            // Function: Render Pagination
            const renderPagination = () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                pageNumbers.innerHTML = '';
                
                // Prev Button
                prevPageBtn.disabled = state.currentPage === 1;
                
                // Next Button
                nextPageBtn.disabled = state.currentPage === totalPages || totalPages === 0;

                // Page Numbers (Simplified logic for up to 11 pages as in screenshot)
                let startPage = Math.max(1, state.currentPage - 2);
                let endPage = Math.min(totalPages, startPage + 4);
                
                if (endPage - startPage < 4) startPage = Math.max(1, endPage - 4);

                for (let i = startPage; i <= endPage; i++) {
                    const btn = document.createElement('button');
                    btn.className = `page-btn ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => {
                        state.currentPage = i;
                        renderTable();
                    };
                    pageNumbers.appendChild(btn);
                }

                // Ellipsis
                if (endPage < totalPages) {
                    const span = document.createElement('span');
                    span.textContent = '...';
                    span.style.padding = '0 4px';
                    pageNumbers.appendChild(span);
                    
                    const btn = document.createElement('button');
                    btn.className = 'page-btn';
                    btn.textContent = totalPages;
                    btn.onclick = () => {
                        state.currentPage = totalPages;
                        renderTable();
                    };
                    pageNumbers.appendChild(btn);
                }
            };

            // Function: Filter & Search
            const applySearch = () => {
                const query = searchInput.value.toLowerCase().trim();
                state.searchQuery = query;
                
                if (query === '') {
                    state.filteredData = [...state.data];
                } else {
                    state.filteredData = state.data.filter(item => 
                        item.id.toLowerCase().includes(query) || 
                        item.desc.toLowerCase().includes(query) ||
                        item.refType.toLowerCase().includes(query) ||
                        item.date.includes(query)
                    );
                }
                state.currentPage = 1;
                renderTable();
                showToast(`Search applied. Found ${state.filteredData.length} results.`);
            };

            // Event Listeners: Search
            searchBtn.addEventListener('click', applySearch);
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') applySearch();
            });

            // Event Listeners: Pagination
            prevPageBtn.addEventListener('click', () => {
                if (state.currentPage > 1) {
                    state.currentPage--;
                    renderTable();
                }
            });

            nextPageBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                if (state.currentPage < totalPages) {
                    state.currentPage++;
                    renderTable();
                }
            });

            // Event Listeners: Page Size
            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderTable();
                showToast(`Showing ${state.pageSize} items per page.`);
            });

            // Event Listeners: Sorting
            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const column = th.getAttribute('data-sort');
                    
                    if (state.sortColumn === column) {
                        state.sortAsc = !state.sortAsc;
                    } else {
                        state.sortColumn = column;
                        state.sortAsc = true;
                    }

                    // Reset all icons
                    document.querySelectorAll('.sort-icon').forEach(icon => icon.textContent = '↕');
                    // Set active icon
                    th.querySelector('.sort-icon').textContent = state.sortAsc ? '↑' : '↓';

                    // Sorting Logic
                    state.filteredData.sort((a, b) => {
                        let valA = a[column];
                        let valB = b[column];

                        // Convert to lowercase for string comparison
                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();

                        if (valA < valB) return state.sortAsc ? -1 : 1;
                        if (valA > valB) return state.sortAsc ? 1 : -1;
                        return 0;
                    });
                    
                    renderTable();
                    showToast(`Sorted by ${column} (${state.sortAsc ? 'Ascending' : 'Descending'})`);
                });
            });

            // Event Listeners: Other Buttons
            document.getElementById('downloadPdfBtn').addEventListener('click', () => {
                showToast("Generating PDF... Download will start shortly.");
            });

            document.getElementById('addJournalBtn').addEventListener('click', () => {
                showToast("Opening new journal entry form...");
            });

            document.getElementById('filterBtn').addEventListener('click', () => {
                showToast("Filter panel toggled.");
            });

            // Expose row expand function globally for inline onclick handler
            window.toggleDetails = function(btnElement) {
                const tr = btnElement.closest('tr');
                btnElement.classList.toggle('open');
                
                // Check if next sibling is a details row
                if (tr.nextElementSibling && tr.nextElementSibling.classList.contains('details-row')) {
                    tr.nextElementSibling.remove();
                } else {
                    const detailsTr = document.createElement('tr');
                    detailsTr.className = 'details-row';
                    detailsTr.innerHTML = `
                        <td colspan="10">
                            <div class="details-content">
                                <div><strong>Transaction ID:</strong> TXN-${Math.random().toString(36).substr(2, 9).toUpperCase()}</div>
                                <div><strong>Created By:</strong> System Auto-Sync</div>
                                <div><strong>Department:</strong> Finance / Operations</div>
                                <div><strong>Notes:</strong> Automatically generated ledger entry.</div>
                            </div>
                        </td>
                    `;
                    tr.after(detailsTr);
                }
            };

            // Initialize App
            renderTable();
        });
    </script>
</section>
@endsection