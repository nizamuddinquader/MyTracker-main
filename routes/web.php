<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Dashboard');
});

Route::resource('accounts', AccountController::class);

Route::get('/create', function () {
    return Inertia::render('Accounts/Create');
});
Route::get('/edit', function () {
    return Inertia::render('Accounts/Edit');
});
