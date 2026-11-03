<aside class="sidebar">
    
    <!-- Logo -->
    <div class="logo">LedgeInvo</div>

    <!-- Search Bar -->
    <div class="search-wrapper">
        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" placeholder="Search menu...">
    </div>

    <ul class="sidebar-menu">
        
        <!-- ================= OVERVIEW ================= -->
        <li class="category-title">Overview</li>
        
        <li class="menu-item">
            <svg class="side-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <span class="menu-text">Dashboard</span>
        </li>

        <!-- ================= SALES & REVENUE ================= -->
        <li class="category-title">Sales & Revenue</li>

        <li class="menu-item active has-dropdown">
            <svg class="side-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <span class="menu-text">Sales Invoice</span>
            <span class="arrow">∨</span>
        </li>
        
        <!-- Sub Menu -->
        <ul class="sub-menu" style="display: block;">
            <li><a href="{{ url('/sales-invoice') }}" style="text-decoration: none; color: inherit; display: block; width: 100%;">Sales Invoice</a></li>
            <li><a href="{{ url('/sales-returns') }}" style="text-decoration: none; color: inherit; display: block; width: 100%;">Sales Invoice Returns</a></li>
        </ul>

    </ul>
</aside>

<!-- Sidebar Dropdown JS -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownBtn = document.querySelector('.has-dropdown');
        const subMenu = document.querySelector('.sub-menu');
        const arrow = document.querySelector('.has-dropdown .arrow');

        if (dropdownBtn && subMenu) {
            dropdownBtn.addEventListener('click', function () {
                if (subMenu.style.display === 'block') {
                    subMenu.style.display = 'none';
                    arrow.style.transform = 'rotate(0deg)';
                } else {
                    subMenu.style.display = 'block';
                    arrow.style.transform = 'rotate(180deg)';
                }
            });
        }
    });
</script>