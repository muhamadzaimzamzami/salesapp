<?php

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
Route::get('/toko', function () {
    return view('admin/store');
});
Route::get('/produk', function () {
    return view('admin/product');
});
Route::get('/users', function () {
    return view('admin/userManagement');
});
