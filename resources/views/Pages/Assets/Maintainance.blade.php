@extends('layout.dashboard')

@section('title', 'Manage Maintenance')
@section('content')
<section id="mm-app">
    <style>
        #mm-app { font-family: system-ui, -apple-system, sans-serif; color: #374151; background: #fff; padding: 24px; box-sizing: border-box; font-size: 14px; }
        #mm-app * { box-sizing: border-box; }
        .mm-header { display: flex; justify-content: space-between; margin-bottom: 24px; }
        .mm-header h2 { margin: 0 0 4px 0; font-size: 20px; color: #111; }
        .mm-header p { margin: 0; color: #6b7280; font-size: 13px; }
        .btn-add { background: #10b981; color: #fff; border: none; border-radius: 6px; width: 36px; height: 36px; cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .mm-card { border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        
        .toolbar { padding: 16px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb; flex-wrap: wrap; gap: 12px; }
        .search-group { display: flex; gap: 8px; flex: 1; max-width: 400px; }
        .search-input { flex: 1; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; }
        .btn { padding: 8px 14px; border-radius: 6px; border: 1px solid #d1d5db; background: #fff; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; }
        .btn-primary { background: #10b981; color: #fff; border-color: #10b981; }
        
        .view-toggles { display: flex; border: 1px solid #d1d5db; border-radius: 6px; overflow: hidden; }
        .view-btn { padding: 8px 12px; background: #fff; border: none; cursor: pointer; color: #6b7280; display: flex; }
        .view-btn:first-child { border-right: 1px solid #d1d5db; }
        .view-btn.active { background: #10b981; color: #fff; }
        .select-input { padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; cursor: pointer; }

        .tabs { display: flex; gap: 20px; padding: 12px 16px; border-bottom: 1px solid #e5e7eb; background: #f9fafb; overflow-x: auto; }
        .tab { display: flex; gap: 8px; color: #6b7280; cursor: pointer; white-space: nowrap; }
        .tab.active { color: #10b981; font-weight: 600; }

        .table-wrapper { width: 100%; overflow-x: auto; }
        .mm-table { width: 100%; border-collapse: collapse; text-align: left; }
        .mm-table th, .mm-table td { padding: 14px 16px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .mm-table th { background: #fff; font-weight: 500; font-size: 12px; cursor: pointer; }
        
        .grid-wrapper { display: none; padding: 16px; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; background: #f9fafb; }
        .grid-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; display: flex; flex-direction: column; gap: 12px; }

        .item-cell { display: flex; align-items: center; gap: 12px; }
        .icon-box { width: 36px; height: 36px; border-radius: 6px; background: #f3f4f6; display: flex; align-items: center; justify-content: center; }
        .item-info { display: flex; flex-direction: column; gap: 2px; }
        .item-name { font-weight: 500; color: #111; font-size: 13px; }
        .item-id { font-size: 11px; color: #6b7280; }
        
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 500; display: inline-block; }
        .bg-corrective { background: #fdf2f8; color: #be185d; }
        .bg-preventive { background: #fff7ed; color: #c2410c; }
        .bg-emergency { background: #fefce8; color: #a16207; }
        .bg-scheduled { background: #eff6ff; color: #1d4ed8; }
        .bg-inprogress { background: #fff7ed; color: #c2410c; }
        .bg-completed { background: #ecfdf5; color: #059669; }
        .bg-critical { background: #fef2f2; color: #b91c1c; }
        .bg-high { background: #fffbeb; color: #b45309; }
        .bg-medium { background: #eff6ff; color: #1d4ed8; }
        .bg-low { background: #f0fdf4; color: #166534; }

        .actions { display: flex; gap: 12px; justify-content: flex-end; }
        .action-btn { background: none; border: none; cursor: pointer; color: #6b7280; padding: 0; }
        .action-btn:hover { color: #111; }

        .pagination { display: flex; justify-content: space-between; align-items: center; padding: 16px; border-top: 1px solid #e5e7eb; }
        .page-info { font-size: 13px; color: #6b7280; }
        .page-controls { display: flex; gap: 6px; align-items: center; }
        .page-btn { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; }
        .page-btn:disabled { opacity: 0.5; cursor: not-allowed; }
        .page-num { padding: 6px 12px; border: 1px solid #d1d5db; background: #fff; border-radius: 6px; cursor: pointer; }
        .page-num.active { background: #10b981; color: #fff; border-color: #10b981; }
    </style>

    <div class="mm-header">
        <div>
            <h2>Manage Maintenance</h2>
            <p>Track and manage maintenance schedules, costs, technicians, status and priorities for all company assets.</p>
        </div>
        <button class="btn-add" id="add-btn"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
    </div>

    <div class="mm-card">
        <div class="toolbar">
            <div class="search-group">
                <input type="text" id="search-input" class="search-input" placeholder="Search maintenance...">
                <button class="btn btn-primary" id="search-btn">Search</button>
            </div>
            <div style="display: flex; gap: 12px; align-items: center;">
                <div class="view-toggles">
                    <button class="view-btn active" id="view-list"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></button>
                    <button class="view-btn" id="view-grid"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></button>
                </div>
                <select class="select-input" id="page-size">
                    <option value="5">5 per page</option>
                    <option value="10" selected>10 per page</option>
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                </select>
            </div>
        </div>

        <div class="tabs" id="tabs">
            <div class="tab active" data-filter="all">All <span id="c-all">0</span></div>
            <div class="tab" data-filter="Scheduled">Scheduled <span id="c-sch">0</span></div>
            <div class="tab" data-filter="In Progress">In Progress <span id="c-prog">0</span></div>
            <div class="tab" data-filter="Completed">Completed <span id="c-comp">0</span></div>
            <div class="tab" data-filter="Cancelled">Cancelled <span id="c-can">0</span></div>
        </div>

        <div class="table-wrapper" id="list-view">
            <table class="mm-table">
                <thead>
                    <tr>
                        <th data-sort="title">Title ↕</th>
                        <th>Asset</th>
                        <th data-sort="scheduledDate">Scheduled Date ↕</th>
                        <th data-sort="status">Status ↕</th>
                        <th data-sort="priority">Priority ↕</th>
                        <th data-sort="cost">Cost ↕</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>
        </div>

        <div class="grid-wrapper" id="grid-view"></div>

        <div class="pagination">
            <div class="page-info" id="page-info"></div>
            <div class="page-controls">
                <button class="page-btn" id="prev-btn">Previous</button>
                <div id="page-numbers" style="display:flex; gap:6px;"></div>
                <button class="page-btn" id="next-btn">Next</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
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

            const rand = seededRandom(hashString('manage-maintenance-v1'));

            // --- 2. Generate 50 Mock Entities (deterministic) ---
            const assets = [
                { name: "Cisco Network Switch", id: "NET-SW-008" }, { name: "Dell Latitude 5520", id: "DL-LAP-001" },
                { name: "HP ProDesk Desktop", id: "HP-DSK-002" }, { name: "Executive Desk", id: "FUR-DSK-003" },
                { name: "Toyota Camry", id: "VEH-CAR-004" }, { name: "Industrial Printer", id: "MAC-PRT-005" }
            ];
            const types = ["Corrective", "Preventive", "Emergency"];
            const statuses = ["Scheduled", "In Progress", "Completed", "Cancelled"];
            const priorities = ["Medium", "High", "Low", "Critical"];
            const titles = ["Fan Replacement", "System Check", "Screen Repair", "Annual Service", "Crash Recovery"];

            const data = Array.from({ length: 50 }, (_, i) => {
                const a = assets[i % assets.length];
                return {
                    id: `MNT-${i+1}`,
                    title: `${titles[i % titles.length]} ${i+1}`,
                    type: types[i % types.length],
                    assetName: a.name, assetId: a.id,
                    scheduledDate: `2024-0${(i % 9) + 1}-1${i % 9}`,
                    status: statuses[i % statuses.length],
                    priority: priorities[i % priorities.length],
                    cost: (Math.floor(rand() * 10) + 1) * 50
                };
            });

            // --- 3. State ---
            let state = { data, filtered: [...data], page: 1, size: 10, sortCol: null, sortAsc: true, query: '', filter: 'all', view: 'list' };

            // --- 4. DOM Elements ---
            const els = {
                tbody: document.getElementById('table-body'), grid: document.getElementById('grid-view'),
                list: document.getElementById('list-view'), info: document.getElementById('page-info'),
                prev: document.getElementById('prev-btn'), next: document.getElementById('next-btn'),
                nums: document.getElementById('page-numbers'), search: document.getElementById('search-input')
            };

            // --- 5. Helper Functions ---
            const getBadgeClass = (type, val) => {
                let v = val.toLowerCase().replace(/\s/g, '');
                return `badge bg-${v}`;
            };

            const updateCounts = () => {
                document.getElementById('c-all').textContent = state.data.length;
                statuses.forEach(s => {
                    const el = document.getElementById(s === 'In Progress' ? 'c-prog' : s === 'Scheduled' ? 'c-sch' : s === 'Completed' ? 'c-comp' : 'c-can');
                    if (el) el.textContent = state.data.filter(d => d.status === s).length;
                });
            };

            // --- 6. Core Render Logic ---
            const render = () => {
                state.filtered = state.data.filter(d => 
                    (state.filter === 'all' || d.status === state.filter) &&
                    (d.title.toLowerCase().includes(state.query) || d.assetName.toLowerCase().includes(state.query))
                );
                if (state.sortCol) {
                    state.filtered.sort((a, b) => {
                        let x = a[state.sortCol], y = b[state.sortCol];
                        if (typeof x === 'string') x = x.toLowerCase(), y = y.toLowerCase();
                        return x < y ? (state.sortAsc ? -1 : 1) : x > y ? (state.sortAsc ? 1 : -1) : 0;
                    });
                }

                const totalPages = Math.ceil(state.filtered.length / state.size) || 1;
                if (state.page > totalPages) state.page = totalPages;
                const start = (state.page - 1) * state.size;
                const paginated = state.filtered.slice(start, start + state.size);

                els.info.textContent = `Showing ${state.filtered.length ? start + 1 : 0} to ${Math.min(start + state.size, state.filtered.length)} of ${state.filtered.length} results`;

                if (state.view === 'list') {
                    els.list.style.display = 'block'; els.grid.style.display = 'none';
                    els.tbody.innerHTML = paginated.map(d => `
                        <tr>
                            <td><div style="display:flex;flex-direction:column;gap:4px;"><span style="font-weight:500;">${d.title}</span><span class="${getBadgeClass('type', d.type)}" style="width:fit-content;font-size:11px;">${d.type}</span></div></td>
                            <td><div class="item-cell"><div class="icon-box">🖥️</div><div class="item-info"><span class="item-name">${d.assetName}</span><span class="item-id">${d.assetId}</span></div></div></td>
                            <td>📅 ${d.scheduledDate}</td>
                            <td><span class="${getBadgeClass('status', d.status)}">${d.status}</span></td>
                            <td><span class="${getBadgeClass('priority', d.priority)}">${d.priority}</span></td>
                            <td>$${d.cost.toFixed(2)}</td>
                            <td><div class="actions"><button class="action-btn">👁️</button><button class="action-btn">✏️</button><button class="action-btn">🗑️</button></div></td>
                        </tr>`).join('') || `<tr><td colspan="7" style="text-align:center;">No data</td></tr>`;
                } else {
                    els.list.style.display = 'none'; els.grid.style.display = 'grid';
                    els.grid.innerHTML = paginated.map(d => `
                        <div class="grid-card">
                            <div style="display:flex;justify-content:space-between;align-items:flex-start;">
                                <div class="item-cell"><div class="icon-box">🖥️</div><div class="item-info"><span class="item-name">${d.assetName}</span><span class="item-id">${d.assetId}</span></div></div>
                                <span class="${getBadgeClass('type', d.type)}">${d.type}</span>
                            </div>
                            <div style="border-top:1px solid #e5e7eb;margin:8px 0;"></div>
                            <div style="font-weight:500;">${d.title}</div>
                            <div style="display:flex;justify-content:space-between;font-size:12px;color:#6b7280;"><span>📅 ${d.scheduledDate}</span><span>$${d.cost.toFixed(2)}</span></div>
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-top:4px;">
                                <span class="${getBadgeClass('status', d.status)}">${d.status}</span>
                                <span class="${getBadgeClass('priority', d.priority)}">${d.priority}</span>
                            </div>
                        </div>`).join('');
                }

                els.prev.disabled = state.page === 1;
                els.next.disabled = state.page === totalPages;
                els.nums.innerHTML = Array.from({ length: totalPages }, (_, i) => i + 1)
                    .map(n => `<button class="page-num ${n === state.page ? 'active' : ''}" onclick="goToPage(${n})">${n}</button>`).join('');
            };

            // --- 7. Event Listeners ---
            window.goToPage = (n) => { state.page = n; render(); };

            document.getElementById('search-btn').onclick = () => { state.query = els.search.value.toLowerCase(); state.page = 1; render(); };
            els.search.onkeyup = (e) => { if(e.key === 'Enter') document.getElementById('search-btn').click(); };

            document.getElementById('page-size').onchange = (e) => { state.size = parseInt(e.target.value); state.page = 1; render(); };
            
            document.getElementById('prev-btn').onclick = () => { if (state.page > 1) { state.page--; render(); } };
            document.getElementById('next-btn').onclick = () => { if (state.page < Math.ceil(state.filtered.length / state.size)) { state.page++; render(); } };

            document.getElementById('view-list').onclick = () => { 
                state.view = 'list'; document.getElementById('view-list').classList.add('active'); document.getElementById('view-grid').classList.remove('active'); render(); 
            };
            document.getElementById('view-grid').onclick = () => { 
                state.view = 'grid'; document.getElementById('view-grid').classList.add('active'); document.getElementById('view-list').classList.remove('active'); render(); 
            };

            document.querySelectorAll('.tab').forEach(tab => {
                tab.onclick = () => {
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    state.filter = tab.getAttribute('data-filter');
                    state.page = 1; render();
                };
            });

            document.querySelectorAll('th[data-sort]').forEach(th => {
                th.onclick = () => {
                    const col = th.getAttribute('data-sort');
                    if (state.sortCol === col) state.sortAsc = !state.sortAsc;
                    else { state.sortCol = col; state.sortAsc = true; }
                    render();
                };
            });

            // --- 8. Initialize ---
            updateCounts();
            render();
        });
    </script>
</section>
@endsection