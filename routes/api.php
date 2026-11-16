<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::prefix('auth')->group(function () {
//     Route::post('/login', LoginController::class);
//     Route::post('/register', RegisterController::class);
//     Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
// });

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::post('/payments/{id}/confirm', 'PaymentController@confirmPayment')->name('payments.confirm');
    Route::post('/stores/register', 'StoreRegistrationController@register')->name('stores.register');
});

Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::prefix('/seller')->group(function () {
        Route::get('/dashboard', 'SellerDashboardController@index')->name('seller.dashboard');
        Route::apiResource('/products', 'ProductController');
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