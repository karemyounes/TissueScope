<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admin\Products\BrandController;
use App\http\Controllers\Admin\Products\CategoryController;
use App\http\Controllers\Admin\Products\ProductController;
use App\http\Controllers\Admin\UserController;
use App\http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Products\ControlUploadedImages;

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



Route::get('loginPage', [LoginController::class,'LoginPage'])->name('loginPage');
Route::post('Signup', [LoginController::class,'Signup'])->name('Signup');
Route::get('user/create', [UserController::class,'create'])->name('createUser');
Route::post('user', [UserController::class,'store'])->name('user.store');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'],function () {

    Route::get('/', [ProductController::class,'index']);

    // Start Brand Routes
    Route::resource('/brand' , BrandController::class)->except(['update']);
    Route::post('/brand/{id}', [BrandController::class,'update'])->name('brand.update');
    // End Brand Routes

    // Start Category Routes
    Route::resource('/category' , CategoryController::class)->except(['update']);
    Route::post('/category/{id}', [CategoryController::class,'update'])->name('category.update');
    // End Category Routes

    // Start Product Routes
    Route::resource('product' , ProductController::class)->except(['update']);
    Route::post('product/{id}', [ProductController::class,'update'])->name('product.update');
    // End Product Routes

    // Start user Routes
    Route::resource('user' , UserController::class)->except(['update','create','store']);
    Route::post('user/{id}', [UserController::class,'update'])->name('user.update');
    // End user Routes


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
                                
    Route::post('/SaveImages', [ControlUploadedImages::class , 'SaveImages']) -> name('SaveImages');
    Route::post('/DeleteImages', [ControlUploadedImages::class , 'DeleteImages']) -> name('DeleteImages');

});