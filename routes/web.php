<?php

use App\Http\Controllers\AbsentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('actionlogin', [LoginController::class, 'login'])->name('actionlogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Absensi
    Route::get('/lobi', [AbsentController::class, 'index'])->name('lobi');
    Route::get('/checkin-page', [AbsentController::class, 'checkinpage'])->name('checkinpage');
    Route::post('/lobi/checkin', [AbsentController::class, 'checkin'])->name('checkin');
    Route::post('/lobi/chekout', [AbsentController::class, 'checkout'])->name('checkout');

});

Route::middleware(['isAdmin'])->group(function(){
    //Master
    Route::get('/produk', [ProductController::class, 'index']);
    Route::get('/tambah-produk', [ProductController::class, 'addProduct']);
    Route::post('/create-produk', [ProductController::class, 'createProduct'])->name('createproduct');
    Route::get('/edit-produk/{id}', [ProductController::class, 'editProduct'])->name('editproduct');
    Route::post('/update-produk', [ProductController::class, 'updateProduct'])->name('updateproduct');
    Route::get('/hapus-produk/{id}', [ProductController::class, 'deleteProduct'])->name('deleteproduct');
    Route::get('/toko', [StoreController::class, 'index']);
    Route::get('/tambah-toko', [StoreController::class, 'addStore']);
    Route::post('/create-toko', [StoreController::class, 'createStore'])->name('createtoko');
    Route::get('/edit-toko/{id}', [StoreController::class, 'editStore'])->name('edittoko');
    Route::post('/update-toko', [StoreController::class, 'updateStore'])->name('updatetoko');
    Route::get('/hapus-toko/{id}', [StoreController::class, 'deleteStore'])->name('deletetoko');
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/tambah-users', [UserController::class, 'addUsers']);
    Route::post('/create-users', [UserController::class, 'createUsers'])->name('createusers');
    Route::get('/edit-users/{id}', [UserController::class, 'editUsers'])->name('editusers');
    Route::post('/update-users', [UserController::class, 'updateUsers'])->name('updateusers');
    Route::get('/delete-users/{id}', [UserController::class, 'deleteUsers'])->name('deleteusers');
    Route::get('/reset-password/{id}', [UserController::class, 'resetPassword'])->name('resetpassword');

    //Report
    Route::get('/laporan', [ReportController::class, 'index']);
    Route::post('/getlaporan', [ReportController::class, 'getReport'])->name('getlaporan');
    Route::get('/getexcel', [ReportController::class, 'exportExcel'])->name('getexcel');
});
Route::middleware(['IsSalesMerch'])->group(function(){
    //Sales Merch
    Route::get('/penjualan', [SalesController::class, 'index'])->name('penjualan');
    Route::get('/tambah-penjualan', [SalesController::class, 'addSales'])->name('tambahpenjualan');
    Route::post('/create-penjualan', [SalesController::class, 'createSales'])->name('createpenjualan');
    Route::get('/edit-penjualan/{id}', [SalesController::class, 'editSales'])->name('editpenjualan');
    Route::post('/update-penjualan', [SalesController::class, 'updateSales'])->name('updatepenjualan');
    Route::get('/hapus-penjualan/{id}', [SalesController::class, 'deleteSales'])->name('deletepenjualan');
});
Route::middleware(['IsSalesTo'])->group(function(){
    Route::get('/pesanan', [OrderController::class, 'index'])->name('pesanan');
    Route::get('/produk-toko', [OrderController::class, 'storeProduct'])->name('produktoko');
    Route::get('/tambah-pesanan', [OrderController::class, 'addOrder'])->name('tambahpesanan');
    Route::post('/create-pesanan', [OrderController::class, 'createOrder'])->name('createpesanan');
    Route::get('/detail-pesanan/{no_pesanan}', [OrderController::class, 'detailOrder'])->name('detailpesanan');
    Route::post('/update-stok', [OrderController::class, 'updateStock'])->name('updatestok');
    Route::post('/selesaikan-order', [OrderController::class, 'finishedOrder'])->name('selesaikanorder');
});




