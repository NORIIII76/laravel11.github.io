<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
return view('login');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::post('/buy/{id}', [\App\Http\Controllers\ProductController::class, 'buy'])->name('buy.product');
Route::get('/shoping', [\App\Http\Controllers\ProductController::class, 'shoping'])->name('shoping');
Route::get('/adminlogin', [\App\Http\Controllers\ProductController::class, 'adminlogin'])->name('adminlogin');
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/purchase_history', [\App\Http\Controllers\ProductController::class, 'purchaseHistory'])->name('purchase_history');
Route::post('/purchase-history/update-status/{id}', [\App\Http\Controllers\ProductController::class, 'updateStatus'])->name('purchase.update.status');


Route::get('/welcome', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('welcome');
})->name('welcome');

Route::get('shoping', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }

    // Contoh mengambil data produk (misal dari database)
    $products = \App\Models\Product::all(); // Sesuaikan dengan model Anda

    // Oper variabel $products ke view shoping
    return view('shoping', ['products' => $products]);
})->name('shoping');

Route::get('/adminlogin', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('adminlogin');
})->name('adminlogin');

// routes/web.php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk menangani proses login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route untuk menangani logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Menampilkan form registrasi
Route::post('/register', [RegisterController::class, 'register']); // Proses registrasi