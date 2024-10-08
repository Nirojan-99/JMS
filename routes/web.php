<?php

use App\Http\Controllers\Admin\adminOrderController;
use App\Http\Controllers\Admin\adminProductController;
use App\Http\Controllers\Admin\adminUserController;
use App\Http\Controllers\authController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', [productController::class, 'index'])->name('index');
Route::get('/Products', [productController::class, 'products'])->name('products');
Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'login_user'])->name('login_user');
Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register', [authController::class, 'register_user'])->name('register_user');
Route::get('/forgot-password', [authController::class, 'forgot_password'])->name('forgot_password');
Route::post('/forgot-password', [authController::class, 'sendVerificationCode'])->name('sendVerificationCode');
Route::get('/verify-Code', [authController::class, 'verify'])->name('verify');
Route::post('/verify-Code', [authController::class, 'verifyCode'])->name('verifyCode');
Route::get('/change-password', [authController::class, 'change_password'])->name('change_password');
Route::post('/change-password', [authController::class, 'updatePassword'])->name('updatePassword');

Route::prefix('Admin')->group(function () {
    Route::get('/', [adminProductController::class, 'index'])->name('adminHome');
    Route::get('/POS', [adminProductController::class, 'pos'])->name('pos');
    Route::get('/Customization-Request', [adminProductController::class, 'customization_request'])->name('customization_request');
    Route::get('/Warranty-Claims', [adminProductController::class, 'warranty_claims'])->name('warranty_claims');
    Route::get('/Repair-Requests', [adminProductController::class, 'repair_requests'])->name('repair_requests');
    // product
    Route::get('/Add-Product', [adminProductController::class, 'add_product'])->name('add_product');
    Route::post('/Add-Product', [adminProductController::class, 'store_product'])->name('store_product');
    Route::get('/Edit-Product/{id}', [adminProductController::class, 'edit_product'])->name('edit_product');
    Route::delete('/Delete-Product/{id}', [adminProductController::class, 'destroy_product'])->name('destroy_product');
    // category
    Route::get('/Category-management', [adminProductController::class, 'category_management'])->name('category_management');
    Route::get('/Add-Category', [adminProductController::class, 'add_categories'])->name('add_categories');
    Route::post('/Add-Category', [adminProductController::class, 'store_categories'])->name('store_categories');
    Route::post('/Add-Category', [adminProductController::class, 'store_categories'])->name('store_categories');
    Route::get('/Edit-Category/{id}', [adminProductController::class, 'edit_categories'])->name('edit_categories');
    Route::put('/Edit-Category/{id}', [adminProductController::class, 'update_categories'])->name('update_categories');
    Route::delete('/Delete-Category/{id}', [adminProductController::class, 'destroy_categories'])->name('destroy_categories');
    // order
    Route::get('/Order-Management', [adminOrderController::class, 'order_management'])->name('order_management');
    Route::get('/Order-Details/{id}', [adminOrderController::class, 'order_details'])->name('order_details');
    Route::get('/Order-Summary', [adminOrderController::class, 'order_summary'])->name('order_summary');
    //user
    Route::get('/user-Management', [adminUserController::class, 'user_management'])->name('user_management');
});
