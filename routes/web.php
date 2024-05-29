<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/dashboard');
});
Route::get('/lobi', function () {
    return view('admin/loby');
});
Route::get('/pesanan', function () {
    return view('admin/order');
});
Route::get('/penjualan', function () {
    return view('admin/sales');
});
Route::get('/produk', [ProductController::class, 'index']);
Route::get('/toko', [StoreController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);

