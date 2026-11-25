@extends('layout.dashboard')
@section('title', 'Chart Of Accounts - LedgeInvo')
@section('content')

<section id="manage-chart-of-accounts">
    <style>
        /* Scoped CSS for Manage Chart of Accounts Section */
        #manage-chart-of-accounts {
            --primary: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --danger: #ef4444;
            --blue-light: #eff6ff;
            --blue-text: #3b82f6;
            --red-light: #fef2f2;
            --red-text: #ef4444;
            --green-light: #ecfdf5;
            --green-text: #10b981;
            --purple-light: #f3e8ff;
            --purple-text: #9333ea;

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background: #f9fafb;
            box-sizing: border-box;
        }

        #manage-chart-of-accounts * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #manage-chart-of-accounts .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        #manage-chart-of-accounts .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        #manage-chart-of-accounts .page-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #manage-chart-of-accounts .btn-add {
            background-color: var(--primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 0.5rem;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        #manage-chart-of-accounts .btn-add:hover {
            background-color: var(--primary-hover);
        }

        #manage-chart-of-accounts .main-container {
            background: white;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        #manage-chart-of-accounts .toolbar {
            padding: 1rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        #manage-chart-of-accounts .search-box {
            display: flex;
            flex: 1;
            min-width: 250px;
            gap: 0.5rem;
        }

        #manage-chart-of-accounts .search-input-wrapper {
            display: flex;
            flex: 1;
            position: relative;
        }

        #manage-chart-of-accounts .search-input-wrapper span {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        #manage-chart-of-accounts .search-input-wrapper input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.2rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s;
        }

        #manage-chart-of-accounts .search-input-wrapper input:focus {
            border-color: var(--primary);
        }

        #manage-chart-of-accounts .btn-search {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            padding: 0 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        #manage-chart-of-accounts .btn-search:hover {
            background-color: var(--primary-hover);
        }

        #manage-chart-of-accounts .btn-clear {
            background-color: white;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 0 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        #manage-chart-of-accounts .btn-clear:hover {
            background-color: #f3f4f6;
        }

        #manage-chart-of-accounts .toolbar select,
        #manage-chart-of-accounts .btn-filter {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        #manage-chart-of-accounts .tabs {
            display: flex;
            padding: 0 1rem;
            border-bottom: 1px solid var(--border-color);
            gap: 1.5rem;
            overflow-x: auto;
        }

        #manage-chart-of-accounts .tab {
            padding: 1rem 0;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        #manage-chart-of-accounts .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        #manage-chart-of-accounts .tab-count {
            background: #f3f4f6;
            padding: 0.1rem 0.4rem;
            border-radius: 999px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        #manage-chart-of-accounts .tab.active .tab-count {
            background: #ecfdf5;
            color: var(--primary);
        }

        #manage-chart-of-accounts .table-container {
            overflow-x: auto;
            min-height: 400px;
        }

        #manage-chart-of-accounts table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        #manage-chart-of-accounts th {
            background-color: #f9fafb;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            border-top: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #manage-chart-of-accounts td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
            vertical-align: middle;
            color: var(--text-main);
        }

        #manage-chart-of-accounts .account-cell {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        #manage-chart-of-accounts .account-title {
            font-weight: 500;
        }

        #manage-chart-of-accounts .badge-sub {
            display: inline-block;
            background: var(--blue-light);
            color: var(--blue-text);
            padding: 0.15rem 0.5rem;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 500;
            width: fit-content;
        }

        #manage-chart-of-accounts .badge-balance {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
        }

        #manage-chart-of-accounts .badge-balance.debit {
            background: var(--red-light);
            color: var(--red-text);
            border-color: #fecaca;
        }

        #manage-chart-of-accounts .badge-balance.credit {
            background: var(--green-light);
            color: var(--green-text);
            border-color: #a7f3d0;
        }

        #manage-chart-of-accounts .status-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
        }

        #manage-chart-of-accounts .status-badge.active {
            background: var(--green-light);
            color: var(--green-text);
            border-color: #a7f3d0;
        }

        #manage-chart-of-accounts .status-badge.inactive {
            background: #f3f4f6;
            color: var(--text-muted);
            border-color: var(--border-color);
        }

        #manage-chart-of-accounts .actions {
            display: flex;
            gap: 0.75rem;
            color: var(--blue-text);
        }

        #manage-chart-of-accounts .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--blue-text);
            font-size: 1.1rem;
            transition: opacity 0.2s;
        }

        #manage-chart-of-accounts .action-btn:hover {
            opacity: 0.7;
        }

        #manage-chart-of-accounts .pagination {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
            background: #f9fafb;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        #manage-chart-of-accounts .page-numbers {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        #manage-chart-of-accounts .page-btn {
            padding: 0.4rem 0.75rem;
            border: 1px solid var(--border-color);
            background: white;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.2s;
            min-width: 36px;
            text-align: center;
            color: var(--text-main);
        }

        #manage-chart-of-accounts .page-btn:hover:not(:disabled) {
            background-color: #f3f4f6;
        }

        #manage-chart-of-accounts .page-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        #manage-chart-of-accounts .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        #manage-chart-of-accounts .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Manage Chart Of Accounts</h1>
            <p>Manage and organize your general ledger accounts, parent accounts, and normal balances.</p>
        </div>
        <button class="btn-add" title="Add Account">+</button>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <div class="search-input-wrapper">
                    <span>🔍</span>
                    <input type="text" class="searchInput" placeholder="Search Chart Of Accounts...">
                </div>
                <button class="btn-search">Search</button>
                <button class="btn-clear">Clear</button>
            </div>
            <select class="perPageSelect">
                <option value="10">10 per page</option>
                <option value="5">5 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
            <button class="btn-filter">▼ Filters</button>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active">⊞ All <span class="tab-count">50</span></div>
            <div class="tab">📉 Debit <span class="tab-count">0</span></div>
            <div class="tab">📈 Credit <span class="tab-count">0</span></div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Account ↑↓</th>
                        <th>Parent Account</th>
                        <th>Normal Balance ↑↓</th>
                        <th>Opening Balance</th>
                        <th>Current Balance ↑↓</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="tableBody">
                    <!-- Data injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <div class="pageInfo" style="font-size: 0.875rem; color: var(--text-muted);"></div>
            <div class="page-numbers"></div>
        </div>
    </div>

    <script>
        (function() {
            const section = document.getElementById('manage-chart-of-accounts');

            // --- 1. Deterministic PRNG (Mulberry32) ---
            // Same seed → same output. Refreshing the page will NOT change the data.
            function seededRandom(seed) {
                return function() {
                    seed |= 0;
                    seed = seed + 0x6D2B79F5 | 0;
                    let t = Math.imul(seed ^ seed >>> 15, 1 | seed);
                    t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
                    return ((t ^ t >>> 14) >>> 0) / 4294967296;
                };
            }

            function hashString(str) {
                let h = 0;
                for (let i = 0; i < str.length; i++) {
                    h = Math.imul(31, h) + str.charCodeAt(i) | 0;
                }
                return h;
            }

            // Fixed seed => same dataset on every refresh
            const rand = seededRandom(hashString('chart-of-accounts-v1'));

            // --- 2. Generate 50 Entities of Dummy Data (deterministic) ---
            const accountNames = [
                "Salaries Expense", "Marketing Expense", "Office Supplies",
                "Rent Expense", "Sales Commission Expense", "Utilities Expense",
                "Software Subscriptions", "Travel Expense", "Insurance Expense"
            ];
            const categories = ["Operating Expenses", "Current Assets", "Fixed Assets"];
            const balances = ["Debit", "Credit"];

            let accountsData = [];
            for (let i = 1; i <= 50; i++) {
                const accountName = accountNames[Math.floor(rand() * accountNames.length)];
                const accountNum = (rand() > 0.5 ? 5 : 1) * 1000 + Math.floor(rand() * 999);
                const balanceType = balances[Math.floor(rand() * balances.length)];

                const openingBalance = rand() > 0.6 ? 0 : (rand() * 5000);
                const currentBalance = openingBalance === 0 && rand() > 0.5 ? 0 : (rand() * 10000);

                accountsData.push({
                    id: i,
                    title: `${accountName} - ${accountNum}`,
                    category: categories[Math.floor(rand() * categories.length)],
                    parentAccount: "-",
                    normalBalance: balanceType,
                    openingBalance: openingBalance,
                    currentBalance: currentBalance,
                    status: rand() > 0.1 ? "Active" : "Inactive"
                });
            }

            // --- 3. State Management ---
            let state = {
                data: [...accountsData],
                filteredData: [...accountsData],
                currentPage: 1,
                perPage: 10,
                searchQuery: ""
            };

            // --- 4. DOM Elements ---
            const tableBody = section.querySelector('.tableBody');
            const pageNumbers = section.querySelector('.page-numbers');
            const pageInfo = section.querySelector('.pageInfo');
            const perPageSelect = section.querySelector('.perPageSelect');
            const searchInput = section.querySelector('.searchInput');
            const searchBtn = section.querySelector('.btn-search');
            const clearBtn = section.querySelector('.btn-clear');

            // --- 5. Core Functions ---
            function formatCurrency(amount) {
                return '$' + amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            function updateUI() {
                renderTable();
                renderPagination();
                updateTabCounts();
            }

            function updateTabCounts() {
                const tabs = section.querySelectorAll('.tab');
                const debitCount = state.data.filter(a => a.normalBalance === 'Debit').length;
                const creditCount = state.data.filter(a => a.normalBalance === 'Credit').length;

                if (tabs[0]) tabs[0].querySelector('.tab-count').textContent = state.data.length;
                if (tabs[1]) tabs[1].querySelector('.tab-count').textContent = debitCount;
                if (tabs[2]) tabs[2].querySelector('.tab-count').textContent = creditCount;
            }

            function renderTable() {
                tableBody.innerHTML = '';

                if (state.filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="7" class="empty-state">No accounts found matching your criteria.</td></tr>`;
                    return;
                }

                const startIndex = (state.currentPage - 1) * state.perPage;
                const endIndex = startIndex + state.perPage;
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                paginatedData.forEach(item => {
                    const tr = document.createElement('tr');

                    const balanceClass = item.normalBalance.toLowerCase();
                    const statusClass = item.status.toLowerCase();

                    tr.innerHTML = `
                        <td>
                            <div class="account-cell">
                                <div class="account-title">${item.title}</div>
                                <div class="badge-sub">${item.category}</div>
                            </div>
                        </td>
                        <td>${item.parentAccount}</td>
                        <td><span class="badge-balance ${balanceClass}">${item.normalBalance}</span></td>
                        <td>${formatCurrency(item.openingBalance)}</td>
                        <td>${formatCurrency(item.currentBalance)}</td>
                        <td><span class="status-badge ${statusClass}">${item.status}</span></td>
                        <td>
                            <div class="actions">
                                <button class="action-btn" title="View" onclick="alert('Viewing: ${item.title}')">👁️</button>
                                <button class="action-btn" title="Edit" onclick="alert('Editing: ${item.title}')">✏️</button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });
            }

            function renderPagination() {
                const totalPages = Math.ceil(state.filteredData.length / state.perPage) || 1;

                const startRecord = state.filteredData.length === 0 ? 0 : ((state.currentPage - 1) * state.perPage) + 1;
                const endRecord = Math.min(state.currentPage * state.perPage, state.filteredData.length);
                pageInfo.textContent = `Showing ${startRecord} to ${endRecord} of ${state.filteredData.length} entries`;

                pageNumbers.innerHTML = '';

                const prevBtn = document.createElement('button');
                prevBtn.className = 'page-btn';
                prevBtn.textContent = 'Previous';
                prevBtn.disabled = state.currentPage === 1;
                prevBtn.onclick = () => {
                    if (state.currentPage > 1) {
                        state.currentPage--;
                        updateUI();
                    }
                };
                pageNumbers.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.className = `page-btn ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => {
                        state.currentPage = i;
                        updateUI();
                    };
                    pageNumbers.appendChild(btn);
                }

                const nextBtn = document.createElement('button');
                nextBtn.className = 'page-btn';
                nextBtn.textContent = 'Next';
                nextBtn.disabled = state.currentPage === totalPages;
                nextBtn.onclick = () => {
                    if (state.currentPage < totalPages) {
                        state.currentPage++;
                        updateUI();
                    }
                };
                pageNumbers.appendChild(nextBtn);
            }

            // --- 6. Event Listeners ---
            function performSearch() {
                const query = searchInput.value.toLowerCase();
                state.searchQuery = query;

                state.filteredData = state.data.filter(item =>
                    item.title.toLowerCase().includes(query) ||
                    item.category.toLowerCase().includes(query) ||
                    item.normalBalance.toLowerCase().includes(query)
                );

                state.currentPage = 1;
                updateUI();
            }

            searchBtn.addEventListener('click', performSearch);
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') performSearch();
            });

            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                state.filteredData = [...state.data];
                state.currentPage = 1;
                updateUI();
                searchInput.focus();
            });

            perPageSelect.addEventListener('change', (e) => {
                state.perPage = parseInt(e.target.value);
                state.currentPage = 1;
                updateUI();
            });

            // --- 7. Initialization ---
            updateUI();
        })();
    </script>
</section>
@endsection