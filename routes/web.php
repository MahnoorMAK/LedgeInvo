<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('page.contact');
});
