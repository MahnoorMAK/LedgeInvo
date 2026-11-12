@extends('layout.dashboard')
@section('title', 'Credit Notes')
@section('content')


<section id="credit-notes-app">
    <style>
        /* Base & Reset */
        #credit-notes-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #fff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
        }
        #credit-notes-app * { box-sizing: border-box; }
        
        /* Header */
        .cn-header { margin-bottom: 24px; }
        .cn-header h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .cn-header p { margin: 0; color: #6b7280; font-size: 13px; }

        /* Calendar Component */
        .cn-calendar { border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 24px; background: #fff; overflow: hidden; }
        .cn-cal-header { display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; border-bottom: 1px solid #e5e7eb; }
        .cn-cal-title { font-weight: 500; font-size: 14px; color: #111; }
        .cn-cal-nav-btn { background: none; border: 1px solid #e5e7eb; border-radius: 50%; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; transition: all 0.2s; }
        .cn-cal-nav-btn:hover { background: #f3f4f6; }
        
        .cn-cal-months { display: flex; width: 100%; }
        .cn-cal-nav-cell { width: 40px; display: flex; align-items: center; justify-content: center; border-right: 1px solid #e5e7eb; cursor: pointer; color: #6b7280; }
        .cn-cal-nav-cell:hover { background: #f9fafb; }
        .cn-cal-month { flex: 1; text-align: center; padding: 12px 0; border-right: 1px solid #e5e7eb; cursor: pointer; color: #4b5563; transition: background 0.2s; }
        .cn-cal-month:last-child { border-right: none; }
        .cn-cal-month:hover { background: #f9fafb; }
        .cn-cal-month.active { background: #10b981; color: #fff; }
        .cn-cal-month-name { font-size: 12px; margin-bottom: 4px; }
        .cn-cal-month-day { font-size: 16px; font-weight: 600; }

        /* Main Container */
        .cn-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .cn-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        .cn-search-group { display: flex; gap: 8px; flex: 1; max-width: 450px; }
        .cn-search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .cn-search-input:focus { border-color: #10b981; box-shadow: 0 0 0 2px rgba(16,185,129,0.2); }
        
        .cn-btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .cn-btn:hover { background: #f9fafb; }
        .cn-btn-primary { background: #10b981; color: white; border-color: #10b981; }
        .cn-btn-primary:hover { background: #059669; border-color: #059669; }
        
        .cn-select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Filter Tabs */
        .cn-filter-tabs { display: flex; gap: 20px; padding: 12px 16px; border-bottom: 1px solid #e5e7eb; background: #f9fafb; overflow-x: auto; }
        .cn-filter-tab { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #6b7280; cursor: pointer; padding: 4px 8px; border-radius: 4px; transition: all 0.2s; user-select: none; white-space: nowrap; }
        .cn-filter-tab:hover { color: #111; }
        .cn-filter-tab.active { color: #10b981; font-weight: 600; }
        .cn-filter-tab svg { color: currentColor; }
        .cn-filter-count { font-size: 13px; color: inherit; }

        /* Table */
        .cn-table-wrapper { width: 100%; overflow-x: auto; }
        .cn-table { width: 100%; border-collapse: collapse; text-align: left; }
        .cn-table th, .cn-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .cn-table th { background: #fff; font-weight: 500; color: #4b5563; font-size: 12px; cursor: pointer; user-select: none; border-bottom: 1px solid #e5e7eb; }
        .cn-table th:hover { background: #f9fafb; }
        .cn-table tbody tr:hover { background: #f9fafb; }
        
        /* Cell Elements */
        .cn-badge-id { display: inline-block; padding: 4px 8px; background: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; border-radius: 4px; font-size: 12px; font-weight: 500; }
        .cn-badge-return { display: inline-block; padding: 4px 8px; background: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; border-radius: 4px; font-size: 12px; font-weight: 500; }
        
        .cn-user-cell { display: flex; align-items: center; gap: 12px; }
        .cn-avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; background: #e5e7eb; }
        .cn-user-info { display: flex; flex-direction: column; gap: 2px; }
        .cn-user-name { font-weight: 500; color: #111; font-size: 13px; }
        .cn-user-email { font-size: 11px; color: #6b7280; }

        .cn-date { display: flex; align-items: center; gap: 6px; color: #4b5563; font-size: 13px; }
        
        .cn-amount { font-weight: 500; color: #111; }
        .cn-balance-green { color: #059669; font-weight: 500; }
        .cn-balance-gray { color: #6b7280; font-weight: 500; }

        .cn-status-badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 500; }
        .cn-status-draft { background: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
        .cn-status-applied { background: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; }
        .cn-status-partial { background: #fff7ed; color: #c2410c; border: 1px solid #ffedd5; }
        .cn-status-approved { background: #ecfdf5; color: #059669; border: 1px solid #d1fae5; }

        .cn-company-cell { display: flex; align-items: center; gap: 8px; }
        .cn-company-icon { width: 24px; height: 24px; background: #94a3b8; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #fff; }
        .cn-company-info { display: flex; flex-direction: column; gap: 0; }
        .cn-company-name { font-weight: 500; color: #111; font-size: 13px; }
        .cn-company-email { font-size: 11px; color: #6b7280; }

        /* Pagination Area */
        .cn-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; background: #fff; }
        .cn-page-info { font-size: 13px; color: #6b7280; }
        .cn-page-controls { display: flex; gap: 6px; align-items: center; }
        .cn-page-btn { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; transition: all 0.2s; display: flex; align-items: center; gap: 4px; }
        .cn-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .cn-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .cn-page-num { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; min-width: 32px; text-align: center; }
        .cn-page-num.active { background: #10b981; color: #fff; border-color: #10b981; }
    </style>

    <!-- Header -->
    <div class="cn-header">
        <h2>Manage Credit Notes</h2>
        <p>Track, approve, and apply credit notes generated from sales returns.</p>
    </div>

    <!-- Calendar -->
    <div class="cn-calendar">
        <div class="cn-cal-header">
            <button class="cn-cal-nav-btn" id="cal-prev-month">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <div class="cn-cal-title" id="cal-title">Nov 2026</div>
            <button class="cn-cal-nav-btn" id="cal-next-month">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>
        <div class="cn-cal-months" id="cal-months-container">
            <!-- Months injected via JS -->
        </div>
    </div>

    <!-- Main Container -->
    <div class="cn-main-container">
        <!-- Toolbar -->
        <div class="cn-toolbar">
            <div class="cn-search-group">
                <input type="text" id="cn-search-input" class="cn-search-input" placeholder="Search by credit note number...">
                <button class="cn-btn cn-btn-primary" id="cn-search-btn">Search</button>
                <button class="cn-btn" id="cn-clear-btn">Clear</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <select class="cn-select-input" id="cn-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                </select>
                <button class="cn-btn" id="cn-filter-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                </button>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="cn-filter-tabs" id="cn-filter-tabs">
            <div class="cn-filter-tab active" data-filter="all">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="cn-filter-count" id="cnt-all">9</span>
            </div>
            <div class="cn-filter-tab" data-filter="Draft">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                Draft <span class="cn-filter-count" id="cnt-draft">3</span>
            </div>
            <div class="cn-filter-tab" data-filter="Partial">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a10 10 0 0 1 0 20"></path></svg>
                Partial <span class="cn-filter-count" id="cnt-partial">1</span>
            </div>
            <div class="cn-filter-tab" data-filter="Approved">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                Approved <span class="cn-filter-count" id="cnt-approved">2</span>
            </div>
            <div class="cn-filter-tab" data-filter="Applied">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                Applied <span class="cn-filter-count" id="cnt-applied">3</span>
            </div>
        </div>

        <!-- Table -->
        <div class="cn-table-wrapper">
            <table class="cn-table">
                <thead>
                    <tr>
                        <th>Credit Note Number ↕</th>
                        <th>Sales Return</th>
                        <th>Customer</th>
                        <th>Date ↕</th>
                        <th>Total Amount ↕</th>
                        <th>Balance ↕</th>
                        <th>Status ↕</th>
                        <th>Approved By</th>
                    </tr>
                </thead>
                <tbody id="cn-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="cn-pagination">
            <div class="cn-page-info" id="cn-page-info">Showing 1 to 4 of 9 results</div>
            <div class="cn-page-controls">
                <button class="cn-page-btn" id="cn-prev-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Previous
                </button>
                <div id="cn-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="cn-page-btn" id="cn-next-btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data Model
            const initialData = [
                { id: "CN-2026-11-001", returnId: "SR-2026-02-010", name: "Michelle Hall", email: "michelle.hall@client.com", avatar: "https://i.pravatar.cc/150?u=michelle", date: "2026-11-10", total: 141.58, balance: 141.58, status: "Draft", approvedBy: "-" },
                { id: "CN-2026-02-001", returnId: "SR-2026-02-001", name: "Lisa Anderson", email: "lisa.anderson@client.com", avatar: "https://i.pravatar.cc/150?u=lisa", date: "2026-02-17", total: 1061.99, balance: 0.00, status: "Applied", approvedBy: "Company" },
                { id: "CN-2026-02-002", returnId: "SR-2026-02-003", name: "Emily Davis", email: "emily.davis@client.com", avatar: "https://i.pravatar.cc/150?u=emily", date: "2026-02-17", total: 141.58, balance: 0.00, status: "Applied", approvedBy: "Company" },
                { id: "CN-2026-02-003", returnId: "SR-2026-02-004", name: "Jennifer Martinez", email: "jennifer.martinez@client.com", avatar: "https://i.pravatar.cc/150?u=jennifer", date: "2026-02-17", total: 275.36, balance: 75.36, status: "Partial", approvedBy: "Company" },
                { id: "CN-2026-02-004", returnId: "SR-2026-02-005", name: "David Wilson", email: "david.w@client.com", avatar: "https://i.pravatar.cc/150?u=david", date: "2026-02-18", total: 500.00, balance: 500.00, status: "Draft", approvedBy: "-" },
                { id: "CN-2026-02-005", returnId: "SR-2026-02-006", name: "Sarah Johnson", email: "sarah.j@client.com", avatar: "https://i.pravatar.cc/150?u=sarah", date: "2026-02-18", total: 120.00, balance: 0.00, status: "Applied", approvedBy: "Company" },
                { id: "CN-2026-02-006", returnId: "SR-2026-02-007", name: "Michael Brown", email: "michael.b@client.com", avatar: "https://i.pravatar.cc/150?u=michael", date: "2026-02-19", total: 350.00, balance: 350.00, status: "Approved", approvedBy: "Admin" },
                { id: "CN-2026-02-007", returnId: "SR-2026-02-008", name: "Jessica Lee", email: "jessica.l@client.com", avatar: "https://i.pravatar.cc/150?u=jessica", date: "2026-02-19", total: 89.99, balance: 89.99, status: "Draft", approvedBy: "-" },
                { id: "CN-2026-02-008", returnId: "SR-2026-02-009", name: "Robert Taylor", email: "robert.t@client.com", avatar: "https://i.pravatar.cc/150?u=robert", date: "2026-02-20", total: 210.00, balance: 210.00, status: "Approved", approvedBy: "Admin" }
            ];

            // Calendar State
            let currentYear = 2026;
            let currentMonth = 10; // 0-indexed, 10 = Nov

            // App State
            let state = {
                data: [...initialData],
                filteredData: [...initialData],
                currentPage: 1,
                pageSize: 10,
                sortColumn: null,
                sortAsc: true,
                searchQuery: '',
                activeFilter: 'all'
            };

            // DOM Elements
            const tableBody = document.getElementById('cn-table-body');
            const pageInfo = document.getElementById('cn-page-info');
            const prevBtn = document.getElementById('cn-prev-btn');
            const nextBtn = document.getElementById('cn-next-btn');
            const pageNumbers = document.getElementById('cn-page-numbers');
            const searchInput = document.getElementById('cn-search-input');
            const pageSizeSelect = document.getElementById('cn-page-size');

            // --- CALENDAR LOGIC ---
            const renderCalendar = () => {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                document.getElementById('cal-title').textContent = `${monthNames[currentMonth]} ${currentYear}`;
                
                const container = document.getElementById('cal-months-container');
                container.innerHTML = `
                    <div class="cn-cal-nav-cell" onclick="changeMonth(-1)"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg></div>
                `;

                for (let i = 0; i < 12; i++) {
                    // Simulating the days shown in the image (01, 02, 03...) for demonstration
                    const dayNum = String(i + 1).padStart(2, '0'); 
                    const isActive = i === currentMonth ? 'active' : '';
                    container.innerHTML += `
                        <div class="cn-cal-month ${isActive}" onclick="selectMonth(${i})">
                            <div class="cn-cal-month-name">${monthNames[i]}</div>
                            <div class="cn-cal-month-day">${dayNum}</div>
                        </div>
                    `;
                }

                container.innerHTML += `
                    <div class="cn-cal-nav-cell" onclick="changeMonth(1)"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
                `;
            };

            window.changeMonth = (dir) => {
                currentMonth += dir;
                if (currentMonth > 11) { currentMonth = 0; currentYear++; }
                if (currentMonth < 0) { currentMonth = 11; currentYear--; }
                renderCalendar();
            };

            window.selectMonth = (index) => {
                currentMonth = index;
                renderCalendar();
            };

            // --- APP LOGIC ---
            const formatMoney = (val) => "$" + val.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});

            const updateCounts = () => {
                const counts = {
                    all: state.data.length,
                    Draft: state.data.filter(d => d.status === 'Draft').length,
                    Partial: state.data.filter(d => d.status === 'Partial').length,
                    Approved: state.data.filter(d => d.status === 'Approved').length,
                    Applied: state.data.filter(d => d.status === 'Applied').length
                };
                document.getElementById('cnt-all').textContent = counts.all;
                document.getElementById('cnt-draft').textContent = counts.Draft;
                document.getElementById('cnt-partial').textContent = counts.Partial;
                document.getElementById('cnt-approved').textContent = counts.Approved;
                document.getElementById('cnt-applied').textContent = counts.Applied;
            };

            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    const matchesCondition = state.activeFilter === 'all' || item.status === state.activeFilter;
                    const query = state.searchQuery.toLowerCase();
                    const matchesSearch = query === '' || 
                        item.id.toLowerCase().includes(query) || 
                        item.returnId.toLowerCase().includes(query) ||
                        item.name.toLowerCase().includes(query);
                    return matchesCondition && matchesSearch;
                });

                if (state.sortColumn) {
                    state.filteredData.sort((a, b) => {
                        let valA = a[state.sortColumn];
                        let valB = b[state.sortColumn];
                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();
                        if (valA < valB) return state.sortAsc ? -1 : 1;
                        if (valA > valB) return state.sortAsc ? 1 : -1;
                        return 0;
                    });
                }

                state.currentPage = 1;
                renderView();
            };

            const renderView = () => {
                const totalItems = state.filteredData.length;
                const totalPages = Math.ceil(totalItems / state.pageSize) || 1;
                
                if (state.currentPage > totalPages) state.currentPage = totalPages;
                if (state.currentPage < 1) state.currentPage = 1;

                const startIndex = (state.currentPage - 1) * state.pageSize;
                const endIndex = Math.min(startIndex + state.pageSize, totalItems);
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                pageInfo.textContent = totalItems === 0 ? "Showing 0 results" : `Showing ${startIndex + 1} to ${endIndex} of ${totalItems} results`;

                tableBody.innerHTML = '';
                if (paginatedData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" style="text-align: center; padding: 24px; color: #6b7280;">No records found.</td></tr>`;
                } else {
                    paginatedData.forEach(row => {
                        const statusClass = `cn-status-${row.status.toLowerCase()}`;
                        const balanceColor = row.balance === 0 ? 'cn-balance-gray' : 'cn-balance-green';
                        const approvedHtml = row.approvedBy === '-' ? '-' : `
                            <div class="cn-company-cell">
                                <div class="cn-company-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>
                                </div>
                                <div class="cn-company-info">
                                    <span class="cn-company-name">${row.approvedBy}</span>
                                    <span class="cn-company-email">company@example.com</span>
                                </div>
                            </div>
                        `;

                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td><span class="cn-badge-id">${row.id}</span></td>
                            <td><span class="cn-badge-return">${row.returnId}</span></td>
                            <td>
                                <div class="cn-user-cell">
                                    <img src="${row.avatar}" class="cn-avatar" alt="avatar">
                                    <div class="cn-user-info">
                                        <span class="cn-user-name">${row.name}</span>
                                        <span class="cn-user-email">${row.email}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cn-date">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    ${row.date}
                                </div>
                            </td>
                            <td><span class="cn-amount">${formatMoney(row.total)}</span></td>
                            <td><span class="${balanceColor}">${formatMoney(row.balance)}</span></td>
                            <td><span class="cn-status-badge ${statusClass}">${row.status}</span></td>
                            <td>${approvedHtml}</td>
                        `;
                        tableBody.appendChild(tr);
                    });
                }

                prevBtn.disabled = state.currentPage === 1 || totalItems === 0;
                nextBtn.disabled = state.currentPage === totalPages || totalItems === 0;
                
                pageNumbers.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.className = `cn-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => { state.currentPage = i; renderView(); };
                    pageNumbers.appendChild(btn);
                }
            };

            // Event Listeners
            document.getElementById('cn-search-btn').addEventListener('click', () => {
                state.searchQuery = searchInput.value.trim();
                applyFilters();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value.trim();
                    applyFilters();
                }
            });

            document.getElementById('cn-clear-btn').addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
            });

            document.querySelectorAll('.cn-filter-tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    document.querySelectorAll('.cn-filter-tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    state.activeFilter = tab.getAttribute('data-filter');
                    applyFilters();
                });
            });

            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderView();
            });

            prevBtn.addEventListener('click', () => {
                if (state.currentPage > 1) { state.currentPage--; renderView(); }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                if (state.currentPage < totalPages) { state.currentPage++; renderView(); }
            });

            document.querySelectorAll('th').forEach((th, index) => {
                // Only add sorting to headers with specific text or just all for simplicity
                if (th.textContent.includes('↕')) {
                    th.addEventListener('click', () => {
                        const cols = ['id', 'returnId', 'name', 'date', 'total', 'balance', 'status', 'approvedBy'];
                        const column = cols[index];
                        if (state.sortColumn === column) {
                            state.sortAsc = !state.sortAsc;
                        } else {
                            state.sortColumn = column;
                            state.sortAsc = true;
                        }
                        applyFilters();
                    });
                }
            });

            // Initialize
            renderCalendar();
            updateCounts();
            applyFilters();
        });
    </script>
</section>
@endsection