@extends('Layout.dashboard')
@section('title', 'Revenue - LedgeInvo')

@section('content')
<!-- Added style block to force the parent wrapper to remove padding, margin, and set white background -->
<style>
    /* Aggressively remove padding/margins AND set background to white */
    body, html, body main, .main-content, .content-wrapper, #app, #app > main, .app-content, .content {
        padding: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        background-color: #ffffff !important;
    }
</style>

<section id="manage-revenues-section">
    <style>
        #manage-revenues-section {
            /* Changed to Bright Blue Theme */
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --primary-light: #eff6ff;
            
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --bg-gray: transparent;

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

            background: transparent;
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 24px;
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
            margin-bottom: 1rem;
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

        /* --- CALENDAR WIDGET --- */
        #manage-revenues-section .calendar-widget {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            background: #fff;
            overflow: hidden;
        }

        #manage-revenues-section .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        #manage-revenues-section .calendar-title {
            font-weight: 600;
            font-size: 1rem;
            color: var(--text-main);
        }

        #manage-revenues-section .cal-nav-btn {
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
            font-size: 0.875rem;
        }

        #manage-revenues-section .cal-nav-btn:hover {
            background: #f3f4f6;
            color: var(--text-main);
        }

        #manage-revenues-section .calendar-months {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #manage-revenues-section .month-nav-cell {
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 1px solid var(--border-color);
            cursor: pointer;
            color: var(--text-muted);
            transition: background 0.2s;
        }
        
        #manage-revenues-section .month-nav-cell:last-child {
            border-right: none;
            border-left: 1px solid var(--border-color);
        }

        #manage-revenues-section .month-nav-cell:hover {
            background: #f9fafb;
        }

        #manage-revenues-section .month-cell {
            flex: 1;
            text-align: center;
            padding: 0.5rem 0;
            border-right: 1px solid var(--border-color);
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        #manage-revenues-section .month-cell:last-child {
            border-right: none;
        }

        #manage-revenues-section .month-cell:hover {
            background: #f9fafb;
        }

        #manage-revenues-section .month-name {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        #manage-revenues-section .month-number {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        #manage-revenues-section .month-cell.active {
            background: var(--primary);
        }

        #manage-revenues-section .month-cell.active .month-name,
        #manage-revenues-section .month-cell.active .month-number {
            color: white;
        }

        /* Main Container */
        #manage-revenues-section .main-container {
            background: transparent;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            width: 100%;
            overflow: hidden;
        }

        /* Toolbar */
        #manage-revenues-section .toolbar {
            padding: 0.75rem;
            display: flex;
            gap: 0.75rem;
            align-items: center;
            flex-wrap: wrap;
            background: transparent;
        }

        #manage-revenues-section .search-box {
            display: flex;
            flex: 1;
            min-width: 250px;
            max-width: 450px;
            gap: 0.5rem;
        }

        #manage-revenues-section .search-input-wrapper {
            position: relative;
            flex: 0 1 240px;
            min-width: 0;
        }

        #manage-revenues-section .search-input-wrapper input {
            width: 100%;
            padding: 0.4rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.85rem;
            outline: none;
            background: #ffffff;
        }

        #manage-revenues-section .search-input-wrapper input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
        }

        #manage-revenues-section .btn-search {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            padding: 0 0.75rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            white-space: nowrap;
            font-size: 0.85rem;
        }

        #manage-revenues-section .btn-search:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        #manage-revenues-section .btn-clear {
            background-color: #ffffff;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 0 0.75rem;
            border-radius: 0.375rem;
            cursor: pointer;
            font-weight: 500;
            white-space: nowrap;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            font-size: 0.85rem;
        }

        #manage-revenues-section .btn-clear:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: #bfdbfe;
        }

        #manage-revenues-section .btn-outline {
            background-color: #ffffff;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 0.4rem 0.75rem;
            border-radius: 0.375rem;
            font-size: 0.85rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        #manage-revenues-section .btn-outline:hover {
            background-color: #f3f4f6;
        }

        #manage-revenues-section .toolbar select {
            padding: 0.4rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.85rem;
            outline: none;
            background: #ffffff;
            cursor: pointer;
        }

        /* Tabs */
        #manage-revenues-section .tabs {
            display: flex;
            padding: 0 0.75rem;
            border-bottom: 1px solid var(--border-color);
            border-top: 1px solid var(--border-color);
            gap: 1.25rem;
            overflow-x: auto;
            background: transparent;
        }

        #manage-revenues-section .tab {
            padding: 0.75rem 0;
            font-size: 0.85rem;
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
            font-size: 0.7rem;
            color: var(--text-muted);
        }

        #manage-revenues-section .tab.active .tab-count {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Table - Shortened */
        #manage-revenues-section .table-container {
            overflow-x: auto;
            width: 100%;
            background: transparent;
        }

        #manage-revenues-section table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 1000px;
            background: transparent;
        }

        #manage-revenues-section th {
            background-color: transparent;
            padding: 0.5rem 0.75rem;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #manage-revenues-section td {
            padding: 0.5rem 0.75rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.85rem;
            vertical-align: middle;
            background: transparent;
        }

        #manage-revenues-section tbody tr:hover td {
            background: #f9fafb;
        }

        #manage-revenues-section .badge-id {
            display: inline-block;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.7rem;
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
            font-size: 0.8rem;
        }

        #manage-revenues-section .category-badge {
            display: inline-block;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.7rem;
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
            gap: 0.2rem;
        }
        #manage-revenues-section .coa-main { color: var(--text-main); font-weight: 500; font-size: 0.75rem; white-space: nowrap; }
        #manage-revenues-section .coa-sub {
            color: var(--blue-text);
            font-size: 0.65rem;
            background: var(--blue-light);
            padding: 0.1rem 0.3rem;
            border-radius: 0.25rem;
            width: fit-content;
            white-space: nowrap;
        }

        #manage-revenues-section .amount { font-weight: 600; color: var(--text-main); white-space: nowrap; font-size: 0.85rem; }

        #manage-revenues-section .status-badge {
            padding: 0.2rem 0.5rem;
            border-radius: 999px;
            font-size: 0.65rem;
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
            gap: 0.5rem;
        }
        #manage-revenues-section .avatar {
            width: 24px;
            height: 24px;
            background: var(--blue-light);
            color: var(--blue-text);
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
        }
        #manage-revenues-section .approver-info {
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
        }
        #manage-revenues-section .approver-name { font-size: 0.75rem; font-weight: 500; white-space: nowrap; }
        #manage-revenues-section .approver-email { font-size: 0.65rem; color: var(--text-muted); white-space: nowrap; }

        /* 3-Dots Action Menu */
        #manage-revenues-section .action-menu {
            position: relative;
            display: inline-flex;
            justify-content: center;
            width: 100%;
        }

        #manage-revenues-section .action-menu-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            padding: 4px;
            border-radius: 4px;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #manage-revenues-section .action-menu-btn:hover {
            background: #f3f4f6;
            color: var(--text-main);
        }

        #manage-revenues-section .action-menu-btn svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        #manage-revenues-section .action-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 20;
            min-width: 140px;
            padding: 4px 0;
        }

        #manage-revenues-section .action-dropdown.show {
            display: block;
        }

        #manage-revenues-section .action-dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            font-size: 13px;
            color: #334155;
            cursor: pointer;
            white-space: nowrap;
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            font-family: inherit;
        }

        #manage-revenues-section .action-dropdown-item:hover {
            background: #f8fafc;
        }

        #manage-revenues-section .action-dropdown-item.delete {
            color: var(--red-text);
        }

        #manage-revenues-section .action-dropdown-item.delete:hover {
            background: #fef2f2;
        }

        #manage-revenues-section .action-dropdown-item svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Pagination */
        #manage-revenues-section .pagination {
            padding: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
            background: transparent;
        }

        #manage-revenues-section .page-numbers {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        #manage-revenues-section .page-btn {
            padding: 0.3rem 0.6rem;
            border: 1px solid var(--border-color);
            background: #ffffff;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.2s;
            min-width: 32px;
            text-align: center;
            color: var(--text-main);
        }

        #manage-revenues-section .page-btn:hover:not(:disabled) { background-color: #f3f4f6; }
        #manage-revenues-section .page-btn.active { background-color: var(--primary); color: white; border-color: var(--primary); }
        #manage-revenues-section .page-btn:disabled { opacity: 0.5; cursor: not-allowed; }

        /* Responsive */
        @media (max-width: 768px) {
            #manage-revenues-section .page-header { flex-direction: column; gap: 1rem; }
            #manage-revenues-section .toolbar { flex-direction: column; align-items: stretch; }
            #manage-revenues-section .search-box { min-width: 0; max-width: 100%; }
            #manage-revenues-section .search-input-wrapper { flex: 1 1 auto; }
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

    <!-- Calendar Widget -->
    <div class="calendar-widget">
        <div class="calendar-header">
            <button class="cal-nav-btn" id="prevYear">‹</button>
            <div class="calendar-title" id="calendarMonthYear">Nov 2026</div>
            <button class="cal-nav-btn" id="nextYear">›</button>
        </div>
        <div class="calendar-months" id="calendarMonths">
            <!-- Injected via JS -->
        </div>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <div class="toolbar">
            <div class="search-box">
                <div class="search-input-wrapper">
                    <input type="text" id="searchInput" placeholder="Search revenues...">
                </div>
                <button class="btn-search" id="searchBtn">Search</button>
                <button class="btn-clear" id="clearBtn" title="Clear search">Clear</button>
            </div>
            <select id="perPageSelect">
                <option value="10">10 per page</option>
                <option value="5">5 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
            <button class="btn-outline" id="filterBtn">Filters</button>
        </div>

        <div class="tabs" id="statusTabs">
            <div class="tab active" data-status="all">All <span class="tab-count">15</span></div>
            <div class="tab" data-status="draft">Draft <span class="tab-count">3</span></div>
            <div class="tab" data-status="approved">Approved <span class="tab-count">5</span></div>
            <div class="tab" data-status="posted">Posted <span class="tab-count">7</span></div>
        </div>

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
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>

        <div class="pagination">
            <div class="pageInfo" id="pageInfo" style="font-size: 0.8rem; color: var(--text-muted);"></div>
            <div class="page-numbers" id="pageNumbers"></div>
        </div>
    </div>

    <script>
        (function() {
            const section = document.getElementById('manage-revenues-section');

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

            let state = {
                data: [...revenuesData],
                filteredData: [...revenuesData],
                currentPage: 1,
                perPage: 10,
                searchQuery: "",
                currentTab: "all",
                currentDate: new Date(2026, 10, 11)
            };

            const tableBody = section.querySelector('#tableBody');
            const pageNumbers = section.querySelector('#pageNumbers');
            const pageInfo = section.querySelector('#pageInfo');
            const perPageSelect = section.querySelector('#perPageSelect');
            const searchInput = section.querySelector('#searchInput');
            const searchBtn = section.querySelector('#searchBtn');
            const clearBtn = section.querySelector('#clearBtn');
            const statusTabs = section.querySelector('#statusTabs');
            const calendarMonths = section.querySelector('#calendarMonths');

            function formatCurrency(amount) {
                return '$' + Number(amount).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            function formatDate(dateString) {
                const d = new Date(dateString);
                return d.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }).replace(/\//g, '-');
            }

            function renderCalendar() {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const currentYear = state.currentDate.getFullYear();
                const currentMonth = state.currentDate.getMonth();
                
                section.querySelector('#calendarMonthYear').textContent = `${monthNames[currentMonth]} ${currentYear}`;
                calendarMonths.innerHTML = '';

                // Left Arrow
                const leftArrow = document.createElement('div');
                leftArrow.className = 'month-nav-cell';
                leftArrow.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>`;
                leftArrow.onclick = () => {
                    state.currentDate.setMonth(state.currentDate.getMonth() - 1);
                    renderCalendar();
                };
                calendarMonths.appendChild(leftArrow);

                // 12 Months
                for (let i = 0; i < 12; i++) {
                    const cell = document.createElement('div');
                    cell.className = 'month-cell';
                    if (i === currentMonth) cell.classList.add('active');

                    cell.innerHTML = `
                        <div class="month-name">${monthNames[i]}</div>
                        <div class="month-number">${String(i + 1).padStart(2, '0')}</div>
                    `;

                    cell.onclick = () => {
                        state.currentDate.setMonth(i);
                        renderCalendar();
                    };

                    calendarMonths.appendChild(cell);
                }

                // Right Arrow
                const rightArrow = document.createElement('div');
                rightArrow.className = 'month-nav-cell';
                rightArrow.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>`;
                rightArrow.onclick = () => {
                    state.currentDate.setMonth(state.currentDate.getMonth() + 1);
                    renderCalendar();
                };
                calendarMonths.appendChild(rightArrow);
            }

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

                statusTabs.querySelectorAll('.tab').forEach(tab => {
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
                    tableBody.innerHTML = `<tr><td colspan="8" style="text-align:center; padding: 2rem; color: var(--text-muted);">No revenues found matching your criteria.</td></tr>`;
                    return;
                }

                const startIndex = (state.currentPage - 1) * state.perPage;
                const endIndex = startIndex + state.perPage;
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                paginatedData.forEach(item => {
                    const tr = document.createElement('tr');
                    const statusClass = item.status === 'Approved' ? 'status-approved' : (item.status === 'Posted' ? 'status-posted' : 'status-draft');

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

                    // Build 3-dots menu items based on status WITH ICONS
                    let menuItems = '';
                    if (item.status === 'Draft') {
                        menuItems = `
                            <button class="action-dropdown-item" onclick="handleAction('approve', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                Approve
                            </button>
                            <button class="action-dropdown-item" onclick="handleAction('edit', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                Edit
                            </button>
                            <button class="action-dropdown-item" onclick="handleAction('post', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><polyline points="9 15 12 18 15 15"></polyline></svg>
                                Post
                            </button>
                            <button class="action-dropdown-item delete" onclick="handleAction('delete', '${item.id}')">
                                <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Delete
                            </button>
                        `;
                    } else if (item.status === 'Approved') {
                        menuItems = `
                            <button class="action-dropdown-item" onclick="handleAction('post', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><polyline points="9 15 12 18 15 15"></polyline></svg>
                                Post
                            </button>
                            <button class="action-dropdown-item" onclick="handleAction('view', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                View
                            </button>
                        `;
                    } else {
                        menuItems = `
                            <button class="action-dropdown-item" onclick="handleAction('view', '${item.id}')">
                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                View
                            </button>
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
                        <td><span class="status-badge ${statusClass}">${item.status}</span></td>
                        <td>${approvedByHtml}</td>
                        <td>
                            <div class="action-menu">
                                <button class="action-menu-btn" onclick="toggleMenu(this)">
                                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg>
                                </button>
                                <div class="action-dropdown">
                                    ${menuItems}
                                </div>
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

            // Global Action Handlers
            window.toggleMenu = function(btn) {
                const dropdowns = document.querySelectorAll('.action-dropdown');
                dropdowns.forEach(d => {
                    if (d !== btn.nextElementSibling) d.classList.remove('show');
                });
                btn.nextElementSibling.classList.toggle('show');
            };

            window.handleAction = function(action, id) {
                // Close dropdown
                document.querySelectorAll('.action-dropdown').forEach(d => d.classList.remove('show'));

                // Simulate action
                if (action === 'approve') console.log(`Approved ${id}`);
                else if (action === 'edit') console.log(`Editing ${id}`);
                else if (action === 'post') console.log(`Posted ${id}`);
                else if (action === 'delete') {
                    if (confirm(`Delete ${id}?`)) console.log(`Deleted ${id}`);
                }
                else if (action === 'view') console.log(`Viewing ${id}`);
            };

            // Close menus on outside click
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.action-menu')) {
                    document.querySelectorAll('.action-dropdown').forEach(d => d.classList.remove('show'));
                }
            });

            // Year navigation
            section.querySelector('#prevYear').addEventListener('click', () => {
                state.currentDate.setFullYear(state.currentDate.getFullYear() - 1);
                renderCalendar();
            });

            section.querySelector('#nextYear').addEventListener('click', () => {
                state.currentDate.setFullYear(state.currentDate.getFullYear() + 1);
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

            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                state.currentPage = 1;
                applyFilters();
                searchInput.focus();
            });

            perPageSelect.addEventListener('change', (e) => {
                state.perPage = parseInt(e.target.value);
                state.currentPage = 1;
                updateUI();
            });

            section.querySelector('#addRevenueBtn').addEventListener('click', () => alert('Open Add Revenue Modal'));
            section.querySelector('#filterBtn').addEventListener('click', () => alert('Open Filters Panel'));

            renderCalendar();
            applyFilters();
        })();
    </script>
</section>
@endsection