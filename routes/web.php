<?php

use App\Models\Review;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('product');
Route::post('/store',[ProductController::class,'store'])->name('product.store');
Route::get('/test/{steamid}',[Review::class,'storeReview'])->name('test');