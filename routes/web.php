<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// This single line creates all 7 CRUD routes for categories 
// (index, create, store, show, edit, update, destroy)
Route::resource('categories', CategoryController::class);