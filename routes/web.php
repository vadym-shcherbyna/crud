<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;

Route::redirect('/', '/user/login');

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'auth')->name('auth');
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/items', [ItemController::class, 'index'])->name('admin.items.index');
});
