<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
Route::view('/register','register');
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::post('/search',[ProductController::class,'search'])->middleware('guard');

Route::post('/addToCart',[ProductController::class,'addToCart'])->middleware('guard');
Route::get('/cart',[ProductController::class,'cart'])->middleware('guard');
Route::get('/removeCart/{id}',[ProductController::class,'removeCart'])->middleware('guard');

Route::group(['prefix'=>'/admin/product'],function()
{
    Route::view('/add','/product/add');
    Route::post('/add',[ProductController::class,'create']);
    Route::get('/list',[ProductController::class,'list']);
    Route::get('/delete/{id}',[ProductController::class,'delete']);
});


Route::view('/login','login');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);



