<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductsController::class, 'foodBeverage'])->name('foodbeverage');
    Route::get('/beauty-health', [ProductsController::class, 'beautyHealth'])->name('beautyhealth');
    Route::get('/home-care', [ProductsController::class, 'homeCare'])->name('homecare');
    Route::get('/baby-kid', [ProductsController::class, 'babyKid'])->name('babykid');
});
Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);
Route::get('/penjualan', [PenjualanController::class, 'index']);

Route::get('/level',[LevelController::class,'index']);
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/user',[UserController::class,'index']);