<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\StoreRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/payments/{id}/confirm', [PaymentController::class, 'confirmPayment'])->name('payments.confirm');
    Route::post('/stores/register', [StoreRegistrationController::class, 'register'])->name('stores.register');
});

Route::middleware(['auth', 'role:store'])->prefix('/store')->group(function () {
    Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('seller.dashboard');
    Route::resource('/products', ProductController::class)->names('seller.products');
    Route::get('/balance', [SellerController::class, 'balance'])->name('seller.balance');
    Route::post('/payouts/request', [PayoutController::class, 'requestPayout'])->name('seller.payouts.request');
});

Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/payments/{id}/verify', [PaymentController::class, 'verifyPayment'])->name('admin.payments.verify');
    Route::post('/payouts/{id}/approve', [PayoutController::class, 'approvePayout'])->name('admin.payouts.approve');
    Route::post('/payouts/{id}/reject', [PayoutController::class, 'rejectPayout'])->name('admin.payouts.reject');
});

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/settings', '/settings/profile');

    Route::livewire('/settings/profile', 'pages::settings.profile')->name('profile.edit');
    Route::livewire('/settings/security', 'pages::settings.security')->name('security.edit');
    Route::livewire('/settings/appearance', 'pages::settings.appearance')->name('appearance.edit');
});

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
