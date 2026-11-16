<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Http\Controllers\AdminProductController;
use App\Modules\Admin\Http\Controllers\AdminStoreController;

// Route::view('/', 'welcome')->name('home');

// Route::middleware(['auth'])->group(function () {
//     Route::view('/dashboard', 'dashboard')->name('dashboard');

//     Route::view('/products', 'products')->name('products');

//     Route::view('/orders', 'orders')->name('orders');

//     Route::view('/add-product', 'add-product')->name('add-product');

//     Route::view('/categories', 'categories')->name('categories');
// });

// Route::middleware(['auth', 'role:admin|seller'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('products', AdminProductController::class);
// });

// require __DIR__.'/settings.php';



Route::get('/', 'ProductController@index')->name('home');
Route::get('/products/{slug}', 'ProductController@show')->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::post('/payments/{id}/confirm', 'PaymentController@confirmPayment')->name('payments.confirm');
    Route::post('/stores/register', 'StoreRegistrationController@register')->name('stores.register');
});

Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::prefix('/seller')->group(function () {
        Route::get('/dashboard', 'SellerDashboardController@index')->name('seller.dashboard');
        Route::resource('/products', 'ProductController');
        Route::get('/balance', 'SellerController@balance')->name('seller.balance');
        Route::post('/payouts/request', 'PayoutController@requestPayout')->name('seller.payouts.request');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
        Route::post('/payments/{id}/verify', 'PaymentController@verifyPayment')->name('admin.payments.verify');
        Route::post('/payouts/{id}/approve', 'PayoutController@approvePayout')->name('admin.payouts.approve');
        Route::post('/payouts/{id}/reject', 'PayoutController@rejectPayout')->name('admin.payouts.reject');
    });
});