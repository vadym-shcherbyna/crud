<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AccountController;

Route::redirect('/', '/auth/login');

Route::controller(UserController::class)->prefix('auth')->name('user.')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'auth')->name('auth');
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'name' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('accounts', AccountController::class);
});
