<?php

use App\Http\Controllers\Api\LegalController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('legals', LegalController::class)->only(['index', 'update', 'store', 'show']);

Route::group(['prefix' => 'search'], function () {
    Route::get('legal', [SearchController::class, 'findLegal']);
});
