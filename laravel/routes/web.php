<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/article')->name('article.')->group(function(){
    Route::get('/aboutus', [ArticleController::class, 'aboutus'])->name('aboutus');
    Route::get('/research', [ArticleController::class, 'research'])->name('research');
});

Route::prefix('/product')->name('product.')->group(function(){
    // Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/detail', [ProductController::class, 'detail'])->name('detail');
});

Route::prefix('/contact')->name('contact.')->group(function(){
    Route::get('/', [ContactController::class, 'index'])->name('index');
});