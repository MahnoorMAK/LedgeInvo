@extends('Layout.Fizadashboard')

@section('title', 'Manage Quotations')
@section('page-name', 'Quotations')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/quotation-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')

<div class="page-wrapper">
    
    <!-- Page Header & Add Button -->
    <div class="page-title">
        <div>
            <h1>Manage Quotations</h1>
            <p>Manage and track all customer quotations and their statuses.</p>
        </div>
        
        <!-- Purple + Button (Yeh form kholega, filhal # hai) -->
        <a href="#" class="btn-add-purple" title="Create New Quotation">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        
        <!-- Top Bar Filters -->
        <div class="table-header-filters">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search quotations..." id="searchInput">
                <button class="btn-search-purple" id="searchBtn">Search</button>
            </div>
            
            <div class="right-filters">
                <button class="drop-btn icon-btn active"><i class="fa-solid fa-list"></i></button>
                <button class="drop-btn icon-btn"><i class="fa-solid fa-border-all"></i></button>
                
                <div class="dropdown custom-dropdown">
                    <button class="drop-btn">10 per page <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <a href="#">10 per page</a>
                        <a href="#">25 per page</a>
                        <a href="#">50 per page</a>
                    </div>
                </div>
                <button class="drop-btn"><i class="fa-solid fa-filter"></i> Filters <i class="fa-solid fa-chevron-down"></i></button>
            </div>
        </div>

        <!-- Data Table -->
        <div class="table-responsive">
            <table id="quotationTable">
                <thead>
                    <tr>
                        <th>Quotation Number <i class="fa-solid fa-sort"></i></th>
                        <th>Title</th>
                        <th>To</th>
                        <th>From</th>
                        <th>Date <i class="fa-solid fa-sort"></i></th>
                        <th>Due Date</th>
                        <th>Discount</th>
                        <th>Status <i class="fa-solid fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- ROW 1 -->
                    <tr>
                        <td>
                            <div class="cell-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div>
                                <div class="cell-title">QT-2023-001</div>
                            </div>
                        </td>
                        <td>Office Supplies Order</td>
                        <td>
                            <div class="cell-title">Lrako</div>
                            <div class="cell-sub">contact@xyz.com</div>
                        </td>
                        <td>
                            <div class="cell-title">Fatima</div>
                            <div class="cell-sub">sales@apexbooks.com</div>
                        </td>
                        <td>2023-10-25</td>
                        <td>2023-11-25</td>
                        <td>$150.00</td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td class="action-buttons">
                            <button class="btn-action edit" onclick="editRecord('QT-2023-001')" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn-action delete" onclick="deleteRecord(this)" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                    <!-- ROW 2 -->
                    <tr>
                        <td>
                            <div class="cell-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div>
                                <div class="cell-title">QT-2023-002</div>
                            </div>
                        </td>
                        <td>Software Licenses</td>
                        <td>
                            <div class="cell-title">Samia Karamat</div>
                            <div class="cell-sub">info@techsol.com</div>
                        </td>
                        <td>
                            <div class="cell-title">Roman Fatima</div>
                            <div class="cell-sub">sales@ledgeinvo.com</div>
                        </td>
                        <td>2023-10-28</td>
                        <td>2023-11-28</td>
                        <td>$0.00</td>
                        <td><span class="status-badge status-draft">Draft</span></td>
                        <td class="action-buttons">
                            <button class="btn-action edit" onclick="editRecord('QT-2023-002')" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn-action delete" onclick="deleteRecord(this)" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/quotation-script.js') }}"></script>
@endsection