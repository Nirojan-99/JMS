<?php

use App\Http\Controllers\Admin\adminProductController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', [productController::class, 'index'])->name('index');
Route::get('/Products', [productController::class, 'products'])->name('products');

Route::prefix('Admin')->group(function () {
    Route::get('/', [adminProductController::class, 'index'])->name('adminHome');
});
