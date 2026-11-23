{{-- resources/views/Layout/Sidebar.blade.php --}}

<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="sidebar-container">
 
    <!-- Search Bar with Icon -->
    <div class="sidebar-search-wrapper">
        <svg class="sidebar-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="21" y1="21" x2="15.5" y2="15.5"></line>
        </svg>
        <input type="text" class="sidebar-search-box" placeholder="Search menu...">
    </div>

    <ul class="sidebar-menu-list">
        
        <!-- ================= OVERVIEW ================= -->
        <li class="title">Overview</li>
        
        <!-- Dashboard Dropdown -->
        <li class="menu-item has-submenu {{ request()->is('dashboard*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            Dashboard 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('dashboard/account') ? 'active' : '' }}">
                    <a href="{{ url('/dashboard/account') }}">Account Dashboard</a>
                </li>
            </ul>
        </li>

        <!-- ================= SALES & REVENUE ================= -->
        <li class="title">Sales & Revenue</li>
        
        <li class="menu-item {{ request()->is('proposal*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <a href="{{ url('/proposal') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Proposal</a>
        </li>

        <li class="menu-item has-submenu {{ request()->is('sales-invoice*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1z"></path><line x1="8" y1="8" x2="16" y2="8"></line><line x1="8" y1="12" x2="16" y2="12"></line><line x1="8" y1="16" x2="12" y2="16"></line></svg>
            Sales Invoice 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('sales-invoice') ? 'active' : '' }}"><a href="{{ url('/sales-invoice') }}">Sales Invoice</a></li>
                <li class="sub-item {{ request()->is('sales-invoice-returns') ? 'active' : '' }}"><a href="{{ url('/sales-invoice-returns') }}">Sales Invoice Returns</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('retainer*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
            Retainer 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('retainer') ? 'active' : '' }}"><a href="{{ url('/retainer') }}">Retainers</a></li>
                <li class="sub-item {{ request()->is('retainer-payments') ? 'active' : '' }}"><a href="{{ url('/retainer-payments') }}">Retainer Payments</a></li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('contract*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
            <a href="{{ url('/contract') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Contract</a>
        </li>

        <!-- ================= PURCHASE & INVENTORY ================= -->
        <li class="title">Purchase & Inventory</li>
        
        <li class="menu-item has-submenu {{ request()->is('purchase*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            Purchase 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('purchase-invoice') ? 'active' : '' }}"><a href="{{ url('/purchase-invoice') }}">Purchase Invoice</a></li>
                <li class="sub-item {{ request()->is('purchase-returns') ? 'active' : '' }}"><a href="{{ url('/purchase-returns') }}">Purchase Returns</a></li>
                <li class="sub-item {{ request()->is('warehouses') ? 'active' : '' }}"><a href="{{ url('/warehouses') }}">Warehouses</a></li>
                <li class="sub-item {{ request()->is('transfers') ? 'active' : '' }}"><a href="{{ url('/transfers') }}">Transfers</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('product*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            Product & Service 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('items') ? 'active' : '' }}"><a href="{{ url('/items') }}">Items</a></li>
                <li class="sub-item {{ request()->is('system-setup') ? 'active' : '' }}"><a href="{{ url('/system-setup') }}">System Setup</a></li>
            </ul>
        </li>

        <!-- ================= ACCOUNTING & FINANCE ================= -->
        <li class="title">Accounting & Finance</li>
        
        <li class="menu-item has-submenu {{ request()->is('accounting*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="16" y1="14" x2="16" y2="18"></line><path d="M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01"></path></svg>
            Accounting 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('accounting/customers') ? 'active' : '' }}"><a href="{{ url('/accounting/customers') }}">Customers</a></li>
                <li class="sub-item {{ request()->is('accounting/vendors') ? 'active' : '' }}"><a href="{{ url('/accounting/vendors') }}">Vendors</a></li>
                <li class="sub-item {{ request()->is('accounting/revenue') ? 'active' : '' }}"><a href="{{ url('/accounting/revenue') }}">Revenue</a></li>
                <li class="sub-item {{ request()->is('accounting/expense') ? 'active' : '' }}"><a href="{{ url('/accounting/expense') }}">Expense</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('banking*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11m16-11v11M8 14v3m4-3v3m4-3v3"></path></svg>
            Banking 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('banking/accounts') ? 'active' : '' }}"><a href="{{ url('/banking/accounts') }}">Bank Accounts</a></li>
                <li class="sub-item {{ request()->is('banking/transactions') ? 'active' : '' }}"><a href="{{ url('/banking/transactions') }}">Bank Transactions</a></li>
                <li class="sub-item {{ request()->is('banking/transfers') ? 'active' : '' }}"><a href="{{ url('/banking/transfers') }}">Bank Transfers</a></li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('customer-payments*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            <a href="{{ url('/customer-payments') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Customer Payments</a>
        </li>
        
        <li class="menu-item {{ request()->is('vendor-payments*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            <a href="{{ url('/vendor-payments') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Vendor Payments</a>
        </li>

        <li class="menu-item {{ request()->is('debit-notes*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <a href="{{ url('/debit-notes') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Debit Notes</a>
        </li>

        <li class="menu-item {{ request()->is('credit-notes*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1z"></path><line x1="8" y1="8" x2="16" y2="8"></line><line x1="8" y1="12" x2="16" y2="12"></line><line x1="8" y1="16" x2="12" y2="16"></line></svg>
            <a href="{{ url('/credit-notes') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Credit Notes</a>
        </li>

        <li class="menu-item {{ request()->is('reports*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            <a href="{{ url('/reports') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Reports</a>
        </li>

        <li class="menu-item {{ request()->is('chart-of-accounts*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
            <a href="{{ url('/chart-of-accounts') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Chart Of Accounts</a>
        </li>

        <li class="menu-item {{ request()->is('system-setup*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <a href="{{ url('/system-setup') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">System Setup</a>
        </li>

        <li class="menu-item has-submenu {{ request()->is('goal*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
            Goal 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('goal/goals') ? 'active' : '' }}"><a href="{{ url('/goal/goals') }}">Goals</a></li>
                <li class="sub-item {{ request()->is('goal/milestones') ? 'active' : '' }}"><a href="{{ url('/goal/milestones') }}">Milestones</a></li>
                <li class="sub-item {{ request()->is('goal/contributions') ? 'active' : '' }}"><a href="{{ url('/goal/contributions') }}">Contributions</a></li>
                <li class="sub-item {{ request()->is('goal/tracking') ? 'active' : '' }}"><a href="{{ url('/goal/tracking') }}">Tracking</a></li>
                <li class="sub-item {{ request()->is('goal/category') ? 'active' : '' }}"><a href="{{ url('/goal/category') }}">Category</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('budget*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path><path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path></svg>
            Budget Planner 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('budget/periods') ? 'active' : '' }}"><a href="{{ url('/budget/periods') }}">Budget Periods</a></li>
                <li class="sub-item {{ request()->is('budget/budget') ? 'active' : '' }}"><a href="{{ url('/budget/budget') }}">Budget</a></li>
                <li class="sub-item {{ request()->is('budget/allocations') ? 'active' : '' }}"><a href="{{ url('/budget/allocations') }}">Budget Allocations</a></li>
                <li class="sub-item {{ request()->is('budget/monitoring') ? 'active' : '' }}"><a href="{{ url('/budget/monitoring') }}">Budget Monitoring</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('double-entry*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            Double Entry 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('double-entry/ledger') ? 'active' : '' }}"><a href="{{ url('/double-entry/ledger') }}">Ledger Summary</a></li>
                <li class="sub-item {{ request()->is('double-entry/trial-balance') ? 'active' : '' }}"><a href="{{ url('/double-entry/trial-balance') }}">Trial Balance</a></li>
                <li class="sub-item {{ request()->is('double-entry/balance-sheets') ? 'active' : '' }}"><a href="{{ url('/double-entry/balance-sheets') }}">Balance Sheets</a></li>
                <li class="sub-item {{ request()->is('double-entry/profit-loss') ? 'active' : '' }}"><a href="{{ url('/double-entry/profit-loss') }}">Profit & Loss</a></li>
                <li class="sub-item {{ request()->is('double-entry/reports') ? 'active' : '' }}"><a href="{{ url('/double-entry/reports') }}">Reports</a></li>
            </ul>
        </li>

        <li class="menu-item has-submenu {{ request()->is('assets*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            Assets 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('assets/list') ? 'active' : '' }}"><a href="{{ url('/assets/list') }}">Assets</a></li>
                <li class="sub-item {{ request()->is('assets/assignments') ? 'active' : '' }}"><a href="{{ url('/assets/assignments') }}">Assignments</a></li>
                <li class="sub-item {{ request()->is('assets/locations') ? 'active' : '' }}"><a href="{{ url('/assets/locations') }}">Locations</a></li>
                <li class="sub-item {{ request()->is('assets/maintenance') ? 'active' : '' }}"><a href="{{ url('/assets/maintenance') }}">Maintenance</a></li>
                <li class="sub-item {{ request()->is('assets/depreciation') ? 'active' : '' }}"><a href="{{ url('/assets/depreciation') }}">Depreciation</a></li>
                <li class="sub-item {{ request()->is('assets/category') ? 'active' : '' }}"><a href="{{ url('/assets/category') }}">Category</a></li>
            </ul>
        </li>

        <!-- ================= CONTENT & PAGES ================= -->
        <li class="title">Content & Pages</li>
        
        <li class="menu-item has-submenu {{ request()->is('cms*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            CMS 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('cms/landing') ? 'active' : '' }}"><a href="{{ url('/cms/landing') }}">Landing Page</a></li>
                <li class="sub-item {{ request()->is('cms/custom') ? 'active' : '' }}"><a href="{{ url('/cms/custom') }}">Custom Pages</a></li>
                <li class="sub-item {{ request()->is('cms/newsletter') ? 'active' : '' }}"><a href="{{ url('/cms/newsletter') }}">Newsletter Subscribers</a></li>
            </ul>
        </li>

        <!-- ================= COMMUNICATION ================= -->
        <li class="title">Communication</li>
        
        <li class="menu-item {{ request()->is('messenger*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
            <a href="{{ url('/messenger') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Messenger</a>
        </li>
        <li class="menu-item {{ request()->is('email-templates*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            <a href="{{ url('/email-templates') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Email Templates</a>
        </li>
        <li class="menu-item {{ request()->is('notification-templates*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <a href="{{ url('/notification-templates') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Notification Templates</a>
        </li>

        <!-- ================= SYSTEM ================= -->
        <li class="title">System</li>
        
        <li class="menu-item has-submenu {{ request()->is('users*') ? 'open active' : '' }}">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            User Management 
            <svg class="arrow-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            <ul class="submenu">
                <li class="sub-item {{ request()->is('users/roles') ? 'active' : '' }}"><a href="{{ url('/users/roles') }}">Roles</a></li>
                <li class="sub-item {{ request()->is('users/list') ? 'active' : '' }}"><a href="{{ url('/users/list') }}">Users</a></li>
            </ul>
        </li>
        
        <li class="menu-item {{ request()->is('media*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
            <a href="{{ url('/media') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Media Library</a>
        </li>
        
        <li class="menu-item {{ request()->is('Settings*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
            <a href="{{ url('/Settings') }}" style="color: inherit; text-decoration: none; width: 100%; display: block;">Settings</a>
        </li>
    </ul>
</div>