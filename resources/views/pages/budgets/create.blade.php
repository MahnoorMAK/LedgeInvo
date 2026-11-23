@extends('Layout.Fizadashboard')

@section('title', 'Create Budget')
@section('page-name', 'Create Budget')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/budgets.css') }}">
@endsection

@section('content')

    <div class="ag-page-wrapper">
        
        <!-- Header -->
        <div class="ag-top-header">
            <div>
                <div class="ag-breadcrumb">Dashboard &gt; Budget Planner &gt; Create Budget</div>
                <h1 class="ag-title">Create Budget</h1>
                <p class="ag-subtitle">Fill in the details to create a new budget.</p>
            </div>
            <a href="{{ url('/budgets') }}" class="ag-btn-outline">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="ag-form-container">
            <form id="createBudgetForm" action="{{ route('budgets.store') }}" method="POST">
                @csrf
                
                <!-- Budget Name -->
                <div class="form-group">
                    <label>Budget Name <span style="color:red;">*</span></label>
                    <input type="text" name="budgetName" class="ag-input" placeholder="Enter Budget Name" required>
                </div>

                <!-- Budget Period Dropdown -->
                <div class="form-group">
                    <label>Budget Period <span style="color:red;">*</span></label>
                    <div class="custom-dropdown" id="periodDropdown">
                        <div class="custom-dropdown-trigger">
                            <span>Select Budget Period</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-dropdown-menu">
                            <div class="custom-dropdown-item" data-value="Q1 2024 Budget">Q1 2024 Budget</div>
                            <div class="custom-dropdown-item" data-value="Q2 2024 Budget">Q2 2024 Budget</div>
                            <div class="custom-dropdown-item" data-value="Q3 2024 Budget">Q3 2024 Budget</div>
                            <div class="custom-dropdown-item" data-value="Q4 2024 Budget">Q4 2024 Budget</div>
                            <div class="custom-dropdown-item" data-value="Annual Budget 2024">Annual Budget 2024</div>
                        </div>
                    </div>
                    <input type="hidden" name="budgetPeriod" id="selectedPeriod" required>
                </div>

                <!-- Budget Type Dropdown -->
                <div class="form-group">
                    <label>Budget Type <span style="color:red;">*</span></label>
                    <div class="custom-dropdown" id="typeDropdown">
                        <div class="custom-dropdown-trigger">
                            <span>Select Budget Type</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="custom-dropdown-menu">
                            <div class="custom-dropdown-item" data-value="Operational">Operational</div>
                            <div class="custom-dropdown-item" data-value="Capital">Capital</div>
                            <div class="custom-dropdown-item" data-value="Cash Flow">Cash Flow</div>
                        </div>
                    </div>
                    <input type="hidden" name="budgetType" id="selectedType" required>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <a href="{{ url('/budgets') }}" class="btn-cancel">Cancel</a>
                    <button type="submit" class="btn-save">Create</button>
                </div>
            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/budgets.js') }}"></script>
@endsection