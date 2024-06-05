<?php

use App\Http\Controllers\AbsentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('actionlogin', [LoginController::class, 'login'])->name('actionlogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('loginform');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/lobi', [AbsentController::class, 'index'])->name('lobi');
        Route::get('/checkin-page', [AbsentController::class, 'checkinpage'])->name('checkinpage');
        Route::post('/lobi/checkin', [AbsentController::class, 'checkin'])->name('checkin');
        Route::post('/lobi/chekout', [AbsentController::class, 'checkout'])->name('checkout');
        Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan');
        Route::get('/produk-toko', [OrderController::class, 'storeProduct'])->name('produktoko');
        Route::get('/penjualan', [SalesController::class, 'index'])->name('penjualan');
        

    
    // Route::middleware(['auth', 'checkRole:1'])->group(function () {
        // Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/produk', [ProductController::class, 'index']);
        Route::get('/toko', [StoreController::class, 'index']);
        Route::get('/users', [UserController::class, 'index']);
    // });
});
// Route::middleware(['auth', 'checkRole:2'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('sales.dashboard');
//     Route::get('/lobi', [DashboardController::class, 'index'])->name('lobi');
//     Route::get('/pesanan', [DashboardController::class, 'index'])->name('pesanan');
//     Route::get('/penjualan', [DashboardController::class, 'index'])->name('penjualan');
// });

// Route::middleware(['auth', 'checkRole:1'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
//     Route::get('/produk', [ProductController::class, 'index']);
//     Route::get('/toko', [StoreController::class, 'index']);
//     Route::get('/users', [UserController::class, 'index']);
// });



