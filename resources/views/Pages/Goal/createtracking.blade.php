@extends('Layout.dashboard')

@section('title', 'Create Tracking')
@section('page-name', 'Create Tracking')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tracking.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_purple.css">
@endsection

@section('content')

    <!-- Page Title -->
    <div class="page-title" style="display: block; margin-bottom: 25px;">
        <h1 style="font-size: 24px; font-weight: 600; color: #1f2937; margin-bottom: 5px;">Create Tracking</h1>
        <p style="font-size: 13px; color: #6b7280;">Add a new tracking record for your goal.</p>
    </div>

    <!-- Form Container -->
    <div class="form-container-page" style="background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); max-width: 700px; margin: 0 auto;">
        
        <form action="{{ route('tracking.store') }}" method="POST">
            @csrf
            
            <!-- Goal Dropdown -->
            <div class="form-group">
                <label>Goal <span style="color:red;">*</span></label>
                <div class="custom-modal-dropdown" id="goalDropdown">
                    <div class="custom-modal-trigger">
                        <span id="selectedGoalText">Select Goal</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="custom-modal-options">
                        <div class="custom-modal-option" data-value="Investment Portfolio">Investment Portfolio</div>
                        <div class="custom-modal-option" data-value="Credit Card Debt">Credit Card Debt</div>
                        <div class="custom-modal-option" data-value="Retirement Savings">Retirement Savings</div>
                        <div class="custom-modal-option" data-value="Student Loan Payoff">Student Loan Payoff</div>
                    </div>
                </div>
                <input type="hidden" id="goalName" name="goalName" required>
            </div>

            <!-- Tracking Date -->
            <div class="form-group">
                <label>Tracking Date <span style="color:red;">*</span></label>
                <input type="text" id="trackingDate" name="trackingDate" placeholder="Select tracking date" required>
            </div>

            <!-- Row 1 -->
            <div class="form-row" style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>Previous Amount <span style="color:red;">*</span></label>
                    <div class="input-with-prefix" style="display: flex; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                        <span style="padding: 0 12px; background: #f9fafb; display: flex; align-items: center;">$</span>
                        <input type="number" id="prevAmount" name="prevAmount" placeholder="0" required style="border: none; padding: 12px; width: 100%; outline: none;">
                    </div>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Contribution Amount <span style="color:red;">*</span></label>
                    <div class="input-with-prefix" style="display: flex; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                        <span style="padding: 0 12px; background: #f9fafb; display: flex; align-items: center;">$</span>
                        <input type="number" id="contribAmount" name="contribAmount" placeholder="0" required style="border: none; padding: 12px; width: 100%; outline: none;">
                    </div>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="form-row" style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>Current Amount <span style="color:red;">*</span></label>
                    <div class="input-with-prefix" style="display: flex; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                        <span style="padding: 0 12px; background: #f9fafb; display: flex; align-items: center;">$</span>
                        <input type="number" id="currentAmount" name="currentAmount" placeholder="0" required style="border: none; padding: 12px; width: 100%; outline: none;">
                    </div>
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Progress Percentage <span style="color:red;">*</span></label>
                    <div class="input-with-suffix" style="display: flex; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                        <input type="number" id="progressPercent" name="progressPercent" placeholder="0" required style="border: none; padding: 12px; width: 100%; outline: none;">
                        <span style="padding: 0 12px; background: #f9fafb; display: flex; align-items: center;">%</span>
                    </div>
                </div>
            </div>

            <!-- Row 3 -->
            <div class="form-row" style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>Days Remaining <span style="color:red;">*</span></label>
                    <input type="number" id="daysRemaining" name="daysRemaining" placeholder="0" required style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px;">
                </div>
                <div class="form-group" style="flex: 1;">
                    <label>Projected Completion Date</label>
                    <input type="text" id="projectedDate" name="projectedDate" placeholder="Select projected date" style="width: 100%; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px;">
                </div>
            </div>

            <!-- Buttons -->
            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 25px;">
                <a href="{{ route('tracking.index') }}" class="btn-cancel" style="padding: 10px 20px; border-radius: 8px; border: 1px solid #e5e7eb; text-decoration: none; color: #1f2937; font-weight: 500;">Cancel</a>
                <button type="submit" class="btn-save" style="background: #7c3aed; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: 500; box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);">Create Tracking</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof flatpickr !== 'undefined') {
                flatpickr("#trackingDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "below" });
                flatpickr("#projectedDate", { dateFormat: "Y-m-d", altInput: true, altFormat: "F j, Y", disableMobile: true, position: "below" });
            }
            
            const goalDropdown = document.getElementById('goalDropdown');
            const goalOptions = goalDropdown ? goalDropdown.querySelectorAll('.custom-modal-option') : [];
            const selectedGoalText = document.getElementById('selectedGoalText');
            const goalHiddenInput = document.getElementById('goalName');

            if (goalDropdown) {
                const trigger = goalDropdown.querySelector('.custom-modal-trigger');
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    goalDropdown.classList.toggle('open');
                });
                goalOptions.forEach(option => {
                    option.addEventListener('click', () => {
                        selectedGoalText.textContent = option.textContent;
                        goalHiddenInput.value = option.getAttribute('data-value');
                        goalDropdown.classList.remove('open');
                    });
                });
                document.addEventListener('click', (e) => {
                    if (!goalDropdown.contains(e.target)) goalDropdown.classList.remove('open');
                });
            }
        });
    </script>
@endsection