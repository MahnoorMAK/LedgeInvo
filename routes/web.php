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