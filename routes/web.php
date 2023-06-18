<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

/**
 * Admin Routes
 */
Route::group([
    'middleware' => 'auth',
    // 'namespace' => 'Admin',
    'prefix' =>'admin',
], function(){
    // Admin Order Routes
    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('home');
    });
    // Admin Category Routes
    Route::resource('categories', '\App\Http\Controllers\Admin\CategoryController');
    // Admin Product Routes
    Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
});

/**
 * Search
 */
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/aboutus', function() {return view('aboutus');});
/**
 * Home Route
 */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index1'])->name('body');
/**
 * Basket Routes
 */
Route::group(['prefix' => 'basket',],function(){
    Route::post('/add/{id}', [App\Http\Controllers\BasketController::class, 'basketAdd'])->name('basket-add');

    Route::group([
        'middleware' => 'basket_not_empty',
    ], function() {
        Route::get('/', [App\Http\Controllers\BasketController::class, 'basket'])->name('basket');
        Route::get('/place', [App\Http\Controllers\BasketController::class, 'basketPlace'])->name('basket-place');
        Route::post('/remove/{id}', [App\Http\Controllers\BasketController::class, 'basketRemove'])->name('basket-remove');
        Route::post('/place', [App\Http\Controllers\BasketController::class, 'basketConfirm'])->name('basket-confirm');
    });
});
/**
 * Show Category Route
 */
Route::get('/{cat}', [App\Http\Controllers\ProductController::class, 'showCategory'])->name('showCategory');
/**
 * Show Product Route
 */
Route::get('/{cat}/{product_id}', [App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');

