<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () { return view('Pages.Home');})->name('Home');
Route::get('/Contact', function () { return view('Pages.Contact');})->name('Contact');
Route::get('/Login2', function () { return view('Pages.Login2');})->name('Login2');
Route::get('/Login', function () { return view('Pages.Login');})->name('Login');
Route::get('/Service', function () { return view('Pages.Service');})->name('Service');
Route::get('/Login1', function () { return view('Pages.Login1');})->name('Login1');
Route::get('/Hero', function () { return view('Component.Hero');})->name('Hero');
Route::get('/About', function () { return view('Pages.About');})->name('About');
Route::get('/2', function () { return view('Pages.2');})->name('2');
Route::get('/3', function () { return view('Pages.3');})->name('3');
Route::get('/register', function () {return view('Pages.register');})->name('register');
Route::get('/Slider3D', function () {return view('Pages.Slider3D');})->name('Slider3D');
Route::get('/StatsBar', function () {return view('Component.StatsBar');})->name('StatsBar');
Route::get('/WhyAccordion', function () {return view('Component.WhyAccordion');})->name('WhyAccordion');
Route::get('/ModulesTabs', function () {return view('Component.ModulesTabs');})->name('ModulesTabs');
Route::get('/TopClients', function () {return view('Component.TopClients');})->name('TopClients');
Route::get('/Settings', function () {return view('Pages.Settings.Settings');})->name('Settings');
Route::get('/dashboard', function () {return view('Layout.dashboard');})->name('dashboard');
Route::get('/Sidebar', function () {return view('Layout.Sidebar');})->name('Sidebar');
Route::get('/retainer', function () {return view('Pages.Retainer.retainer');})->name('Retainer');
Route::get('/purchase-invoice', function () {return view('Pages.Purchase.purchase-invoice');})->name('PurchaseInvoice');
Route::get('/Warehouse', function () {return view('Pages.Purchase.Warehouse');})->name('Warehouse');
Route::get('/Vendors', function () {return view('Pages.Accounting.Vendors');})->name('Vendors');
Route::get('/Expense', function () {return view('Pages.Accounting.Expense');})->name('Expense');

// ==========================================
// CUSTOMERS ROUTE (NEW ADDED)
// ==========================================
Route::get('/accounting/customers', function () {
    return view('Pages.Accounting.Customers');
})->name('accounting.customers');


Route::post('/register', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'first_name' => 'required|string|max:100',
        'last_name'  => 'required|string|max:100',
        'email'      => 'required|email|unique:users,email',
        'company'    => 'required|string|max:150',
        'password'   => 'required|min:8|confirmed',
        'terms'      => 'accepted',
    ]);

    $user = \App\Models\User::create([
        'name'     => $data['first_name'] . ' ' . $data['last_name'],
        'email'    => $data['email'],
        'company'  => $data['company'],
        'password' => bcrypt($data['password']),
    ]);

    auth()->login($user);
    return redirect('/')->with('success', 'Welcome to Apexbooks!');
})->name('register.post');


// ==========================================
// MILESTONES
// ==========================================
Route::get('/Goal/milestone', function () {
    return view('Pages.Goal.milestone');
})->name('milestone');


// ==========================================
// CATEGORIES (NEW ADDED)
// ==========================================
Route::get('/Goal/category', function () {
    return view('Pages.Goal.category.index');
})->name('category.index');


// ==========================================
// TRACKING SYSTEM
// ==========================================
// 1. Main Tracking Page
Route::get('/Goal/tracking', function () {
    return view('Pages.Goal.tracking');
})->name('tracking.index');

// 2. Create Tracking Page
Route::get('/Goal/createtracking', function () {
    return view('Pages.Goal.createtracking');
})->name('createtracking');

// 3. Store Tracking Data
Route::post('/Goal/createtracking', function (Illuminate\Http\Request $request) {
    return redirect()->route('tracking.index')->with('success', 'Tracking created successfully!');
})->name('tracking.store');

// 4. Budget Periods
Route::get('/budget-periods', function () {
    return view('pages.budget-periods.index');
})->name('budget-periods.index');

// ==========================================
// BUDGET PERIODS
// ==========================================
// 1. Main Page
Route::get('/budget-periods', function () {
    return view('pages.budgetperiods.index');
})->name('budget-periods.index');

// 2. Create Page
Route::get('/budget-periods/create', function () {
    return view('pages.budgetperiods.create');
})->name('budget-periods.create');

// 3. Store Data
Route::post('/budgetperiods/store', function (Illuminate\Http\Request $request) {
    return redirect()->route('budgetperiods.index')->with('success', 'Budget Period created successfully!');
})->name('budgetperiods.store');