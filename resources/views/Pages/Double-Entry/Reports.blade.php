@extends('layout.dashboard')
@section('title', 'Ledger Summary')
@section('content')
<section id="reports-app">
    <style>
        /* Base & Reset */
        #reports-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #f9fafb; /* Slight background to make the white card pop */
            padding: 24px;
            box-sizing: border-box;
            font-size: 13px;
        }
        #reports-app * { box-sizing: border-box; }
        
        /* Page Header */
        .rp-header { margin-bottom: 24px; }
        .rp-header h2 { margin: 0 0 4px 0; font-size: 20px; font-weight: 600; color: #111827; }
        .rp-header p { margin: 0; color: #6b7280; font-size: 13px; }

        /* Main Card Container */
        .rp-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        /* Tabs */
        .rp-tabs {
            display: flex;
            gap: 8px;
            padding: 16px 16px 0 16px;
            border-bottom: 1px solid #e5e7eb;
            overflow-x: auto;
        }
        .rp-tab {
            padding: 8px 16px;
            border: 1px solid transparent;
            border-bottom: none;
            border-radius: 6px 6px 0 0;
            background: transparent;
            color: #6b7280;
            font-weight: 500;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.2s;
            margin-bottom: -1px;
        }
        .rp-tab:hover { color: #111827; }
        .rp-tab.active {
            background: #fff;
            border-color: #e5e7eb;
            border-bottom-color: #fff;
            color: #111827;
        }

        /* Content Area */
        .rp-content { padding: 20px; }

        /* Filters Toolbar */
        .rp-toolbar {
            display: flex;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .rp-input-group { display: flex; flex-direction: column; gap: 6px; }
        .rp-input-group label { font-size: 12px; font-weight: 500; color: #374151; }
        
        .rp-date-wrapper, .rp-select-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #fff;
            padding: 0 10px;
            height: 36px;
        }
        .rp-date-wrapper svg { color: #6b7280; width: 16px; height: 16px; margin-right: 8px; }
        .rp-date-wrapper input { border: none; outline: none; font-size: 13px; color: #374151; background: transparent; font-family: inherit; width: 110px; }
        
        .rp-select-wrapper select { border: none; outline: none; font-size: 13px; color: #374151; background: transparent; width: 120px; cursor: pointer; }
        
        .rp-actions { display: flex; gap: 8px; margin-left: auto; align-items: center; height: 36px; }
        
        .rp-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 14px;
            height: 36px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid #d1d5db;
            background: #fff;
            color: #374151;
        }
        .rp-btn:hover { background: #f9fafb; }
        .rp-btn-primary { background: #10b981; color: #fff; border-color: #10b981; }
        .rp-btn-primary:hover { background: #059669; border-color: #059669; }

        /* Table */
        .rp-table-wrapper {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            overflow: hidden;
            max-height: 450px;
            overflow-y: auto;
        }
        .rp-table { width: 100%; border-collapse: collapse; text-align: left; }
        .rp-table th, .rp-table td { padding: 12px 16px; border-bottom: 1px solid #e5e7eb; }
        .rp-table th { background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 12px; position: sticky; top: 0; z-index: 10; }
        .rp-table tbody tr:hover { background: #f9fafb; }
        
        /* Cell Specifics */
        .rp-expand-btn { cursor: pointer; color: #6b7280; font-weight: bold; transition: transform 0.2s; display: inline-block; width: 20px; text-align: center; user-select: none; }
        .rp-expand-btn.open { transform: rotate(90deg); }
        
        .rp-badge { display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 500; border: 1px solid transparent; font-family: monospace; }
        .rp-badge-blue { background: #eff6ff; color: #1d4ed8; border-color: #dbeafe; }
        .rp-badge-purple { background: #faf5ff; color: #7e22ce; border-color: #f3e8ff; }
        .rp-badge-yellow { background: #fefce8; color: #a16207; border-color: #fef08a; }
        
        .rp-badge-status { background: #ecfdf5; color: #059669; border: none; border-radius: 12px; padding: 4px 10px; font-family: inherit;}
        
        .rp-text-right { text-align: right; }
        .rp-text-muted { color: #6b7280; }
        
        /* Expanded Details Section */
        .rp-details-row { background: #fff; }
        .rp-details-row td { padding: 0; border-bottom: 1px solid #e5e7eb; }
        .rp-details-container { padding: 0; }
        .rp-details-header, .rp-details-data { display: grid; grid-template-columns: 15% 30% 30% 12.5% 12.5%; padding: 12px 16px; align-items: center; }
        .rp-details-header { background: #f9fafb; color: #4b5563; font-size: 12px; font-weight: 500; border-bottom: 1px solid #e5e7eb; }
        .rp-details-data { border-bottom: 1px solid #e5e7eb; font-size: 13px; }
        .rp-details-data:last-child { border-bottom: none; }

        /* Toast */
        .rp-toast { visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 4px; padding: 12px; position: fixed; z-index: 1000; bottom: 30px; left: 50%; transform: translateX(-50%); font-size: 14px; opacity: 0; transition: opacity 0.3s, visibility 0.3s; }
        .rp-toast.show { visibility: visible; opacity: 1; }
    </style>

    <!-- Page Header -->
    <div class="rp-header">
        <h2>Reports</h2>
        <p>Generate and analyze journal entries, general ledgers, account balances, and statements to monitor financial health.</p>
    </div>

    <!-- Main Card -->
    <div class="rp-card">
        <!-- Tabs -->
        <div class="rp-tabs">
            <button class="rp-tab active">Journal Entry</button>
            <button class="rp-tab">General Ledger</button>
            <button class="rp-tab">Account Statement</button>
            <button class="rp-tab">Account Balance</button>
            <button class="rp-tab">Cash Flow</button>
            <button class="rp-tab">Expense Report</button>
        </div>

        <!-- Content -->
        <div class="rp-content">
            <!-- Toolbar -->
            <div class="rp-toolbar">
                <div class="rp-input-group">
                    <label>From Date</label>
                    <div class="rp-date-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <input type="date" id="rp-from-date" value="2026-01-01">
                    </div>
                </div>
                <div class="rp-input-group">
                    <label>To Date</label>
                    <div class="rp-date-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <input type="date" id="rp-to-date" value="2026-12-31">
                    </div>
                </div>
                <div class="rp-input-group">
                    <label>Status</label>
                    <div class="rp-select-wrapper">
                        <select id="rp-status">
                            <option value="all">All Status</option>
                            <option value="posted">Posted</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                
                <div class="rp-actions">
                    <button class="rp-btn rp-btn-primary" id="rp-generate-btn">Generate</button>
                    <button class="rp-btn" id="rp-clear-btn">Clear</button>
                    <button class="rp-btn" id="rp-download-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Download PDF
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="rp-table-wrapper">
                <table class="rp-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;"></th>
                            <th>Journal #</th>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Description</th>
                            <th class="rp-text-right">Total Debit</th>
                            <th class="rp-text-right">Total Credit</th>
                            <th class="rp-text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody id="rp-table-body">
                        <!-- Data injected via JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="rp-toast" class="rp-toast"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initial Data Model
            const reportsData = [
                { id: "JE-2026-093", date: "2026-02-16", refType: "Customer Payment", refClass: "rp-badge-purple", desc: "Customer Payment #CP-2026-02-007", debit: 1560.00, credit: 1560.00, status: "Posted", lines: [] },
                { id: "JE-2026-073", date: "2026-02-16", refType: "Vendor Payment", refClass: "rp-badge-yellow", desc: "Vendor Payment #VP-2026-02-008", debit: 1500.00, credit: 1500.00, status: "Posted", lines: [] },
                { id: "JE-2026-092", date: "2026-02-15", refType: "Customer Payment", refClass: "rp-badge-purple", desc: "Customer Payment #CP-2026-02-006", debit: 2027.26, credit: 2027.26, status: "Posted", lines: [] },
                { id: "JE-2026-091", date: "2026-02-15", refType: "Customer Payment", refClass: "rp-badge-purple", desc: "Customer Payment #CP-2026-02-004", debit: 1945.13, credit: 1945.13, status: "Posted", lines: [] },
                { 
                    id: "JE-2026-072", date: "2026-02-15", refType: "Vendor Payment", refClass: "rp-badge-yellow", desc: "Vendor Payment #VP-2026-02-006", debit: 1146.00, credit: 1146.00, status: "Posted",
                    // Detailed lines for the expanded view
                    lines: [
                        { code: "2000", badge: "rp-badge-lightpink", bg: "#fdf2f8", color: "#9d174d", name: "Accounts Payable", desc: "Payment to Tech Solutions Inc", debit: 1146.00, credit: null },
                        { code: "1000", badge: "rp-badge-pink", bg: "#fdf2f8", color: "#be185d", name: "Cash", desc: "Payment from Business Checking Account", debit: null, credit: 1146.00 }
                    ]
                },
                { id: "JE-2026-071", date: "2026-02-15", refType: "Vendor Payment", refClass: "rp-badge-yellow", desc: "Vendor Payment #VP-2026-02-005", debit: 1290.80, credit: 1290.80, status: "Posted", lines: [] },
                { id: "JE-2026-090", date: "2026-02-14", refType: "Customer Payment", refClass: "rp-badge-purple", desc: "Customer Payment #CP-2026-02-003", debit: 401.04, credit: 401.04, status: "Posted", lines: [] }
            ];

            // Backup for Clear functionality
            const initialData = JSON.parse(JSON.stringify(reportsData));

            // DOM Elements
            const tableBody = document.getElementById('rp-table-body');
            const fromDateInput = document.getElementById('rp-from-date');
            const toDateInput = document.getElementById('rp-to-date');
            const statusSelect = document.getElementById('rp-status');
            const toastEl = document.getElementById('rp-toast');

            // Helper: Format Currency
            const formatMoney = (val) => {
                if (val === null || val === undefined) return "-";
                return "$" + val.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            };

            // Helper: Format Date (to match image: MMM DD, YYYY or standard input format)
            const formatDateDisplay = (dateStr) => {
                const parts = dateStr.split('-');
                if(parts.length !== 3) return dateStr;
                return `📅 ${dateStr}`; // Simplified to match image closely
            };

            // Helper: Show Toast
            const showToast = (msg) => {
                toastEl.textContent = msg;
                toastEl.className = "rp-toast show";
                setTimeout(() => { toastEl.className = toastEl.className.replace("show", ""); }, 3000);
            };

            // Function: Render Table
            const renderTable = (data) => {
                tableBody.innerHTML = '';
                
                if (data.length === 0) {
                    tableBody.innerHTML = `<tr><td colspan="8" style="text-align: center; color: #6b7280; padding: 24px;">No records found for the selected criteria.</td></tr>`;
                    return;
                }

                data.forEach((row, index) => {
                    // Main Row
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><span class="rp-expand-btn" onclick="toggleReportRow(this, ${index})">›</span></td>
                        <td><span class="rp-badge rp-badge-blue">${row.id}</span></td>
                        <td class="rp-text-muted">${formatDateDisplay(row.date)}</td>
                        <td><span class="rp-badge ${row.refClass}">${row.refType}</span></td>
                        <td>${row.desc}</td>
                        <td class="rp-text-right">${formatMoney(row.debit)}</td>
                        <td class="rp-text-right">${formatMoney(row.credit)}</td>
                        <td class="rp-text-right"><span class="rp-badge-status">${row.status}</span></td>
                    `;
                    tableBody.appendChild(tr);
                });
            };

            // Global function for expanding rows (attached to window for inline onclick)
            window.toggleReportRow = function(btn, index) {
                const tr = btn.closest('tr');
                const isOpen = btn.classList.contains('open');
                
                // Close all other open rows
                document.querySelectorAll('.rp-expand-btn.open').forEach(el => {
                    if (el !== btn) {
                        el.classList.remove('open');
                        const nextRow = el.closest('tr').nextElementSibling;
                        if (nextRow && nextRow.classList.contains('rp-details-row')) {
                            nextRow.remove();
                        }
                    }
                });

                if (isOpen) {
                    btn.classList.remove('open');
                    const nextRow = tr.nextElementSibling;
                    if (nextRow && nextRow.classList.contains('rp-details-row')) {
                        nextRow.remove();
                    }
                } else {
                    btn.classList.add('open');
                    
                    // Create details row
                    const detailsTr = document.createElement('tr');
                    detailsTr.className = 'rp-details-row';
                    
                    let detailsHtml = `
                        <td colspan="8">
                            <div class="rp-details-container">
                                <div class="rp-details-header">
                                    <div>Account Code</div>
                                    <div>Account Name</div>
                                    <div>Description</div>
                                    <div class="rp-text-right">Debit</div>
                                    <div class="rp-text-right">Credit</div>
                                </div>
                    `;
                    
                    // Use mock lines if available, otherwise generate generic balancing lines
                    const lines = reportsData[index].lines.length > 0 ? reportsData[index].lines : [
                        { code: "1000", bg: "#fdf2f8", color: "#be185d", name: "Cash", desc: "Auto-generated balancing line", debit: reportsData[index].debit, credit: null },
                        { code: "4000", bg: "#fdf2f8", color: "#be185d", name: "Revenue/Offset", desc: "Auto-generated balancing line", debit: null, credit: reportsData[index].credit }
                    ];

                    lines.forEach(line => {
                        detailsHtml += `
                            <div class="rp-details-data">
                                <div><span class="rp-badge" style="background:${line.bg}; color:${line.color}; border:none; padding:2px 6px;">${line.code}</span></div>
                                <div style="font-weight:500;">${line.name}</div>
                                <div class="rp-text-muted">${line.desc}</div>
                                <div class="rp-text-right">${formatMoney(line.debit)}</div>
                                <div class="rp-text-right">${formatMoney(line.credit)}</div>
                            </div>
                        `;
                    });

                    detailsHtml += `</div></td>`;
                    detailsTr.innerHTML = detailsHtml;
                    
                    tr.after(detailsTr);
                }
            };

            // Event: Generate Button
            document.getElementById('rp-generate-btn').addEventListener('click', () => {
                const fromVal = fromDateInput.value;
                const toVal = toDateInput.value;
                const statusVal = statusSelect.value;

                if (!fromVal || !toVal) {
                    showToast("Please select both From and To dates.");
                    return;
                }
                if (new Date(fromVal) > new Date(toVal)) {
                    showToast("Error: 'From Date' cannot be after 'To Date'.");
                    return;
                }

                showToast("Generating report...");

                // Simulate processing delay
                setTimeout(() => {
                    // Filter Data based on criteria (mostly status, assuming dates are broad enough to include all)
                    let filteredData = [...reportsData];
                    
                    if (statusVal !== 'all') {
                        filteredData = filteredData.filter(item => item.status.toLowerCase() === statusVal);
                    }
                    
                    // In a real app, you'd filter by date range too:
                    // filteredData = filteredData.filter(item => item.date >= fromVal && item.date <= toVal);

                    renderTable(filteredData);
                    showToast("Report generated successfully.");
                }, 500);
            });

            // Event: Clear Button
            document.getElementById('rp-clear-btn').addEventListener('click', () => {
                fromDateInput.value = "2026-01-01";
                toDateInput.value = "2026-12-31";
                statusSelect.value = "all";
                
                // Reset table to full initial data
                renderTable(initialData);
                showToast("Filters cleared.");
            });

            // Event: Download PDF
            document.getElementById('rp-download-btn').addEventListener('click', () => {
                showToast("Generating PDF document... Check your downloads.");
            });

            // Event: Tabs Switching
            const tabs = document.querySelectorAll('.rp-tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active from all
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active to clicked
                    tab.classList.add('active');
                    
                    if (tab.textContent !== 'Journal Entry') {
                        showToast(`Loading ${tab.textContent} module...`);
                        // Optionally hide table here for non-journal tabs
                    } else {
                        // Show table for Journal Entry
                    }
                });
            });

            // Initialize View
            renderTable(reportsData);
        });
    </script>
</section>
@endsection