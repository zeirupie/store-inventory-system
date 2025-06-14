<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreViewController;
use App\Http\Controllers\StorePostController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\StoreMiddleware;

// Public routes
Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('onboard');
    });
    
    Route::get('/login', [AuthController::class, 'login'])->name('view.login');
    Route::get('/register', [AuthController::class, 'register'])->name('view.register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
});

// Protected routes (require user session)
Route::middleware([StoreMiddleware::class])->group(function () {
    Route::get('/dashboard', [StoreViewController::class,'dashboard'])->name('store.dashboard');
    Route::get('/product', [StoreViewController::class,'product'])->name('store.product');
    Route::get('/logs',[StoreViewController::class,'logs'])->name('store.logs');

    Route::post('/add-category', [StorePostController::class, 'addCategory'])->name('add.category');
    Route::post('/delete-category',[StorePostController::class,'deleteCategory'])->name('delete.category');

    Route::post('/add-item', [StorePostController::class, 'addItem'])->name('add.item');
    Route::post('/delete-item', [StorePostController::class, 'deleteItem'])->name('delete.item');
    Route::post('/update-item', [StorePostController::class, 'updateItem'])->name('update.item');

    Route::get('/sold', [StoreViewController::class, 'sold'])->name('solds');
    Route::post('/add-sold', [StorePostController::class, 'addSold'])->name('add.sold');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});