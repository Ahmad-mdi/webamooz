<?php

use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\PanelController;
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

Route::get('/', [indexController::class,'index']);

//AdminPanel:
Route::prefix('adminPanel')->group(function (){

    Route::resource('/',PanelController::class);
    Route::resource('category',CategoryController::class);

});
