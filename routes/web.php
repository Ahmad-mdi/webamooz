<?php

use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\PanelController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\ClientController\ProductController as ClientProductController;
use App\Http\Controllers\ClientController\indexController;
use Illuminate\Support\Facades\Route;

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
//Client:
Route::prefix('')->group(function (){
    Route::get('/', [indexController::class,'index']);
    Route::get('productDetails/{product}',[ClientProductController::class,'show'])->name('productDetails.show');
});
//AdminPanel:
Route::prefix('adminPanel')->group(function (){
    Route::resource('/',PanelController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('product',ProductController::class);
    Route::resource('product.gallery',GalleryController::class);
});
