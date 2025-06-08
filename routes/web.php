<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('onboard');
});

Route::get('/d', function () {
    return view('layouts.app');
});


Route::get('/s', function () {
    return view('store.product');
});

Route::get('/login', [AuthController::class, 'login'])->name('view.login');
Route::get('/register', [AuthController::class, 'register'])->name('view.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');