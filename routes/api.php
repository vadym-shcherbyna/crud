<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\CategoryController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    /* Items */
    Route::post('/items/{item}/activity', [ItemController::class, 'activity']);
    Route::resource('items', ItemController::class)->except(['show']);

    /* Categories */
    Route::resource('categories', CategoryController::class)->only(['index']);
});
