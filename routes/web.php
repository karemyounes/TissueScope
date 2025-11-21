<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Products\BrandController;
use App\http\Controllers\Products\CategoryController;
use App\http\Controllers\Products\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class,'index']);

Route::get('/welcome', function () {
    return view('welcome');
});

// Start Brand Routes
Route::resource('/brand' , BrandController::class)->except(['update']);
Route::post('/brand/{id}', [BrandController::class,'update']);
// End Brand Routes

// Start Category Routes
Route::resource('/category' , CategoryController::class)->except(['update']);
Route::post('/category/{id}', [CategoryController::class,'update']);
// End Category Routes

// Start Product Routes
Route::resource('product' , ProductController::class)->except(['update']);
Route::post('product/{id}', [ProductController::class,'update']);
// End Product Routes
