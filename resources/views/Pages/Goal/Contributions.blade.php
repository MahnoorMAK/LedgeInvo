@extends('layout.dashboard')
@section('title', 'Manage Contributions')
@section('content')


<section id="manage-contributions-section">
    <style>
        /* Scoped CSS for Manage Contributions Section */
        #manage-contributions-section {
            --primary: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --danger: #ef4444;

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        #manage-contributions-section * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Toolbar (Search & Per Page) */
        #manage-contributions-section .toolbar {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        #manage-contributions-section .search-box {
            display: flex;
            flex: 1;
            min-width: 250px;
        }

        #manage-contributions-section .search-box input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: 0.375rem 0 0 0.375rem;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s;
        }

        #manage-contributions-section .search-box input:focus {
            border-color: var(--primary);
        }

        #manage-contributions-section .search-box button {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            padding: 0 1rem;
            border-radius: 0 0.375rem 0.375rem 0;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        #manage-contributions-section .search-box button:hover {
            background-color: var(--primary-hover);
        }

        #manage-contributions-section .toolbar select {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
            background: white;
            cursor: pointer;
        }

        /* Table Styles */
        #manage-contributions-section .table-container {
            overflow-x: auto;
        }

        #manage-contributions-section table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        #manage-contributions-section th {
            background-color: #f9fafb;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #manage-contributions-section td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
            vertical-align: middle;
        }

        #manage-contributions-section .goal-cell {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        #manage-contributions-section .icon-box {
            width: 32px;
            height: 32px;
            background-color: #ecfdf5;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        #manage-contributions-section .goal-title {
            font-weight: 500;
            color: var(--text-main);
        }

        #manage-contributions-section .goal-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #manage-contributions-section .amount {
            color: var(--primary);
            font-weight: 600;
        }

        #manage-contributions-section .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        #manage-contributions-section .badge.manual {
            background-color: #eff6ff;
            color: #3b82f6;
            border: 1px solid #bfdbfe;
        }

        #manage-contributions-section .badge.automatic {
            background-color: #ecfdf5;
            color: #10b981;
            border: 1px solid #a7f3d0;
        }

        #manage-contributions-section .actions {
            display: flex;
            gap: 0.5rem;
        }

        #manage-contributions-section .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            padding: 0.25rem;
            font-size: 1rem;
            transition: color 0.2s;
        }

        #manage-contributions-section .action-btn:hover { color: var(--text-main); }
        #manage-contributions-section .action-btn.delete:hover { color: var(--danger); }

        /* Pagination */
        #manage-contributions-section .pagination {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 1rem;
        }

        #manage-contributions-section .page-numbers {
            display: flex;
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        #manage-contributions-section .page-btn {
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

        #manage-contributions-section .page-btn:hover:not(:disabled) {
            background-color: #f3f4f6;
        }

        #manage-contributions-section .page-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        #manage-contributions-section .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        #manage-contributions-section .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-muted);
        }
    </style>

    <!-- Toolbar -->
    <div class="toolbar">
        <div class="search-box">
            <input type="text" class="searchInput" placeholder="Search contributions...">
            <button class="searchBtn">Search</button>
        </div>
        <select class="perPageSelect">
            <option value="10">10 per page</option>
            <option value="5">5 per page</option>
            <option value="25">25 per page</option>
            <option value="50">50 per page</option>
        </select>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Goal</th>
                    <th>Date ↓↑</th>
                    <th>Amount ↓↑</th>
                    <th>Type ↓↑</th>
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
        <div class="page-numbers">
            <!-- Pagination buttons injected via JS -->
        </div>
    </div>

    <script>
        (function() {
            const section = document.getElementById('manage-contributions-section');

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

            const rand = seededRandom(hashString('manage-contributions-v1'));

            // --- 2. Generate 50 Entities of Dummy Data (deterministic) ---
            const goals = [
                { name: "Investment Portfolio", desc: "Initial contribution to start the goal" },
                { name: "Credit Card Debt", desc: "Monthly automatic transfer" },
                { name: "Operational Cost Reduction", desc: "Bonus allocation from quarterly performance" },
                { name: "Retirement Savings", desc: "Additional contribution from savings" },
                { name: "Student Loan Payoff", desc: "Scheduled monthly contribution" }
            ];

            // Fixed reference date so relative dates don't drift day-to-day
            const REFERENCE_DATE = new Date('2026-01-01T00:00:00Z');

            let contributions = [];
            for (let i = 1; i <= 50; i++) {
                const goalObj = goals[Math.floor(rand() * goals.length)];
                const isAutomatic = rand() > 0.5;

                const date = new Date(REFERENCE_DATE);
                date.setDate(date.getDate() - Math.floor(rand() * 365));

                contributions.push({
                    id: i,
                    goal: goalObj.name,
                    desc: goalObj.desc,
                    date: date.toISOString().split('T')[0],
                    amount: (rand() * 5000 + 100).toFixed(2),
                    type: isAutomatic ? 'Automatic' : 'Manual'
                });
            }

            // --- 3. State Management ---
            let state = {
                data: [...contributions],
                filteredData: [...contributions],
                currentPage: 1,
                perPage: 10,
                searchQuery: ""
            };

            // --- 4. DOM Elements (Scoped to the section) ---
            const tableBody = section.querySelector('.tableBody');
            const pageNumbers = section.querySelector('.page-numbers');
            const pageInfo = section.querySelector('.pageInfo');
            const perPageSelect = section.querySelector('.perPageSelect');
            const searchInput = section.querySelector('.searchInput');
            const searchBtn = section.querySelector('.searchBtn');

            // --- 5. Core Functions ---
            function updateUI() {
                renderTable();
                renderPagination();
            }

            function renderTable() {
                tableBody.innerHTML = '';

                if (state.filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="5" class="empty-state">No contributions found.</td></tr>`;
                    return;
                }

                const startIndex = (state.currentPage - 1) * state.perPage;
                const endIndex = startIndex + state.perPage;
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                paginatedData.forEach(item => {
                    const tr = document.createElement('tr');

                    const dateObj = new Date(item.date);
                    const formattedDate = dateObj.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' }).replace(/\//g, '-');

                    tr.innerHTML = `
                        <td>
                            <div class="goal-cell">
                                <div class="icon-box">$</div>
                                <div>
                                    <div class="goal-title">${item.goal}</div>
                                    <div class="goal-desc">${item.desc}</div>
                                </div>
                            </div>
                        </td>
                        <td style="color: var(--text-muted);">📅 ${formattedDate}</td>
                        <td class="amount">$${Number(item.amount).toLocaleString('en-US', {minimumFractionDigits: 2})}</td>
                        <td>
                            <span class="badge ${item.type.toLowerCase()}">${item.type}</span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="action-btn edit-btn" title="Edit" data-id="${item.id}">✏️</button>
                                <button class="action-btn delete delete-btn" title="Delete" data-id="${item.id}">🗑️</button>
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

                // Previous Button
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

                // Numbered Buttons
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

                // Next Button
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
                    item.goal.toLowerCase().includes(query) ||
                    item.desc.toLowerCase().includes(query) ||
                    item.type.toLowerCase().includes(query)
                );

                state.currentPage = 1;
                updateUI();
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

            // Event delegation for edit/delete buttons (avoids global window pollution
            // and works correctly regardless of re-renders)
            tableBody.addEventListener('click', (e) => {
                const btn = e.target.closest('button');
                if (!btn) return;

                const id = parseInt(btn.getAttribute('data-id'));

                if (btn.classList.contains('delete-btn')) {
                    deleteContribution(id);
                } else if (btn.classList.contains('edit-btn')) {
                    alert('Edit function triggered for ID: ' + id);
                }
            });

            function deleteContribution(id) {
                if (confirm("Are you sure you want to delete this contribution?")) {
                    state.data = state.data.filter(item => item.id !== id);

                    if (state.searchQuery) {
                        performSearch();
                    } else {
                        state.filteredData = [...state.data];
                        const totalPages = Math.ceil(state.filteredData.length / state.perPage) || 1;
                        if (state.currentPage > totalPages) {
                            state.currentPage = totalPages;
                        }
                        updateUI();
                    }
                }
            }

            // --- 7. Initialization ---
            updateUI();
        })();
    </script>
</section>
@endsection