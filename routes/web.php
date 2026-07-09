<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// ==========================================
// WEEK 1: PUBLIC PAGES
// ==========================================

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('products.index');
});

Route::get('/product/{id}', function ($id) {
    return view('products.show', ['id' => $id]);
});

// THIS IS THE NEW CART ROUTE (Replaces the old simple one)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/login', function () {
    return view('auth.login');
});


// ==========================================
// WEEK 2: ADMIN / CRUD PAGES
// ==========================================

Route::resource('categories', CategoryController::class);
Route::resource('admin/products', ProductController::class);


// ==========================================
// WEEK 3: CART LOGIC
// ==========================================

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');