document.addEventListener('DOMContentLoaded', function () {
    // 1. Menu Navigation
    const menuLinks = document.querySelectorAll('.settings-link');
    const sections = document.querySelectorAll('.section');

    menuLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            menuLinks.forEach(l => l.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.dataset.section).classList.add('active');
        });
    });

    // 2. Inner Tabs (Font, Text, Theme, Logo)
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            tabButtons.forEach(b => b.classList.remove('active'));
            tabPanels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });

    // 3. Theme Color Selection
    const colorBoxes = document.querySelectorAll('.color-box');
    colorBoxes.forEach(box => {
        box.addEventListener('click', function() {
            colorBoxes.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const colorMap = {
                'purple': '#7E6BB5',
                'ocean': '#3B82F6',
                'emerald': '#10B981',
                'sunset': '#F59E0B',
                'rose': '#F43F5E',
                'sky': '#0EA5E9'
            };
            const selectedColor = colorMap[this.dataset.theme];
            document.documentElement.style.setProperty('--primary', selectedColor);
            localStorage.setItem('apexbooks-primary-color', selectedColor);
        });
    });

    // 4. Font Selection
    const fontButtons = document.querySelectorAll('.font-btn');
    fontButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            fontButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const fontMap = {
                'segoe': "'Segoe UI', sans-serif",
                'poppins': "'Poppins', sans-serif",
                'roboto': "'Roboto', sans-serif",
                'notoserif': "'Noto Serif', serif"
            };
            const selectedFont = fontMap[this.dataset.font];
            document.body.style.fontFamily = selectedFont;
            localStorage.setItem('apexbooks-font', selectedFont);
        });
    });
});