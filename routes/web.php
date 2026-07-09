<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Models\Product; // WE ADDED THIS TO FETCH DATA

// ==========================================
// WEEK 1: PUBLIC PAGES (NOW CONNECTED TO DATABASE!)
// ==========================================

Route::get('/', function () {
    return view('home');
});

// Fetch ONLY active products from the database
Route::get('/products', function () {
    $products = Product::where('is_active', true)->get();
    return view('products.index', compact('products'));
});

// Fetch a specific product by its ID
Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id); // This will show a 404 if the ID doesn't exist
    return view('products.show', compact('product'));
});

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