<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('Pages.Home');})->name('Home');
Route::get('/about', function () {return view('Pages.about');})->name('about');
Route::get('/contact', function () {return view('Pages.contact');})->name('contact');
Route::get('/Service', function () {return view('Pages.Service');})->name('Service');
