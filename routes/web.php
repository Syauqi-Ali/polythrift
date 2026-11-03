<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/products', 'products')->name('products');

    Route::view('/orders', 'orders')->name('orders');

    Route::view('/add-product', 'add-product')->name('add-product');

    Route::view('/categories', 'categories')->name('categories');
});

require __DIR__.'/settings.php';
