<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Http\Controllers\AdminProductController;
use App\Modules\Admin\Http\Controllers\AdminStoreController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/products', 'products')->name('products');

    Route::view('/orders', 'orders')->name('orders');

    Route::view('/add-product', 'add-product')->name('add-product');

    Route::view('/categories', 'categories')->name('categories');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::resource('stores', AdminStoreController::class);
});




require __DIR__.'/settings.php';
