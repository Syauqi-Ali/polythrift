<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Http\Controllers\AdminProductController;
use App\Modules\Admin\Http\Controllers\AdminStoreController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'role:Super Admin|seller'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});

require __DIR__.'/settings.php';
