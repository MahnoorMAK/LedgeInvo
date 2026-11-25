@extends('layout.dashboard')

@section('title', 'Vendor Payment - LedgeInvo')

@section('content')
<!-- Added style block to force the parent wrapper to remove left/right padding, margins, and set background to white -->
<style>
    /* Aggressively remove padding/margins AND set background to white */
    body, html, body main, .main-content, .content-wrapper, #app, #app > main, .app-content, .content {
        padding: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        background-color: #ffffff !important; /* Forces the background to white */
    }
</style>

<section id="mvp">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        /* Changed background to white and added padding for internal spacing */
        #mvp{
            --primary:#3b82f6;
            --primary-hover:#2563eb;
            --bg:#ffffff; /* Changed from #f9fafb to #ffffff */
            --surface:#fff;
            --border:#e5e7eb;
            --text:#111827;
            --muted:#6b7280;
            --danger:#ef4444;
            font-family:'Inter',sans-serif;
            background:var(--bg);
            color:var(--text);
            padding:24px; /* Added padding so it doesn't touch the very edges */
            display:block;
            width: 100%;
            max-width: 100%;
            margin: 0;
            box-sizing: border-box;
        }
        #mvp *{box-sizing:border-box;margin:0;padding:0}
        #mvp .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.5rem}
        #mvp .page-header h1{font-size:1.5rem;font-weight:600;margin-bottom:.25rem}
        #mvp .page-header p{color:var(--muted);font-size:.875rem}
        #mvp .btn-add{background:var(--primary);color:#fff;border:none;width:40px;height:40px;border-radius:8px;cursor:pointer;display:flex;align-items:center;justify-content:center}
        #mvp .btn-add:hover{background:var(--primary-hover)}
        #mvp .calendar-widget{background:var(--surface);border:1px solid var(--border);border-radius:10px;margin-bottom:1.5rem;overflow:hidden}
        #mvp .calendar-header{display:flex;justify-content:space-between;align-items:center;padding:.5rem 1rem;border-bottom:1px solid var(--border);font-weight:500;font-size:.875rem}
        #mvp .cal-nav-btn{background:none;border:1px solid var(--border);border-radius:50%;width:24px;height:24px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--muted)}
        #mvp .calendar-grid{display:flex;width:100%}
        #mvp .month-btn{flex:1;padding:.5rem 0;background:none;border:none;border-right:1px solid var(--border);cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:.25rem;color:var(--muted)}
        #mvp .month-btn:last-child{border-right:none}
        #mvp .month-btn.active{background:var(--primary);color:#fff}
        #mvp .month-name{font-size:.65rem;text-transform:uppercase}
        #mvp .month-date{font-size:.95rem;font-weight:600}
        #mvp .nav-arrow-col{display:flex;align-items:center;padding:0 .75rem;border-right:1px solid var(--border);cursor:pointer}
        #mvp .nav-arrow-col:last-child{border-right:none;border-left:1px solid var(--border)}
        #mvp .main-card{background:var(--surface);border:1px solid var(--border);border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.05)}
        #mvp .toolbar{display:flex;justify-content:space-between;padding:1rem 1.25rem;border-bottom:1px solid var(--border);gap:1rem;flex-wrap:wrap}
        #mvp .search-group{display:flex;gap:.5rem;flex:0 1 360px;max-width:360px;align-items:center}
        #mvp .search-input{flex:1;min-width:0;padding:.6rem 1rem;border:none;background:#f3f4f6;border-radius:8px;font-size:.875rem;outline:none;font-family:'Inter',sans-serif;color:var(--text)}
        #mvp .search-input:focus{background:#e5e7eb}
        #mvp .btn-search{background:var(--primary);color:#fff;border:none;padding:.6rem 1.25rem;border-radius:8px;cursor:pointer;font-weight:500;font-size:.875rem;font-family:'Inter',sans-serif;white-space:nowrap}
        #mvp .btn-search:hover{background:var(--primary-hover)}
        #mvp .btn-clear{background:#fff;color:#1f2937;border:1px solid var(--border);padding:.6rem 1.25rem;border-radius:8px;cursor:pointer;font-weight:500;font-size:.875rem;font-family:'Inter',sans-serif;white-space:nowrap}
        #mvp .filter-group{display:flex;gap:.75rem;align-items:center}
        #mvp .select-styled,#mvp .btn-filter{padding:.6rem 1rem;border:1px solid var(--border);border-radius:6px;background:#fff;font-size:.875rem;cursor:pointer;outline:none;color:var(--text);font-family:'Inter',sans-serif}
        #mvp .tabs{display:flex;padding:0 1.25rem;border-bottom:1px solid var(--border);gap:2rem}
        #mvp .tab{padding:.85rem 0;background:none;border:none;cursor:pointer;font-size:.875rem;color:var(--muted);display:flex;align-items:center;gap:.5rem;border-bottom:2px solid transparent;margin-bottom:-1px;font-family:'Inter',sans-serif}
        #mvp .tab.active{color:var(--primary);border-bottom-color:var(--primary);font-weight:500}
        #mvp .tab-count{background:var(--bg);padding:2px 8px;border-radius:12px;font-size:.75rem;color:var(--muted)}
        #mvp .tab.active .tab-count{background:#eff6ff;color:var(--primary)}
        #mvp .table-container{width:100%;overflow-x:auto}
        #mvp table{width:100%;border-collapse:collapse;text-align:left;font-size:.875rem}
        #mvp th{background:#f9fafb;color:var(--muted);font-weight:500;padding:.65rem 1rem;border-bottom:1px solid var(--border);white-space:nowrap;font-size:.8rem;text-transform:uppercase;letter-spacing:.05em}
        #mvp td{padding:.75rem 1rem;border-bottom:1px solid var(--border);vertical-align:middle}
        #mvp tr:hover{background:#f9fafb}
        #mvp .id-badge{background:#eff6ff;color:#1d4ed8;padding:4px 8px;border-radius:4px;font-family:monospace;font-size:.8rem}
        #mvp .vendor-cell{display:flex;align-items:center;gap:.75rem;max-width:250px}
        #mvp .avatar{width:28px;height:28px;border-radius:50%;object-fit:cover;flex-shrink:0}
        #mvp .vendor-info{display:flex;flex-direction:column;overflow:hidden}
        #mvp .vendor-info span{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block}
        #mvp .vendor-name{font-weight:500;color:var(--text)}
        #mvp .vendor-email{color:var(--muted);font-size:.75rem}
        #mvp .date-cell{display:flex;align-items:center;gap:.5rem;color:var(--muted)}
        #mvp .amount-cell{font-weight:500}
        #mvp .bank-account-badge{background:#f3f4f6;color:var(--muted);padding:4px 8px;border-radius:4px;font-size:.75rem;border:1px solid var(--border)}
        #mvp .status-badge{padding:4px 10px;border-radius:12px;font-size:.75rem;font-weight:500;display:inline-block}
        #mvp .status-pending{background:#fef3c7;color:#b45309}
        #mvp .status-cleared{background:#d1fae5;color:#047857}
        #mvp .status-cancelled{background:#fee2e2;color:#b91c1c}
        
        /* 3-Dots Action Menu */
        #mvp .action-menu {
            position: relative;
            display: inline-flex;
            justify-content: center;
            width: 100%;
        }

        #mvp .action-menu-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            color: var(--muted);
            padding: 4px;
            border-radius: 4px;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #mvp .action-menu-btn:hover {
            background: #f3f4f6;
            color: var(--text);
        }

        #mvp .action-menu-btn svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        #mvp .action-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 20;
            min-width: 140px;
            padding: 4px 0;
        }

        #mvp .action-dropdown.show {
            display: block;
        }

        #mvp .action-dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            font-size: 13px;
            color: #334155;
            cursor: pointer;
            white-space: nowrap;
            width: 100%;
            background: none;
            border: none;
            text-align: left;
            font-family: inherit;
        }

        #mvp .action-dropdown-item:hover {
            background: #f8fafc;
        }

        #mvp .action-dropdown-item.delete {
            color: var(--danger);
        }

        #mvp .action-dropdown-item.delete:hover {
            background: #fef2f2;
        }

        #mvp .action-dropdown-item svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        #mvp .empty-state{text-align:center;padding:3rem;color:var(--muted)}
        #mvp .pagination-footer{padding:1rem 1.25rem;display:flex;justify-content:flex-end;gap:10px;align-items:center;border-top:1px solid var(--border)}
        #mvp .page-info{font-size:.875rem;color:var(--muted)}

        @media (max-width:768px){
            #mvp .search-group{flex:1 1 100%;max-width:100%}
        }
    </style>

    <header class="page-header">
        <div>
            <h1>Manage Vendor Payments</h1>
            <p>Manage and keep track of all vendor payments, bill allocations, and outstanding balances.</p>
        </div>
        <button class="btn-add" onclick="alert('Add new payment clicked')">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        </button>
    </header>

    <div class="calendar-widget">
        <div class="calendar-header">
            <button class="cal-nav-btn" onclick="changeYear(-1)"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
            <span id="currentMonthDisplay">Nov 2026</span>
            <button class="cal-nav-btn" onclick="changeYear(1)"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
        </div>
        <div class="calendar-grid">
            <div class="nav-arrow-col" onclick="shiftMonth(-1)"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></div>
            <div id="monthsContainer" style="display:flex;flex:1"></div>
            <div class="nav-arrow-col" onclick="shiftMonth(1)"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></div>
        </div>
    </div>

    <main class="main-card">
        <div class="toolbar">
            <div class="search-group">
                <input type="text" id="searchInput" class="search-input" placeholder="Search payment no.">
                <button class="btn-search" onclick="applyFilters()">Search</button>
                <button class="btn-clear" onclick="clearSearch()">Clear</button>
            </div>
            <div class="filter-group">
                <select class="select-styled" id="pageSizeSelect" onchange="changePageSize()">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
                <button class="btn-filter" onclick="alert('Filter menu clicked')">
                    <svg style="vertical-align:middle;margin-right:4px" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>Filters
                </button>
            </div>
        </div>

        <div class="tabs">
            <button class="tab active" onclick="setTab('All',this)">All <span class="tab-count" id="countAll">0</span></button>
            <button class="tab" onclick="setTab('Pending',this)">Pending <span class="tab-count" id="countPending">0</span></button>
            <button class="tab" onclick="setTab('Cleared',this)">Cleared <span class="tab-count" id="countCleared">0</span></button>
            <button class="tab" onclick="setTab('Cancelled',this)">Cancelled <span class="tab-count" id="countCancelled">0</span></button>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Payment Number</th>
                        <th>Vendor</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Bank Account</th>
                        <th>Status</th>
                        <th></th> <!-- Removed Actions text -->
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>

        <div class="pagination-footer">
            <span id="pageInfo" class="page-info"></span>
            <button class="btn-filter" onclick="prevPage()" id="btnPrev">Previous</button>
            <button class="btn-filter" onclick="nextPage()" id="btnNext">Next</button>
        </div>
    </main>

    <script>
        const FN=["Jennifer","Ashley","Lisa","Sarah","Michael","John","Emily","David","Jessica","Daniel","Sophia","James","Olivia","Robert","Emma","William","Ava","Joseph","Isabella","Thomas"];
        const LN=["Martinez","Lewis","Anderson","Johnson","Smith","Brown","Davis","Miller","Wilson","Moore","Taylor","Thomas","Jackson","White","Harris","Martin","Thompson","Garcia","Robinson","Clark"];
        const BA=["Equipment Loan Account","Savings Account","Business Checking Account","Credit Line Account","Main Operating Account"];
        const ST=["Pending","Cleared","Pending","Cleared","Cancelled"];
        const MN=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

        // Seeded PRNG — same data on every refresh
        const mulberry32=s=>()=>{s|=0;s=s+0x6D2B79F5|0;let t=Math.imul(s^s>>>15,1|s);t=t+Math.imul(t^t>>>7,61|t)^t;return((t^t>>>14)>>>0)/4294967296};

        const state={tab:'All',search:'',page:1,pageSize:10,calYear:2026,calMonth:10};
        let payments=[],filtered=[];

        function genData(){
            const rng=mulberry32(20260201),out=[],start=new Date(2026,1,1),span=new Date(2026,1,28)-start;
            for(let i=1;i<=50;i++){
                const f=FN[Math.floor(rng()*FN.length)],l=LN[Math.floor(rng()*LN.length)];
                const d=new Date(start.getTime()+rng()*span);
                out.push({
                    id:`CP-2026-02-${(50-i).toString().padStart(3,'0')}`,
                    vendorName:`${f} ${l}`,
                    email:`${f.toLowerCase()}.${l.toLowerCase()}@vendor.com`,
                    avatar:`https://ui-avatars.com/api/?name=${f}+${l}&background=random&color=fff&size=64`,
                    date:d.toLocaleDateString('en-US',{year:'numeric',month:'2-digit',day:'2-digit'}),
                    amount:parseFloat((rng()*5000+500).toFixed(2)),
                    account:BA[Math.floor(rng()*BA.length)],
                    status:ST[Math.floor(rng()*ST.length)]
                });
            }
            return out;
        }

        // Calendar
        function renderCalendar(){
            document.getElementById('currentMonthDisplay').innerText=`${MN[state.calMonth]} ${state.calYear}`;
            document.getElementById('monthsContainer').innerHTML=MN.map((n,i)=>
                `<button class="month-btn ${i===state.calMonth?'active':''}" onclick="selectMonth(${i})"><span class="month-name">${n}</span><span class="month-date">${(i+1).toString().padStart(2,'0')}</span></button>`
            ).join('');
        }
        function shiftMonth(d){state.calMonth+=d;if(state.calMonth>11){state.calMonth=0;state.calYear++}else if(state.calMonth<0){state.calMonth=11;state.calYear--}renderCalendar()}
        function changeYear(d){state.calYear+=d;renderCalendar()}
        function selectMonth(i){state.calMonth=i;renderCalendar()}

        // Table
        function updateCounts(){
            const c={All:payments.length,Pending:0,Cleared:0,Cancelled:0};
            payments.forEach(p=>c[p.status]++);
            ['All','Pending','Cleared','Cancelled'].forEach(k=>document.getElementById('count'+k).innerText=c[k]);
        }
        function applyFilters(){
            state.search=document.getElementById('searchInput').value.toLowerCase();
            filtered=payments.filter(p=>(state.tab==='All'||p.status===state.tab)&&(p.id.toLowerCase().includes(state.search)||p.vendorName.toLowerCase().includes(state.search)));
            state.page=1;renderTable();
        }
        function clearSearch(){document.getElementById('searchInput').value='';applyFilters()}
        function setTab(t,btn){state.tab=t;document.querySelectorAll('#mvp .tab').forEach(x=>x.classList.remove('active'));btn.classList.add('active');applyFilters()}

        function renderTable(){
            const tb=document.getElementById('tableBody');
            if(!filtered.length){tb.innerHTML='<tr><td colspan="7" class="empty-state">No payments found matching your criteria.</td></tr>';updatePaginationUI(0);return}
            const total=Math.ceil(filtered.length/state.pageSize);
            if(state.page>total)state.page=total;
            const s=(state.page-1)*state.pageSize,e=Math.min(s+state.pageSize,filtered.length);
            tb.innerHTML=filtered.slice(s,e).map(p=>{
                const cls=p.status==='Cleared'?'status-cleared':p.status==='Cancelled'?'status-cancelled':'status-pending';
                
                // Build 3-dots menu items based on status
                let menuItems = '';
                if (p.status === 'Pending') {
                    menuItems = `
                        <button class="action-dropdown-item" onclick="handleAction('approve','${p.id}')">
                            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            Approve
                        </button>
                        <button class="action-dropdown-item" onclick="handleAction('reject','${p.id}')">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            Reject
                        </button>
                    `;
                }
                menuItems += `
                    <button class="action-dropdown-item" onclick="handleAction('view','${p.id}')">
                        <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        View
                    </button>
                    <button class="action-dropdown-item delete" onclick="handleAction('delete','${p.id}')">
                        <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        Delete
                    </button>
                `;

                return `<tr>
                    <td><span class="id-badge">${p.id}</span></td>
                    <td><div class="vendor-cell"><img src="${p.avatar}" class="avatar"><div class="vendor-info"><span class="vendor-name">${p.vendorName}</span><span class="vendor-email">${p.email}</span></div></div></td>
                    <td><div class="date-cell"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>${p.date}</div></td>
                    <td class="amount-cell">$${p.amount.toLocaleString('en-US',{minimumFractionDigits:2})}</td>
                    <td><span class="bank-account-badge">${p.account}</span></td>
                    <td><span class="status-badge ${cls}">${p.status}</span></td>
                    <td>
                        <div class="action-menu">
                            <button class="action-menu-btn" onclick="toggleMenu(this)">
                                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="12" cy="19" r="2"/></svg>
                            </button>
                            <div class="action-dropdown">
                                ${menuItems}
                            </div>
                        </div>
                    </td>
                </tr>`;
            }).join('');
            updatePaginationUI(total);
        }

        function updatePaginationUI(total){
            const info=document.getElementById('pageInfo'),pv=document.getElementById('btnPrev'),nx=document.getElementById('btnNext');
            if(!total){info.innerText='Showing 0 entries';pv.disabled=nx.disabled=true;return}
            const s=(state.page-1)*state.pageSize+1,e=Math.min(state.page*state.pageSize,filtered.length);
            info.innerText=`Showing ${s} to ${e} of ${filtered.length} entries`;
            pv.disabled=state.page===1;nx.disabled=state.page===total;
            pv.style.opacity=state.page===1?.5:1;nx.style.opacity=state.page===total?.5:1;
        }

        function nextPage(){if(state.page<Math.ceil(filtered.length/state.pageSize)){state.page++;renderTable()}}
        function prevPage(){if(state.page>1){state.page--;renderTable()}}
        function changePageSize(){state.pageSize=parseInt(document.getElementById('pageSizeSelect').value);state.page=1;renderTable()}

        // Global Action Handlers
        window.toggleMenu = function(btn) {
            const dropdowns = document.querySelectorAll('.action-dropdown');
            dropdowns.forEach(d => {
                if (d !== btn.nextElementSibling) d.classList.remove('show');
            });
            btn.nextElementSibling.classList.toggle('show');
        };

        window.handleAction = function(action, id) {
            // Close dropdown
            document.querySelectorAll('.action-dropdown').forEach(d => d.classList.remove('show'));

            const i=payments.findIndex(p=>p.id===id);
            if(action==='approve'){payments[i].status='Cleared';updateCounts();applyFilters()}
            else if(action==='reject'){payments[i].status='Cancelled';updateCounts();applyFilters()}
            else if(action==='delete'){if(confirm(`Delete payment ${id}?`)){payments.splice(i,1);updateCounts();applyFilters()}}
            else if(action==='view'){alert(`Viewing details for Payment ID: ${id}`)}
        };

        // Close menus on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.action-menu')) {
                document.querySelectorAll('.action-dropdown').forEach(d => d.classList.remove('show'));
            }
        });

        // Init
        payments=genData();renderCalendar();updateCounts();applyFilters();
    </script>
</section>
@endsection