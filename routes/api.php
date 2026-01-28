<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Products\BrandController;
use App\http\Controllers\Products\CategoryController;
use App\http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\SaveImagesToShow;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::post('/SaveImages', [SaveImagesToShow::class , 'SaveImages']) -> name('SaveImages');
    Route::post('/DeleteImages', [SaveImagesToShow::class , 'DeleteImages']) -> name('DeleteImages');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Start Brand Routes
// Route::resource('/brand' , BrandController::class)->except(['update']);
// Route::post('/brand/{id}', [BrandController::class,'update']);
// // End Brand Routes

// // Start Category Routes
// Route::resource('/category' , CategoryController::class)->except(['update']);
// Route::post('/category/{id}', [CategoryController::class,'update']);
// // End Category Routes

// // Start Product Routes
// Route::resource('/product' , ProductController::class)->except(['update']);
// Route::post('/product/{id}', [ProductController::class,'update']);
// // End Product Routes