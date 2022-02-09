<?php

use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;



//-------------------------------Admin Login---------------------------------
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'LoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


//---------------------------Admin Dashboard--------------------------
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [DashboarController::class, 'department'])->name('dashboard');
});


//--------------------------------------Admin Profile Module---------------------------
Route::get('/profile', [DashboarController::class, 'profileview'])->name('profile_view');
Route::post('/profile-update', [DashboarController::class, 'profileupdate'])->name('profile_update');
