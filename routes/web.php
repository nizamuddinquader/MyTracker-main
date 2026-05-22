<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Register');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Dashboard');
});
Route::get('/accounts', function () {
    return Inertia::render('Accounts/Index');
});
Route::get('/create', function () {
    return Inertia::render('Accounts/Create');
});
