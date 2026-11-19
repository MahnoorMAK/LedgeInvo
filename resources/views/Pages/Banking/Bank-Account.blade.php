@extends('layout.dashboard')

@section('title', 'Manage Bank Accounts - LedgeInvo')

@section('content')
<style>
    /* Force parent wrappers to be white with no padding */
    body main, 
    .main-content, 
    .content-wrapper,
    #app > main {
        background-color: #ffffff !important;
        padding: 0 !important;
    }
</style>

<section id="manage-bank-accounts">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        #manage-bank-accounts {
            /* Changed to Bright Blue color combination */
            --primary: #3b82f6; 
            --primary-hover: #2563eb;
            
            --border: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --bg-hover: #f9fafb;
            
            --badge-blue-bg: #eff6ff;
            --badge-blue-text: #3b82f6;
            --badge-purple-bg: #faf5ff;
            --badge-purple-text: #9333ea;
            --badge-orange-bg: #fff7ed;
            --badge-orange-text: #ea580c;
            --badge-green-bg: #ecfdf5;
            --badge-green-text: #10b981;
            --badge-red-bg: #fef2f2;
            --badge-red-text: #ef4444;
            
            --icon-green: #10b981;
            --icon-blue: #3b82f6;
            --icon-red: #ef4444;

            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            background: #ffffff;
            padding: 2rem;
            display: block;
            box-sizing: border-box;
        }

        #manage-bank-accounts * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Header */
        #manage-bank-accounts .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        #manage-bank-accounts h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        #manage-bank-accounts p.subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #manage-bank-accounts .btn-add {
            background-color: var(--primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        #manage-bank-accounts .btn-add:hover {
            background-color: var(--primary-hover);
        }

        /* Main Card */
        #manage-bank-accounts .main-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #ffffff;
            overflow: hidden;
        }

        /* Toolbar */
        #manage-bank-accounts .toolbar {
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border);
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        #manage-bank-accounts .search-group {
            display: flex;
            gap: 0.5rem;
            flex: 0 1 450px;
            align-items: center;
        }

        #manage-bank-accounts .search-wrapper {
            position: relative;
            flex: 1;
        }

        #manage-bank-accounts .search-wrapper svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            width: 16px;
            height: 16px;
        }

        #manage-bank-accounts .search-input {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 2.2rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 0.875rem;
            outline: none;
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            transition: border-color 0.2s;
        }

        #manage-bank-accounts .search-input:focus {
            border-color: var(--primary);
        }

        #manage-bank-accounts .btn-search {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.6rem 1.25rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: background 0.2s;
            white-space: nowrap;
        }

        #manage-bank-accounts .btn-search:hover {
            background-color: var(--primary-hover);
        }

        #manage-bank-accounts .btn-clear {
            background-color: #ffffff;
            color: var(--text-main);
            border: 1px solid var(--border);
            padding: 0.6rem 1.25rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            white-space: nowrap;
        }

        #manage-bank-accounts .btn-clear:hover {
            background-color: var(--badge-blue-bg);
            color: var(--badge-blue-text);
            border-color: #bfdbfe;
        }

        #manage-bank-accounts .toolbar-right {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        /* View Toggles */
        #manage-bank-accounts .view-toggles {
            display: flex;
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
        }

        #manage-bank-accounts .view-btn {
            background: #ffffff;
            border: none;
            padding: 0.6rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            border-right: 1px solid var(--border);
        }

        #manage-bank-accounts .view-btn:last-child {
            border-right: none;
        }

        #manage-bank-accounts .view-btn.active {
            background: var(--primary);
            color: white;
        }

        /* Select & Filter */
        #manage-bank-accounts select, 
        #manage-bank-accounts .btn-filter {
            padding: 0.6rem 1rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: #ffffff;
            font-size: 0.875rem;
            cursor: pointer;
            outline: none;
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Tabs */
        #manage-bank-accounts .tabs {
            display: flex;
            padding: 0 1.25rem;
            border-bottom: 1px solid var(--border);
            gap: 2rem;
        }

        #manage-bank-accounts .tab {
            padding: 1rem 0;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }

        #manage-bank-accounts .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        #manage-bank-accounts .tab-count {
            background: #f3f4f6;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        #manage-bank-accounts .tab.active .tab-count {
            background: var(--badge-blue-bg);
            color: var(--primary);
        }

        /* Table */
        #manage-bank-accounts .table-container {
            width: 100%;
            overflow-x: auto;
        }

        #manage-bank-accounts table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.875rem;
        }

        #manage-bank-accounts th {
            background-color: #f9fafb;
            color: var(--text-muted);
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            font-size: 0.8rem;
        }

        #manage-bank-accounts th .sort-icon {
            display: inline-block;
            margin-left: 4px;
            opacity: 0.5;
        }

        #manage-bank-accounts td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        #manage-bank-accounts tbody tr:hover {
            background-color: var(--bg-hover);
        }

        /* Badges */
        #manage-bank-accounts .id-badge {
            background: var(--badge-blue-bg);
            color: var(--badge-blue-text);
            padding: 4px 8px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.8rem;
            border: 1px solid #bfdbfe;
        }

        #manage-bank-accounts .type-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
        }
        
        #manage-bank-accounts .type-checking { background: var(--badge-blue-bg); color: var(--badge-blue-text); border-color: #bfdbfe; }
        #manage-bank-accounts .type-savings { background: var(--badge-purple-bg); color: var(--badge-purple-text); border-color: #e9d5ff; }
        #manage-bank-accounts .type-credit { background: var(--badge-blue-bg); color: var(--badge-blue-text); border-color: #bfdbfe; }
        #manage-bank-accounts .type-loan { background: var(--badge-orange-bg); color: var(--badge-orange-text); border-color: #fed7aa; }

        #manage-bank-accounts .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
        }

        #manage-bank-accounts .status-active { background: var(--badge-green-bg); color: var(--badge-green-text); border-color: #a7f3d0; }
        #manage-bank-accounts .status-inactive { background: var(--badge-red-bg); color: var(--badge-red-text); border-color: #fecaca; }

        #manage-bank-accounts .amount {
            font-weight: 500;
        }

        /* Actions */
        #manage-bank-accounts .actions-cell {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        #manage-bank-accounts .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            border-radius: 4px;
            transition: color 0.2s, background 0.2s;
        }

        #manage-bank-accounts .action-btn svg {
            width: 16px;
            height: 16px;
        }

        #manage-bank-accounts .action-btn.view { color: var(--icon-green); }
        #manage-bank-accounts .action-btn.edit { color: var(--icon-blue); }
        #manage-bank-accounts .action-btn.delete { color: var(--icon-red); }

        #manage-bank-accounts .action-btn:hover {
            background-color: #f3f4f6;
        }

        /* Pagination */
        #manage-bank-accounts .pagination-footer {
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border);
        }

        #manage-bank-accounts .page-info {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        #manage-bank-accounts .page-controls {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        #manage-bank-accounts .page-btn {
            padding: 0.4rem 0.75rem;
            border: 1px solid var(--border);
            background: #ffffff;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #manage-bank-accounts .page-btn:hover:not(:disabled) {
            background: #f9fafb;
        }

        #manage-bank-accounts .page-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        #manage-bank-accounts .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Empty State */
        #manage-bank-accounts .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }

        /* Responsive */
        @media (max-width: 768px) {
            #manage-bank-accounts .toolbar {
                flex-direction: column;
                align-items: stretch;
            }
            #manage-bank-accounts .search-group {
                max-width: 100%;
                flex: 1 1 100%;
            }
            #manage-bank-accounts .toolbar-right {
                justify-content: space-between;
            }
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Manage Bank Accounts</h1>
            <p class="subtitle">Track and manage all business bank accounts, their details, and current balances.</p>
        </div>
        <button class="btn-add" onclick="alert('Open Add Bank Account Modal')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Main Content Card -->
    <main class="main-card">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-group">
                <div class="search-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" id="searchInput" class="search-input" placeholder="Search Bank Accounts...">
                </div>
                <button class="btn-search" onclick="applyFilters()">Search</button>
                <button class="btn-clear" onclick="clearSearch()">Clear</button>
            </div>
            
            <div class="toolbar-right">
                <!-- View Toggles -->
                <div class="view-toggles">
                    <button class="view-btn active" title="List View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="view-btn" title="Grid View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>

                <select id="pageSizeSelect" onchange="changePageSize()">
                    <option value="5">5 per page</option>
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                </select>

                <button class="btn-filter" onclick="alert('Open Filters')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs" id="tabsContainer">
            <button class="tab active" data-type="All" onclick="setTab('All', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="tab-count" id="countAll">0</span>
            </button>
            <button class="tab" data-type="Checking" onclick="setTab('Checking', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="8" width="18" height="12" rx="2"/><path d="M7 8v-4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4"/><line x1="3" y1="14" x2="21" y2="14"/></svg>
                Checking <span class="tab-count" id="countChecking">0</span>
            </button>
            <button class="tab" data-type="Savings" onclick="setTab('Savings', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 5c-1.5 0-2.8 1.4-3 2-3.5-1.5-11-.3-11 5 0 1.8 0 3 2 4.5V20h4v-2h3v2h4v-4c1-.5 1.7-1 2-2h2v-4h-2c0-1-.5-1.5-1-2h0V5z"/><path d="M2 9v1c0 1.1.9 2 2 2h1"/><path d="M16 11h0"/></svg>
                Savings <span class="tab-count" id="countSavings">0</span>
            </button>
            <button class="tab" data-type="Credit" onclick="setTab('Credit', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                Credit <span class="tab-count" id="countCredit">0</span>
            </button>
            <button class="tab" data-type="Loan" onclick="setTab('Loan', this)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                Loan <span class="tab-count" id="countLoan">0</span>
            </button>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Account Number <span class="sort-icon">↑↓</span></th>
                        <th>Account Name <span class="sort-icon">↑↓</span></th>
                        <th>Bank Name <span class="sort-icon">↑↓</span></th>
                        <th>Account Type</th>
                        <th>Current Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-footer">
            <span id="pageInfo" class="page-info"></span>
            <div class="page-controls" id="pageControls">
                <!-- Dynamic Pagination Buttons -->
            </div>
        </div>
    </main>

    <script>
        // Mock Data based on the image
        let bankAccounts = [
            { id: '1234567890', name: 'Business Checking Account', bank: 'Chase Bank', type: 'Checking', balance: 819176.25, status: 'Active' },
            { id: '9876543210', name: 'Savings Account', bank: 'Bank of America', type: 'Savings', balance: 1233839.22, status: 'Active' },
            { id: '5555666677', name: 'Credit Line Account', bank: 'Wells Fargo', type: 'Credit', balance: 2553378.33, status: 'Active' },
            { id: '1111222233', name: 'Equipment Loan Account', bank: 'Citibank', type: 'Loan', balance: 3519179.20, status: 'Active' },
            { id: '7777888899', name: 'Petty Cash Account', bank: 'TD Bank', type: 'Checking', balance: 85000.00, status: 'Inactive' }
        ];

        const state = {
            currentTab: 'All',
            searchQuery: '',
            currentPage: 1,
            pageSize: 5
        };

        let filteredData = [...bankAccounts];

        // Initialize App
        function init() {
            updateCounts();
            applyFilters();
        }

        // Apply Search & Tab Filters
        function applyFilters() {
            state.searchQuery = document.getElementById('searchInput').value.toLowerCase();

            filteredData = bankAccounts.filter(account => {
                const matchTab = state.currentTab === 'All' || account.type === state.currentTab;
                const matchSearch = 
                    account.id.toLowerCase().includes(state.searchQuery) ||
                    account.name.toLowerCase().includes(state.searchQuery) ||
                    account.bank.toLowerCase().includes(state.searchQuery);
                
                return matchTab && matchSearch;
            });

            state.currentPage = 1; // Reset to page 1 on new search
            renderTable();
        }

        // Clear Search Functionality
        function clearSearch() {
            document.getElementById('searchInput').value = '';
            state.searchQuery = '';
            applyFilters();
        }

        // Change Tab
        function setTab(type, btnElement) {
            state.currentTab = type;
            document.querySelectorAll('#manage-bank-accounts .tab').forEach(t => t.classList.remove('active'));
            btnElement.classList.add('active');
            applyFilters();
        }

        // Update Tab Counts
        function updateCounts() {
            const counts = {
                All: bankAccounts.length,
                Checking: bankAccounts.filter(a => a.type === 'Checking').length,
                Savings: bankAccounts.filter(a => a.type === 'Savings').length,
                Credit: bankAccounts.filter(a => a.type === 'Credit').length,
                Loan: bankAccounts.filter(a => a.type === 'Loan').length
            };

            document.getElementById('countAll').innerText = counts.All;
            document.getElementById('countChecking').innerText = counts.Checking;
            document.getElementById('countSavings').innerText = counts.Savings;
            document.getElementById('countCredit').innerText = counts.Credit;
            document.getElementById('countLoan').innerText = counts.Loan;
        }

        // Render Table
        function renderTable() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';

            if (filteredData.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="empty-state">No bank accounts found matching your criteria.</td></tr>`;
                updatePaginationUI(0);
                return;
            }

            const totalPages = Math.ceil(filteredData.length / state.pageSize);
            if (state.currentPage > totalPages) state.currentPage = totalPages;

            const startIndex = (state.currentPage - 1) * state.pageSize;
            const endIndex = Math.min(startIndex + state.pageSize, filteredData.length);
            const pageData = filteredData.slice(startIndex, endIndex);

            pageData.forEach(account => {
                const tr = document.createElement('tr');
                
                // Map classes for badges
                const typeClass = `type-${account.type.toLowerCase()}`;
                const statusClass = account.status === 'Active' ? 'status-active' : 'status-inactive';

                tr.innerHTML = `
                    <td><span class="id-badge">${account.id}</span></td>
                    <td>${account.name}</td>
                    <td>${account.bank}</td>
                    <td><span class="type-badge ${typeClass}">${account.type}</span></td>
                    <td class="amount">$${account.balance.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                    <td><span class="status-badge ${statusClass}">${account.status}</span></td>
                    <td>
                        <div class="actions-cell">
                            <button class="action-btn view" title="View" onclick="handleAction('view', '${account.id}')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                            <button class="action-btn edit" title="Edit" onclick="handleAction('edit', '${account.id}')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </button>
                            <button class="action-btn delete" title="Delete" onclick="handleAction('delete', '${account.id}')">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            updatePaginationUI(totalPages);
        }

        // Render Pagination Controls
        function updatePaginationUI(totalPages) {
            const info = document.getElementById('pageInfo');
            const controls = document.getElementById('pageControls');
            
            if (totalPages === 0) {
                info.innerText = 'Showing 0 results';
                controls.innerHTML = '';
                return;
            }

            const startRecord = (state.currentPage - 1) * state.pageSize + 1;
            const endRecord = Math.min(state.currentPage * state.pageSize, filteredData.length);
            info.innerText = `Showing ${startRecord} to ${endRecord} of ${filteredData.length} results`;

            controls.innerHTML = '';

            // Previous Button
            const prevBtn = document.createElement('button');
            prevBtn.className = 'page-btn';
            prevBtn.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg> Previous`;
            prevBtn.disabled = state.currentPage === 1;
            prevBtn.onclick = () => changePage(state.currentPage - 1);
            controls.appendChild(prevBtn);

            // Page Numbers
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = `page-btn ${i === state.currentPage ? 'active' : ''}`;
                btn.innerText = i;
                btn.onclick = () => changePage(i);
                controls.appendChild(btn);
            }

            // Next Button
            const nextBtn = document.createElement('button');
            nextBtn.className = 'page-btn';
            nextBtn.innerHTML = `Next <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>`;
            nextBtn.disabled = state.currentPage === totalPages;
            nextBtn.onclick = () => changePage(state.currentPage + 1);
            controls.appendChild(nextBtn);
        }

        // Change Page
        function changePage(page) {
            state.currentPage = page;
            renderTable();
        }

        // Change Page Size
        function changePageSize() {
            state.pageSize = parseInt(document.getElementById('pageSizeSelect').value);
            state.currentPage = 1;
            renderTable();
        }

        // Handle Action Buttons
        function handleAction(action, id) {
            if (action === 'view') {
                const account = bankAccounts.find(a => a.id === id);
                alert(`Viewing Details for Account:\n\nNumber: ${account.id}\nName: ${account.name}\nBank: ${account.bank}\nBalance: $${account.balance.toLocaleString('en-US', {minimumFractionDigits: 2})}`);
            } 
            else if (action === 'edit') {
                alert(`Open Edit Modal for Account Number: ${id}`);
            } 
            else if (action === 'delete') {
                if (confirm(`Are you sure you want to delete the account ending in ${id.slice(-4)}?`)) {
                    // Remove from data array
                    bankAccounts = bankAccounts.filter(a => a.id !== id);
                    // Refresh UI
                    updateCounts();
                    applyFilters();
                }
            }
        }

        // Run on load
        init();
    </script>
</section>
@endsection