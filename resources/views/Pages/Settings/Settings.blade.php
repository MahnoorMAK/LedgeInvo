@extends('Layout.dashboard')

@section('title', 'Settings - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Settings/settings.css') }}">
@endsection

@section('content')
<div class="settings-page-wrapper">
    
    <h1 class="settings-title">Settings</h1>
    <p class="settings-text">Manage your system settings.</p>

    <div class="settings-layout">

        <!-- LEFT MENU -->
        <div class="settings-menu">
            <p class="settings-group">Core Configuration</p>
            
            <a href="#" class="settings-link active" data-section="section-brand">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>
                Brand Settings
            </a>
                        <a href="#" class="settings-link" data-section="section-product">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 7h-9"></path><path d="M14 17H5"></path><circle cx="17" cy="17" r="3"></circle><circle cx="7" cy="7" r="3"></circle></svg>
                Product Settings
            </a>
            <a href="#" class="settings-link" data-section="section-system">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                System Settings
            </a>
            <a href="#" class="settings-link" data-section="section-company">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/></svg>
                Company Settings
            </a>
            
            <p class="settings-group">Integrations & Contact</p>
            <a href="#" class="settings-link" data-section="section-contact">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Contact Settings
            </a>
        </div>

        <!-- MAIN CONTENT -->
        <div class="settings-main">

            <!-- 1. BRAND SETTINGS -->
            <div class="section active" id="section-brand">
                <div class="settings-card">
                    <div class="settings-top">
                        <div>
                            <h3 class="settings-heading" id="brandHeading">Brand Settings</h3>
                            <p class="settings-small">Customize your application's branding and appearance</p>
                        </div>
                        <button class="save-btn" id="brandSave">Save Changes</button>
                    </div>

                    <div class="tabs">
                        <button class="tab-btn active" data-tab="tab-font">Font</button>
                        <button class="tab-btn" data-tab="tab-text">Text</button>
                        <button class="tab-btn" data-tab="tab-theme">Theme</button>
                        <button class="tab-btn" data-tab="tab-logo">Logo</button>
                    </div>

                    <!-- Tab: Font -->
                    <div class="tab-panel active" id="tab-font">
                        <div class="form-group">
                            <label class="label">Website Font</label>
                            <p class="settings-small">Select your primary font.</p>
                            
                            <div class="font-row">
                                <button type="button" class="font-btn active font-inter" data-font="'Inter', sans-serif">Inter</button>
                                <button type="button" class="font-btn font-segoe" data-font="'Segoe UI', sans-serif">Segoe UI</button>
                                <button type="button" class="font-btn font-poppins" data-font="'Poppins', sans-serif">Poppins</button>
                                <button type="button" class="font-btn font-roboto" data-font="'Roboto', sans-serif">Roboto</button>
                                <button type="button" class="font-btn font-noto" data-font="'Noto Serif', serif">Noto Serif</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Text -->
                    <div class="tab-panel" id="tab-text">
                        <div class="form-group">
                            <label class="label">Title Text</label>
                            <input type="text" class="text-input" id="titleText" value="Apexbooks">
                            <p class="settings-small">Application title displayed in the browser tab</p>
                        </div>
                    </div>

                    <!-- Tab: Theme -->
                    <div class="tab-panel" id="tab-theme">
                        <div class="form-group">
                            <label class="label">Theme Color</label>
                            <p class="settings-small">Select the main brand color for the whole site.</p>
                            
                            <div class="color-grid">
                                <button class="color-box active" data-theme="purple"><span class="color-dot dot-purple"></span><span class="color-name">Default</span></button>
                                <button class="color-box" data-theme="ocean"><span class="color-dot dot-ocean"></span><span class="color-name">Ocean</span></button>
                                <button class="color-box" data-theme="emerald"><span class="color-dot dot-emerald"></span><span class="color-name">Emerald</span></button>
                                <button class="color-box" data-theme="sunset"><span class="color-dot dot-sunset"></span><span class="color-name">Sunset</span></button>
                                <button class="color-box" data-theme="rose"><span class="color-dot dot-rose"></span><span class="color-name">Rose</span></button>
                                <button class="color-box" data-theme="sky"><span class="color-dot dot-sky"></span><span class="color-name">Sky</span></button>
                            </div>
                        </div>

                        <div class="form-group form-divider">
                            <label class="label">Custom Color</label>
                            <p class="settings-small">Enter a HEX code (e.g. #FF0000) to apply a custom theme.</p>
                            <div class="custom-color-row">
                                    <div class="custom-color-preview" id="colorPreview"></div>
                                    <input type="text" class="custom-color-input" value="" placeholder="#000000">
                                    <button class="btn-primary">Apply</button>
                            </div>
                        </div>

                        <div class="form-group form-divider">
                            <label class="label">Appearance Mode</label>
                            <p class="settings-small">Toggle between Light and Dark theme.</p>
                            
                            <button type="button" class="theme-toggle-btn" id="settingsThemeToggle">
                                <span id="settingsThemeText">Switch to Dark Mode</span>
                                <svg id="settingsIconSun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                <svg id="settingsIconMoon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            </button>
                        </div>  
                    </div>

                    <!-- Tab: Logo -->
                    <div class="tab-panel" id="tab-logo">
                        <div class="form-group">
                            <label class="label">Company Logo</label>
                            <p class="settings-small">Upload a custom logo for your application.</p>
                            
                            <div class="logo-preview-box" id="logoPreviewBox">
                                <span class="logo-empty-text" id="logoEmptyText">No logo selected</span>
                                <img id="logoPreviewImg" src="" alt="Logo Preview">
                            </div>

                            <input type="file" id="lgFile" accept="image/*" hidden>

                            <div class="logo-actions">
                                <button type="button" class="btn-primary" id="lgChoose">Choose Image</button>
                                <button type="button" class="btn-danger" id="lgDelete">Delete Logo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- NEW: PRODUCT SETTINGS -->
            <div class="section" id="section-product">
                <div class="settings-card">
                    <div class="settings-top">
                        <div>
                            <h3 class="settings-heading" id="productHeading">Product Settings</h3>
                            <p class="settings-small">Configure how your products are displayed and managed.</p>
                        </div>
                        <button class="save-btn" id="productSaveBtn">Save Changes</button>
                    </div>

                    <div class="brand-settings-layout">
                        <!-- Vertical Tabs -->
                        <div class="brand-tabs">
                            <button class="brand-tab-btn active" data-tab="tab-category">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                Category
                            </button>
                            
                            <button class="brand-tab-btn" data-tab="tab-taxes">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
                                Taxes
                            </button>
                            
                            <button class="brand-tab-btn" data-tab="tab-units">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4v16h16V4H4zm2 2h12v12H6V6zm0 3h12M6 14h12M10 6v12M14 6v12"/></svg>
                                Units
                            </button>

                            
                            
                            <button class="brand-tab-btn" data-tab="tab-stock-warning">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                Stock Warning
                            </button>
                        </div>

                        <!-- Tab Content Area (The line you were looking for) -->
                        <div class="brand-tab-content">
                            
                            <!-- Tab: Category -->
                            <div class="tab-panel active" id="tab-category">
                                <div class="settings-top" style="margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border-color);">
                                    <div>
                                        <h3 class="settings-heading" style="font-size: 18px;">Category</h3>
                                    </div>
                                    <button type="button" class="btn-primary" id="addCategoryBtn" style="padding: 8px 12px; border-radius: 6px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 2px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                </div>

                                <div class="category-table-wrapper">
                                    <table class="category-table">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Fashion & Apparel</td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Books & Stationery</td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jewelry & Accessories</td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Health & Beauty</td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                                                <!-- Add Category Modal -->
                                <div class="category-modal-overlay" id="categoryModal">
                                    <div class="category-modal-content">
                                        <h3 class="settings-heading" style="font-size: 18px; margin-bottom: 12px;">Add New Category</h3>
                                        <div class="form-group">
                                            <label class="label">Category Name</label>
                                            <input type="text" class="text-input" id="newCategoryName" placeholder="e.g. Electronics">
                                        </div>
                                        <div class="modal-actions">
                                            <button type="button" class="btn-secondary" id="cancelCategoryBtn">Cancel</button>
                                            <button type="button" class="btn-primary" id="saveCategoryBtn">Add Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                        <!-- Tab: Taxes -->
                            <div class="tab-panel" id="tab-taxes">
                                <div class="settings-top" style="margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border-color);">
                                    <div>
                                        <h3 class="settings-heading" style="font-size: 18px;">Taxes</h3>
                                    </div>
                                    <button type="button" class="btn-primary" id="addTaxBtn" style="padding: 8px 12px; border-radius: 6px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 2px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                </div>

                                <div class="category-table-wrapper">
                                    <table class="category-table">
                                        <thead>
                                            <tr>
                                                <th>Tax Name</th>
                                                <th>Rate (%)</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="taxTableBody">
                                            <tr>
                                                <td>GST</td>
                                                <td><span class="tax-badge">18.00</span></td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VAT</td>
                                                <td><span class="tax-badge">12.00</span></td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Service Tax</td>
                                                <td><span class="tax-badge">15.00</span></td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sales Tax</td>
                                                <td><span class="tax-badge">8.50</span></td>
                                                <td class="text-right action-cell">
                                                    <button class="action-menu-btn">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Add Tax Modal -->
                                <div class="category-modal-overlay" id="taxModal">
                                    <div class="category-modal-content">
                                        <h3 class="settings-heading" style="font-size: 18px; margin-bottom: 12px;">Add New Tax</h3>
                                        <div class="form-group">
                                            <label class="label">Tax Name</label>
                                            <input type="text" class="text-input" id="newTaxName" placeholder="e.g. GST">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Rate (%)</label>
                                            <input type="number" class="text-input" id="newTaxRate" placeholder="e.g. 18.00">
                                        </div>
                                        <div class="modal-actions">
                                            <button type="button" class="btn-secondary" id="cancelTaxBtn">Cancel</button>
                                            <button type="button" class="btn-primary" id="saveTaxBtn">Add Tax</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab: Units -->
<!-- Tab: Units -->
<div class="tab-panel" id="tab-units">
    <div class="settings-top" style="margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border-color);">
        <div>
            <h3 class="settings-heading" style="font-size: 18px;">Units</h3>
        </div>
        <!-- Plus Button -->
        <button type="button" class="btn-primary" id="addUnitBtn" style="padding: 8px 12px; border-radius: 6px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 2px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </button>
    </div>

    <!-- Units Table -->
    <div class="category-table-wrapper">
        <table class="category-table">
            <thead>
                <tr>
                    <th>Unit Name</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody id="unitTableBody">
                <!-- Rendered via JS -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add New Unit Modal -->
<div class="category-modal-overlay" id="unitModal">
    <div class="category-modal-content">
        <h3 class="settings-heading" style="font-size: 18px; margin-bottom: 12px;">Add New Unit</h3>
        
        <div class="form-group">
            <label class="label">Unit Name</label>
            <input type="text" class="text-input" id="newUnitName" placeholder="e.g. Kilogram">
        </div>
        
        <div class="modal-actions">
            <!-- Buttons named exactly as requested -->
            <button type="button" class="btn-secondary" id="cancelUnitBtn">Cancel</button>
            <button type="button" class="btn-primary" id="addUnitSubmitBtn">Add</button>
        </div>
    </div>
</div>


                            <!-- Tab: Stock Warning -->
                            <div class="tab-panel" id="tab-stock-warning">
                                <div class="form-group">
                                    <label class="label">Stock Warning Level</label>
                                    <p class="settings-small">Set a threshold to receive alerts when stock is low.</p>
                                    <input type="number" class="text-input" id="stockWarningLevel" value="10" placeholder="e.g. 10">
                                </div>
                            </div>

                        </div>
                        <!-- End of Tab Content Area -->
                    </div>
                </div>
            </div>
            <!-- END NEW: PRODUCT SETTINGS -->
            
            <!-- 2. SYSTEM SETTINGS -->
            <div class="section" id="section-system">
                <div class="settings-card">
                    <form id="systemSettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">System Settings</h3>
                                <p class="settings-small">Configure system-wide settings.</p>
                            </div>
                            <button type="submit" class="save-btn" id="systemSaveBtn">Save Changes</button>
                        </div>
                        
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Time Zone</label>
                                <select class="text-input" name="timezone">
                                    <option>Asia/Karachi</option>
                                    <option>UTC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Date Format</label>
                                <select class="text-input" name="date_format">
                                    <option>DD-MM-YYYY</option>
                                    <option>MM/DD/YYYY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Time Format</label>
                                <select class="text-input" name="time_format">
                                    <option>12 Hour (02:30 PM)</option>
                                    <option>24 Hour (14:30)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Currency</label>
                                <select class="text-input" name="currency">
                                    <option>USD - US Dollar</option>
                                    <option>PKR - Pakistani Rupee</option>
                                </select>
                            </div>
                            <div class="form-group full-width">
                                <label class="label">Symbol Position</label>
                                <select class="text-input" name="symbol_position">
                                    <option>Before amount (Rs 100)</option>
                                    <option>After amount (100 Rs)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 3. COMPANY SETTINGS -->
            <div class="section" id="section-company">
                <div class="settings-card">
                    <form id="companySettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">Company Settings</h3>
                                <p class="settings-small">Your company details shown on invoices</p>
                            </div>
                            <button type="submit" class="save-btn" id="companySaveBtn">Save Changes</button>
                        </div>
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Company Name <span class="required">*</span></label>
                                <input type="text" class="text-input" name="company_name" value="nestle" required data-validation="name">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Registration Number</label>
                                <input type="text" class="text-input" name="registration_number" value="254189786">
                            </div>
                            <div class="form-group">
                                <label class="label">Phone Number <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="phone" value="03001234567" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Company Email <span class="required">*</span></label>
                                <input type="email" class="text-input" name="email" value="test@gmail.com" required data-validation="email">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Invoice Date Format</label>
                                <select class="text-input" name="invoice_date_format">
                                    <option>DD-MM-YYYY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Invoice Time Format</label>
                                <select class="text-input" name="invoice_time_format">
                                    <option>24 Hour (14:30)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 4. CONTACT SETTINGS -->
            <div class="section" id="section-contact">
                <div class="settings-card">
                    <form id="contactSettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">Contact Settings</h3>
                                <p class="settings-small">How your clients can reach you</p>
                            </div>
                            <button type="submit" class="save-btn" id="contactSaveBtn">Save Changes</button>
                        </div>
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Phone <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="contact_phone" value="03002182880" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">WhatsApp <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="whatsapp" value="03008678901" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Email <span class="required">*</span></label>
                                <input type="email" class="text-input" name="contact_email" value="abc@gmail.com" required data-validation="email">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Website</label>
                                <input type="text" class="text-input" name="website" value="www.abc.com" data-validation="url">
                                <small class="field-error"></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/Settings/settings.js') }}"></script>
@endsection