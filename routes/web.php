<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;

// ==========================================
// WEEK 1: PUBLIC PAGES
// ==========================================

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    $products = Product::where('is_active', true)->get();
    return view('products.index', compact('products'));
});

Route::get('/product/{id}', function ($id) {
    $product = Product::findOrFail($id);
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
// WEEK 3: CART & CHECKOUT LOGIC
// ==========================================

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// CHECKOUT ROUTES
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');