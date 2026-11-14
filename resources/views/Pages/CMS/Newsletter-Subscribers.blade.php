@extends('layout.dashboard')
@section('title', 'Newsletter Subscribers')
@section('content')

<!-- Force pure page background to white to remove grey gaps -->
<style>
    body, html, #app, .main-content, .content-wrapper, main {
        background-color: #ffffff !important;
    }
</style>

<section id="newsletter-app">
    <style>
        /* Base & Reset */
        #newsletter-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #ffffff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
            margin: -24px; 
            width: calc(100% + 48px);
            min-height: calc(100vh - 1px);
        }
        #newsletter-app * { box-sizing: border-box; }
        
        /* Header */
        .nl-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .nl-title h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .nl-title p { margin: 0; color: #6b7280; font-size: 13px; }
        
        /* Theme: Bright Blue */
        .nl-btn-add { background: #3b82f6; color: white; border: none; border-radius: 6px; width: 36px; height: 36px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .nl-btn-add:hover { background: #2563eb; }

        /* Main Container */
        .nl-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .nl-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        .nl-search-group { display: flex; gap: 8px; flex: 1; max-width: 450px; }
        .nl-search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .nl-search-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
        
        .nl-btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .nl-btn:hover { background: #f9fafb; }
        .nl-btn-primary { background: #3b82f6; color: white; border-color: #3b82f6; }
        .nl-btn-primary:hover { background: #2563eb; border-color: #2563eb; }
        
        .nl-select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Table */
        .nl-table-wrapper { width: 100%; overflow-x: auto; }
        .nl-table { width: 100%; border-collapse: collapse; text-align: left; }
        .nl-table th, .nl-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .nl-table th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; cursor: pointer; user-select: none; }
        .nl-table th:hover { background: #f3f4f6; }
        .nl-table tbody tr:hover { background: #f9fafb; }
        
        /* Cell Elements */
        .nl-item-cell { display: flex; align-items: center; gap: 12px; }
        .nl-icon-box { width: 32px; height: 32px; border-radius: 6px; background: #eff6ff; color: #3b82f6; display: flex; justify-content: center; align-items: center; flex-shrink: 0; }
        .nl-item-name { font-weight: 500; color: #111; font-size: 13px; }
        
        .nl-ip-badge { display: inline-block; padding: 4px 8px; border: 1px solid #e5e7eb; border-radius: 4px; font-size: 12px; color: #4b5563; font-family: monospace; }
        
        .nl-date { display: flex; align-items: center; gap: 6px; color: #4b5563; font-size: 13px; }

        /* 3 Dots Action Menu */
        .nl-action-menu { position: relative; display: flex; justify-content: flex-end; }
        .nl-action-trigger { background: none; border: none; cursor: pointer; color: #6b7280; padding: 4px; border-radius: 4px; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .nl-action-trigger:hover { background: #f3f4f6; color: #111; }
        
        .nl-dropdown { display: none; position: absolute; right: 0; top: 100%; background: #fff; border: 1px solid #e5e7eb; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); z-index: 100; min-width: 130px; padding: 6px 0; flex-direction: column; }
        .nl-dropdown.show { display: flex; }
        
        .nl-dropdown-btn { background: none; border: none; padding: 8px 16px; text-align: left; font-size: 13px; cursor: pointer; width: 100%; display: flex; align-items: center; gap: 10px; transition: background 0.2s; font-family: inherit; }
        .nl-dropdown-btn:hover { background: #f9fafb; }
        
        /* Button Colors */
        .nl-dropdown-btn.view { color: #3b82f6; }
        .nl-dropdown-btn.view:hover { background: #eff6ff; }
        
        .nl-dropdown-btn.delete { color: #ef4444; }
        .nl-dropdown-btn.delete:hover { background: #fef2f2; }
        
        .nl-dropdown-btn svg { width: 16px; height: 16px; stroke: currentColor; }

        /* Pagination Area */
        .nl-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; background: #fff; }
        .nl-page-info { font-size: 13px; color: #6b7280; }
        .nl-page-controls { display: flex; gap: 6px; align-items: center; }
        .nl-page-btn { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; transition: all 0.2s; display: flex; align-items: center; gap: 4px; }
        .nl-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .nl-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .nl-page-num { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; min-width: 32px; text-align: center; }
        .nl-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }
        
        /* Utility */
        .text-right { text-align: right; }
    </style>

    <!-- Header -->
    <div class="nl-header">
        <div class="nl-title">
            <h2>Manage Newsletter Subscribers</h2>
            <p>Manage your newsletter subscribers and export subscriber data.</p>
        </div>
        <button class="nl-btn-add" id="nl-add-btn" title="Add Subscriber">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Main Container -->
    <div class="nl-main-container">
        <!-- Toolbar -->
        <div class="nl-toolbar">
            <div class="nl-search-group">
                <input type="text" id="nl-search-input" class="nl-search-input" placeholder="Search subscribers...">
                <button class="nl-btn nl-btn-primary" id="nl-search-btn">Search</button>
                <button class="nl-btn" id="nl-clear-btn">Clear</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <select class="nl-select-input" id="nl-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="nl-table-wrapper">
            <table class="nl-table">
                <thead>
                    <tr>
                        <th data-sort="email">Email ↕</th>
                        <th data-sort="ip">IP Address ↕</th>
                        <th data-sort="date">Subscribed At ↕</th>
                        <th class="text-right" style="width: 80px;"></th> <!-- Removed Text, kept alignment -->
                    </tr>
                </thead>
                <tbody id="nl-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="nl-pagination">
            <div class="nl-page-info" id="nl-page-info">Showing 1 to 10 of 50 results</div>
            <div class="nl-page-controls">
                <button class="nl-page-btn" id="nl-prev-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Previous
                </button>
                <div id="nl-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="nl-page-btn" id="nl-next-btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Generate 50 Mock Data Entities
            const firstNames = ["hickle", "travis", "cortez", "maverick", "hassie", "larkin", "pleuschke", "xemard", "coy", "donna", "bradley", "kayla", "orval", "marcelle", "gino"];
            const lastNames = ["bernard", "johnson", "emmerich", "brown", "smith", "lonnie", "davis", "miller", "donnelly", "wilson", "moore", "taylor", "anderson", "thomas", "jackson"];
            const domains = ["example.org", "example.net", "example.com"];
            
            let initialData = [];
            for (let i = 0; i < 50; i++) {
                const fn = firstNames[i % firstNames.length];
                const ln = lastNames[i % lastNames.length];
                const dom = domains[i % domains.length];
                
                // Generate somewhat realistic looking IP
                const ip = `${Math.floor(Math.random() * 255)}.${Math.floor(Math.random() * 255)}.${Math.floor(Math.random() * 255)}.${Math.floor(Math.random() * 255)}`;
                
                // Generate dates ending in 2026
                const month = String(Math.floor(Math.random() * 2) + 1).padStart(2, '0');
                const day = String(Math.floor(Math.random() * 28) + 1).padStart(2, '0');
                const dateStr = `2026-${month}-${day}`;

                initialData.push({
                    id: `SUB-${i+1}`,
                    email: `${fn}${i}@${dom}`,
                    ip: ip,
                    date: dateStr
                });
            }

            // Sort initial data by date descending
            initialData.sort((a, b) => new Date(b.date) - new Date(a.date));

            // State Management
            let state = {
                data: [...initialData],
                filteredData: [...initialData],
                currentPage: 1,
                pageSize: 10,
                sortColumn: null,
                sortAsc: true,
                searchQuery: ''
            };

            // DOM Elements
            const tableBody = document.getElementById('nl-table-body');
            const pageInfo = document.getElementById('nl-page-info');
            const prevBtn = document.getElementById('nl-prev-btn');
            const nextBtn = document.getElementById('nl-next-btn');
            const pageNumbers = document.getElementById('nl-page-numbers');
            const searchInput = document.getElementById('nl-search-input');
            const pageSizeSelect = document.getElementById('nl-page-size');

            // Action Handlers
            window.viewSubscriber = function(id) {
                console.log("Viewing subscriber:", id);
                // In a real app, open a modal here
            };

            window.deleteSubscriber = function(id) {
                state.data = state.data.filter(item => item.id !== id);
                applyFilters();
            };

            // Toggle 3-dots menu
            window.toggleMenu = function(btn) {
                // Close all other open menus
                document.querySelectorAll('.nl-dropdown').forEach(m => {
                    if (m !== btn.nextElementSibling) m.classList.remove('show');
                });
                btn.nextElementSibling.classList.toggle('show');
            };

            // Close menu on outside click
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.nl-action-menu')) {
                    document.querySelectorAll('.nl-dropdown').forEach(m => m.classList.remove('show'));
                }
            });

            // Logic
            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    const query = state.searchQuery.toLowerCase();
                    return query === '' || 
                        item.email.toLowerCase().includes(query) || 
                        item.ip.includes(query);
                });

                // Re-apply sorting if a column is selected
                if (state.sortColumn) {
                    sortData();
                }

                state.currentPage = 1;
                renderView();
            };

            const sortData = () => {
                state.filteredData.sort((a, b) => {
                    let valA = a[state.sortColumn] || '';
                    let valB = b[state.sortColumn] || '';
                    
                    if (state.sortColumn === 'date') {
                        valA = new Date(valA).getTime();
                        valB = new Date(valB).getTime();
                    } else {
                        if (typeof valA === 'string') valA = valA.toLowerCase();
                        if (typeof valB === 'string') valB = valB.toLowerCase();
                    }

                    if (valA < valB) return state.sortAsc ? -1 : 1;
                    if (valA > valB) return state.sortAsc ? 1 : -1;
                    return 0;
                });
            };

            const renderView = () => {
                const totalItems = state.filteredData.length;
                const totalPages = Math.ceil(totalItems / state.pageSize) || 1;
                
                if (state.currentPage > totalPages) state.currentPage = totalPages;
                if (state.currentPage < 1) state.currentPage = 1;

                const startIndex = (state.currentPage - 1) * state.pageSize;
                const endIndex = Math.min(startIndex + state.pageSize, totalItems);
                const paginatedData = state.filteredData.slice(startIndex, endIndex);

                // Update Info Text
                pageInfo.textContent = totalItems === 0 
                    ? "Showing 0 results" 
                    : `Showing ${startIndex + 1} to ${endIndex} of ${totalItems} results`;

                // Render Table Rows
                tableBody.innerHTML = '';
                if (paginatedData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="4" style="text-align: center; padding: 24px; color: #6b7280;">No subscribers found.</td></tr>`;
                } else {
                    paginatedData.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>
                                <div class="nl-item-cell">
                                    <div class="nl-icon-box">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                    <span class="nl-item-name">${row.email}</span>
                                </div>
                            </td>
                            <td><span class="nl-ip-badge">${row.ip}</span></td>
                            <td>
                                <div class="nl-date">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    ${row.date}
                                </div>
                            </td>
                            <td>
                                <div class="nl-action-menu">
                                    <button class="nl-action-trigger" onclick="toggleMenu(this)" title="Actions">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </button>
                                    <div class="nl-dropdown">
                                        <button class="nl-dropdown-btn view" onclick="viewSubscriber('${row.id}')">
                                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            View
                                        </button>
                                        <button class="nl-dropdown-btn delete" onclick="deleteSubscriber('${row.id}')">
                                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        `;
                        tableBody.appendChild(tr);
                    });
                }

                // Update Pagination Controls
                prevBtn.disabled = state.currentPage === 1 || totalItems === 0;
                nextBtn.disabled = state.currentPage === totalPages || totalItems === 0;
                
                pageNumbers.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.className = `nl-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => {
                        state.currentPage = i;
                        renderView();
                    };
                    pageNumbers.appendChild(btn);
                }
            };

            // Event Listeners
            // Search
            document.getElementById('nl-search-btn').addEventListener('click', () => {
                state.searchQuery = searchInput.value.trim();
                applyFilters();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value.trim();
                    applyFilters();
                }
            });

            // Clear
            document.getElementById('nl-clear-btn').addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
                searchInput.focus();
            });

            // Page Size Change
            pageSizeSelect.addEventListener('change', (e) => {
                state.pageSize = parseInt(e.target.value);
                state.currentPage = 1;
                renderView();
            });

            // Pagination Buttons
            prevBtn.addEventListener('click', () => {
                if (state.currentPage > 1) {
                    state.currentPage--;
                    renderView();
                }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(state.filteredData.length / state.pageSize);
                if (state.currentPage < totalPages) {
                    state.currentPage++;
                    renderView();
                }
            });

            // Sorting
            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.addEventListener('click', () => {
                    const column = th.getAttribute('data-sort');
                    if (state.sortColumn === column) {
                        state.sortAsc = !state.sortAsc;
                    } else {
                        state.sortColumn = column;
                        state.sortAsc = true;
                    }
                    sortData();
                    renderView();
                });
            });

            // Initialize
            renderView();
        });
    </script>
</section>
@endsection