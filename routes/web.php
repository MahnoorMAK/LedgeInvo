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
Route::get('/Contract', function () {return view('Pages.Sales&Revenue.Contract');})->name('Contract');
Route::get('/Purchase-Returns', function () {return view('Pages.Purchase.Purchase-Returns');})->name('PurchaseReturns');
Route::get('/Transfers', function () {return view('Pages.Purchase.Transfers');})->name('Transfers');
Route::get('/Items', function () {return view('Pages.Product&Service.Items');})->name('Items');
Route::get('/Create-Item', function () {return view('Pages.Product&Service.Create-Item');})->name('Create-Item');
Route::get('/Customers', function () {return view('Pages.Accounting.Customers');})->name('Customers');
Route::get('/Revenue', function () {return view('Pages.Accounting.Revenue');})->name('Revenue');
Route::get('/Customer-Payments', function () {return view('Pages.Customer-Payments');})->name('Customer-Payments');
Route::get('/Vendor-Payments', function () {return view('Pages.Vendor-Payments');})->name('Vendor-Payments');
Route::get('/Debit-Notes', function () {return view('Pages.Debit-Notes');})->name('Debit-Notes');
Route::get('/Credit-Notes', function () {return view('Pages.Credit-Notes');})->name('Credit-Notes');
Route::get('/Reports', function () {return view('Pages.Accounting.Reports');})->name('Reports');
Route::get('/Chart-Of-Accounts', function () {return view('Pages.Accounting.Chart-Of-Accounts');})->name('Chart-Of-Accounts');
Route::get('/Goals', function () {return view('Pages.Goal.Goals');})->name('Goals');
Route::get('/Contributions', function () {return view('Pages.Goal.Contributions');})->name('Contributions');
Route::get('/Ledger-Summary', function () {return view('Pages.Double-Entry.Ledger-Summary');})->name('Ledger-Summary');
Route::get('/Trial-Balance', function () {return view('Pages.Double-Entry.Trial-Balance');})->name('Trial-Balance');
Route::get('/Report', function () {return view('Pages.Double-Entry.Report');})->name('Report');
Route::get('/Asset', function () {return view('Pages.Assets.Asset');})->name('Asset');
Route::get('/Assignments', function () {return view('Pages.Assets.Assignments');})->name('Assignments');
Route::get('/Locations', function () {return view('Pages.Assets.Locations');})->name('Locations');
Route::get('/Maintainance', function () {return view('Pages.Assets.Maintainance');})->name('Maintainance');
Route::get('/Custom-Pages', function () {return view('Pages.CMS.Custom-Pages');})->name('Custom-Pages');
Route::get('/Newsletter-Subscribers', function () {return view('Pages.CMS.Newsletter-Subscribers');})->name('Newsletter-Subscribers');
Route::get('/Roles', function () {return view('Pages.User-Management.Roles');})->name('Roles');
Route::get('/Bank-Account', function () {return view('Pages.Banking.Bank-Account');})->name('Bank-Account');
Route::get('/Purchase-Returns/{id}', function ($id) {
    return view('Pages.Purchase.PR-view', ['id' => $id]);
})->name('PurchaseReturns.view');
Route::get('/Item-view/{id}', function ($id) {
    return view('Pages.Product&Service.Item-view', ['id' => $id]);
})->name('Item-view');




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