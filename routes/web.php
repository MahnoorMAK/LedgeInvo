<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('Pages.Home');})->name('Home');
Route::get('/about', function () {return view('Pages.about');})->name('about');
Route::get('/contact', function () {return view('Pages.contact');})->name('contact');
Route::get('/Service', function () {return view('Pages.Service');})->name('Service');
Route::view('/pricingfaq', 'pages.pricingfaq')->name('pricingfaq');
// ==========================================
Route::get('/sales-invoices/create', function () {
    return view('pages.sales-invoices.cards');
})->name('sales-invoices.create');
Route::post('/sales-invoices/store', function (Illuminate\Http\Request $request) {
    return redirect()->route('sales-invoices.create')->with('success', 'Invoice Created Successfully!');
})->name('sales-invoices.store');