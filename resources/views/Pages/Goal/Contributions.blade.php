@extends('Layout.dashboard')
@section('title','Contributions')
@section('content')

<!-- AGGRESSIVE OVERRIDE TO REMOVE WRAPPER MARGINS, PADDING, AND FORCE WHITE BACKGROUND -->
<style>
    /* Reset the entire document and common wrapper classes */
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        background-color: #ffffff !important;
        width: 100% !important;
        max-width: 100% !important;
        overflow-x: hidden;
    }
    
    /* Target every possible container that might have padding */
    #app, main, .main, .app-main, .main-content, .content, .content-wrapper, 
    .page-wrapper, .app-content, .container, .container-fluid, .page-content {
        margin: 0 !important;
        padding: 0 !important;
        background-color: #ffffff !important;
        width: 100% !important;
        max-width: 100% !important;
        box-shadow: none !important;
        border: none !important;
    }

    /* Specifically target the direct child of the body or #app to remove any residual margin */
    body > div, #app > div {
        margin: 0 !important;
        padding: 0 !important;
    }
</style>

<section id="manage-contributions-app">
    <style>
        /* Base & Reset */
        #manage-contributions-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #ffffff; /* Changed from #f9fafb to #ffffff */
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            position: relative;
            min-height: 100vh;
            width: 100%;
            max-width: 100%;
            margin: 0;
        }
        #manage-contributions-app * { box-sizing: border-box; }
        
        /* Header */
        .mc-header { margin-bottom: 24px; }
        .mc-header h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111827; }
        .mc-header p { margin: 0; color: #6b7280; font-size: 13px; }

        /* Layout Grid */
        .mc-layout {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 24px;
            align-items: start;
        }

        /* Left Side: Form */
        .mc-form-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .mc-form-header { margin-bottom: 20px; }
        .mc-form-header h3 { margin: 0 0 4px 0; font-size: 16px; font-weight: 600; color: #111827; }
        .mc-form-header p { margin: 0; font-size: 13px; color: #6b7280; }

        .mc-form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
        .mc-form-group label { font-size: 13px; font-weight: 500; color: #374151; }
        
        .mc-input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #fff;
            padding: 0 12px;
            height: 42px;
        }
        .mc-input-wrapper:focus-within {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }
        .mc-input-wrapper svg { color: #6b7280; width: 18px; height: 18px; margin-right: 10px; flex-shrink: 0; }
        .mc-input-wrapper input, .mc-input-wrapper select {
            border: none; outline: none; font-size: 14px; color: #111827;
            background: transparent; font-family: inherit; width: 100%; height: 100%;
        }
        .mc-input-wrapper select { cursor: pointer; }

        .mc-form-group textarea {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 12px;
            font-size: 14px;
            font-family: inherit;
            color: #111827;
            resize: vertical;
            min-height: 80px;
            outline: none;
            transition: border-color 0.2s;
        }
        .mc-form-group textarea:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        .mc-btn-submit {
            width: 100%;
            background: #10b981;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
        }
        .mc-btn-submit:hover { background: #059669; }

        /* Right Side: Table Area */
        .mc-table-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Toolbar */
        .mc-toolbar { padding: 16px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
        .mc-search-group { display: flex; gap: 8px; flex: 1; max-width: 450px; }
        
        .mc-search-input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #fff;
            padding: 0 12px;
            height: 36px;
            flex: 1;
        }
        .mc-search-input-wrapper:focus-within { border-color: #10b981; }
        .mc-search-input-wrapper svg { color: #6b7280; width: 16px; height: 16px; margin-right: 8px; }
        .mc-search-input-wrapper input { border: none; outline: none; font-size: 13px; width: 100%; background: transparent; }
        
        .mc-btn { padding: 0 12px; height: 36px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; color: #374151; }
        .mc-btn:hover { background: #f9fafb; }
        .mc-btn-primary { background: #10b981; color: #fff; border-color: #10b981; }
        .mc-btn-primary:hover { background: #059669; border-color: #059669; }
        
        .mc-select-input { padding: 0 12px; height: 36px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 13px; outline: none; background: #fff; cursor: pointer; }

        /* Table */
        .mc-table-wrapper { width: 100%; overflow-x: auto; }
        .mc-table { width: 100%; border-collapse: collapse; text-align: left; }
        .mc-table th, .mc-table td { padding: 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .mc-table th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; cursor: pointer; user-select: none; }
        .mc-table th:hover { background: #f3f4f6; }
        .mc-table tbody tr:hover { background: #f9fafb; }
        
        /* Cell Elements */
        .mc-goal-cell { display: flex; align-items: center; gap: 12px; }
        .mc-icon-box { width: 32px; height: 32px; border-radius: 6px; background: #ecfdf5; color: #10b981; display: flex; justify-content: center; align-items: center; flex-shrink: 0; }
        .mc-goal-info { display: flex; flex-direction: column; gap: 2px; }
        .mc-goal-name { font-weight: 500; color: #111827; font-size: 13px; }
        .mc-goal-desc { font-size: 12px; color: #6b7280; }
        
        .mc-date { display: flex; align-items: center; gap: 6px; color: #4b5563; font-size: 13px; }
        .mc-amount { font-weight: 500; color: #059669; }
        
        .mc-badge { display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; border: 1px solid transparent; }
        .mc-badge-manual { background: #eff6ff; color: #1d4ed8; border-color: #dbeafe; }
        .mc-badge-automatic { background: #ecfdf5; color: #059669; border-color: #d1fae5; }

        .mc-actions { display: flex; gap: 12px; justify-content: center; }
        .mc-action-btn { background: none; border: none; cursor: pointer; color: #3b82f6; padding: 4px; border-radius: 4px; transition: background 0.2s; display: flex; align-items: center; justify-content: center; }
        .mc-action-btn.mc-delete { color: #ef4444; }
        .mc-action-btn:hover { background: #eff6ff; }
        .mc-action-btn.mc-delete:hover { background: #fef2f2; }

        /* Empty State */
        .mc-empty { text-align: center; padding: 40px; color: #6b7280; }

        /* Responsive */
        @media (max-width: 992px) {
            .mc-layout { grid-template-columns: 1fr; }
        }
    </style>

    <!-- Page Header -->
    <div class="mc-header">
        <h2>Manage Contributions</h2>
        <p>Track and manage financial contributions, deposit amounts, notes, and contribution dates for organization goals.</p>
    </div>

    <!-- Main Layout -->
    <div class="mc-layout">
        
        <!-- Left Side: Add Form -->
        <div class="mc-form-card">
            <div class="mc-form-header">
                <h3>Add New Contribution</h3>
                <p>Fill in the details to create a new contribution</p>
            </div>
            
            <form id="add-contribution-form">
                <div class="mc-form-group">
                    <label>Goal</label>
                    <div class="mc-input-wrapper">
                        <select id="form-goal" required>
                            <option value="Investment Portfolio">Investment Portfolio</option>
                            <option value="Credit Card Debt">Credit Card Debt</option>
                            <option value="Operational Cost Reduction">Operational Cost Reduction</option>
                            <option value="Retirement Savings">Retirement Savings</option>
                            <option value="Student Loan Payoff">Student Loan Payoff</option>
                        </select>
                    </div>
                </div>

                <div class="mc-form-group">
                    <label>Date</label>
                    <div class="mc-input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <input type="date" id="form-date" required>
                    </div>
                </div>

                <div class="mc-form-group">
                    <label>Amount</label>
                    <div class="mc-input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        <input type="number" id="form-amount" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>

                <div class="mc-form-group">
                    <label>Notes</label>
                    <textarea id="form-notes" placeholder="Enter notes..."></textarea>
                </div>

                <button type="submit" class="mc-btn-submit">Add Contribution</button>
            </form>
        </div>

        <!-- Right Side: Table Area -->
        <div class="mc-table-card">
            <!-- Toolbar -->
            <div class="mc-toolbar">
                <div class="mc-search-group">
                    <div class="mc-search-input-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" id="search-input" placeholder="Search contributions...">
                    </div>
                    <button class="mc-btn mc-btn-primary" id="search-btn">Search</button>
                    <button class="mc-btn" id="clear-btn">Clear</button>
                </div>
                
                <div style="display: flex; gap: 8px; align-items: center;">
                    <select class="mc-select-input" id="page-size">
                        <option value="10">10 per page</option>
                        <option value="5">5 per page</option>
                        <option value="20">20 per page</option>
                    </select>
                    <button class="mc-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                        Filters
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="mc-table-wrapper">
                <table class="mc-table">
                    <thead>
                        <tr>
                            <th>Goal ↕</th>
                            <th>Date ↕</th>
                            <th>Amount ↕</th>
                            <th>Type ↕</th>
                            <th style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <!-- Rows injected via JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Initial Mock Data
            let contributionsData = [
                { id: 1, goal: "Investment Portfolio", desc: "Initial contribution to start the goal", date: "2026-01-17", amount: 5000.00, type: "Manual" },
                { id: 2, goal: "Credit Card Debt", desc: "Monthly automatic transfer", date: "2026-01-22", amount: 2500.00, type: "Automatic" },
                { id: 3, goal: "Operational Cost Reduction", desc: "Bonus allocation from quarterly performance", date: "2026-01-27", amount: 1000.00, type: "Automatic" },
                { id: 4, goal: "Retirement Savings", desc: "Additional contribution from savings", date: "2026-02-01", amount: 3000.00, type: "Manual" },
                { id: 5, goal: "Student Loan Payoff", desc: "Scheduled monthly contribution", date: "2026-02-06", amount: 1500.00, type: "Automatic" }
            ];

            // 2. State
            let state = {
                data: [...contributionsData],
                filteredData: [...contributionsData],
                searchQuery: ""
            };

            // 3. DOM Elements
            const tableBody = document.getElementById('table-body');
            const form = document.getElementById('add-contribution-form');
            const searchInput = document.getElementById('search-input');
            const searchBtn = document.getElementById('search-btn');
            const clearBtn = document.getElementById('clear-btn');
            const dateInput = document.getElementById('form-date');

            // 4. Set Default Date to today
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            dateInput.value = `${yyyy}-${mm}-${dd}`;

            // 5. Helper Functions
            const formatMoney = (val) => "$" + Number(val).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});

            const formatDate = (dateStr) => {
                const d = new Date(dateStr);
                return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            };

            // 6. Render Function
            const renderTable = () => {
                tableBody.innerHTML = '';
                
                if (state.filteredData.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="5" class="mc-empty">No contributions found.</td></tr>`;
                    return;
                }

                state.filteredData.forEach((row, index) => {
                    const badgeClass = row.type === 'Manual' ? 'mc-badge-manual' : 'mc-badge-automatic';
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>
                            <div class="mc-goal-cell">
                                <div class="mc-icon-box">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                </div>
                                <div class="mc-goal-info">
                                    <span class="mc-goal-name">${row.goal}</span>
                                    <span class="mc-goal-desc">${row.desc}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="mc-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                ${formatDate(row.date)}
                            </div>
                        </td>
                        <td><span class="mc-amount">${formatMoney(row.amount)}</span></td>
                        <td><span class="mc-badge ${badgeClass}">${row.type}</span></td>
                        <td>
                            <div class="mc-actions">
                                <button class="mc-action-btn" onclick="editContribution(${index})" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </button>
                                <button class="mc-action-btn mc-delete" onclick="deleteContribution(${index})" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(tr);
                });
            };

            // 7. Filter Logic
            const applyFilters = () => {
                const query = state.searchQuery.toLowerCase();
                state.filteredData = state.data.filter(item => 
                    item.goal.toLowerCase().includes(query) || 
                    item.desc.toLowerCase().includes(query) ||
                    item.type.toLowerCase().includes(query)
                );
                renderTable();
            };

            // 8. Event Listeners
            // Form Submit
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                
                const newGoal = document.getElementById('form-goal').value;
                const newDate = document.getElementById('form-date').value;
                const newAmount = parseFloat(document.getElementById('form-amount').value);
                const newNotes = document.getElementById('form-notes').value || "Manual contribution entry";

                // Add to data
                state.data.unshift({
                    id: Date.now(),
                    goal: newGoal,
                    desc: newNotes,
                    date: newDate,
                    amount: newAmount,
                    type: "Manual" // Defaulting form entries to Manual
                });

                // Reset form & re-render
                form.reset();
                dateInput.value = `${yyyy}-${mm}-${dd}`; // Reset date to today
                applyFilters(); // Re-render table with new data
            });

            // Search
            searchBtn.addEventListener('click', () => {
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
            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                state.searchQuery = '';
                applyFilters();
            });

            // Global Actions (Edit/Delete)
            window.editContribution = (index) => {
                console.log("Editing row:", state.filteredData[index]);
                // Implement edit modal or inline editing here
            };

            window.deleteContribution = (index) => {
                // Get the actual item from the filtered data to remove it from the main state
                const itemToDelete = state.filteredData[index];
                state.data = state.data.filter(item => item.id !== itemToDelete.id);
                applyFilters();
            };

            // 9. Initialize
            applyFilters();
        });
    </script>
</section>
@endsection