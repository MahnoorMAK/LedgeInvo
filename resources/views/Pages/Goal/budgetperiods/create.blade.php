@extends('Layout.dashboard')

@section('title', 'Create Budget Period')
@section('page-name', 'Create Budget Period')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/budget-periods.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <div class="page-title" style="display: block; margin-bottom: 25px;">
        <h1 style="font-size: 24px; font-weight: 600; color: #1f2937; margin-bottom: 5px;">Create Budget Period</h1>
        <p style="font-size: 13px; color: #6b7280;">Add a new budget period for your organization.</p>
    </div>

    <div class="form-container-page" style="background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); max-width: 700px; margin: 0 auto;">
        
        <form id="createPeriodForm" action="{{ route('budget-periods.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Period Name <span>*</span></label>
                <input type="text" id="periodName" name="periodName" placeholder="Enter Period Name" required>
            </div>
            
            <div class="form-group">
                <label>Financial Year <span>*</span></label>
                <input type="text" id="financialYear" name="financialYear" placeholder="Enter Financial Year" required>
            </div>

            <div class="form-group">
                <label>Start Date <span>*</span></label>
                <input type="text" id="startDate" name="startDate" placeholder="Select Start Date" required>
            </div>

            <div class="form-group">
                <label>End Date <span>*</span></label>
                <input type="text" id="endDate" name="endDate" placeholder="Select End Date" required>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 25px;">
                <a href="{{ route('budget-periods.index') }}" class="btn-cancel" style="padding: 10px 20px; border-radius: 8px; border: 1px solid #e5e7eb; text-decoration: none; color: #1f2937; font-weight: 500;">Cancel</a>
                <button type="submit" class="btn-save" style="background: #7c3aed; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: 500; box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);">Create</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof flatpickr !== 'undefined') {
                flatpickr("#startDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "below" });
                flatpickr("#endDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "below" });
            }
        });
    </script>
@endsection