<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'registerPost']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'loginPost']);


Route::view('/', 'welcome');


Route::get('/{first_name}', [CafeController::class, 'showCategories'])->name('cafe.categories');
Route::get('/{first_name}/{category_name}', [CafeController::class, 'showProducts'])->name('cafe.products');
Route::get('/{first_name}/{category_name}/{product_name}', [CafeController::class, 'showProductDetails'])->name('cafe.product.details');