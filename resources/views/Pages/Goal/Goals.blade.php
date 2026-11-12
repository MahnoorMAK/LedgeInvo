@extends('layout.dashboard')

@section('title', 'Goals - LedgeInvo')

@section('content')
<section id="manage-goals-section">
    <style>
        /* Scoped CSS for Manage Goals Section */
        #manage-goals-section {
            --primary: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --danger: #ef4444;
            --blue-light: #eff6ff;
            --blue-text: #3b82f6;
            --purple-light: #f3e8ff;
            --purple-text: #9333ea;
            --green-light: #ecfdf5;
            --green-text: #10b981;
            --yellow-light: #fefce8;
            --yellow-text: #ca8a04;
            --red-light: #fef2f2;
            --red-text: #ef4444;

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background: #f9fafb;
            box-sizing: border-box;
        }

        #manage-goals-section * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #manage-goals-section .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        #manage-goals-section .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        #manage-goals-section .page-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #manage-goals-section .btn-add {
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

        #manage-goals-section .btn-add:hover {
            background-color: var(--primary-hover);
        }

        #manage-goals-section .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        #manage-goals-section .stat-card {
            padding: 1rem;
            border-radius: 0.5rem;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        #manage-goals-section .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            font-weight: 500;
        }

        #manage-goals-section .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
        }

        #manage-goals-section .stat-sub {
            font-size: 0.75rem;
            opacity: 0.8;
        }

        #manage-goals-section .stat-card.blue { background: #eff6ff; color: #1e40af; }
        #manage-goals-section .stat-card.green { background: #ecfdf5; color: #047857; }
        #manage-goals-section .stat-card.purple { background: #f5f3ff; color: #6d28d9; }
        #manage-goals-section .stat-card.yellow { background: #fefce8; color: #a16207; }
        #manage-goals-section .stat-card.red { background: #fef2f2; color: #b91c1c; }
        #manage-goals-section .stat-card.teal { background: #f0fdfa; color: #0f766e; }

        #manage-goals-section .progress-bar-bg {
            width: 100%;
            height: 6px;
            background: rgba(0,0,0,0.1);
            border-radius: 999px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        #manage-goals-section .progress-bar-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 999px;
        }

        #manage-goals-section .main-container {
            background: white;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        #manage-goals-section .toolbar {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        #manage-goals-section .search-box {
            display: flex;
            flex: 1;
            min-width: 250px;
        }

        #manage-goals-section .search-box input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: 0.375rem 0 0 0.375rem;
            font-size: 0.875rem;
            outline: none;
        }

        #manage-goals-section .search-box button {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            padding: 0 1rem;
            border-radius: 0 0.375rem 0.375rem 0;
            cursor: pointer;
            font-weight: 500;
        }

        #manage-goals-section .toolbar select,
        #manage-goals-section .btn-filter {
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

        #manage-goals-section .tabs {
            display: flex;
            padding: 0 1rem;
            border-bottom: 1px solid var(--border-color);
            gap: 1.5rem;
            overflow-x: auto;
        }

        #manage-goals-section .tab {
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

        #manage-goals-section .tab.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        #manage-goals-section .tab-count {
            background: #f3f4f6;
            padding: 0.1rem 0.4rem;
            border-radius: 999px;
            font-size: 0.75rem;
        }

        #manage-goals-section .tab.active .tab-count {
            background: #ecfdf5;
            color: var(--primary);
        }

        #manage-goals-section .table-container {
            overflow-x: auto;
        }

        #manage-goals-section table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        #manage-goals-section th {
            background-color: #f9fafb;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #manage-goals-section td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
            vertical-align: middle;
        }

        #manage-goals-section .goal-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        #manage-goals-section .icon-box {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        #manage-goals-section .icon-box.pink { background: #fce7f3; color: #db2777; }
        #manage-goals-section .icon-box.orange { background: #ffedd5; color: #ea580c; }
        #manage-goals-section .icon-box.blue { background: #e0e7ff; color: #4f46e5; }

        #manage-goals-section .goal-title { font-weight: 500; color: var(--text-main); margin-bottom: 0.2rem; }
        #manage-goals-section .goal-desc { font-size: 0.75rem; color: var(--text-muted); max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

        #manage-goals-section .tag {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
            display: inline-block;
        }

        #manage-goals-section .tag.blue { background: #eff6ff; color: #3b82f6; border-color: #bfdbfe; }
        #manage-goals-section .tag.pink { background: #fdf2f8; color: #db2777; border-color: #fbcfe8; }
        #manage-goals-section .tag.orange { background: #fff7ed; color: #ea580c; border-color: #fed7aa; }
        #manage-goals-section .tag.purple { background: #faf5ff; color: #9333ea; border-color: #e9d5ff; }

        #manage-goals-section .amount-cell { font-weight: 500; color: var(--text-main); }
        #manage-goals-section .amount-sub { font-size: 0.75rem; color: var(--text-muted); }

        #manage-goals-section .progress-cell {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            min-width: 100px;
        }
        #manage-goals-section .progress-text { font-size: 0.75rem; font-weight: 600; }
        #manage-goals-section .progress-track { width: 100%; height: 4px; background: #e5e7eb; border-radius: 2px; overflow: hidden; }
        #manage-goals-section .progress-fill { height: 100%; background: var(--primary); }

        #manage-goals-section .date-cell { color: var(--text-main); display: flex; flex-direction: column; gap: 0.2rem; font-size: 0.875rem; }
        #manage-goals-section .date-overdue { color: var(--danger); font-size: 0.75rem; }

        #manage-goals-section .status-badge {
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid;
        }
        #manage-goals-section .status-badge.draft { background: #f9fafb; color: #4b5563; border-color: #e5e7eb; }
        #manage-goals-section .status-badge.active { background: #eff6ff; color: #3b82f6; border-color: #bfdbfe; }
        #manage-goals-section .status-badge.completed { background: #ecfdf5; color: #10b981; border-color: #a7f3d0; }

        #manage-goals-section .pagination {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
        }

        #manage-goals-section .page-numbers {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        #manage-goals-section .page-btn {
            padding: 0.5rem 0.75rem;
            border: 1px solid var(--border-color);
            background: white;
            border-radius: 0.375rem;
            cursor: pointer;
            font-size: 0.875rem;
            transition: all 0.2s;
            min-width: 36px;
            text-align: center;
        }

        #manage-goals-section .page-btn:hover:not(:disabled) { background-color: #f3f4f6; }
        #manage-goals-section .page-btn.active { background-color: var(--primary); color: white; border-color: var(--primary); }
        #manage-goals-section .page-btn:disabled { opacity: 0.5; cursor: not-allowed; }

        @media (max-width: 1024px) {
            #manage-goals-section .stats-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 640px) {
            #manage-goals-section .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1>Manage Goals</h1>
            <p>Set, track, and manage organization goals, milestones, target dates, and progress metrics.</p>
        </div>
        <button class="btn-add" title="Add Goal">+</button>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card blue">
            <div class="stat-header">Total Goals <span>🎯</span></div>
            <div class="stat-value" id="statTotalGoals">0</div>
            <div class="stat-sub" id="statTotalSub">All time</div>
        </div>
        <div class="stat-card green">
            <div class="stat-header">Active <span>▶</span></div>
            <div class="stat-value" id="statActive">0</div>
            <div class="stat-sub" id="statActiveSub">0% of total</div>
        </div>
        <div class="stat-card purple">
            <div class="stat-header">Completed <span>🏆</span></div>
            <div class="stat-value" id="statCompleted">0</div>
            <div class="stat-sub" id="statCompletedSub">0% of total</div>
        </div>
        <div class="stat-card yellow">
            <div class="stat-header">Draft <span>⏸</span></div>
            <div class="stat-value" id="statDraft">0</div>
            <div class="stat-sub" id="statDraftSub">0% of total</div>
        </div>
        <div class="stat-card red">
            <div class="stat-header">Total Target <span>$</span></div>
            <div class="stat-value" id="statTotalTarget" style="font-size: 1.2rem;">$0.00</div>
            <div class="stat-sub">Total target value</div>
        </div>
        <div class="stat-card teal">
            <div class="stat-header">Current Progress <span>📈</span></div>
            <div class="stat-value" id="statCurrent">$0.00</div>
            <div class="stat-sub" style="display: flex; justify-content: space-between; align-items: center;">
                <span>Total Current</span>
                <span id="statCurrentPct">0%</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill" id="statCurrentBar" style="width: 0%;"></div>
            </div>
        </div>
    </div>

    <!-- Main Container (Table & Toolbar) -->
    <div class="main-container">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-box">
                <input type="text" class="searchInput" placeholder="Search Goals...">
                <button class="searchBtn">Search</button>
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
            <div class="tab active" data-status="all">⊞ All <span class="tab-count" id="tabAllCount">0</span></div>
            <div class="tab" data-status="Draft">🕒 Draft <span class="tab-count" id="tabDraftCount">0</span></div>
            <div class="tab" data-status="Active">▶ Active <span class="tab-count" id="tabActiveCount">0</span></div>
            <div class="tab" data-status="Completed">✓ Completed <span class="tab-count" id="tabCompletedCount">0</span></div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Goal ↑↓</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Target /<br>Current</th>
                        <th>Progress</th>
                        <th>Target Date</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="tableBody"></tbody>
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
            const section = document.getElementById('manage-goals-section');

            // --- 1. Deterministic PRNG (Mulberry32) ---
            // Same seed → same output on every page refresh.
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

            const rand = seededRandom(hashString('manage-goals-v1'));

            // --- 2. Generate 50 Entities (deterministic) ---
            const icons = [
                { class: 'pink', icon: '🎯' },
                { class: 'orange', icon: '📈' },
                { class: 'blue', icon: '💳' },
                { class: 'pink', icon: '🚨' }
            ];
            const categories = ['Financial', 'Operational', 'Marketing'];
            const types = ['Savings', 'Expense Reduction', 'Debt Reduction', 'Revenue Growth'];
            const priorities = ['High', 'Medium', 'Critical', 'Low'];
            const statuses = ['Draft', 'Active', 'Completed'];

            // Fixed reference date so overdue flags don't drift day-to-day
            const REFERENCE_DATE = new Date('2026-01-01T00:00:00Z');

            let goalsData = [];
            for (let i = 1; i <= 50; i++) {
                const randIcon = icons[Math.floor(rand() * icons.length)];
                const targetAmount = (rand() * 100000 + 10000).toFixed(2);
                const currentAmount = (targetAmount * (rand() * 0.8)).toFixed(2);
                const progress = Math.round((currentAmount / targetAmount) * 100);
                const status = statuses[Math.floor(rand() * statuses.length)];

                const date = new Date(REFERENCE_DATE);
                date.setDate(date.getDate() + Math.floor(rand() * 365) - 100);

                goalsData.push({
                    id: i,
                    title: i === 1 ? "Emergency Fund" : (i === 2 ? "Investment Portfolio" : (i === 3 ? "Credit Card Debt" : `Goal Project ${i}`)),
                    desc: `Description for goal project ${i} tracking metrics...`,
                    iconClass: randIcon.class,
                    iconChar: randIcon.icon,
                    category: categories[Math.floor(rand() * categories.length)],
                    type: types[Math.floor(rand() * types.length)],
                    targetAmount: Number(targetAmount).toLocaleString('en-US', {minimumFractionDigits: 2}),
                    currentAmount: Number(currentAmount).toLocaleString('en-US', {minimumFractionDigits: 2}),
                    targetAmountRaw: Number(targetAmount),
                    currentAmountRaw: Number(currentAmount),
                    progress: progress,
                    targetDate: date.toISOString().split('T')[0],
                    priority: priorities[Math.floor(rand() * priorities.length)],
                    status: status
                });
            }

            // --- 3. State Management ---
            let state = {
                data: [...goalsData],
                filteredData: [...goalsData],
                currentPage: 1,
                perPage: 10,
                searchQuery: "",
                statusFilter: "all"
            };

            // --- 4. DOM Elements ---
            const tableBody = section.querySelector('.tableBody');
            const pageNumbers = section.querySelector('.page-numbers');
            const pageInfo = section.querySelector('.pageInfo');
            const perPageSelect = section.querySelector('.perPageSelect');
            const searchInput = section.querySelector('.searchInput');
            const searchBtn = section.querySelector('.searchBtn');
            const tabs = section.querySelectorAll('.tab');

            // --- 5. Stats Rendering ---
            function renderStats() {
                const total = state.data.length;
                const active = state.data.filter(g => g.status === 'Active').length;
                const completed = state.data.filter(g => g.status === 'Completed').length;
                const draft = state.data.filter(g => g.status === 'Draft').length;

                const totalTarget = state.data.reduce((sum, g) => sum + g.targetAmountRaw, 0);
                const totalCurrent = state.data.reduce((sum, g) => sum + g.currentAmountRaw, 0);
                const overallPct = totalTarget > 0 ? Math.round((totalCurrent / totalTarget) * 100) : 0;

                const pct = (n) => total > 0 ? Math.round((n / total) * 100) : 0;

                document.getElementById('statTotalGoals').textContent = total;
                document.getElementById('statActive').textContent = active;
                document.getElementById('statCompleted').textContent = completed;
                document.getElementById('statDraft').textContent = draft;

                document.getElementById('statActiveSub').textContent = `${pct(active)}% of total`;
                document.getElementById('statCompletedSub').textContent = `${pct(completed)}% of total`;
                document.getElementById('statDraftSub').textContent = `${pct(draft)}% of total`;

                document.getElementById('statTotalTarget').textContent = '$' + totalTarget.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('statCurrent').textContent = '$' + totalCurrent.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('statCurrentPct').textContent = `${overallPct}%`;
                document.getElementById('statCurrentBar').style.width = `${overallPct}%`;

                document.getElementById('tabAllCount').textContent = total;
                document.getElementById('tabDraftCount').textContent = draft;
                document.getElementById('tabActiveCount').textContent = active;
                document.getElementById('tabCompletedCount').textContent = completed;
            }

            // --- 6. Table Rendering ---
            function updateUI() {
                renderTable();
                renderPagination();
                renderStats();
            }

            function renderTable() {
                tableBody.innerHTML = '';

                if (state.filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" style="text-align:center; padding: 2rem; color: #6b7280;">No goals found matching your criteria.</td></tr>`;
                    return;
                }

                const startIndex = (state.currentPage - 1) * state.perPage;
                const endIndex = startIndex + state.perPage;
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                paginatedData.forEach(item => {
                    const tr = document.createElement('tr');

                    const dateObj = new Date(item.targetDate);
                    const formattedDate = dateObj.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }).replace(/\//g, '-');
                    const isOverdue = dateObj < REFERENCE_DATE && item.status !== 'Completed';

                    const tagClass = item.category === 'Financial' ? 'blue' : (item.category === 'Marketing' ? 'pink' : 'purple');
                    const typeTagClass = item.type === 'Savings' ? 'pink' : (item.type === 'Expense Reduction' ? 'orange' : 'purple');

                    tr.innerHTML = `
                        <td>
                            <div class="goal-cell">
                                <div class="icon-box ${item.iconClass}">${item.iconChar}</div>
                                <div>
                                    <div class="goal-title">${item.title}</div>
                                    <div class="goal-desc">${item.desc}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="tag ${tagClass}">${item.category}</span></td>
                        <td><span class="tag ${typeTagClass}">${item.type}</span></td>
                        <td>
                            <div class="amount-cell">$${item.targetAmount}</div>
                            <div class="amount-sub">$${item.currentAmount}</div>
                        </td>
                        <td>
                            <div class="progress-cell">
                                <div class="progress-text">${item.progress}%</div>
                                <div class="progress-track">
                                    <div class="progress-fill" style="width: ${item.progress}%"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="date-cell">
                                <span>📅 ${formattedDate}</span>
                                ${isOverdue ? '<span class="date-overdue">Overdue</span>' : ''}
                            </div>
                        </td>
                        <td><span class="tag" style="background: transparent; border: 1px solid #e5e7eb; color: ${item.priority === 'Critical' ? '#ef4444' : (item.priority === 'High' ? '#ea580c' : '#6b7280')}">${item.priority}</span></td>
                        <td><span class="status-badge ${item.status.toLowerCase()}">${item.status}</span></td>
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

            // --- 7. Filtering ---
            function applyFilters() {
                const query = state.searchQuery;
                state.filteredData = state.data.filter(item => {
                    const matchesSearch =
                        item.title.toLowerCase().includes(query) ||
                        item.category.toLowerCase().includes(query) ||
                        item.type.toLowerCase().includes(query) ||
                        item.status.toLowerCase().includes(query);

                    const matchesStatus =
                        state.statusFilter === 'all' || item.status === state.statusFilter;

                    return matchesSearch && matchesStatus;
                });
                state.currentPage = 1;
                updateUI();
            }

            // --- 8. Event Listeners ---
            function performSearch() {
                state.searchQuery = searchInput.value.toLowerCase();
                applyFilters();
            }

            searchBtn.addEventListener('click', performSearch);
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') performSearch();
            });

            perPageSelect.addEventListener('change', (e) => {
                state.perPage = parseInt(e.target.value);
                state.currentPage = 1;
                updateUI();
            });

            // Tab clicks → status filter
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    state.statusFilter = tab.getAttribute('data-status');
                    applyFilters();
                });
            });

            // --- 9. Initialization ---
            updateUI();
        })();
    </script>
</section>
@endsection