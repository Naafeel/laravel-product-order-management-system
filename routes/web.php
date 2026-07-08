<?php

use Illuminate\Support\Facades\Route;

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