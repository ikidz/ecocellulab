<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscribeController;

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

    /* Researches - Start */
    Route::get('/research/{slug?}', [ArticleController::class, 'research'])->name('research');
    // Route::get('/research', [ArticleController::class, 'researchDetail'])->name('research.detail');
    /* Researches - End */

    /* News & Articles - Start */
    Route::get('/detail/{slug?}', [ArticleController::class, 'detail'])->name('detail');
    /* News & Articles - End */
});

Route::prefix('/product')->name('product.')->group(function(){
    // Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/detail/{slug?}', [ProductController::class, 'detail'])->name('detail');
    Route::post('/detail/{slug}/review', [ProductController::class, 'submitReview'])
        ->middleware('throttle:5,1')
        ->name('submitReview');
});

Route::prefix('/contact')->name('contact.')->group(function(){
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/submit', [ContactController::class, 'submit'])
        ->middleware('throttle:5,1')
        ->name('submit');
});

Route::prefix('/subscribe')->name('subscribe.')->group(function(){
    Route::post('/store', [SubscribeController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('store');
});

// Route::get('/_mail-test', function () {
//     \Illuminate\Support\Facades\Mail::raw('Hello', function ($m) {
//         $m->to('i.supawee@gmail.com')->subject('Route mail test');
//     });
//     return 'sent';
// });