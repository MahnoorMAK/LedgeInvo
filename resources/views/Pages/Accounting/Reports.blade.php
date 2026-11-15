<section id="reports-aging-app">
    <style>
        /* Base & Reset */
        #reports-aging-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #374151;
            background: #f9fafb;
            padding: 24px;
            box-sizing: border-box;
            font-size: 14px;
            min-height: 100vh;
        }
        #reports-aging-app * { box-sizing: border-box; }
        
        /* Page Header */
        .ra-header { margin-bottom: 24px; }
        .ra-header h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111827; }
        .ra-header p { margin: 0; color: #6b7280; font-size: 13px; }

        /* Main Card Container */
        .ra-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Tabs */
        .ra-tabs {
            display: flex;
            gap: 8px;
            padding: 16px 16px 0 16px;
            border-bottom: 1px solid #e5e7eb;
            overflow-x: auto;
            background: #f9fafb;
        }
        .ra-tab {
            padding: 10px 16px;
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
            white-space: nowrap;
        }
        .ra-tab:hover { color: #111827; background: #f3f4f6; }
        .ra-tab.active {
            background: #fff;
            border-color: #e5e7eb;
            border-bottom-color: #fff;
            color: #111827;
            font-weight: 600;
        }

        /* Content Area */
        .ra-content { padding: 24px; }

        /* Filter Section */
        .ra-filter-section {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
            background: #fff;
        }
        .ra-input-group { display: flex; flex-direction: column; gap: 8px; max-width: 350px; }
        .ra-input-group label { font-size: 13px; font-weight: 500; color: #374151; }
        
        .ra-date-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #fff;
            padding: 0 12px;
            height: 40px;
        }
        .ra-date-wrapper svg { color: #6b7280; width: 18px; height: 18px; margin-right: 10px; }
        .ra-date-wrapper input { 
            border: none; outline: none; font-size: 14px; color: #111827; 
            background: transparent; font-family: inherit; width: 100%; 
        }
        
        .ra-actions { display: flex; gap: 12px; margin-top: 16px; }
        
        .ra-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid #d1d5db;
            background: #fff;
            color: #374151;
            height: 40px;
        }
        .ra-btn:hover { background: #f9fafb; }
        .ra-btn-primary { background: #10b981; color: #fff; border-color: #10b981; }
        .ra-btn-primary:hover { background: #059669; border-color: #059669; }
        
        /* Report Title Area */
        .ra-report-title-area {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
            margin-bottom: 0;
        }
        .ra-report-title-area h3 { margin: 0 0 4px 0; font-size: 18px; font-weight: 600; color: #111827; }
        .ra-report-title-area p { margin: 0; font-size: 13px; color: #6b7280; }

        /* Table */
        .ra-table-wrapper {
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 6px 6px;
            overflow: hidden;
            max-height: 500px;
            overflow-y: auto;
        }
        .ra-table { width: 100%; border-collapse: collapse; text-align: left; }
        .ra-table th, .ra-table td { padding: 16px; border-bottom: 1px solid #e5e7eb; }
        .ra-table th { 
            background: #f9fafb; font-weight: 500; color: #4b5563; font-size: 13px; 
            position: sticky; top: 0; z-index: 10;
        }
        
        /* Table Footer / Totals */
        .ra-table tfoot td {
            background: #f3f4f6;
            font-weight: 600;
            color: #111827;
            border-bottom: none;
            border-top: 2px solid #e5e7eb;
            position: sticky;
            bottom: 0;
            z-index: 10;
        }

        .ra-table tbody tr:hover { background: #f9fafb; }
        
        .ra-text-right { text-align: right; }
        .ra-font-bold { font-weight: 600; color: #111827; }
        
        /* Empty State */
        .ra-empty { text-align: center; padding: 40px; color: #6b7280; }
    </style>

    <!-- Page Header -->
    <div class="ra-header">
        <h2>Reports</h2>
        <p>Generate and analyze aging reports, tax summaries, and customer/vendor balances to track cash flows.</p>
    </div>

    <!-- Main Card -->
    <div class="ra-card">
        <!-- Tabs -->
        <div class="ra-tabs">
            <button class="ra-tab active" data-tab="invoice-aging">Invoice Aging</button>
            <button class="ra-tab" data-tab="bill-aging">Bill Aging</button>
            <button class="ra-tab" data-tab="tax-summary">Tax Summary</button>
            <button class="ra-tab" data-tab="customer-balance">Customer Balance</button>
            <button class="ra-tab" data-tab="vendor-balance">Vendor Balance</button>
        </div>

        <!-- Content -->
        <div class="ra-content">
            <!-- Filter Section -->
            <div class="ra-filter-section">
                <div class="ra-input-group">
                    <label>As Of Date</label>
                    <div class="ra-date-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <input type="date" id="ra-date-input" value="2026-12-31">
                    </div>
                </div>
                
                <div class="ra-actions">
                    <button class="ra-btn ra-btn-primary" id="ra-generate-btn">Generate</button>
                    <button class="ra-btn" id="ra-download-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Download PDF
                    </button>
                </div>
            </div>

            <!-- Report Title Area -->
            <div class="ra-report-title-area">
                <h3 id="ra-dynamic-title">Invoice Aging Report</h3>
                <p>As of <span id="ra-dynamic-date">2026-12-31</span></p>
            </div>

            <!-- Table -->
            <div class="ra-table-wrapper">
                <table class="ra-table">
                    <thead id="ra-table-head">
                        <!-- Headers injected dynamically -->
                    </thead>
                    <tbody id="ra-table-body">
                        <!-- Rows injected dynamically -->
                    </tbody>
                    <tfoot id="ra-table-foot">
                        <!-- Totals injected dynamically -->
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Exact data from screenshot plus the extra row
            const mockData = {
                "invoice-aging": {
                    title: "Invoice Aging Report",
                    headers: ["Customer", "Current", "1-30 Days", "31-60 Days", "61-90 Days", ">90 Days", "Total"],
                    rows: [
                        { customer: "Lisa Anderson", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 623.98, total: 623.98 },
                        { customer: "Michelle Hall", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 2093.85, total: 2093.85 },
                        { customer: "Ashley Lewis", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 413.40, total: 413.40 },
                        { customer: "Jennifer Martinez", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 1770.00, total: 1770.00 },
                        { customer: "Amanda White", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 531.00, total: 531.00 },
                        { customer: "Sarah Johnson", current: 0.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 3075.25, total: 3075.25 }
                    ]
                },
                "bill-aging": {
                    title: "Bill Aging Report",
                    headers: ["Vendor", "Current", "1-30 Days", "31-60 Days", "61-90 Days", ">90 Days", "Total"],
                    rows: [
                        { customer: "Tech Solutions Inc", current: 0.00, d30: 1500.00, d60: 0.00, d90: 0.00, d90plus: 0.00, total: 1500.00 },
                        { customer: "Office Supplies Co", current: 250.00, d30: 0.00, d60: 0.00, d90: 0.00, d90plus: 0.00, total: 250.00 },
                        { customer: "Cloud Hosting LLC", current: 0.00, d30: 0.00, d60: 850.00, d90: 0.00, d90plus: 0.00, total: 850.00 }
                    ]
                }
                // Other tabs can remain simplified or use the same structure
            };

            // Helper: Format Currency
            const formatMoney = (val) => {
                if (val === null || val === undefined) return "-";
                return "$" + Number(val).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            };

            // DOM Elements
            const tabs = document.querySelectorAll('.ra-tab');
            const tableHead = document.getElementById('ra-table-head');
            const tableBody = document.getElementById('ra-table-body');
            const tableFoot = document.getElementById('ra-table-foot');
            const dynamicTitle = document.getElementById('ra-dynamic-title');
            const dateInput = document.getElementById('ra-date-input');
            const dynamicDate = document.getElementById('ra-dynamic-date');

            let currentTab = 'invoice-aging';

            // Render Function
            const renderReport = (tabKey) => {
                const data = mockData[tabKey];
                if (!data) {
                    tableHead.innerHTML = '';
                    tableBody.innerHTML = `<tr><td colspan="7" class="ra-empty">Report not configured for this demo tab.</td></tr>`;
                    tableFoot.innerHTML = '';
                    return;
                }

                // Update Titles
                dynamicTitle.textContent = data.title;
                dynamicDate.textContent = dateInput.value || "No date selected";

                // Render Headers
                tableHead.innerHTML = `<tr>${data.headers.map((h, i) => 
                    `<th class="${i > 0 ? 'ra-text-right' : ''}">${h}</th>`
                ).join('')}</tr>`;

                // Initialize Totals
                let totals = { current: 0, d30: 0, d60: 0, d90: 0, d90plus: 0, total: 0 };

                // Render Rows & Calculate Totals
                tableBody.innerHTML = data.rows.map(row => {
                    // Add to totals
                    totals.current += row.current;
                    totals.d30 += row.d30;
                    totals.d60 += row.d60;
                    totals.d90 += row.d90;
                    totals.d90plus += row.d90plus;
                    totals.total += row.total;

                    return `<tr>
                        <td>${row.customer}</td>
                        <td class="ra-text-right">${formatMoney(row.current)}</td>
                        <td class="ra-text-right">${formatMoney(row.d30)}</td>
                        <td class="ra-text-right">${formatMoney(row.d60)}</td>
                        <td class="ra-text-right">${formatMoney(row.d90)}</td>
                        <td class="ra-text-right">${formatMoney(row.d90plus)}</td>
                        <td class="ra-text-right ra-font-bold">${formatMoney(row.total)}</td>
                    </tr>`;
                }).join('');

                // Render Footer Totals
                tableFoot.innerHTML = `<tr>
                    <td>Total</td>
                    <td class="ra-text-right">${formatMoney(totals.current)}</td>
                    <td class="ra-text-right">${formatMoney(totals.d30)}</td>
                    <td class="ra-text-right">${formatMoney(totals.d60)}</td>
                    <td class="ra-text-right">${formatMoney(totals.d90)}</td>
                    <td class="ra-text-right">${formatMoney(totals.d90plus)}</td>
                    <td class="ra-text-right">${formatMoney(totals.total)}</td>
                </tr>`;
            };

            // Tab Switching Logic
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    currentTab = tab.getAttribute('data-tab');
                    renderReport(currentTab);
                });
            });

            // Generate Button Logic
            document.getElementById('ra-generate-btn').addEventListener('click', () => {
                renderReport(currentTab);
            });

            // PDF Download Logic (Simulated)
            document.getElementById('ra-download-btn').addEventListener('click', () => {
                const btn = document.getElementById('ra-download-btn');
                const originalText = btn.innerHTML;
                btn.innerHTML = `Generating...`;
                setTimeout(() => {
                    btn.innerHTML = originalText;
                }, 800);
            });

            // Initialize
            renderReport(currentTab);
        });
    </script>
</section>