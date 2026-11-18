@extends('layout.dashboard')

@section('title', 'Debit Notes - LedgeInvo')

@section('content')
<section id="manage-debit-notes">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        /* Scoped styles to the section */
        #manage-debit-notes {
            --primary: #3b82f6; /* Bright Blue */
            --primary-hover: #2563eb;
            --bg-color: #f9fafb;
            --surface: #ffffff;
            --border: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --text-light: #9ca3af;
            --badge-bg-blue: #eff6ff;
            --badge-text-blue: #1d4ed8;
            --badge-bg-pending: #fef3c7;
            --badge-text-pending: #b45309;
            --badge-bg-cleared: #d1fae5;
            --badge-text-cleared: #047857;
            --danger: #ef4444;

            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 2rem;
            display: block;
        }

        #manage-debit-notes * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* --- Header --- */
        #manage-debit-notes .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        #manage-debit-notes .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        #manage-debit-notes .page-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #manage-debit-notes .btn-add {
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

        #manage-debit-notes .btn-add:hover { background-color: var(--primary-hover); }

        /* --- Calendar Widget (Made Shorter) --- */
        #manage-debit-notes .calendar-widget {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        #manage-debit-notes .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            border-bottom: 1px solid var(--border);
            font-weight: 500;
            font-size: 0.875rem;
        }

        #manage-debit-notes .cal-nav-btn {
            background: none;
            border: 1px solid var(--border);
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: background 0.2s;
        }

        #manage-debit-notes .cal-nav-btn:hover { background: var(--bg-color); }

        #manage-debit-notes .calendar-grid {
            display: flex;
            width: 100%;
        }

        #manage-debit-notes .month-btn {
            flex: 1;
            padding: 0.5rem 0;
            background: none;
            border: none;
            border-right: 1px solid var(--border);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            color: var(--text-muted);
            transition: all 0.2s;
        }
        
        #manage-debit-notes .month-btn:last-child { border-right: none; }
        #manage-debit-notes .month-btn:hover { background-color: var(--bg-color); }
        
        #manage-debit-notes .month-btn.active {
            background-color: var(--primary);
            color: white;
        }

        #manage-debit-notes .month-name { font-size: 0.65rem; text-transform: uppercase; }
        #manage-debit-notes .month-date { font-size: 0.95rem; font-weight: 600; }

        #manage-debit-notes .nav-arrow-col {
            display: flex;
            align-items: center;
            padding: 0 0.75rem;
            border-right: 1px solid var(--border);
            cursor: pointer;
            transition: background 0.2s;
        }
        #manage-debit-notes .nav-arrow-col:hover { background: var(--bg-color); }
        #manage-debit-notes .nav-arrow-col:last-child {
            border-right: none;
            border-left: 1px solid var(--border);
        }

        /* --- Main Content Area --- */
        #manage-debit-notes .main-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        /* Toolbar */
        #manage-debit-notes .toolbar {
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border);
            gap: 1rem;
            flex-wrap: wrap;
        }

        #manage-debit-notes .search-group {
            display: flex;
            gap: 0.5rem;
            flex: 1;
            max-width: 550px;
            align-items: center;
        }

        #manage-debit-notes .search-input {
            flex: 1;
            padding: 0.6rem 1rem;
            border: none;
            background-color: #f3f4f6;
            border-radius: 8px;
            font-size: 0.875rem;
            outline: none;
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            transition: background 0.2s;
        }
        #manage-debit-notes .search-input:focus { background-color: #e5e7eb; }
        #manage-debit-notes .search-input::placeholder { color: #6b7280; }

        #manage-debit-notes .btn-search {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: background 0.2s;
        }
        #manage-debit-notes .btn-search:hover { background-color: var(--primary-hover); }

        #manage-debit-notes .btn-clear {
            background-color: white;
            color: #1f2937;
            border: 1px solid #e5e7eb;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: background 0.2s;
        }
        #manage-debit-notes .btn-clear:hover { background-color: #f9fafb; }

        #manage-debit-notes .filter-group {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        #manage-debit-notes .select-styled, 
        #manage-debit-notes .btn-filter {
            padding: 0.6rem 1rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: white;
            font-size: 0.875rem;
            cursor: pointer;
            outline: none;
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
        }

        /* Tabs */
        #manage-debit-notes .tabs {
            display: flex;
            padding: 0 1.25rem;
            border-bottom: 1px solid var(--border);
            gap: 2rem;
        }

        #manage-debit-notes .tab {
            padding: 0.85rem 0;
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
        }

        #manage-debit-notes .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
            font-weight: 500;
        }

        #manage-debit-notes .tab-count {
            background: var(--bg-color);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            color: var(--text-muted);
        }
        #manage-debit-notes .tab.active .tab-count {
            background: var(--badge-bg-blue);
            color: var(--primary);
        }

        /* Table (Made more compact) */
        #manage-debit-notes .table-container {
            width: 100%;
            overflow-x: auto;
        }

        #manage-debit-notes table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.875rem;
        }

        #manage-debit-notes th {
            background-color: #f9fafb;
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.65rem 1rem;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        #manage-debit-notes td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        #manage-debit-notes tr:hover { background-color: #f9fafb; }

        /* Table Specific Styles */
        #manage-debit-notes .id-badge {
            background: var(--badge-bg-blue);
            color: var(--badge-text-blue);
            padding: 4px 8px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.8rem;
        }

        /* --- Updated Vendor Cell Styles --- */
        #manage-debit-notes .vendor-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            max-width: 250px; /* Constrain width to force ellipsis if needed */
        }

        #manage-debit-notes .avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        #manage-debit-notes .vendor-info {
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Prevents text from breaking out */
        }

        #manage-debit-notes .vendor-info .vendor-name,
        #manage-debit-notes .vendor-info .vendor-email {
            white-space: nowrap;      /* Forces text to a single line */
            overflow: hidden;         /* Hides overflowing text */
            text-overflow: ellipsis;  /* Adds the '...' at the end */
            display: block;
        }

        #manage-debit-notes .vendor-info .vendor-name {
            font-weight: 500;
            color: var(--text-main);
        }

        #manage-debit-notes .vendor-info .vendor-email {
            color: var(--text-muted);
            font-size: 0.75rem;
        }

        #manage-debit-notes .date-cell {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-muted);
        }

        #manage-debit-notes .amount-cell {
            font-weight: 500;
        }

        #manage-debit-notes .bank-account-badge {
            background: #f3f4f6;
            color: var(--text-muted);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            border: 1px solid var(--border);
        }

        #manage-debit-notes .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }
        
        #manage-debit-notes .status-pending { background: var(--badge-bg-pending); color: var(--badge-text-pending); }
        #manage-debit-notes .status-cleared { background: var(--badge-bg-cleared); color: var(--badge-text-cleared); }
        #manage-debit-notes .status-cancelled { background: #fee2e2; color: #b91c1c; }

        #manage-debit-notes .actions-cell {
            display: flex;
            gap: 0.5rem;
        }

        #manage-debit-notes .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        #manage-debit-notes .action-btn:hover { background: var(--border); }
        #manage-debit-notes .action-btn.approve:hover { color: var(--primary); }
        #manage-debit-notes .action-btn.reject:hover { color: var(--danger); }
        #manage-debit-notes .action-btn.view:hover { color: var(--badge-text-blue); }

        #manage-debit-notes .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }

        #manage-debit-notes .pagination-footer {
            padding: 1rem 1.25rem; 
            display: flex; 
            justify-content: flex-end; 
            gap: 10px; 
            align-items: center; 
            border-top: 1px solid var(--border);
        }
        
        #manage-debit-notes .page-info {
            font-size: 0.875rem; 
            color: var(--text-muted);
        }
    </style>

    <!-- Header -->
    <header class="page-header">
        <div>
            <h1>Manage Debit Notes</h1>
            <p>Manage and keep track of all debit notes, bill allocations, and outstanding balances.</p>
        </div>
        <button class="btn-add" onclick="alert('Add new payment clicked')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </header>

    <!-- Calendar Widget (Shorter) -->
    <div class="calendar-widget">
        <div class="calendar-header">
            <button class="cal-nav-btn" onclick="changeYear(-1)">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <span id="currentMonthDisplay">Nov 2026</span>
            <button class="cal-nav-btn" onclick="changeYear(1)">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
        <div class="calendar-grid">
            <div class="nav-arrow-col" onclick="shiftMonth(-1)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
            </div>
            <div id="monthsContainer" style="display:flex; flex:1;"></div>
            <div class="nav-arrow-col" onclick="shiftMonth(1)">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <main class="main-card">
        <!-- Toolbar (Matched to Image) -->
        <div class="toolbar">
            <div class="search-group">
                <input type="text" id="searchInput" class="search-input" placeholder="Search vendors...">
                <button class="btn-search" onclick="applyFilters()">Search</button>
                <button class="btn-clear" onclick="clearSearch()">Clear</button>
            </div>
            <div class="filter-group">
                <select class="select-styled" id="pageSizeSelect" onchange="changePageSize()">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
                <button class="btn-filter" onclick="alert('Filter menu clicked')">
                    <svg style="vertical-align: middle; margin-right: 4px;" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab active" onclick="setTab('All', this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="tab-count" id="countAll">0</span>
            </button>
            <button class="tab" onclick="setTab('Pending', this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Pending <span class="tab-count" id="countPending">0</span>
            </button>
            <button class="tab" onclick="setTab('Cleared', this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                Cleared <span class="tab-count" id="countCleared">0</span>
            </button>
            <button class="tab" onclick="setTab('Cancelled', this)">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                Cancelled <span class="tab-count" id="countCancelled">0</span>
            </button>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Payment Number</th>
                        <th>Vendor</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Bank Account</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Rows generated by JS -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="pagination-footer">
            <span id="pageInfo" class="page-info"></span>
            <button class="btn-filter" onclick="prevPage()" id="btnPrev">Previous</button>
            <button class="btn-filter" onclick="nextPage()" id="btnNext">Next</button>
        </div>
    </main>

    <script>
        // --- State & Data Generation ---
        let payments = [];
        let filteredPayments = [];
        
        let currentState = {
            tab: 'All',
            search: '',
            page: 1,
            pageSize: 10,
            calYear: 2026,
            calMonth: 10 // November (0-indexed)
        };

        const firstNames = ["Jennifer", "Ashley", "Lisa", "Sarah", "Michael", "John", "Emily", "David", "Jessica", "Daniel", "Sophia", "James", "Olivia", "Robert", "Emma", "William", "Ava", "Joseph", "Isabella", "Thomas"];
        const lastNames = ["Martinez", "Lewis", "Anderson", "Johnson", "Smith", "Brown", "Davis", "Miller", "Wilson", "Moore", "Taylor", "Thomas", "Jackson", "White", "Harris", "Martin", "Thompson", "Garcia", "Robinson", "Clark"];
        const bankAccounts = ["Equipment Loan Account", "Savings Account", "Business Checking Account", "Credit Line Account", "Main Operating Account"];
        const statuses = ["Pending", "Cleared", "Pending", "Cleared", "Cancelled"];
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        // --- Seeded PRNG (Mulberry32) — deterministic across refreshes ---
        function mulberry32(seed) {
            return function () {
                seed |= 0;
                seed = (seed + 0x6D2B79F5) | 0;
                let t = Math.imul(seed ^ (seed >>> 15), 1 | seed);
                t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
                return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
            };
        }

        function seededRandomDate(start, end, rng) {
            return new Date(start.getTime() + rng() * (end.getTime() - start.getTime()));
        }

        function generateMockData() {
            const data = [];
            const startDate = new Date(2026, 1, 1);
            const endDate = new Date(2026, 1, 28);

            // Fixed seed → identical dataset on every refresh
            const rng = mulberry32(20260201);

            for (let i = 1; i <= 50; i++) {
                const fName = firstNames[Math.floor(rng() * firstNames.length)];
                const lName = lastNames[Math.floor(rng() * lastNames.length)];
                const idNum = (50 - i).toString().padStart(3, '0');
                const amount = (rng() * 5000 + 500).toFixed(2);
                const date = seededRandomDate(startDate, endDate, rng);
                const status = statuses[Math.floor(rng() * statuses.length)];

                data.push({
                    id: `CP-2026-02-${idNum}`,
                    vendorName: `${fName} ${lName}`,
                    email: `${fName.toLowerCase()}.${lName.toLowerCase()}@vendor.com`,
                    avatar: `https://ui-avatars.com/api/?name=${fName}+${lName}&background=random&color=fff&size=64`,
                    date: date.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }),
                    amount: parseFloat(amount),
                    account: bankAccounts[Math.floor(rng() * bankAccounts.length)],
                    status: status
                });
            }
            return data;
        }

        // Initialize App
        function init() {
            payments = generateMockData();
            renderCalendar();
            updateCounts();
            applyFilters();
        }

        // --- Calendar Logic ---
        function renderCalendar() {
            document.getElementById('currentMonthDisplay').innerText = `${monthNames[currentState.calMonth]} ${currentState.calYear}`;
            
            const container = document.getElementById('monthsContainer');
            container.innerHTML = '';
            
            monthNames.forEach((name, idx) => {
                const isActive = idx === currentState.calMonth ? 'active' : '';
                const dayNum = (idx + 1).toString().padStart(2, '0');
                container.innerHTML += `
                    <button class="month-btn ${isActive}" onclick="selectMonth(${idx})">
                        <span class="month-name">${name}</span>
                        <span class="month-date">${dayNum}</span>
                    </button>
                `;
            });
        }

        function shiftMonth(dir) {
            currentState.calMonth += dir;
            if (currentState.calMonth > 11) {
                currentState.calMonth = 0;
                currentState.calYear++;
            } else if (currentState.calMonth < 0) {
                currentState.calMonth = 11;
                currentState.calYear--;
            }
            renderCalendar();
        }

        function changeYear(dir) {
            currentState.calYear += dir;
            renderCalendar();
        }

        function selectMonth(idx) {
            currentState.calMonth = idx;
            renderCalendar();
        }

        // --- Core Logic ---
        function updateCounts() {
            const counts = {
                All: payments.length,
                Pending: payments.filter(p => p.status === 'Pending').length,
                Cleared: payments.filter(p => p.status === 'Cleared').length,
                Cancelled: payments.filter(p => p.status === 'Cancelled').length
            };

            document.getElementById('countAll').innerText = counts.All;
            document.getElementById('countPending').innerText = counts.Pending;
            document.getElementById('countCleared').innerText = counts.Cleared;
            document.getElementById('countCancelled').innerText = counts.Cancelled;
        }

        function applyFilters() {
            currentState.search = document.getElementById('searchInput').value.toLowerCase();
            
            filteredPayments = payments.filter(p => {
                const matchTab = currentState.tab === 'All' || p.status === currentState.tab;
                const matchSearch = p.id.toLowerCase().includes(currentState.search) || 
                                    p.vendorName.toLowerCase().includes(currentState.search);
                return matchTab && matchSearch;
            });

            currentState.page = 1;
            renderTable();
        }

        function clearSearch() {
            document.getElementById('searchInput').value = '';
            applyFilters();
        }

        function setTab(tabName, btnElement) {
            currentState.tab = tabName;
            document.querySelectorAll('#manage-debit-notes .tab').forEach(t => t.classList.remove('active'));
            btnElement.classList.add('active');
            applyFilters();
        }

        function renderTable() {
            const tbody = document.getElementById('tableBody');
            tbody.innerHTML = '';

            if (filteredPayments.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" class="empty-state">No payments found matching your criteria.</td></tr>`;
                updatePaginationUI(0);
                return;
            }

            const totalPages = Math.ceil(filteredPayments.length / currentState.pageSize);
            if (currentState.page > totalPages) currentState.page = totalPages;
            
            const startIndex = (currentState.page - 1) * currentState.pageSize;
            const endIndex = Math.min(startIndex + currentState.pageSize, filteredPayments.length);
            
            const pageData = filteredPayments.slice(startIndex, endIndex);

            pageData.forEach(payment => {
                const tr = document.createElement('tr');
                
                let statusClass = 'status-pending';
                if (payment.status === 'Cleared') statusClass = 'status-cleared';
                if (payment.status === 'Cancelled') statusClass = 'status-cancelled';

                const actionButtons = payment.status === 'Pending' 
                    ? `<button class="action-btn approve" title="Approve" onclick="handleAction('approve', '${payment.id}')"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></button>
                       <button class="action-btn reject" title="Reject" onclick="handleAction('reject', '${payment.id}')"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>`
                    : '';

                tr.innerHTML = `
                    <td><span class="id-badge">${payment.id}</span></td>
                    <td>
                        <div class="vendor-cell">
                            <img src="${payment.avatar}" alt="Avatar" class="avatar">
                            <div class="vendor-info">
                                <span class="vendor-name">${payment.vendorName}</span>
                                <span class="vendor-email">${payment.email}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="date-cell">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            ${payment.date}
                        </div>
                    </td>
                    <td class="amount-cell">$${payment.amount.toLocaleString('en-US', {minimumFractionDigits: 2})}</td>
                    <td><span class="bank-account-badge">${payment.account}</span></td>
                    <td><span class="status-badge ${statusClass}">${payment.status}</span></td>
                    <td>
                        <div class="actions-cell">
                            ${actionButtons}
                            <button class="action-btn view" title="View" onclick="handleAction('view', '${payment.id}')"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            <button class="action-btn" title="Delete" onclick="handleAction('delete', '${payment.id}')" style="color: var(--danger)"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            updatePaginationUI(totalPages);
        }

        function updatePaginationUI(totalPages) {
            const info = document.getElementById('pageInfo');
            const btnPrev = document.getElementById('btnPrev');
            const btnNext = document.getElementById('btnNext');

            if (totalPages === 0) {
                info.innerText = 'Showing 0 entries';
                btnPrev.disabled = true;
                btnNext.disabled = true;
                return;
            }

            const startIndex = (currentState.page - 1) * currentState.pageSize + 1;
            const endIndex = Math.min(currentState.page * currentState.pageSize, filteredPayments.length);
            
            info.innerText = `Showing ${startIndex} to ${endIndex} of ${filteredPayments.length} entries`;
            
            btnPrev.disabled = currentState.page === 1;
            btnNext.disabled = currentState.page === totalPages;

            btnPrev.style.opacity = currentState.page === 1 ? '0.5' : '1';
            btnNext.style.opacity = currentState.page === totalPages ? '0.5' : '1';
        }

        function nextPage() {
            const totalPages = Math.ceil(filteredPayments.length / currentState.pageSize);
            if (currentState.page < totalPages) {
                currentState.page++;
                renderTable();
            }
        }

        function prevPage() {
            if (currentState.page > 1) {
                currentState.page--;
                renderTable();
            }
        }

        function changePageSize() {
            currentState.pageSize = parseInt(document.getElementById('pageSizeSelect').value);
            currentState.page = 1;
            renderTable();
        }

        // --- Action Handlers ---
        function handleAction(action, id) {
            const paymentIndex = payments.findIndex(p => p.id === id);
            
            if (action === 'approve') {
                payments[paymentIndex].status = 'Cleared';
                updateCounts();
                applyFilters();
            } 
            else if (action === 'reject') {
                payments[paymentIndex].status = 'Cancelled';
                updateCounts();
                applyFilters();
            }
            else if (action === 'delete') {
                if (confirm(`Are you sure you want to delete payment ${id}?`)) {
                    payments.splice(paymentIndex, 1);
                    updateCounts();
                    applyFilters();
                }
            }
            else if (action === 'view') {
                alert(`Viewing details for Payment ID: ${id}`);
            }
        }

        // Start the app
        init();

    </script>
</section>
@endsection