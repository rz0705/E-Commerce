<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreCategoryController;
use App\Http\Controllers\StoreUserController;

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
Route::prefix('product')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
});
Route::get('products', [ProductController::class, 'index'])->name('product.card');
Route::post('products', [ProductController::class, 'index'])->name('product.card');

// Route::group(['prefix'=>'products','as'=>'products.'], function(){
//         Route::get('',[ProductController::class,'index'])->name('index');
// });

//Categories routes
Route::get('/category/create', [StoreCategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [StoreCategoryController::class, 'store'])->name('category.store');
Route::get('/categories', [StoreCategoryController::class, 'index'])->name('category.index');