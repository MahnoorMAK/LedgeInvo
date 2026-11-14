@extends('layout.dashboard')
@section('title', 'Custom Pages')
@section('content')

<!-- Force pure page background to white to remove grey gaps -->
<style>
    body, html, #app, .main-content, .content-wrapper, main {
        background-color: #ffffff !important;
    }
</style>

<section id="manage-pages-app">
    <style>
        /* Base & Reset */
        #manage-pages-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #ffffff;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
            
            /* FIX: Wrapper Margin Issue */
            margin: -24px; 
            width: calc(100% + 48px);
            min-height: calc(100vh - 1px);
        }
        #manage-pages-app * { box-sizing: border-box; }
        
        /* Header */
        .mp-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .mp-title h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .mp-title p { margin: 0; color: #6b7280; font-size: 13px; }
        
        /* Theme: Bright Blue */
        .mp-btn-add { background: #3b82f6; color: white; border: none; border-radius: 6px; width: 36px; height: 36px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: background 0.2s; }
        .mp-btn-add:hover { background: #2563eb; }

        /* Main Container */
        .mp-main-container { border: 1px solid #e5e7eb; border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }

        /* Toolbar */
        .mp-toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; gap: 16px; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; }
        .mp-search-group { display: flex; gap: 8px; flex: 1; max-width: 400px; }
        .mp-search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; }
        .mp-search-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
        
        .mp-btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .mp-btn:hover { background: #f9fafb; }
        .mp-btn-primary { background: #3b82f6; color: white; border-color: #3b82f6; }
        .mp-btn-primary:hover { background: #2563eb; border-color: #2563eb; }
        
        .mp-select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Table */
        .mp-table-wrapper { width: 100%; overflow-x: auto; }
        .mp-table { width: 100%; border-collapse: collapse; text-align: left; }
        .mp-table th, .mp-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .mp-table th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; cursor: pointer; user-select: none; }
        .mp-table th:hover { background: #f3f4f6; }
        .mp-table tbody tr:hover { background: #f9fafb; }
        
        /* Cell Elements */
        .mp-item-cell { display: flex; align-items: center; gap: 12px; }
        .mp-icon-box { width: 32px; height: 32px; border-radius: 6px; background: #eff6ff; color: #3b82f6; display: flex; justify-content: center; align-items: center; flex-shrink: 0; }
        .mp-item-name { font-weight: 500; color: #111; font-size: 13px; }
        
        .mp-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; border: 1px solid transparent; }
        .mp-badge-url { background: #eff6ff; color: #1d4ed8; border-color: #dbeafe; }
        .mp-badge-status { background: #ecfdf5; color: #059669; border-color: #d1fae5; border-radius: 12px; }

        .mp-date { display: flex; align-items: center; gap: 6px; color: #4b5563; font-size: 13px; }

        /* Actions Dropdown */
        .mp-actions-cell { position: relative; text-align: right; width: 50px; }
        .mp-dots-btn { background: none; border: none; cursor: pointer; color: #6b7280; padding: 4px; border-radius: 4px; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .mp-dots-btn:hover { background: #e5e7eb; color: #111; }
        .mp-dropdown { 
            display: none; position: absolute; right: 16px; top: 40px; 
            background: #fff; border: 1px solid #e5e7eb; border-radius: 6px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); z-index: 100; min-width: 130px; text-align: left;
        }
        .mp-dropdown.show { display: block; }
        .mp-dropdown-item { padding: 8px 12px; font-size: 13px; color: #374151; cursor: pointer; display: flex; align-items: center; gap: 8px; }
        .mp-dropdown-item:hover { background: #f3f4f6; }
        .mp-dropdown-item.mp-del { color: #ef4444; }
        .mp-dropdown-item.mp-del:hover { background: #fef2f2; }
        
        .mp-dropdown-item svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

        /* Pagination Area */
        .mp-pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; background: #fff; }
        .mp-page-info { font-size: 13px; color: #6b7280; }
        .mp-page-controls { display: flex; gap: 6px; align-items: center; }
        .mp-page-btn { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; transition: all 0.2s; display: flex; align-items: center; gap: 4px; }
        .mp-page-btn:hover:not(:disabled) { background: #f9fafb; }
        .mp-page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .mp-page-num { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; font-size: 13px; color: #374151; min-width: 32px; text-align: center; }
        .mp-page-num.active { background: #3b82f6; color: #fff; border-color: #3b82f6; }
    </style>

    <!-- Header -->
    <div class="mp-header">
        <div class="mp-title">
            <h2>Manage Custom Pages</h2>
            <p>Create, manage, and publish custom pages for your landing page.</p>
        </div>
        <button class="mp-btn-add" id="mp-add-btn" title="Add New Page">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Main Container -->
    <div class="mp-main-container">
        <!-- Toolbar -->
        <div class="mp-toolbar">
            <div class="mp-search-group">
                <input type="text" id="mp-search-input" class="mp-search-input" placeholder="Search pages...">
                <button class="mp-btn mp-btn-primary" id="mp-search-btn">Search</button>
                <button class="mp-btn" id="mp-clear-btn">Clear</button>
            </div>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <select class="mp-select-input" id="mp-page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="mp-table-wrapper">
            <table class="mp-table">
                <thead>
                    <tr>
                        <th data-sort="title">Title ↕</th>
                        <th>URL Slug</th>
                        <th data-sort="status">Status ↕</th>
                        <th data-sort="lastUpdated">Last Updated ↕</th>
                        <th style="text-align: right; width: 50px;"></th>
                    </tr>
                </thead>
                <tbody id="mp-table-body">
                    <!-- Rows injected via JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mp-pagination">
            <div class="mp-page-info" id="mp-page-info">Showing 1 to 10 of 25 results</div>
            <div class="mp-page-controls">
                <button class="mp-page-btn" id="mp-prev-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Previous
                </button>
                <div id="mp-page-numbers" style="display: flex; gap: 6px;"></div>
                <button class="mp-page-btn" id="mp-next-btn">
                    Next
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Generate 25 Mock Data Entities
            const pageNames = ["About Us", "Privacy Policy", "Terms of Service", "FAQ", "Help Center", "Contact Us", "Careers", "Blog", "Press", "Partners", "Pricing", "Features", "Solutions", "Resources", "Support", "Community", "Events", "Newsroom", "Security", "Legal", "Cookies", "Sitemap", "Accessibility", "Status", "Developers"];
            
            let initialData = [];
            for (let i = 0; i < 25; i++) {
                const title = pageNames[i];
                const slug = "/" + title.replace(/\s+/g, '-').toLowerCase();
                const status = i % 5 === 0 ? "Draft" : "Active"; // Mix of Active and Draft
                const date = `2026-01-${String((i % 28) + 1).padStart(2, '0')}`;

                initialData.push({
                    id: i + 1,
                    title: title,
                    slug: slug,
                    status: status,
                    lastUpdated: date
                });
            }

            // State
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
            const tableBody = document.getElementById('mp-table-body');
            const pageInfo = document.getElementById('mp-page-info');
            const prevBtn = document.getElementById('mp-prev-btn');
            const nextBtn = document.getElementById('mp-next-btn');
            const pageNumbers = document.getElementById('mp-page-numbers');
            const searchInput = document.getElementById('mp-search-input');
            const pageSizeSelect = document.getElementById('mp-page-size');

            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.mp-actions-cell')) {
                    document.querySelectorAll('.mp-dropdown').forEach(d => d.classList.remove('show'));
                }
            });

            // Toggle Dropdown
            window.toggleDropdown = function(event, id) {
                event.stopPropagation();
                document.querySelectorAll('.mp-dropdown').forEach(d => d.classList.remove('show'));
                const dropdown = document.getElementById(`dropdown-${id}`);
                if (dropdown) dropdown.classList.toggle('show');
            };

            // Action Handlers
            window.viewPage = function(id) { console.log("Viewing page ID:", id); };
            window.editPage = function(id) { console.log("Editing page ID:", id); };
            window.deletePage = function(id) {
                state.data = state.data.filter(item => item.id !== id);
                applyFilters();
            };

            // Logic
            const applyFilters = () => {
                state.filteredData = state.data.filter(item => {
                    const query = state.searchQuery.toLowerCase();
                    return query === '' || 
                        item.title.toLowerCase().includes(query) || 
                        item.slug.toLowerCase().includes(query);
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
                    
                    if (state.sortColumn === 'lastUpdated') {
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

                pageInfo.textContent = totalItems === 0 
                    ? "Showing 0 results" 
                    : `Showing ${startIndex + 1} to ${endIndex} of ${totalItems} results`;

                tableBody.innerHTML = '';
                if (paginatedData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="5" style="text-align: center; padding: 24px; color: #6b7280;">No pages found.</td></tr>`;
                } else {
                    paginatedData.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>
                                <div class="mp-item-cell">
                                    <div class="mp-icon-box">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    </div>
                                    <span class="mp-item-name">${row.title}</span>
                                </div>
                            </td>
                            <td><span class="mp-badge mp-badge-url">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px;"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                ${row.slug}
                            </span></td>
                            <td><span class="mp-badge ${row.status === 'Active' ? 'mp-badge-status' : 'mp-badge-draft'}">${row.status}</span></td>
                            <td><div class="mp-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                ${row.lastUpdated}
                            </div></td>
                            <td class="mp-actions-cell">
                                <button class="mp-dots-btn" onclick="toggleDropdown(event, ${row.id})">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </button>
                                <div class="mp-dropdown" id="dropdown-${row.id}">
                                    <div class="mp-dropdown-item" onclick="viewPage(${row.id})">
                                        <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        View Page
                                    </div>
                                    <div class="mp-dropdown-item" onclick="editPage(${row.id})">
                                        <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        Edit
                                    </div>
                                    <div class="mp-dropdown-item mp-del" onclick="deletePage(${row.id})">
                                        <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        Delete
                                    </div>
                                </div>
                            </td>
                        `;
                        tableBody.appendChild(tr);
                    });
                }

                // Pagination Controls
                prevBtn.disabled = state.currentPage === 1;
                nextBtn.disabled = state.currentPage === totalPages || totalItems === 0;
                
                pageNumbers.innerHTML = '';
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.className = `mp-page-num ${i === state.currentPage ? 'active' : ''}`;
                    btn.textContent = i;
                    btn.onclick = () => { state.currentPage = i; renderView(); };
                    pageNumbers.appendChild(btn);
                }
            };

            // Event Listeners
            document.getElementById('mp-search-btn').addEventListener('click', () => {
                state.searchQuery = searchInput.value;
                applyFilters();
            });

            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    state.searchQuery = searchInput.value;
                    applyFilters();
                }
            });

            document.getElementById('mp-clear-btn').addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
                searchInput.focus();
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