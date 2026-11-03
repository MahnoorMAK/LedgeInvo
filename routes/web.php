<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/sidebar-test', 'pages.sidebar-test');
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
Route::view('/', 'pages.home')->name('home');
Route::view('/sales-invoice', 'pages.salesinvoice')->name('sales.invoice');
Route::view('/sales-returns', 'pages.sales-returns')->name('sales.returns');
Route::view('/pricing-faq', 'components.pricingfaq')->name('pricingfaq');