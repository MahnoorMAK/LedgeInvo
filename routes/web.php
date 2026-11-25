<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ==========================================
// AAPKE PURANE ROUTES
// ==========================================
Route::view('/', 'pages.home')->name('home');
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
Route::view('/sales-invoice', 'pages.salesinvoice')->name('sales.invoice');

Route::view('/pricing-faq', 'components.pricingfaq')->name('pricingfaq');
Route::get('/sales-invoices/create', function () {
    return view('pages.sales-invoices.cards');
})->name('sales-invoices.create');

Route::post('/sales-invoices/store', function (Illuminate\Http\Request $request) {
    return redirect()->route('sales-invoices.create')->with('success', 'Invoice Created Successfully!');
})->name('sales-invoices.store');
Route::get('/sales-returns/create', function () {
    return view('pages.sales-returns.create');
})->name('sales-returns.create');
// Create Manual Journal Entry
Route::get('/journal-entries/create', function () {
    return view('pages.journal-entries.create');
})->name('journal-entries.create');
// Balance Sheet Page
Route::get('/balance-sheet', function () {
    return view('pages.balance-sheet.index');
})->name('balance-sheet.index');
// Create Vendor Page
Route::get('/vendors/create', function () {
    return view('pages.vendors.create');
})->name('vendors.create');
// Revenues Page
Route::get('/revenues', function () {
    return view('pages.revenues.index');
})->name('revenues.index');
// Expenses Page
Route::get('/expenses', function () {
    return view('pages.expenses.index');
})->name('expenses.index');
// Create Customer Payment Page
Route::get('/customer-payments/create', function () {
    return view('pages.customer-payments.create');
})->name('customer-payments.create');
// Create Vendor Payment Page
Route::get('/vendor-payments/create', function () {
    return view('pages.vendor-payments.create');
})->name('vendor-payments.create');
// Chart of Accounts Page
Route::get('/chart-of-accounts', function () {
    return view('pages.chart-of-accounts.index');
})->name('chart-of-accounts.index');
// Account Types Page
Route::get('/account-types', function () {
    return view('pages.account-types.index');
})->name('account-types.index');
// Sales Invoice Create Page
Route::get('/sales-invoices/create', function () {
    return view('pages.sales-invoices.create');
})->name('sales-invoices.create');
// Milestones Page
Route::get('/goals/milestones', function () {
    return view('pages.milestones.index'); 
})->name('goals.milestones.index');
// Tracking Page ka Route
Route::get('/tracking', function () {
    return view('pages.tracking.index');
})->name('tracking.index');
// Categories Page ka Route
Route::get('/categories', function () {
    return view('pages.categories.index');
})->name('categories.index');
// Budget Page ka Route
Route::get('/budgets', function () {
    return view('pages.budgets.index');
})->name('budgets.index');
Route::get('/budget-periods', function () {
    return view('pages.budget-periods.index');
})->name('budget-periods.index');
//Route::get('/Sidebar', function () {return view('Layout.Sidebar');})->name('Sidebar');
Route::get('/sidebar', function () {return view('Layout.sidebar');})->name('sidebar');

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
