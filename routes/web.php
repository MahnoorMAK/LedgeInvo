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