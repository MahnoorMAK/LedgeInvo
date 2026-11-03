document.addEventListener("DOMContentLoaded", function () {
    
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Find the sub-menu immediately after this item
            const subMenu = this.nextElementSibling;
            
            // If a sub-menu exists, toggle it
            if (subMenu && subMenu.classList.contains('sub-menu')) {
                if (subMenu.style.display === 'block') {
                    subMenu.style.display = 'none';
                    this.querySelector('.arrow').style.transform = 'rotate(0deg)';
                } else {
                    subMenu.style.display = 'block';
                    this.querySelector('.arrow').style.transform = 'rotate(180deg)';
                }
            }
        });
    });

    console.log("✅ Sidebar JS Loaded perfectly");
});