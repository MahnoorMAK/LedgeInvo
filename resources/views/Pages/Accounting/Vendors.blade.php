@extends('Layout.dashboard')

@section('title', 'Vendors - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Accounting/Vendors.css') }}">
@endsection

@section('content')
<div class="vendors-page-wrapper">
    
    <!-- Page Header -->
    <div class="vd-header">
        <div>
            <h1 class="vd-title">Manage Vendors</h1>
            <p class="vd-subtitle">View, create, and manage your business vendor accounts, contact details, and tax details.</p>
        </div>
        <a href="#" class="vd-add-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
    </div>

    <!-- Main Card -->
    <div class="vd-card">
        
        <!-- Controls Row -->
        <div class="vd-controls">
            <div class="vd-search-group">
                <div class="vd-search-wrapper">
                    <svg class="vd-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="vd-search-input" placeholder="Search vendors...">
                </div>
                <button class="vd-search-btn">Search</button>
            </div>

            <div class="vd-action-group">
                <!-- View Toggles (List / Grid) -->
                <div class="vd-view-toggle">
                    <button class="vd-view-btn active" id="viewListBtn" title="List View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="vd-view-btn" id="viewGridBtn" title="Grid View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>
                
                <!-- Custom Dropdown (Per Page) -->
                <div class="vd-custom-dropdown" id="perPageDropdown">
                    <button type="button" class="vd-custom-dropdown-btn" id="perPageToggle">
                        <span id="perPageLabel">10 per page</span>
                        <svg class="vd-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <ul class="vd-custom-dropdown-menu" id="perPageMenu">
                        <li class="vd-custom-dropdown-item active" data-value="10">10 per page</li>
                        <li class="vd-custom-dropdown-item" data-value="25">25 per page</li>
                        <li class="vd-custom-dropdown-item" data-value="50">50 per page</li>
                    </ul>
                </div>

                <!-- Filter Toggle -->
                <button class="vd-filter-btn" id="vdFilterToggle">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Filter Panel -->
        <div class="vd-filter-panel" id="vdFilterPanel">
            <div class="vd-filter-row">
                <div class="vd-filter-group">
                    <label>Vendor Code</label>
                    <input type="text" class="vd-input" id="filterCode" placeholder="Filter by vendor code">
                </div>
                <div class="vd-filter-group">
                    <label>Company Name</label>
                    <input type="text" class="vd-input" id="filterCompany" placeholder="Filter by company name">
                </div>
                <div class="vd-filter-group">
                    <label>Tax Number</label>
                    <input type="text" class="vd-input" id="filterTax" placeholder="Filter by tax number">
                </div>
            </div>
            <div class="vd-filter-actions">
                <button class="vd-search-btn vd-btn-apply" id="applyFiltersBtn">Apply</button>
                <button class="vd-search-btn vd-btn-clear" id="clearFiltersBtn">Clear</button>
            </div>
        </div>

        <!-- View Container -->
        <div class="vd-view-container" id="vendorsContainer">
            
            <!-- List View (Table) -->
            <div class="vd-table-wrapper">
                <table class="vd-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Vendor Code</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Tax Number</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=alex" alt="Alex" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Alex Vendor</span>
                                        <span class="vd-user-email">alex.vendor@supplier.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-yellow">VEN-0001</span></td>
                            <td>Isom Boyle</td>
                            <td>thiel.dale@lueilwitz.com</td>
                            <td class="col-tax"><span class="vd-badge badge-pink">TAX-93868781</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=sam" alt="Sam" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Sam Supplier</span>
                                        <span class="vd-user-email">sam.supplier@vendor.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-yellow">VEN-0002</span></td>
                            <td>Roxanne Swaniawski</td>
                            <td>favian.oreilly@hermann.com</td>
                            <td class="col-tax"><span class="vd-badge badge-green">TAX-05245932</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=tech" alt="Tech" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Tech Solutions Inc</span>
                                        <span class="vd-user-email">contact@techsolutions.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-pink">VEN-0003</span></td>
                            <td>Mr. Olaf Goodwin I</td>
                            <td>tcrona@balistreri.org</td>
                            <td class="col-tax"><span class="vd-badge badge-purple">TAX-34726937</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=global" alt="Global" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Global Supplies Co</span>
                                        <span class="vd-user-email">info@globalsupplies.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-blue">VEN-0004</span></td>
                            <td>Roderick Jacobson</td>
                            <td>ferry.greg@altenwerth.com</td>
                            <td class="col-tax"><span class="vd-badge badge-blue">TAX-45225747</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 5 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=prime" alt="Prime" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Prime Materials Ltd</span>
                                        <span class="vd-user-email">sales@primematerials.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-purple">VEN-0005</span></td>
                            <td>Retta Runolfsdottir</td>
                            <td>kerluke.darron@stanton.com</td>
                            <td class="col-tax"><span class="vd-badge badge-blue">TAX-68042462</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 6 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=quality" alt="Quality" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Quality Parts Corp</span>
                                        <span class="vd-user-email">support@qualityparts.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-yellow">VEN-0006</span></td>
                            <td>John Doe</td>
                            <td>john@qualityparts.com</td>
                            <td class="col-tax"><span class="vd-badge badge-green">TAX-11223344</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 7 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=elite" alt="Elite" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Elite Vendors Group</span>
                                        <span class="vd-user-email">orders@elitevendors.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-pink">VEN-0007</span></td>
                            <td>Jane Smith</td>
                            <td>jane@elitevendors.com</td>
                            <td class="col-tax"><span class="vd-badge badge-purple">TAX-55667788</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 8 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=office" alt="Office" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Office Supplies Co</span>
                                        <span class="vd-user-email">sales@officesupplies.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-blue">VEN-0008</span></td>
                            <td>Mike Johnson</td>
                            <td>mike@officesupplies.com</td>
                            <td class="col-tax"><span class="vd-badge badge-green">TAX-99887766</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 9 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=furniture" alt="Furniture" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Modern Furniture Ltd</span>
                                        <span class="vd-user-email">info@modernfurniture.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-yellow">VEN-0009</span></td>
                            <td>Sarah Lee</td>
                            <td>sarah@modernfurniture.com</td>
                            <td class="col-tax"><span class="vd-badge badge-blue">TAX-44332211</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                        <!-- Row 10 -->
                        <tr>
                            <td>
                                <div class="vd-user-cell">
                                    <img src="https://i.pravatar.cc/150?u=marketing" alt="Marketing" class="vd-avatar">
                                    <div class="vd-user-info">
                                        <span class="vd-user-name col-name">Marketing Agency</span>
                                        <span class="vd-user-email">hello@marketingagency.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-code"><span class="vd-badge badge-pink">VEN-0010</span></td>
                            <td>David Brown</td>
                            <td>david@marketingagency.com</td>
                            <td class="col-tax"><span class="vd-badge badge-purple">TAX-12341234</span></td>
                            <td class="text-right vd-actions-cell">
                                <button class="action-menu-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Grid View (Hidden by default) -->
            <div class="vd-grid-view" style="display: none;">
                <!-- Grid Cards will be generated via JS or mirrored here -->
            </div>

        </div>

        <!-- Footer -->
        <div class="vd-footer">
            <div class="vd-results-info">Showing 1 to 10 of 15 results</div>
            <div class="vd-pagination">
                <button class="vd-page-btn disabled">&lt; Previous</button>
                <button class="vd-page-btn active">1</button>
                <button class="vd-page-btn">2</button>
                <button class="vd-page-btn">Next &gt;</button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- HIDDEN TEMPLATE FOR 3-DOT MENU             -->
<!-- ========================================== -->
<template id="action-menu-template">
    <div class="action-dropdown">
        <button class="action-dropdown-item text-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            Document
        </button>
        <button class="action-dropdown-item text-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            View
        </button>
        <button class="action-dropdown-item text-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            Edit
        </button>
        <button class="action-dropdown-item text-danger">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            Delete
        </button>
    </div>
</template>
@endsection

@section('scripts')
    <script src="{{ asset('js/Accounting/Vendors.js') }}"></script>
@endsection