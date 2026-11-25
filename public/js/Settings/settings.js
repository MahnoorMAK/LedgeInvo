document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 0. PENDING CHANGES STATE
    // ==========================================
    let pendingChanges = {};

    function markAsDirty() {
        const saveBtn = document.getElementById('brandSave');
        if (saveBtn) saveBtn.textContent = 'Save Changes *'; 
    }

    function clearDirty() {
        const saveBtn = document.getElementById('brandSave');
        if (saveBtn) saveBtn.textContent = 'Save Changes';
    }

    // ==========================================
    // 1. Left Menu Navigation
    // ==========================================
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

        // ==========================================
    // 2. Inner Tabs (Handles both Horizontal and Vertical layouts)
    // ==========================================
    document.addEventListener('click', function (e) {
        
        // 1. Handle Brand Settings horizontal tabs
        if (e.target.closest('.tabs .tab-btn')) {
            const button = e.target.closest('.tabs .tab-btn');
            const parentCard = button.closest('.settings-card');
            
            const localButtons = parentCard.querySelectorAll('.tabs .tab-btn');
            const localPanels = parentCard.querySelectorAll('.tab-panel');

            localButtons.forEach(b => b.classList.remove('active'));
            localPanels.forEach(p => p.classList.remove('active'));

            button.classList.add('active');
            const targetPanel = parentCard.querySelector(`#${button.dataset.tab}`);
            if(targetPanel) targetPanel.classList.add('active');
        }

        // 2. Handle Product Settings vertical tabs
        if (e.target.closest('.brand-tabs .brand-tab-btn')) {
            const button = e.target.closest('.brand-tabs .brand-tab-btn');
            const parentLayout = button.closest('.brand-settings-layout');
            
            const localButtons = parentLayout.querySelectorAll('.brand-tab-btn');
            const localPanels = parentLayout.querySelectorAll('.tab-panel');

            localButtons.forEach(b => b.classList.remove('active'));
            localPanels.forEach(p => p.classList.remove('active'));

            button.classList.add('active');
            const targetPanel = parentLayout.querySelector(`#${button.dataset.tab}`);
            if(targetPanel) targetPanel.classList.add('active');
        }
    });

    // ==========================================
    // 3. Theme Color Selection (Presets)
    // ==========================================
    const colorBoxes = document.querySelectorAll('.color-box[data-theme]');
    
    const savedThemeName = localStorage.getItem('apexbooks-theme-color');
    if (savedThemeName && savedThemeName !== 'custom') {
        colorBoxes.forEach(b => {
            if (b.dataset.theme === savedThemeName) b.classList.add('active');
            else b.classList.remove('active');
        });
    }

    colorBoxes.forEach(box => {
        box.addEventListener('click', function() {
            colorBoxes.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const themeName = this.dataset.theme;
            pendingChanges.color = themeName;
            pendingChanges.isCustom = false;
            markAsDirty();

            // Preview: Apply CSS variables immediately
            const colorMap = {
                'purple': { main: '#7E6BB5', light: '#F0EDF7', hover: '#6A589D' },
                'ocean':  { main: '#3B82F6', light: '#EFF6FF', hover: '#2563EB' },
                'emerald':{ main: '#10B981', light: '#ECFDF5', hover: '#059669' },
                'sunset': { main: '#F59E0B', light: '#FFFBEB', hover: '#D97706' },
                'rose':   { main: '#F43F5E', light: '#FFF1F2', hover: '#E11D48' },
                'sky':    { main: '#0EA5E9', light: '#F0F9FF', hover: '#0284C7' }
            };
            const selected = colorMap[themeName];
            document.documentElement.style.setProperty('--primary', selected.main);
            document.documentElement.style.setProperty('--accent-color', selected.main);
            document.documentElement.style.setProperty('--primary-hover', selected.hover);
            document.documentElement.style.setProperty('--primary-light', selected.light);
            
            // Added: Update custom color preview and input to match the selected preset
            const customText = document.querySelector('.custom-color-input');
            const customPreview = document.querySelector('.custom-color-preview');
            if (customText) customText.value = "";
            if (customPreview) customPreview.style.backgroundColor = selected.main;
        });
    });

    // ==========================================
    // 4. Custom Color Input (Updated for new HTML)
    // ==========================================
    // Target the new elements based on the updated HTML structure
    const applyCustomBtn = document.querySelector('.custom-color-row .btn-primary');
    const customText = document.querySelector('.custom-color-input');
    const customPreview = document.querySelector('.custom-color-preview');

    const savedCustomHex = localStorage.getItem('apexbooks-custom-color');
    
    // Load saved custom color on page load
    if (savedThemeName === 'custom' && savedCustomHex) {
        colorBoxes.forEach(b => b.classList.remove('active'));
        if (customText) customText.value = savedCustomHex;
        if (customPreview) customPreview.style.backgroundColor = savedCustomHex;
    }

    if (applyCustomBtn && customText && customPreview) {
        applyCustomBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission if inside a form
            let hex = customText.value.trim();
            
            // Basic validation to ensure it's a hex code
            if (hex && !hex.startsWith('#')) hex = '#' + hex;
            if (!/^#[0-9A-F]{6}$/i.test(hex)) {
                alert('Please enter a valid 6-digit HEX code (e.g., #FF0000)');
                return;
            }
            
            // 1. Update Pending Changes
            pendingChanges.color = 'custom';
            pendingChanges.isCustom = true;
            pendingChanges.customHex = hex;
            markAsDirty();

            // 2. Live Preview: Apply variables instantly
            document.documentElement.style.setProperty('--primary', hex);
            document.documentElement.style.setProperty('--accent-color', hex);
            document.documentElement.style.setProperty('--primary-hover', hex);
            // Create a light version by appending 20 (12.5% opacity) to the hex code
            document.documentElement.style.setProperty('--primary-light', hex + '20');

            // 3. Update UI Elements
            customPreview.style.backgroundColor = hex;
            customText.value = hex; // Ensure it has the # prefix
            colorBoxes.forEach(b => b.classList.remove('active')); // Deselect presets
        });

        // Live update the preview box as the user types
        customText.addEventListener('input', function() {
            let hex = this.value.trim();
            if (hex && !hex.startsWith('#')) hex = '#' + hex;
            if (/^#[0-9A-F]{6}$/i.test(hex)) {
                customPreview.style.backgroundColor = hex;
            }
        });
    }

    // ==========================================
    // 5. Font Selection
    // ==========================================
    const fontButtons = document.querySelectorAll('.font-row .font-btn'); 
    
    const savedFontName = localStorage.getItem('apexbooks-font');
    if (savedFontName) {
        fontButtons.forEach(btn => {
            if (btn.getAttribute('data-font') === savedFontName) btn.classList.add('active');
            else btn.classList.remove('active');
        });
    }

    fontButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            fontButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const fontName = this.dataset.font;
            pendingChanges.font = fontName;
            markAsDirty();
            
            // Preview: Apply font immediately
            document.documentElement.style.setProperty('--app-font', fontName);
            document.body.style.fontFamily = fontName;
        });
    });

    // ==========================================
    // 6. Appearance Mode Toggle
    // ==========================================
    const settingsThemeBtn = document.getElementById('settingsThemeToggle');
    const settingsThemeText = document.getElementById('settingsThemeText');
    const settingsIconSun = document.getElementById('settingsIconSun');
    const settingsIconMoon = document.getElementById('settingsIconMoon');

    function updateSettingsButtonUI() {
        if (!settingsThemeText) return;
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';

        if (currentTheme === 'dark') {
            settingsThemeText.textContent = 'Switch to Light Mode';
            settingsIconSun.style.display = 'block';
            settingsIconMoon.style.display = 'none';
        } else {
            settingsThemeText.textContent = 'Switch to Dark Mode';
            settingsIconSun.style.display = 'none';
            settingsIconMoon.style.display = 'block';
        }
    }

    updateSettingsButtonUI();

    if (settingsThemeBtn) {
        settingsThemeBtn.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            pendingChanges.theme = nextTheme;
            markAsDirty();

            // Preview: Toggle theme immediately
            if (typeof window.toggleSiteTheme === 'function') {
                window.toggleSiteTheme();
            }
            updateSettingsButtonUI();
        });
    }

    // ==========================================
    // 7. Title Text Input
    // ==========================================
    const titleInput = document.getElementById('titleText');
    
    const savedTitle = localStorage.getItem('apexbooks-title');
    if (savedTitle && titleInput) {
        titleInput.value = savedTitle;
    }

    if (titleInput) {
        titleInput.addEventListener('input', function() {
            // Store pending only. Do NOT update navbar here.
            pendingChanges.title = this.value.trim();
            markAsDirty();
        });
    }

    
    // Load Product Settings
    if(document.querySelector('input[name="default_category"]')) document.querySelector('input[name="default_category"]').value = localStorage.getItem('apexbooks-default-category') || 'General';
    if(document.querySelector('input[name="default_tax_rate"]')) document.querySelector('input[name="default_tax_rate"]').value = localStorage.getItem('apexbooks-default-tax') || '18';
    if(document.querySelector('select[name="default_unit"]')) document.querySelector('select[name="default_unit"]').value = localStorage.getItem('apexbooks-default-unit') || 'Pieces (pcs)';
    if(document.getElementById('productDisplayMode')) document.getElementById('productDisplayMode').value = localStorage.getItem('apexbooks-display-mode') || 'Grid View';
    if(document.getElementById('stockWarningLevel')) document.getElementById('stockWarningLevel').value = localStorage.getItem('apexbooks-stock-warning') || '10';
    
    // ==========================================
    // 8. LOGO UPLOAD (Preview & Pending)
    // ==========================================
    const lgChoose = document.getElementById('lgChoose');
    const lgDelete = document.getElementById('lgDelete');
    const lgFile = document.getElementById('lgFile');
    const logoPreviewImg = document.getElementById('logoPreviewImg');
    const logoEmptyText = document.getElementById('logoEmptyText');

    // Load saved logo on page load
    const savedLogo = localStorage.getItem('apexbooks-logo');
    if (savedLogo) {
        logoPreviewImg.src = savedLogo;
        logoPreviewImg.style.display = 'block';
        logoEmptyText.style.display = 'none';
        document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
            el.innerHTML = `<img src="${savedLogo}" style="width:100%; height:100%; object-fit:contain; border-radius:inherit;">`;
        });
    }

    if (lgChoose) {
        lgChoose.addEventListener('click', () => lgFile.click());
    }

    if (lgFile) {
        lgFile.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const base64 = event.target.result;
                    
                    // Store pending
                    pendingChanges.logo = base64;
                    markAsDirty();

                    // Preview instantly in the box
                    logoPreviewImg.src = base64;
                    logoPreviewImg.style.display = 'block';
                    logoEmptyText.style.display = 'none';
                    
                    // Preview instantly in the navbar
                    document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
                        el.innerHTML = `<img src="${base64}" style="width:100%; height:100%; object-fit:contain; border-radius:inherit;">`;
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if (lgDelete) {
        lgDelete.addEventListener('click', function() {
            // Store pending delete
            pendingChanges.logo = null;
            markAsDirty();

            // Preview instantly in the box
            logoPreviewImg.src = '';
            logoPreviewImg.style.display = 'none';
            logoEmptyText.style.display = 'block';
            lgFile.value = '';

            // Preview instantly in the navbar (reset to default SVG)
            document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
                el.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF"/></svg>`;
            });
        });
    }

    // ==========================================
    // 9. SAVE CHANGES BUTTON (Commit Everything)
    // ==========================================
    const brandSaveBtn = document.getElementById('brandSave');

    if (brandSaveBtn) {
        brandSaveBtn.addEventListener('click', function() {
            
            // Commit Color
            if (pendingChanges.color) {
                localStorage.setItem('apexbooks-theme-color', pendingChanges.color);
                if (pendingChanges.isCustom && pendingChanges.customHex) {
                    localStorage.setItem('apexbooks-custom-color', pendingChanges.customHex);
                }
            }

            // Commit Font
            if (pendingChanges.font) {
                localStorage.setItem('apexbooks-font', pendingChanges.font);
            }

            // Commit Title
            if (pendingChanges.title !== undefined) {
                const newTitle = pendingChanges.title || 'Apexbooks';
                localStorage.setItem('apexbooks-title', newTitle);
                
                document.querySelectorAll('.site-logo-text').forEach(el => {
                    el.textContent = newTitle;
                });

                if (document.title.includes('Apexbooks')) {
                    document.title = document.title.replace('Apexbooks', newTitle);
                }
            }

            // Commit Theme
            if (pendingChanges.theme) {
                localStorage.setItem('apexbooks-theme', pendingChanges.theme);
            }

            // Commit Logo
            if (pendingChanges.logo !== undefined) {
                if (pendingChanges.logo === null) {
                    localStorage.removeItem('apexbooks-logo');
                } else {
                    localStorage.setItem('apexbooks-logo', pendingChanges.logo);
                }
            }
                       // Commit new Product Settings (Category, Tax, Units, Display Mode, Stock)
            const defaultCategory = document.querySelector('input[name="default_category"]');
            const defaultTax = document.querySelector('input[name="default_tax_rate"]');
            const defaultUnit = document.querySelector('select[name="default_unit"]');
            const displayMode = document.getElementById('productDisplayMode');
            const stockWarning = document.getElementById('stockWarningLevel');

            if (defaultCategory) localStorage.setItem('apexbooks-default-category', defaultCategory.value);
            if (defaultTax) localStorage.setItem('apexbooks-default-tax', defaultTax.value);
            if (defaultUnit) localStorage.setItem('apexbooks-default-unit', defaultUnit.value);
            if (displayMode) localStorage.setItem('apexbooks-display-mode', displayMode.value);
            if (stockWarning) localStorage.setItem('apexbooks-stock-warning', stockWarning.value);

            // Clear Pending
            pendingChanges = {}; 

            // Button Feedback
            brandSaveBtn.textContent = '✅ Saved!';
            
            setTimeout(() => {
                clearDirty();
            }, 1000);
        });
    }
        // ==========================================
    // 10. GENERIC FORM HANDLERS WITH PATTERN VALIDATION
    // ==========================================
    
    // RegEx patterns
    const patterns = {
        email: /^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/,
        phone: /^(\+92|0)3\d{9}$/, // Pakistani mobile format (03001234567)
        name: /^[A-Za-z0-9][A-Za-z0-9 .,&'()\-]*$/, // Letters, numbers, basic punctuation
        url: /^(https?:\/\/)?(www\.)?[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}(\/\S*)?$/
    };

    // Function to validate a single input
    function validateInput(input) {
        const errorMsg = input.parentElement.querySelector('.field-error');
        const rule = input.getAttribute('data-validation');
        const value = input.value.trim();
        
        // Reset state
        input.style.borderColor = '';
        if (errorMsg) {
            errorMsg.style.display = 'none';
            errorMsg.textContent = '';
        }

        // 1. Check required
        if (input.hasAttribute('required') && value === '') {
            input.style.borderColor = '#EF4444';
            if (errorMsg) {
                errorMsg.style.display = 'block';
                errorMsg.textContent = 'This field is required';
            }
            return false;
        }

        // 2. Check pattern (only if not empty)
        if (value !== '' && rule && patterns[rule]) {
            if (!patterns[rule].test(value)) {
                input.style.borderColor = '#EF4444';
                if (errorMsg) {
                    errorMsg.style.display = 'block';
                    
                    // Custom messages per rule
                    if (rule === 'email') errorMsg.textContent = 'Invalid email format (e.g. name@example.com)';
                    if (rule === 'phone') errorMsg.textContent = 'Invalid phone format (e.g. There should be 11 digits starting with 03)';
                    if (rule === 'name') errorMsg.textContent = 'Can only contain letters, numbers, and basic punctuation';
                    if (rule === 'url') errorMsg.textContent = 'Invalid URL (e.g. www.example.com)';
                }
                return false;
            }
        }

        return true; // Valid
    }

    // Add live validation on inputs
    document.querySelectorAll('input[data-validation]').forEach(input => {
        input.addEventListener('input', function() {
            validateInput(this);
        });
    });

    // Save Form function (blocks if invalid)
    function saveFormData(formId, storageKey) {
        const form = document.getElementById(formId);
        if (!form) return false;

        let isValid = true;
        
        // Validate all inputs in the form
        form.querySelectorAll('input[data-validation]').forEach(input => {
            if (!validateInput(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            return false; // Stop save
        }

        // Save to localStorage
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        localStorage.setItem(storageKey, JSON.stringify(data));
        
        return true; // Save successful
    }

    // Load Form data (unchanged)
    function loadFormData(formId, storageKey) {
        const form = document.getElementById(formId);
        if (!form) return;
        const savedData = localStorage.getItem(storageKey);
        if (savedData) {
            const data = JSON.parse(savedData);
            Object.keys(data).forEach(key => {
                const input = form.elements[key];
                if (input) input.value = data[key];
            });
        }
    }

    // Load saved data on page load
    loadFormData('systemSettingsForm', 'apexbooks-system-settings');
    loadFormData('companySettingsForm', 'apexbooks-company-settings');
    loadFormData('contactSettingsForm', 'apexbooks-contact-settings');

    // Handle System Settings Save (No complex validation needed here usually)
    const systemForm = document.getElementById('systemSettingsForm');
    if (systemForm) {
        systemForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Simple save for System
            const formData = new FormData(systemForm);
            const data = {};
            formData.forEach((value, key) => data[key] = value);
            localStorage.setItem('apexbooks-system-settings', JSON.stringify(data));
            
            const btn = document.getElementById('systemSaveBtn');
            const originalText = btn.textContent;
            btn.textContent = '✅ Saved!';
            setTimeout(() => btn.textContent = originalText, 1000);
        });
    }

    // Handle Company Settings Save
    const companyForm = document.getElementById('companySettingsForm');
    if (companyForm) {
        companyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const success = saveFormData('companySettingsForm', 'apexbooks-company-settings');
            
            if (success) {
                const btn = document.getElementById('companySaveBtn');
                const originalText = btn.textContent;
                btn.textContent = '✅ Saved!';
                setTimeout(() => btn.textContent = originalText, 1000);
            }
        });
    }

    // Handle Contact Settings Save
    const contactForm = document.getElementById('contactSettingsForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const success = saveFormData('contactSettingsForm', 'apexbooks-contact-settings');
            
            if (success) {
                const btn = document.getElementById('contactSaveBtn');
                const originalText = btn.textContent;
                btn.textContent = '✅ Saved!';
                setTimeout(() => btn.textContent = originalText, 1000);
            }
        });
    }

 
    // ==========================================
    // 11. PRODUCT SETTINGS SAVE & LOAD
    // ==========================================
    
    // Variables to hold the lists
    let savedCategories = JSON.parse(localStorage.getItem('apexbooks-categories')) || [
        "Fashion & Apparel", 
        "Books & Stationery", 
        "Jewelry & Accessories", 
        "Health & Beauty"
    ];
    
    let savedTaxes = JSON.parse(localStorage.getItem('apexbooks-taxes')) || [
        { name: "GST", rate: "18.00" }, 
        { name: "VAT", rate: "12.00" }, 
        { name: "Service Tax", rate: "15.00" }, 
        { name: "Sales Tax", rate: "8.50" }
    ];

     let savedUnits = JSON.parse(localStorage.getItem('apexbooks-units-list')) || [
        "Size", "Bundle", "Book", "Ream", "Sheet", "Notebook", 
        "Pot", "Set", "Unit", "Pack", "Pair", "Dozen", 
        "Carton", "Gallon", "Toy", "Game", "Puzzle", "Carat", 
        "Basket", "Crate", "Ton", "Liter", "Can", "Box", 
        "Ounce", "Jar", "Tube", "Milliliter", "Kilogram", "Gram", 
        "Inch", "Foot", "Equipment", "Ball", "Kit", "Bottle", 
        "Piece", "Bag", "Packet", "Meter", "Centimeter", "Millimeter"
    ];

    const productSaveBtn = document.getElementById('productSaveBtn');
    if (productSaveBtn) {
        productSaveBtn.addEventListener('click', function() {
            // Save arrays to localStorage
            localStorage.setItem('apexbooks-categories', JSON.stringify(savedCategories));
            localStorage.setItem('apexbooks-taxes', JSON.stringify(savedTaxes));
           localStorage.setItem('apexbooks-units-list', JSON.stringify(savedUnits));

            // Save other product settings
            const defaultUnit = document.querySelector('select[name="default_unit"]');
            const displayMode = document.getElementById('productDisplayMode');
            const stockWarning = document.getElementById('stockWarningLevel');

            if (defaultUnit) localStorage.setItem('apexbooks-default-unit', defaultUnit.value);
            if (displayMode) localStorage.setItem('apexbooks-display-mode', displayMode.value);
            if (stockWarning) localStorage.setItem('apexbooks-stock-warning', stockWarning.value);

            // Button Feedback
            const originalText = productSaveBtn.textContent;
            productSaveBtn.textContent = '✅ Saved!';
            setTimeout(() => productSaveBtn.textContent = originalText, 1000);
        });
    }

    // ==========================================
    // 12. CATEGORY TABLE ACTION MENU & LOGIC
    // ==========================================
    const categoryMenuHTML = `
        <div class="category-action-dropdown" style="position: absolute; top: 100%; right: 20px; background: var(--white); border: 1px solid var(--border-color); border-radius: 6px; box-shadow: 0 4px 12px var(--shadow-color); padding: 6px; min-width: 120px; z-index: 100; display: none; text-align: left;">
            <button class="category-action-item" style="display: flex; align-items: center; gap: 8px; width: 100%; padding: 8px 12px; background: transparent; border: none; font-size: 0.85rem; color: var(--text-main); cursor: pointer; border-radius: 4px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px; color: var(--primary);"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Edit
            </button>
            <button class="category-action-item" style="display: flex; align-items: center; gap: 8px; width: 100%; padding: 8px 12px; background: transparent; border: none; font-size: 0.85rem; color: #EF4444; cursor: pointer; border-radius: 4px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                Delete
            </button>
        </div>
    `;

    const categoryTableBody = document.querySelector('.category-table tbody');
    const addCategoryBtn = document.getElementById('addCategoryBtn');
    const categoryModal = document.getElementById('categoryModal');
    const cancelCategoryBtn = document.getElementById('cancelCategoryBtn');
    const saveCategoryBtn = document.getElementById('saveCategoryBtn');
    const newCategoryName = document.getElementById('newCategoryName');

    // Function to Render Category Table
    function renderCategoryTable() {
        if (!categoryTableBody) return;
        categoryTableBody.innerHTML = '';
        
        savedCategories.forEach((category) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${category}</td>
                <td class="text-right action-cell">
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </td>
            `;
            categoryTableBody.appendChild(tr);
            
            // Attach dropdown menu
            const newCell = tr.querySelector('.action-cell');
            newCell.insertAdjacentHTML('beforeend', categoryMenuHTML);
        });
    }

    // Initial Render
    renderCategoryTable();

    // Modal logic
    if (addCategoryBtn) {
        addCategoryBtn.addEventListener('click', () => {
            categoryModal.classList.add('open');
            newCategoryName.value = '';
            newCategoryName.focus();
        });
    }

    if (cancelCategoryBtn) {
        cancelCategoryBtn.addEventListener('click', () => {
            categoryModal.classList.remove('open');
        });
    }

    if (categoryModal) {
        categoryModal.addEventListener('click', (e) => {
            if (e.target === categoryModal) {
                categoryModal.classList.remove('open');
            }
        });
    }

    if (saveCategoryBtn) {
        saveCategoryBtn.addEventListener('click', () => {
            const name = newCategoryName.value.trim();
            if (!name) {
                alert('Please enter a category name.');
                return;
            }
            
            // Push to Array
            savedCategories.push(name);
            
            // Re-render
            renderCategoryTable();
            
            // Close Modal
            categoryModal.classList.remove('open');
        });
    }

    if (newCategoryName) {
        newCategoryName.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                saveCategoryBtn.click();
            }
        });
    }

    // ==========================================
    // 13. ADD NEW TAX LOGIC & DYNAMIC ACTION MENU
    // ==========================================
    const taxMenuHTML = `
        <div class="action-dropdown" style="position: absolute; top: 100%; right: 20px; background: var(--white); border: 1px solid var(--border-color); border-radius: 6px; box-shadow: 0 4px 12px var(--shadow-color); padding: 6px; min-width: 120px; z-index: 100; display: none; text-align: left;">
            <button class="action-dropdown-item" style="display: flex; align-items: center; gap: 8px; width: 100%; padding: 8px 12px; background: transparent; border: none; font-size: 0.85rem; color: var(--text-main); cursor: pointer; border-radius: 4px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px; color: var(--primary);"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Edit
            </button>
            <button class="action-dropdown-item" style="display: flex; align-items: center; gap: 8px; width: 100%; padding: 8px 12px; background: transparent; border: none; font-size: 0.85rem; color: #EF4444; cursor: pointer; border-radius: 4px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                Delete
            </button>
        </div>
    `;

    const addTaxBtn = document.getElementById('addTaxBtn');
    const taxModal = document.getElementById('taxModal');
    const cancelTaxBtn = document.getElementById('cancelTaxBtn');
    const saveTaxBtn = document.getElementById('saveTaxBtn');
    const newTaxName = document.getElementById('newTaxName');
    const newTaxRate = document.getElementById('newTaxRate');
    const taxTableBody = document.getElementById('taxTableBody');

    // Function to Render Tax Table
    function renderTaxTable() {
        if (!taxTableBody) return;
        taxTableBody.innerHTML = '';

        savedTaxes.forEach((tax) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${tax.name}</td>
                <td><span class="tax-badge">${tax.rate}</span></td>
                <td class="text-right action-cell">
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </td>
            `;
            taxTableBody.appendChild(tr);
            
            // Attach dropdown menu
            const newCell = tr.querySelector('.action-cell');
            newCell.insertAdjacentHTML('beforeend', taxMenuHTML);
        });
    }

    // Initial Render
    renderTaxTable();

    // Modal Logic
    if (addTaxBtn) {
        addTaxBtn.addEventListener('click', () => {
            taxModal.classList.add('open');
            newTaxName.value = '';
            newTaxRate.value = '';
            newTaxName.focus();
        });
    }

    if (cancelTaxBtn) {
        cancelTaxBtn.addEventListener('click', () => {
            taxModal.classList.remove('open');
        });
    }

    if (taxModal) {
        taxModal.addEventListener('click', (e) => {
            if (e.target === taxModal) {
                taxModal.classList.remove('open');
            }
        });
    }

    if (saveTaxBtn) {
        saveTaxBtn.addEventListener('click', () => {
            const name = newTaxName.value.trim();
            const rate = newTaxRate.value.trim();

            if (!name || !rate) {
                alert('Please enter both tax name and rate.');
                return;
            }

            // Format rate
            const formattedRate = parseFloat(rate).toFixed(2);

            // Push to Array
            savedTaxes.push({ name: name, rate: formattedRate });
            
            // Re-render
            renderTaxTable();
            
            // Close Modal
            taxModal.classList.remove('open');
        });
    }
      // ==========================================
    // 13.5 UNITS TABLE & MODAL LOGIC
    // ==========================================
    const unitTableBody = document.getElementById('unitTableBody');
    const addUnitBtn = document.getElementById('addUnitBtn');
    const unitModal = document.getElementById('unitModal');
    const cancelUnitBtn = document.getElementById('cancelUnitBtn');
    const addUnitSubmitBtn = document.getElementById('addUnitSubmitBtn');
    const newUnitName = document.getElementById('newUnitName');

    // Function to Render Unit Table
    function renderUnitTable() {
        if (!unitTableBody) return;
        unitTableBody.innerHTML = '';

        savedUnits.forEach((unit, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${unit}</td>
                <td class="text-right action-cell" style="position: relative;">
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </td>
            `;
            unitTableBody.appendChild(tr);
            
            // Attach dropdown menu (Using your existing taxMenuHTML variable)
            const newCell = tr.querySelector('.action-cell');
            if (typeof taxMenuHTML !== 'undefined') {
                newCell.insertAdjacentHTML('beforeend', taxMenuHTML);
                
                // Attach Delete functionality
                const deleteBtn = newCell.querySelector('.action-dropdown-item:last-child');
                if (deleteBtn) {
                    deleteBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        if(confirm(`Are you sure you want to delete "${unit}"?`)) {
                            savedUnits.splice(index, 1);
                            localStorage.setItem('apexbooks-units-list', JSON.stringify(savedUnits)); // Instant save
                            renderUnitTable();
                        }
                    });
                }
            }
        });
    }

    // Initial Render
    renderUnitTable();

    // Open Modal
    if (addUnitBtn) {
        addUnitBtn.addEventListener('click', () => {
            unitModal.classList.add('open');
            newUnitName.value = '';
            newUnitName.focus();
        });
    }

    // Close Modal
    if (cancelUnitBtn) cancelUnitBtn.addEventListener('click', () => unitModal.classList.remove('open'));
    if (unitModal) unitModal.addEventListener('click', (e) => { if (e.target === unitModal) unitModal.classList.remove('open'); });

    // Handle "Add" Button Click
    if (addUnitSubmitBtn) {
        addUnitSubmitBtn.addEventListener('click', () => {
            const name = newUnitName.value.trim();
            if (!name) return alert('Please enter a unit name.');
            
            // Push to Array
            savedUnits.push(name);
            
            // Save instantly to LocalStorage so it doesn't disappear on reload
            localStorage.setItem('apexbooks-units-list', JSON.stringify(savedUnits));
            
            // Re-render table
            renderUnitTable();
            
            // Close Modal
            unitModal.classList.remove('open');
        });
    }

    // Handle Enter Key in input
    if (newUnitName) {
        newUnitName.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addUnitSubmitBtn.click();
            }
        });
    }

    
    // ==========================================
    // 14. GLOBAL DROPDOWN TOGGLE LOGIC (Supports Dynamic Elements)
    // ==========================================
    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        if (menuBtn) {
            e.stopPropagation();
            const dropdown = menuBtn.nextElementSibling;
            
            document.querySelectorAll('.action-dropdown, .category-action-dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });

            if (dropdown) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        } else {
            document.querySelectorAll('.action-dropdown, .category-action-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});