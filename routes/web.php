<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::redirect('/', '/user/login');

Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'auth')->name('auth');
    Route::get('logout', 'logout')->name('logout');
});
