<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreViewController;

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
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [StoreViewController::class,'dashboard'])->name('dashboard');
Route::get('/product', [StoreViewController::class,'product'])->name('product');