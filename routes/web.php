<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user.guest');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product.details');

Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add')->middleware(['auth', 'verified']);

route::get('mycart', [CartController::class, 'mycart'])->middleware(['auth', 'verified'])->name('view.cart');

Route::get('remove_product/{id}', [CartController::class, 'remove_product'])->middleware(['auth', 'verified'])->name('remove.cart.product');

Route::get('checkout', [CartController::class, 'cart_checkout'])->middleware(['auth', 'verified'])->name('cart.checkout');




require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
