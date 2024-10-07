<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminIs;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;





Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerPost']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost']);



Route::get('/', function () {
    //Auth::logout();
    return view('welcome');
})->name('welcome');



Route::middleware(['auth', AdminIs::class])->group(function () {
    Route::get('/admin/{any?}', function ($any = null) {
        return view('admin');
    })->where('any', '.*?');

    Route::post('/logout', [AuthController::class, 'logoutAdmin']);

});





Route::middleware("auth")->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    Route::get('/{first_name}', [CafeController::class, 'showCategories'])->name('cafe.categories');
    Route::get('/{first_name}/{category_name}', [CafeController::class, 'showProducts'])->name('cafe.products');
    Route::get('/{first_name}/{category_name}/{product_name}', [CafeController::class, 'showProductDetails'])->name('cafe.product.details');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
