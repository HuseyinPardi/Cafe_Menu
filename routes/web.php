<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/{any?}', function ($any = null) {
    return view('admin');
})->where('any', '.*?');

//Route::view('/admin', 'admin');


Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'registerPost']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'loginPost']);


Route::view('/', 'welcome')->name('welcome');





// Route::middleware("auth")->group(function () {

//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

//     Route::get('/{first_name}', [CafeController::class, 'showCategories'])->name('cafe.categories');
//     Route::get('/{first_name}/{category_name}', [CafeController::class, 'showProducts'])->name('cafe.products');
//     Route::get('/{first_name}/{category_name}/{product_name}', [CafeController::class, 'showProductDetails'])->name('cafe.product.details');


//     Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// });