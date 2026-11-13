@extends('Layout.dashboard')
@section('title', 'Revenue - LedgeInvo')

@section('content')
<section id="manage-revenues-section">
    <style>
        /* Scoped CSS for Manage Revenues Section */
        #manage-revenues-section {
            --primary: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --bg-gray: #f9fafb;

            --blue-light: #eff6ff;
            --blue-text: #3b82f6;
            --purple-light: #faf5ff;
            --purple-text: #9333ea;
            --red-light: #fef2f2;
            --red-text: #ef4444;
            --orange-light: #fff7ed;
            --orange-text: #ea580c;
            --green-light: #ecfdf5;
            --green-text: #10b981;

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            /* FIX: transparent background so no separate white/grey block appears */
            background: transparent;
            /* FIX: fill the page width, no centering gap */
            width: 100%;
            max-width: 100%;
            margin: 0;
            /* FIX: no outer padding ring — align flush with page */
            padding: 0;
            box-sizing: border-box;
            color: var(--text-main);
        }

        #manage-revenues-section * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Page Header */
        #manage-revenues-section .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        #manage-revenues-section .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        #manage-revenues-section .page-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #manage-revenues-section .btn-add {
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
            flex-shrink: 0;
        }

        #manage-revenues-section .btn-add:hover {
            background-color: var(--primary-hover);
        }

        /* Calendar Header */
        #manage-revenues-section .calendar-container {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            background: #ffffff;
            overflow: hidden;
        }

        #manage-revenues-section .calendar-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        #manage-revenues-section .calendar-title {
            font-weight: 600;
            color: var(--text-main);
        }

        #manage-revenues-section .calendar-nav-btn {
            background: none;
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
            transition: all 0.2s;
        }

        #manage-revenues-section .calendar-nav-btn:hover {
            background: var(--bg-gray);
            color: var(--text-main);
        }

        #manage-revenues-section .calendar-days {
            display: flex;
            overflow-x: auto;
        }

        #manage-revenues-section .day-cell {
            flex: 1;
            min-width: 60px;
            padding: 0.75rem 0;
            text-align: center;
            border-right: 1px solid var(--border-color);
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        #manage-revenues-section .day-cell:last-child {
            border-right: none;
        }

        #manage-revenues-section .day-cell:hover {
            background: var(--bg-gray);
        }

        #manage-revenues-section .day-name {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        #manage-revenues-section .day-number {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        #manage-revenues-section .day-cell.active {
            background: var(--primary);
        }

        #manage-revenues-section .day-cell.active .day-name,
        #manage-revenues-section .day-cell.active .day-number {
            color: white;
        }

        /* Main Container */
        #manage-revenues-section .main-container {
            background: #ffffff;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            width: 100%;
            overflow: hidden;
        }

        /* Toolbar */
        #manage-revenues-section .toolbar {
            padding: 1rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        #manage-revenues-section .search-box {
            display: flex;
            flex: 1;
            min-width: 250px;
            gap: 0.5rem;
        }

        #manage-revenues-section .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        #manage-revenues-section .search-input-wrapper span {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        #manage-revenues-section .search-input-wrapper input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.2rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
        }

        #manage-revenues-section .search-input-wrapper input:focus {
            border-color: var(--primary);
        }

        #manage-revenues-section .btn-search {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            padding: 0 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            white-space: nowrap;
        }

        #manage-revenues-section .btn-search:hover {
            background-color: var(--primary-hover);
        }

        #manage-revenues-section .btn-outline {
            background-color: white;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        #manage-revenues-section .btn-outline:hover {
            background-color: var(--bg-gray);
        }

        #manage-revenues-section .toolbar select {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
            background: white;
            cursor: pointer;
        }

        /* Tabs */
        #manage-revenues-section .tabs {
            display: flex;
            padding: 0 1rem;
            border-bottom: 1px solid var(--border-color);
            border-top: 1px solid var(--border-color);
            gap: 1.5rem;
            overflow-x: auto;
            background: #ffffff;
        }

        #manage-revenues-section .tab {
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

        #manage-revenues-section .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        #manage-revenues-section .tab-count {
            background: #f3f4f6;
            padding: 0.1rem 0.4rem;
            border-radius: 999px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        #manage-revenues-section .tab.active .tab-count {
            background: var(--green-light);
            color: var(--primary);
        }

        /* Table */
        #manage-revenues-section .table-container {
            overflow-x: auto;
            width: 100%;
        }

        #manage-revenues-section table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 1000px;
        }

        #manage-revenues-section th {
            background-color: var(--bg-gray);
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #manage-revenues-section td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
            vertical-align: middle;
        }

        #manage-revenues-section .badge-id {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            background: var(--blue-light);
            color: var(--blue-text);
            border: 1px solid #bfdbfe;
            white-space: nowrap;
        }

        #manage-revenues-section .date-cell {
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        #manage-revenues-section .category-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
            white-space: nowrap;
        }
        #manage-revenues-section .cat-sub { background: var(--blue-light); color: var(--blue-text); border-color: #bfdbfe; }
        #manage-revenues-section .cat-prod { background: var(--purple-light); color: var(--purple-text); border-color: #e9d5ff; }
        #manage-revenues-section .cat-int { background: var(--red-light); color: var(--red-text); border-color: #fecaca; }

        #manage-revenues-section .coa-cell {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        #manage-revenues-section .coa-main { color: var(--text-main); font-weight: 500; font-size: 0.8125rem; white-space: nowrap; }
        #manage-revenues-section .coa-sub {
            color: var(--blue-text);
            font-size: 0.75rem;
            background: var(--blue-light);
            padding: 0.1rem 0.4rem;
            border-radius: 0.25rem;
            width: fit-content;
            white-space: nowrap;
        }

        #manage-revenues-section .amount { font-weight: 600; color: var(--text-main); white-space: nowrap; }

        #manage-revenues-section .status-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            white-space: nowrap;
        }
        #manage-revenues-section .status-approved { background: var(--blue-light); color: var(--blue-text); border-color: #bfdbfe; }
        #manage-revenues-section .status-posted { background: var(--green-light); color: var(--green-text); border-color: #a7f3d0; }
        #manage-revenues-section .status-draft { background: var(--orange-light); color: var(--orange-text); border-color: #fed7aa; }

        #manage-revenues-section .approved-by {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        #manage-revenues-section .avatar {
            width: 32px;
            height: 32px;
            background: var(--blue-light);
            color: var(--blue-text);
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }
        #manage-revenues-section .approver-info {
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
        }
        #manage-revenues-section .approver-name { font-size: 0.8125rem; font-weight: 500; white-space: nowrap; }
        #manage-revenues-section .approver-email { font-size: 0.7rem; color: var(--text-muted); white-space: nowrap; }

        #manage-revenues-section .actions {
            display: flex;
            gap: 0.5rem;
        }

        #manage-revenues-section .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            color: var(--text-muted);
            transition: color 0.2s;
        }
        #manage-revenues-section .action-btn.blue:hover { color: var(--blue-text); }
        #manage-revenues-section .action-btn.green:hover { color: var(--green-text); }
        #manage-revenues-section .action-btn.orange:hover { color: var(--orange-text); }
        #manage-revenues-section .action-btn.red:hover { color: var(--red-text); }

        /* Pagination */
        #manage-revenues-section .pagination {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
            background: #ffffff;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        #manage-revenues-section .page-numbers {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        #manage-revenues-section .page-btn {
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

        #manage-revenues-section .page-btn:hover:not(:disabled) { background-color: #f3f4f6; }
        #manage-revenues-section .page-btn.active { background-color: var(--primary); color: white; border-color: var(--primary); }
        #manage-revenues-section .page-btn:disabled { opacity: 0.5; cursor: not-allowed; }

        /* Toast */
        #manage-revenues-section .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--text-main);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s;
            pointer-events: none;
            z-index: 1000;
        }
        #manage-revenues-section .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            #manage-revenues-section .page-header { flex-direction: column; gap: 1rem; }
            #manage-revenues-section .toolbar { flex-direction: column; align-items: stretch; }
            #manage-revenues-section .search-box { min-width: 0; }
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Manage Revenues</h1>
            <p>Track and manage all business revenues, approve draft transactions, and post them to journal entries.</p>
        </div>
        <button class="btn-add" id="addRevenueBtn">+</button>
    </div>

    <!-- Calendar Header -->
    <div class="calendar-container">
        <div class="calendar-top">
            <button class="calendar-nav-btn" id="prevMonth">‹</button>
            <div class="calendar-title" id="calendarMonthYear">Nov 2026</div>
            <button class="calendar-nav-btn" id="nextMonth">›</button>
        </div>
        <div class="calendar-days" id="calendarDays">
            <!-- Days injected via JS -->
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <div class="search-input-wrapper">
                    <span>🔍</span>
                    <input type="text" id="searchInput" placeholder="Search revenues...">
                </div>
                <button class="btn-search" id="searchBtn">Search</button>
            </div>
            <select id="perPageSelect">
                <option value="10">10 per page</option>
                <option value="5">5 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
            <button class="btn-outline" id="filterBtn">▼ Filters</button>
        </div>

        <!-- Tabs -->
        <div class="tabs" id="statusTabs">
            <div class="tab active" data-status="all">⊞ All <span class="tab-count">15</span></div>
            <div class="tab" data-status="draft">📄 Draft <span class="tab-count">3</span></div>
            <div class="tab" data-status="approved">▶ Approved <span class="tab-count">5</span></div>
            <div class="tab" data-status="posted">✓ Posted <span class="tab-count">7</span></div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Revenue ↑↓</th>
                        <th>Date ↑↓</th>
                        <th>Category</th>
                        <th>Chart of Account / Bank</th>
                        <th>Amount ↑↓</th>
                        <th>Status ↑↓</th>
                        <th>Approved By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Data injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <div class="pageInfo" id="pageInfo" style="font-size: 0.875rem; color: var(--text-muted);"></div>
            <div class="page-numbers" id="pageNumbers">
                <!-- Pagination buttons injected via JS -->
            </div>
        </div>
    </div>

    <!-- Toast for Feedback -->
    <div class="toast" id="toast"></div>

    <script>
        (function() {
            const section = document.getElementById('manage-revenues-section');

            // --- 1. Generate 50 Deterministic Entities of Dummy Data ---
            const categories = [
                { name: "Subscription Revenue", class: "cat-sub", coa: "4040 - Subscription Revenue", bank: "Credit Line Account" },
                { name: "Product Sales", class: "cat-prod", coa: "4100 - Sales Revenue", bank: "Business Checking Account" },
                { name: "Interest Income", class: "cat-int", coa: "4300 - Other Income", bank: "Savings Account" },
                { name: "Consulting Fees", class: "cat-sub", coa: "4030 - Consulting Revenue", bank: "Business Checking Account" }
            ];
            const statuses = ['Approved', 'Posted', 'Draft'];

            const revenuesData = [];
            for (let i = 1; i <= 50; i++) {
                const cat    = categories[(i - 1) % categories.length];
                const status = statuses[(i - 1) % statuses.length];

                const date = new Date(2026, 10, 11);
                date.setDate(date.getDate() - (i * 2));

                const amount = (1000 + i * 137.5).toFixed(2);

                revenuesData.push({
                    id: `REV-2026-${String(i).padStart(3, '0')}`,
                    date: date.toISOString().split('T')[0],
                    category: cat.name,
                    categoryClass: cat.class,
                    coa: cat.coa,
                    bank: cat.bank,
                    amount: amount,
                    status: status,
                    approverName: status !== 'Draft' ? "Company" : "-",
                    approverEmail: status !== 'Draft' ? "company@example.com" : ""
                });
            }

            // --- 2. State Management ---
            let state = {
                data: [...revenuesData],
                filteredData: [...revenuesData],
                currentPage: 1,
                perPage: 10,
                searchQuery: "",
                currentTab: "all",
                currentDate: new Date(2026, 10, 11)
            };

            // --- 3. DOM Elements ---
            const tableBody = section.querySelector('#tableBody');
            const pageNumbers = section.querySelector('#pageNumbers');
            const pageInfo = section.querySelector('#pageInfo');
            const perPageSelect = section.querySelector('#perPageSelect');
            const searchInput = section.querySelector('#searchInput');
            const searchBtn = section.querySelector('#searchBtn');
            const statusTabs = section.querySelector('#statusTabs');
            const calendarDays = section.querySelector('#calendarDays');
            const calendarMonthYear = section.querySelector('#calendarMonthYear');
            const toast = section.querySelector('#toast');

            // --- 4. Helper Functions ---
            function formatCurrency(amount) {
                return '$' + Number(amount).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            function formatDate(dateString) {
                const d = new Date(dateString);
                return d.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }).replace(/\//g, '-');
            }

            function showToast(message) {
                toast.textContent = message;
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 3000);
            }

            // --- 5. Calendar Logic ---
            function renderCalendar() {
                const year = state.currentDate.getFullYear();
                const month = state.currentDate.getMonth();

                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const fullMonthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                calendarMonthYear.textContent = `${monthNames[month]} ${year}`;

                const daysInMonth = new Date(year, month + 1, 0).getDate();

                calendarDays.innerHTML = '';

                for (let i = 1; i <= daysInMonth; i++) {
                    const dayCell = document.createElement('div');
                    dayCell.className = 'day-cell';

                    if (i === state.currentDate.getDate()) {
                        dayCell.classList.add('active');
                    }

                    dayCell.innerHTML = `
                        <div class="day-name">${monthNames[month]}</div>
                        <div class="day-number">${String(i).padStart(2, '0')}</div>
                    `;

                    dayCell.onclick = () => {
                        state.currentDate.setDate(i);
                        renderCalendar();
                        showToast(`Filtered to ${fullMonthNames[month]} ${i}, ${year}`);
                    };

                    calendarDays.appendChild(dayCell);
                }
            }

            // --- 6. Table & Pagination Logic ---
            function applyFilters() {
                let filtered = [...state.data];

                if (state.currentTab !== 'all') {
                    filtered = filtered.filter(item => item.status.toLowerCase() === state.currentTab);
                }

                if (state.searchQuery) {
                    const query = state.searchQuery.toLowerCase();
                    filtered = filtered.filter(item =>
                        item.id.toLowerCase().includes(query) ||
                        item.category.toLowerCase().includes(query) ||
                        item.coa.toLowerCase().includes(query) ||
                        item.amount.includes(query) ||
                        item.status.toLowerCase().includes(query)
                    );
                }

                state.filteredData = filtered;

                const counts = { all: state.data.length, draft: 0, approved: 0, posted: 0 };
                state.data.forEach(item => {
                    if(counts[item.status.toLowerCase()] !== undefined) counts[item.status.toLowerCase()]++;
                });

                const tabs = statusTabs.querySelectorAll('.tab');
                tabs.forEach(tab => {
                    const status = tab.getAttribute('data-status');
                    tab.querySelector('.tab-count').textContent = counts[status];
                });

                updateUI();
            }

            function updateUI() {
                renderTable();
                renderPagination();
            }

            function renderTable() {
                tableBody.innerHTML = '';

                if (state.filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" style="text-align:center; padding: 3rem; color: var(--text-muted);">No revenues found matching your criteria.</td></tr>`;
                    return;
                }

                const startIndex = (state.currentPage - 1) * state.perPage;
                const endIndex = startIndex + state.perPage;
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                paginatedData.forEach(item => {
                    const tr = document.createElement('tr');

                    const statusClass = item.status === 'Approved' ? 'status-approved' : (item.status === 'Posted' ? 'status-posted' : 'status-draft');
                    const statusIcon = item.status === 'Approved' ? '📄' : (item.status === 'Posted' ? '✓' : '📄');

                    let approvedByHtml = '-';
                    if (item.approverName !== '-') {
                        approvedByHtml = `
                            <div class="approved-by">
                                <div class="avatar">🏢</div>
                                <div class="approver-info">
                                    <div class="approver-name">${item.approverName}</div>
                                    <div class="approver-email">${item.approverEmail}</div>
                                </div>
                            </div>
                        `;
                    }

                    let actionsHtml = '';
                    if (item.status === 'Draft') {
                        actionsHtml = `
                            <button class="action-btn green" title="Approve" onclick="alert('Approved ${item.id}')">✓</button>
                            <button class="action-btn blue" title="Edit" onclick="alert('Editing ${item.id}')">👁️</button>
                            <button class="action-btn blue" title="Post" onclick="alert('Posted ${item.id}')">📝</button>
                            <button class="action-btn red" title="Delete" onclick="alert('Deleted ${item.id}')">🗑️</button>
                        `;
                    } else if (item.status === 'Approved') {
                        actionsHtml = `
                            <button class="action-btn orange" title="Post" onclick="alert('Posted to Journal: ${item.id}')">◉</button>
                            <button class="action-btn blue" title="View" onclick="alert('Viewing ${item.id}')">👁️</button>
                        `;
                    } else {
                        actionsHtml = `
                            <button class="action-btn green" title="View" onclick="alert('Viewing ${item.id}')">👁️</button>
                        `;
                    }

                    tr.innerHTML = `
                        <td><span class="badge-id">${item.id}</span></td>
                        <td class="date-cell">📅 ${formatDate(item.date)}</td>
                        <td><span class="category-badge ${item.categoryClass}">${item.category}</span></td>
                        <td>
                            <div class="coa-cell">
                                <div class="coa-main">${item.coa}</div>
                                <div class="coa-sub">${item.bank}</div>
                            </div>
                        </td>
                        <td class="amount">${formatCurrency(item.amount)}</td>
                        <td><span class="status-badge ${statusClass}">${statusIcon} ${item.status}</span></td>
                        <td>${approvedByHtml}</td>
                        <td><div class="actions">${actionsHtml}</div></td>
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
                    if (totalPages > 7) {
                        if (i !== 1 && i !== totalPages && Math.abs(state.currentPage - i) > 1) {
                            if (i === 2 || i === totalPages - 1) {
                                const span = document.createElement('span');
                                span.textContent = '...';
                                span.style.padding = '0.4rem';
                                pageNumbers.appendChild(span);
                            }
                            continue;
                        }
                    }

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

            // --- 7. Event Listeners ---

            section.querySelector('#prevMonth').addEventListener('click', () => {
                state.currentDate.setMonth(state.currentDate.getMonth() - 1);
                state.currentDate.setDate(1);
                renderCalendar();
            });

            section.querySelector('#nextMonth').addEventListener('click', () => {
                state.currentDate.setMonth(state.currentDate.getMonth() + 1);
                state.currentDate.setDate(1);
                renderCalendar();
            });

            statusTabs.addEventListener('click', (e) => {
                const tab = e.target.closest('.tab');
                if (!tab) return;

                statusTabs.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                state.currentTab = tab.getAttribute('data-status');
                state.currentPage = 1;
                applyFilters();
            });

            searchBtn.addEventListener('click', () => {
                state.searchQuery = searchInput.value.trim();
                state.currentPage = 1;
                applyFilters();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value.trim();
                    state.currentPage = 1;
                    applyFilters();
                }
            });

            perPageSelect.addEventListener('change', (e) => {
                state.perPage = parseInt(e.target.value);
                state.currentPage = 1;
                updateUI();
            });

            section.querySelector('#addRevenueBtn').addEventListener('click', () => alert('Open Add Revenue Modal'));
            section.querySelector('#filterBtn').addEventListener('click', () => alert('Open Filters Panel'));

            // --- 8. Initialization ---
            renderCalendar();
            applyFilters();

        })();
    </script>
</section>
@endsection