@extends('Layout.Fizadashboard')

@section('title', 'Create Quotation')
@section('page-name', 'Quotations')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/quotations.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

<div class="form-page-wrapper">
    <div class="custom-form-card">
        
        <div class="custom-form-header">
            <h2>Create Quotation</h2>
            <p>Fill in the details below to create a new quotation.</p>
        </div>

        <form id="quotationForm">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Quotation Number <span>*</span></label>
                    <input type="text" name="quotation_number" class="form-control" placeholder="e.g., QT-2023-003" required>
                </div>

                <div class="form-group">
                    <label>Quotation Title <span>*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="e.g., Office Supplies" required>
                </div>

                <div class="form-group">
                    <label>To (Customer) <span>*</span></label>
                    <input type="text" name="to_customer" class="form-control" placeholder="Customer Name" required>
                </div>

                <div class="form-group">
                    <label>From (Company) <span>*</span></label>
                    <input type="text" name="from_company" class="form-control" value="Apexbooks Ltd" required>
                </div>

                <div class="form-group">
                    <label>Date <span>*</span></label>
                    <input type="text" id="quotationDate" name="date" class="form-control" placeholder="Select Date" required>
                </div>

                <div class="form-group">
                    <label>Due Date <span>*</span></label>
                    <input type="text" id="dueDate" name="due_date" class="form-control" placeholder="Select Date" required>
                </div>

                <div class="form-group">
                    <label>Quantity <span>*</span></label>
                    <input type="number" name="quantity" class="form-control" placeholder="e.g., 50" required>
                </div>

                <!-- Discount field is now MANDATORY (added required) -->
                <div class="form-group">
                    <label>Discount ($) <span>*</span></label>
                    <input type="number" name="discount" class="form-control" placeholder="e.g., 150.00" required>
                </div>
            </div>

            <!-- Description Field (Optional) -->
            <div class="form-group" style="margin-top: 20px;">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter quotation description (optional)..." style="resize: vertical;"></textarea>
            </div>

            <!-- Note Field (Optional) -->
            <div class="form-group" style="margin-top: 20px;">
                <label>Note</label>
                <textarea name="note" class="form-control" rows="3" placeholder="Enter any additional notes (optional)..." style="resize: vertical;"></textarea>
            </div>

            <!-- Status field removed completely -->

            <div class="form-actions" style="margin-top: 30px;">
                <a href="{{ route('quotations.qindex') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">Create Quotation</button>
            </div>

        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/quotations.js') }}"></script>
@endsection