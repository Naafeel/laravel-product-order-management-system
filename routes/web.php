<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;
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
// WEEK 3: CART & CHECKOUT LOGIC
// ==========================================

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');


// ==========================================
// WEEK 4: ADMIN AUTHENTICATION
// ==========================================

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


// ==========================================
// WEEK 2 & 4: PROTECTED ADMIN PAGES
// ==========================================

// All routes inside this group are protected by the AdminMiddleware.
// If you are not logged in as an admin, you cannot see ANY of these pages!
Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    
    // The Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // The CRUD routes we built in Week 2
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class); // Notice we removed 'admin/' from the resource because the prefix handles it!
});