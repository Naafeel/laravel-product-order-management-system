<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('auth.login');
});


// ==========================================
// WEEK 2: ADMIN / CRUD PAGES
// ==========================================

Route::resource('categories', CategoryController::class);

// We use 'admin/products' so it doesn't clash with the public /products page from Week 1
Route::resource('admin/products', ProductController::class);