<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\StoreRegistrationController;
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

Route::name('api.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::post('/payments/{id}/confirm', [PaymentController::class, 'confirmPayment'])->name('payments.confirm');
        Route::post('/stores/register', [StoreRegistrationController::class, 'register'])->name('stores.register');
    });

    Route::middleware(['auth', 'role:seller'])->prefix('/seller')->group(function () {
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
        Route::apiResource('/products', ProductController::class);
        Route::get('/balance', [SellerController::class, 'balance'])->name('seller.balance');
        Route::post('/payouts/request', [PayoutController::class, 'requestPayout'])->name('seller.payouts.request');
    });

    Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/payments/{id}/verify', [PaymentController::class, 'verifyPayment'])->name('admin.payments.verify');
        Route::post('/payouts/{id}/approve', [PayoutController::class, 'approvePayout'])->name('admin.payouts.approve');
        Route::post('/payouts/{id}/reject', [PayoutController::class, 'rejectPayout'])->name('admin.payouts.reject');
    });
});
