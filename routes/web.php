<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::redirect('/', '/user/login');

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'auth')->name('auth');
    Route::get('logout', 'logout')->name('logout');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/items', 'ItemController@index')->name('admin.items.index');
