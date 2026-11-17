@extends('Layout.dashboard')

@section('title', 'Manage Categories')
@section('page-name', 'Categories')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection

@section('content')

    <!-- Page Title -->
    <div class="page-title">
        <h1>Manage Categories</h1>
        <p>Manage and organize goal categories, codes, descriptions, and status settings.</p>
    </div>

    <div class="categories-layout">
        
        <!-- Left Side: Add Form -->
        <div class="form-container">
            <h3>Add New Category</h3>
            <p>Fill in the details to create a new category</p>
            
            <form id="addCategoryForm">
                <div class="form-group">
                    <label>Category Name <span>*</span></label>
                    <input type="text" id="catName" placeholder="Enter category name" required>
                </div>
                
                <div class="form-group">
                    <label>Category Code <span>*</span></label>
                    <input type="text" id="catCode" placeholder="Enter category code" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="catDesc" placeholder="Enter description"></textarea>
                </div>
                
                <div class="toggle-group">
                    <label class="switch">
                        <input type="checkbox" id="catStatus" checked>
                        <span class="slider"></span>
                    </label>
                    <span>Status</span>
                </div>
                
                <button type="submit" class="btn-submit">Add Category</button>
            </form>
        </div>

        <!-- Right Side: Table -->
        <div class="table-container">
            <!-- Filters Top Bar -->
            <div class="table-header-filters">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="searchInput" placeholder="Search categories...">
                    <button class="btn-search" id="searchBtn">Search</button>
                </div>
                
                <div class="right-filters">
                    <!-- 10 Per Page Dropdown -->
                    <div class="dropdown custom-dropdown">
                        <button class="drop-btn">10 per page <i class="fa-solid fa-chevron-down"></i></button>
                        <div class="dropdown-content">
                            <a href="#">10 per page</a>
                            <a href="#">25 per page</a>
                            <a href="#">50 per page</a>
                        </div>
                    </div>

                    <!-- Filters Dropdown -->
                    <div class="dropdown custom-dropdown">
                        <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
                        <div class="dropdown-content">
                            <a href="#">All Categories</a>
                            <a href="#">Active Only</a>
                            <a href="#">Inactive Only</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Category <i class="fa-solid fa-arrow-up"></i></th>
                            <th>Code <i class="fa-solid fa-arrow-up"></i></th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTableBody">
                        <!-- Row 1 -->
                        <tr class="category-row">
                            <td>
                                <div class="category-info">
                                    <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                    <div class="category-text">
                                        <h4>Personal Development</h4>
                                        <p>Goals focused on self-improvement and skill development</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="code-badge code-purple">PERSONAL_DEV</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td class="actions">
                                <i class="fa-regular fa-pen-to-square action-icon"></i>
                                <i class="fa-regular fa-trash-can action-icon"></i>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="category-row">
                            <td>
                                <div class="category-info">
                                    <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                    <div class="category-text">
                                        <h4>Career Growth</h4>
                                        <p>Professional advancement and career-related objectives</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="code-badge code-pink">CAREER</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td class="actions">
                                <i class="fa-regular fa-pen-to-square action-icon"></i>
                                <i class="fa-regular fa-trash-can action-icon"></i>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="category-row">
                            <td>
                                <div class="category-info">
                                    <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                    <div class="category-text">
                                        <h4>Health & Fitness</h4>
                                        <p>Physical and mental wellness goals</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="code-badge code-green">HEALTH</span></td>
                            <td><span class="status-badge status-inactive">Inactive</span></td>
                            <td class="actions">
                                <i class="fa-regular fa-pen-to-square action-icon"></i>
                                <i class="fa-regular fa-trash-can action-icon"></i>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="category-row">
                            <td>
                                <div class="category-info">
                                    <div class="category-icon"><i class="fa-solid fa-tag"></i></div>
                                    <div class="category-text">
                                        <h4>Financial</h4>
                                        <p>Money management and financial planning goals</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="code-badge code-blue">FINANCE</span></td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td class="actions">
                                <i class="fa-regular fa-pen-to-square action-icon"></i>
                                <i class="fa-regular fa-trash-can action-icon"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/categories.js') }}"></script>
@endsection