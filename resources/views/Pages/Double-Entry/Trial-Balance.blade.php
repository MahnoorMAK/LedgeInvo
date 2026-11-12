@extends('Layout.dashboard')

@section('title', 'Trial Balance')
@section('content')
<section id="trial-balance-app">
    <style>
        /* Base & Reset */
        #trial-balance-app {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: #333;
            background: #fff;
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
            font-size: 14px;
            box-sizing: border-box;
        }
        #trial-balance-app * { box-sizing: border-box; }
        
        /* Header */
        .tb-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .tb-title h2 { margin: 0 0 6px 0; font-size: 20px; font-weight: 600; color: #111; }
        .tb-title p { margin: 0; color: #6b7280; font-size: 13px; }
        
        /* Buttons */
        .tb-btn { padding: 8px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; color: #374151; }
        .tb-btn:hover { background: #f9fafb; }
        .tb-btn-primary { background: #10b981; color: white; border-color: #10b981; }
        .tb-btn-primary:hover { background: #059669; border-color: #059669; }

        /* Filters Box */
        .tb-filter-box { border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 24px; background: #fff; box-shadow: 0 1px 2px rgba(0,0,0,0.02); }
        .tb-filter-grid { display: flex; gap: 16px; align-items: flex-end; }
        .tb-input-group { display: flex; flex-direction: column; gap: 6px; flex: 1; }
        .tb-input-group label { font-size: 12px; color: #4b5563; font-weight: 500; }
        .tb-date-wrapper { position: relative; display: flex; align-items: center; border: 1px solid #d1d5db; border-radius: 6px; background: #fff; padding: 0 12px; }
        .tb-date-wrapper svg { color: #6b7280; width: 16px; height: 16px; margin-right: 8px; }
        .tb-date-wrapper input { border: none; outline: none; padding: 9px 0; font-size: 13px; width: 100%; color: #374151; background: transparent; font-family: inherit; }
        
        /* Summary Cards */
        .tb-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
        .tb-card { border-radius: 8px; padding: 20px; display: flex; justify-content: space-between; align-items: flex-start; border: 1px solid transparent; }
        .tb-card-debit { background: #fef2f2; border-color: #fee2e2; }
        .tb-card-credit { background: #ecfdf5; border-color: #d1fae5; }
        .tb-card-status { background: #f0fdfa; border-color: #ccfbf1; }
        
        .tb-card-content h4 { margin: 0 0 8px 0; font-size: 13px; font-weight: 500; }
        .tb-card-debit h4 { color: #991b1b; }
        .tb-card-credit h4 { color: #065f46; }
        .tb-card-status h4 { color: #0f766e; }
        
        .tb-card-content h2 { margin: 0 0 6px 0; font-size: 24px; font-weight: 600; }
        .tb-card-debit h2 { color: #b91c1c; }
        .tb-card-credit h2 { color: #047857; }
        .tb-card-status h2 { color: #0f766e; }
        
        .tb-card-content p { margin: 0; font-size: 12px; opacity: 0.8; }
        .tb-card-debit p { color: #7f1d1d; }
        .tb-card-credit p { color: #064e3b; }
        .tb-card-status p { color: #115e59; }

        .tb-card-icon { display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; }
        .tb-card-debit .tb-card-icon { background: #fee2e2; color: #dc2626; }
        .tb-card-credit .tb-card-icon { background: #d1fae5; color: #059669; }
        .tb-card-status .tb-card-icon { background: #ccfbf1; color: #0d9488; }

        /* Table */
        .tb-table-wrapper { 
            border: 1px solid #e5e7eb; 
            border-radius: 8px; 
            overflow: hidden; 
            max-height: 400px; 
            overflow-y: auto; 
            position: relative;
        }
        .tb-table { width: 100%; border-collapse: collapse; text-align: left; }
        .tb-table th, .tb-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; }
        
        /* Sticky Header */
        .tb-table thead th { 
            background: #f9fafb; 
            font-weight: 500; 
            color: #4b5563; 
            font-size: 12px; 
            position: sticky; 
            top: 0; 
            z-index: 10; 
            box-shadow: 0 1px 0 #e5e7eb;
        }
        
        .tb-table tbody tr:hover { background: #f9fafb; }
        
        /* Footer / Totals Row - NOT sticky */
        .tb-table tfoot td { 
            background: #f9fafb; 
            font-weight: 600; 
            border-top: 2px solid #e5e7eb; 
            border-bottom: none;
            color: #111;
        }
        
        /* Account Code Badges */
        .tb-badge { display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; font-family: monospace; }
        .tb-badge-pink { background: #fdf2f8; color: #be185d; border: 1px solid #fce7f3; }
        .tb-badge-green { background: #f0fdf4; color: #15803d; border: 1px solid #dcfce7; }
        .tb-badge-purple { background: #f5f3ff; color: #6d28d9; border: 1px solid #ede9fe; }
        .tb-badge-orange { background: #fff7ed; color: #c2410c; border: 1px solid #ffedd5; }
        .tb-badge-yellow { background: #fefce8; color: #a16207; border: 1px solid #fef08a; }
        .tb-badge-teal { background: #f0fdfa; color: #0f766e; border: 1px solid #ccfbf1; }
        .tb-badge-lightpink { background: #fdf2f8; color: #9d174d; border: 1px solid #fbcfe8; }
        .tb-badge-blue { background: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; }

        .tb-text-right { text-align: right; }
        .tb-text-red { color: #dc2626; font-weight: 500; }
        .tb-text-green { color: #16a34a; font-weight: 500; }
        .tb-text-muted { color: #9ca3af; }

        /* Toast Notification */
        .tb-toast { visibility: hidden; min-width: 250px; background-color: #333; color: #fff; text-align: center; border-radius: 4px; padding: 12px; position: fixed; z-index: 1000; bottom: 30px; left: 50%; transform: translateX(-50%); font-size: 14px; opacity: 0; transition: opacity 0.3s, visibility 0.3s; }
        .tb-toast.show { visibility: visible; opacity: 1; }
    </style>

    <!-- Header -->
    <div class="tb-header">
        <div class="tb-title">
            <h2>Trial Balance</h2>
            <p>Verify the mathematical accuracy of your double-entry accounting records for the selected period.</p>
        </div>
        <button class="tb-btn" id="tb-download-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            Download PDF
        </button>
    </div>

    <!-- Filters -->
    <div class="tb-filter-box">
        <div class="tb-filter-grid">
            <div class="tb-input-group">
                <label>From Date</label>
                <div class="tb-date-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <input type="date" id="tb-from-date" value="2026-01-01">
                </div>
            </div>
            <div class="tb-input-group">
                <label>To Date</label>
                <div class="tb-date-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <input type="date" id="tb-to-date" value="2026-12-31">
                </div>
            </div>
            <button class="tb-btn tb-btn-primary" id="tb-generate-btn" style="height: 38px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                Generate
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="tb-cards">
        <div class="tb-card tb-card-debit">
            <div class="tb-card-content">
                <h4>Total Debit</h4>
                <h2 id="tb-total-debit">$0.00</h2>
                <p>Total debited amount</p>
            </div>
            <div class="tb-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
            </div>
        </div>
        <div class="tb-card tb-card-credit">
            <div class="tb-card-content">
                <h4>Total Credit</h4>
                <h2 id="tb-total-credit">$0.00</h2>
                <p>Total credited amount</p>
            </div>
            <div class="tb-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>
            </div>
        </div>
        <div class="tb-card tb-card-status" id="tb-balance-card">
            <div class="tb-card-content">
                <h4>Balance Status</h4>
                <h2 id="tb-balance-status">Balanced</h2>
                <p id="tb-balance-subtext">All accounts are balanced</p>
            </div>
            <div class="tb-card-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="tb-table-wrapper">
        <table class="tb-table">
            <thead>
                <tr>
                    <th style="width: 15%;">Account Code</th>
                    <th style="width: 45%;">Account Name</th>
                    <th class="tb-text-right" style="width: 20%;">Debit</th>
                    <th class="tb-text-right" style="width: 20%;">Credit</th>
                </tr>
            </thead>
            <tbody id="tb-table-body">
                <!-- Rows injected via JS -->
            </tbody>
            <tfoot>
                <tr>
                    <!-- Removed the empty first cell so "Total" aligns under Account Name -->
                    <td colspan="2" style="text-align: left; padding-left: 16px;">Total</td>
                    <td class="tb-text-right tb-text-red" id="tb-foot-debit">$0.00</td>
                    <td class="tb-text-right tb-text-green" id="tb-foot-credit">$0.00</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Toast -->
    <div id="tb-toast" class="tb-toast"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mock Data based on screenshots
            const ledgerData = [
                { code: "1000", name: "Cash", debit: 69176.25, credit: null, badge: "tb-badge-pink" },
                { code: "1005", name: "Petty Cash", debit: null, credit: 16160.78, badge: "tb-badge-green" },
                { code: "1010", name: "Bank Account - Main", debit: 42078.33, credit: null, badge: "tb-badge-pink" },
                { code: "1020", name: "Bank Account - Savings", debit: 19179.20, credit: null, badge: "tb-badge-purple" },
                { code: "1100", name: "Accounts Receivable", debit: 8125.70, credit: null, badge: "tb-badge-orange" },
                { code: "1200", name: "Inventory", debit: 10991.00, credit: null, badge: "tb-badge-yellow" },
                { code: "1500", name: "Tax Receivable (VAT/GST Input)", debit: 5956.65, credit: null, badge: "tb-badge-teal" },
                { code: "2000", name: "Accounts Payable", debit: null, credit: 14560.25, badge: "tb-badge-lightpink" },
                { code: "4200", name: "Service Revenue", debit: null, credit: 8900.00, badge: "tb-badge-lightpink" },
                { code: "5100", name: "Cost of Goods Sold", debit: 6804.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5300", name: "Rent Expense", debit: 2000.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5310", name: "Office Supplies", debit: 800.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5320", name: "Marketing Expense", debit: 1200.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5330", name: "Travel Expense", debit: 850.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5400", name: "Utilities Expense", debit: 1380.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5430", name: "Depreciation Expense", debit: 1650.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "5510", name: "Bank Charges", debit: 163.00, credit: null, badge: "tb-badge-lightpink" },
                { code: "2100", name: "Accrued Liabilities", debit: null, credit: 130733.10, badge: "tb-badge-blue" }
            ];

            // DOM Elements
            const tbody = document.getElementById('tb-table-body');
            const totalDebitEl = document.getElementById('tb-total-debit');
            const totalCreditEl = document.getElementById('tb-total-credit');
            const footDebitEl = document.getElementById('tb-foot-debit');
            const footCreditEl = document.getElementById('tb-foot-credit');
            const balanceStatusEl = document.getElementById('tb-balance-status');
            const balanceSubtextEl = document.getElementById('tb-balance-subtext');
            const balanceCard = document.getElementById('tb-balance-card');
            const toastEl = document.getElementById('tb-toast');
            const fromDateInput = document.getElementById('tb-from-date');
            const toDateInput = document.getElementById('tb-to-date');

            // Helper: Format Currency
            const formatMoney = (val) => {
                if (val === null || val === undefined) return "-";
                return "$" + val.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            };

            // Helper: Show Toast
            const showToast = (msg) => {
                toastEl.textContent = msg;
                toastEl.className = "tb-toast show";
                setTimeout(() => { toastEl.className = toastEl.className.replace("show", ""); }, 3000);
            };

            // Function: Render Table and Calculate Totals
            const renderData = (data) => {
                tbody.innerHTML = '';
                let sumDebit = 0;
                let sumCredit = 0;

                data.forEach(row => {
                    if (row.debit) sumDebit += row.debit;
                    if (row.credit) sumCredit += row.credit;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><span class="tb-badge ${row.badge}">${row.code}</span></td>
                        <td style="color:#374151;">${row.name}</td>
                        <td class="tb-text-right ${row.debit ? 'tb-text-red' : 'tb-text-muted'}">${formatMoney(row.debit)}</td>
                        <td class="tb-text-right ${row.credit ? 'tb-text-green' : 'tb-text-muted'}">${formatMoney(row.credit)}</td>
                    `;
                    tbody.appendChild(tr);
                });

                const formattedDebit = formatMoney(sumDebit);
                const formattedCredit = formatMoney(sumCredit);

                // Update Cards
                totalDebitEl.textContent = formattedDebit;
                totalCreditEl.textContent = formattedCredit;
                
                // Update Footer Row
                footDebitEl.textContent = formattedDebit;
                footCreditEl.textContent = formattedCredit;

                // Balance Status
                const diff = Math.abs(sumDebit - sumCredit);
                if (diff < 0.01) {
                    balanceStatusEl.textContent = "Balanced";
                    balanceSubtextEl.textContent = "All accounts are balanced";
                    balanceStatusEl.style.color = "#0f766e";
                    balanceCard.style.background = "#f0fdfa";
                    balanceCard.style.borderColor = "#ccfbf1";
                } else {
                    balanceStatusEl.textContent = "Out of Balance";
                    balanceSubtextEl.textContent = `Difference: ${formatMoney(diff)}`;
                    balanceStatusEl.style.color = "#b91c1c";
                    balanceCard.style.background = "#fef2f2";
                    balanceCard.style.borderColor = "#fee2e2";
                }
            };

            // Event: Generate Button
            document.getElementById('tb-generate-btn').addEventListener('click', () => {
                const fromVal = fromDateInput.value;
                const toVal = toDateInput.value;

                if (!fromVal || !toVal) {
                    showToast("Please select both From and To dates.");
                    return;
                }

                if (new Date(fromVal) > new Date(toVal)) {
                    showToast("Error: 'From Date' cannot be after 'To Date'.");
                    return;
                }

                showToast(`Generating report for: ${fromVal} to ${toVal}...`);
                
                const btn = document.getElementById('tb-generate-btn');
                btn.style.opacity = '0.7';
                
                setTimeout(() => {
                    const randomFactor = Math.random() * 500;
                    const newData = JSON.parse(JSON.stringify(ledgerData));
                    
                    newData[0].debit = 69176.25 + randomFactor; 
                    newData[newData.length - 1].credit = 130733.10 + randomFactor;

                    renderData(newData);
                    btn.style.opacity = '1';
                    showToast("Report generated successfully.");
                }, 600);
            });

            // Event: Download PDF
            document.getElementById('tb-download-btn').addEventListener('click', () => {
                showToast("Preparing PDF document... Check your downloads.");
            });

            // Initialize View
            renderData(ledgerData);
        });
    </script>
</section>
@endsection