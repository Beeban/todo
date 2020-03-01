<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index']);

Route::resource('legals', LegalController::class)->only(['index', 'update', 'store', 'show']);

Route::group(['prefix' => 'search'], function () {
    Route::get('legal', [SearchController::class, 'findLegal']);
});
