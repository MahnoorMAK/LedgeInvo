@extends('layout.dashboard')
@section('title', 'Reports - LedgeInvo')
@section('content')
<section id="reports-section">
    <style>
        /* Scoped CSS for Reports Section */
        #reports-section {
            --primary: #10b981;
            --primary-hover: #059669;
            --border-color: #e5e7eb;
            --text-main: #111827;
            --text-muted: #6b7280;
            --bg-gray: #f9fafb;

            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background: #ffffff;
            box-sizing: border-box;
        }

        #reports-section * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #reports-section .page-header {
            margin-bottom: 1.5rem;
        }

        #reports-section .page-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        #reports-section .page-header p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        #reports-section .main-container {
            background: white;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        #reports-section .tabs-container {
            padding: 1rem;
            background: var(--bg-gray);
            border-bottom: 1px solid var(--border-color);
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        #reports-section .tabs {
            display: flex;
            background: white;
            border-radius: 0.375rem;
            border: 1px solid var(--border-color);
            overflow: hidden;
            width: fit-content;
        }

        #reports-section .tab {
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            background: white;
            border-right: 1px solid var(--border-color);
            transition: all 0.2s;
        }

        #reports-section .tab:last-child {
            border-right: none;
        }

        #reports-section .tab:hover {
            background: var(--bg-gray);
        }

        #reports-section .tab.active {
            background: white;
            color: var(--text-main);
            box-shadow: inset 0 -2px 0 var(--primary);
        }

        #reports-section .toolbar {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        #reports-section .toolbar label {
            font-size: 0.875rem;
            color: var(--text-main);
            font-weight: 500;
        }

        #reports-section .toolbar-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        #reports-section .date-input-wrapper {
            position: relative;
            width: 300px;
            max-width: 100%;
        }

        #reports-section .date-input-wrapper span {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
        }

        #reports-section .date-input-wrapper input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.2rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            outline: none;
            color: var(--text-main);
            font-family: inherit;
        }

        #reports-section .date-input-wrapper input:focus {
            border-color: var(--primary);
        }

        #reports-section .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.55rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        #reports-section .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        #reports-section .btn-outline {
            background-color: transparent;
            color: var(--text-main);
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.2s;
        }

        #reports-section .btn-outline:hover {
            color: var(--primary);
        }

        #reports-section .report-title-area {
            padding: 1.5rem;
            background: white;
            border-bottom: 1px solid var(--border-color);
        }

        #reports-section .report-title-area h2 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
        }

        #reports-section .report-title-area p {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        #reports-section .table-container {
            overflow-x: auto;
            background: white;
        }

        #reports-section table {
            width: 100%;
            border-collapse: collapse;
            text-align: right;
        }

        #reports-section th {
            background-color: var(--bg-gray);
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        #reports-section th:first-child {
            text-align: left;
        }

        #reports-section td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
            color: var(--text-main);
        }

        #reports-section td:first-child {
            text-align: left;
            font-weight: 500;
        }

        #reports-section tr.total-row {
            background-color: var(--bg-gray);
            font-weight: 600;
        }

        #reports-section tr.total-row td {
            border-top: 2px solid var(--border-color);
            border-bottom: none;
            padding: 1rem;
        }

        #reports-section tr.total-row td:first-child {
            font-weight: 600;
        }

        #reports-section .status-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--text-main);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s;
            pointer-events: none;
            z-index: 1000;
        }

        #reports-section .status-message.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <h1>Reports</h1>
        <p>Generate and analyze aging reports, tax summaries, and customer/vendor balances to track cash flows.</p>
    </div>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Tabs -->
        <div class="tabs-container">
            <div class="tabs">
                <div class="tab active" data-tab="invoice-aging">Invoice Aging</div>
                <div class="tab" data-tab="bill-aging">Bill Aging</div>
                <div class="tab" data-tab="tax-summary">Tax Summary</div>
                <div class="tab" data-tab="customer-balance">Customer Balance</div>
                <div class="tab" data-tab="vendor-balance">Vendor Balance</div>
            </div>
        </div>

        <!-- Toolbar -->
        <div class="toolbar">
            <label>As Of Date</label>
            <div class="toolbar-actions">
                <div class="date-input-wrapper">
                    <span>📅</span>
                    <input type="date" id="reportDate">
                </div>
                <button class="btn-primary" id="generateBtn">Generate</button>
                <button class="btn-outline" id="downloadBtn">
                    <span>🖨️</span> Download PDF
                </button>
            </div>
        </div>

        <!-- Report Title -->
        <div class="report-title-area">
            <h2 id="reportTitle">Invoice Aging Report</h2>
            <p id="reportSubtitle">As of 2026-12-31</p>
        </div>

        <!-- Table Area -->
        <div class="table-container">
            <table>
                <thead id="tableHead"></thead>
                <tbody id="tableBody"></tbody>
                <tfoot id="tableFoot"></tfoot>
            </table>
        </div>
    </div>

    <!-- Toast Notification for Action Feedback -->
    <div class="status-message" id="toast"></div>

    <script>
        (function() {
            const section = document.getElementById('reports-section');

            // --- State ---
            let currentTab = 'invoice-aging';
            const currentDate = new Date().toISOString().split('T')[0];

            // Initialize date input to today
            document.getElementById('reportDate').value = currentDate;

            // --- 1. Deterministic PRNG (Mulberry32) ---
            // Same seed → same output, so refreshing the page will NOT change the data.
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

            // --- 2. Generate 50 Dynamic Entities (deterministic by tab + date) ---
            const firstNames = ["Lisa", "Michelle", "Ashley", "Jennifer", "Amanda", "Sarah", "Jessica", "Emily", "David", "James", "John", "Robert", "Michael", "William", "Richard"];
            const lastNames = ["Anderson", "Hall", "Lewis", "Martinez", "White", "Johnson", "Smith", "Williams", "Brown", "Jones", "Garcia", "Miller", "Davis", "Rodriguez", "Martinez"];

            function generateData(tabType, dateStr) {
                const rand = seededRandom(hashString(tabType + '|' + dateStr));
                let data = [];

                for (let i = 0; i < 50; i++) {
                    const name = `${firstNames[Math.floor(rand() * firstNames.length)]} ${lastNames[Math.floor(rand() * lastNames.length)]}`;

                    if (tabType === 'invoice-aging' || tabType === 'bill-aging') {
                        const current = rand() > 0.8 ? (rand() * 500) : 0;
                        const d30     = rand() > 0.8 ? (rand() * 800) : 0;
                        const d60     = rand() > 0.8 ? (rand() * 1000) : 0;
                        const d90     = rand() > 0.8 ? (rand() * 1500) : 0;
                        const over90  = rand() > 0.4 ? (rand() * 3000 + 100) : 0;
                        const total   = current + d30 + d60 + d90 + over90;
                        data.push({ name, current, d30, d60, d90, over90, total });
                    } else {
                        data.push({ name, balance: rand() * 5000 });
                    }
                }
                return data;
            }

            // --- 3. Formatting Helpers ---
            function formatCurrency(amount) {
                return '$' + amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }

            function showToast(message) {
                const toast = document.getElementById('toast');
                toast.textContent = message;
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 3000);
            }

            // --- 4. Render Functions ---
            function renderTable() {
                const head = document.getElementById('tableHead');
                const body = document.getElementById('tableBody');
                const foot = document.getElementById('tableFoot');
                const reportTitle = document.getElementById('reportTitle');
                const reportSubtitle = document.getElementById('reportSubtitle');

                const selectedDate = document.getElementById('reportDate').value;
                reportSubtitle.textContent = `As of ${selectedDate || currentDate}`;

                const data = generateData(currentTab, selectedDate || currentDate);

                if (currentTab === 'invoice-aging' || currentTab === 'bill-aging') {
                    const label = currentTab === 'invoice-aging' ? 'Customer' : 'Vendor';
                    const titleStr = currentTab === 'invoice-aging' ? 'Invoice Aging Report' : 'Bill Aging Report';

                    reportTitle.textContent = titleStr;

                    head.innerHTML = `
                        <tr>
                            <th>${label}</th>
                            <th>Current</th>
                            <th>1-30 Days</th>
                            <th>31-60 Days</th>
                            <th>61-90 Days</th>
                            <th>&gt;90 Days</th>
                            <th>Total</th>
                        </tr>
                    `;

                    body.innerHTML = '';
                    let totals = { current: 0, d30: 0, d60: 0, d90: 0, over90: 0, total: 0 };

                    data.forEach(item => {
                        if (item.total > 0) {
                            totals.current += item.current;
                            totals.d30 += item.d30;
                            totals.d60 += item.d60;
                            totals.d90 += item.d90;
                            totals.over90 += item.over90;
                            totals.total += item.total;

                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${item.name}</td>
                                <td>${formatCurrency(item.current)}</td>
                                <td>${formatCurrency(item.d30)}</td>
                                <td>${formatCurrency(item.d60)}</td>
                                <td>${formatCurrency(item.d90)}</td>
                                <td>${formatCurrency(item.over90)}</td>
                                <td>${formatCurrency(item.total)}</td>
                            `;
                            body.appendChild(tr);
                        }
                    });

                    foot.innerHTML = `
                        <tr class="total-row">
                            <td>Total</td>
                            <td>${formatCurrency(totals.current)}</td>
                            <td>${formatCurrency(totals.d30)}</td>
                            <td>${formatCurrency(totals.d60)}</td>
                            <td>${formatCurrency(totals.d90)}</td>
                            <td>${formatCurrency(totals.over90)}</td>
                            <td>${formatCurrency(totals.total)}</td>
                        </tr>
                    `;
                } else {
                    reportTitle.textContent = currentTab.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ') + ' Report';

                    head.innerHTML = `
                        <tr>
                            <th>Account Name</th>
                            <th style="text-align: right;">Balance</th>
                        </tr>
                    `;

                    body.innerHTML = '';
                    let totalBalance = 0;

                    data.forEach(item => {
                        totalBalance += item.balance;
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.name}</td>
                            <td>${formatCurrency(item.balance)}</td>
                        `;
                        body.appendChild(tr);
                    });

                    foot.innerHTML = `
                        <tr class="total-row">
                            <td>Total</td>
                            <td>${formatCurrency(totalBalance)}</td>
                        </tr>
                    `;
                }
            }

            // --- 5. Event Listeners ---
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', (e) => {
                    tabs.forEach(t => t.classList.remove('active'));
                    e.target.classList.add('active');
                    currentTab = e.target.getAttribute('data-tab');
                    renderTable();
                });
            });

            document.getElementById('generateBtn').addEventListener('click', () => {
                renderTable();
                showToast('Report generated successfully!');
            });

            document.getElementById('downloadBtn').addEventListener('click', () => {
                showToast('Downloading PDF... (Simulated action)');
            });

            // --- 6. Initialization ---
            renderTable();
        })();
    </script>
</section>
@endsection