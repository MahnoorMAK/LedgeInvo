/* public/js/sidebar.js */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. Handle Sticky Search Bar Shadow on Scroll
        const sidebarContainer = document.querySelector('.sidebar-container');
        if (sidebarContainer) {
            sidebarContainer.addEventListener('scroll', function() {
                if (this.scrollTop > 10) {
                    this.classList.add('is-scrolled');
                } else {
                    this.classList.remove('is-scrolled');
                }
            });
        }

        // 2. Search Filter Functionality
        const searchInput = document.querySelector('.sidebar-search-box');
        const menuItems = document.querySelectorAll('.sidebar-menu-list li.menu-item');
        const subItems = document.querySelectorAll('.sidebar-menu-list li.sub-item');
        const allClickable = document.querySelectorAll('.sidebar-menu-list li.menu-item, .sidebar-menu-list li.sub-item');

        if (searchInput) {
            searchInput.addEventListener('input', function (e) {
                const query = e.target.value.toLowerCase();

                menuItems.forEach(function (item) {
                    if (item.classList.contains('title')) return; 
                    
                    const text = item.textContent.toLowerCase();
                    if (text.includes(query)) {
                        item.style.display = 'flex';
                        if (item.classList.contains('has-submenu')) {
                            item.classList.add('open');
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });

                subItems.forEach(function (sub) {
                    if (sub.textContent.toLowerCase().includes(query)) {
                        sub.style.display = 'flex';
                    } else {
                        sub.style.display = 'none';
                    }
                });
            });
        }

        // 3. Handle Clicks (Dropdowns + Active Highlighting)
        allClickable.forEach(function (item) {
            item.addEventListener('click', function (e) {
                if (item.classList.contains('has-submenu')) {
                    if (e.target.tagName.toLowerCase() === 'a') {
                        return;
                    }
                    e.stopPropagation();
                    item.classList.toggle('open');
                } else {
                    allClickable.forEach(function (i) {
                        i.classList.remove('active');
                    });
                    item.classList.add('active');
                }
            });
        });
    });
})();