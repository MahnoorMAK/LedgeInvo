<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('Pages.Home');})->name('Home');
Route::get('/Login1', function () { return view('Pages.Login1');})->name('Login1');
Route::get('/Login2', function () { return view('Pages.Login2');})->name('Login2');
Route::get('/TopClients', function () {return view('Component.TopClients');})->name('TopClients');
Route::get('/Slider3D', function () {return view('Pages.Slider3D');})->name('Slider3D');
Route::get('/contact', function () {return view('Pages.contact');})->name('contact');
Route::get('/about', function () {return view('Pages.about');})->name('about');
Route::get('/Service', function () {return view('Pages.Service');})->name('Service');
Route::view('/pricingfaq', 'pages.pricingfaq')->name('pricingfaq');
// ==========================================
Route::get('/sales-invoices/create', function () {
    return view('pages.sales-invoices.cards');
})->name('sales-invoices.create');
Route::post('/sales-invoices/store', function (Illuminate\Http\Request $request) {
    return redirect()->route('sales-invoices.create')->with('success', 'Invoice Created Successfully!');
})->name('sales-invoices.store');