<?php

use App\Http\Controllers\StoreCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreUserController;
use App\Http\Controllers\StoreProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Users routes
Route::get('/user/create', [StoreUserController::class, 'create'])->name('user.create');
Route::post('/users', [StoreUserController::class, 'store'])->name('user.store');
Route::get('/users', [StoreUserController::class, 'index'])->name('user.index');

//Products routes
Route::get('/product/create', [StoreProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [StoreProductController::class, 'store'])->name('product.store');
// Route::get('/products', [StoreProductController::class, 'index'])->name('product.index');
Route::get('/product/card', [StoreProductController::class, 'card'])->name('product.card');

//Categorys routes
Route::get('/category/create', [StoreCategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [StoreCategoryController::class, 'store'])->name('category.store');

