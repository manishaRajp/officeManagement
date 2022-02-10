<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SystemController;
use Illuminate\Support\Facades\Route;



// Admin Login //
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'LoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// Admin Dashboard //
 Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [DashboarController::class, 'department'])->name('dashboard');


// Admin Profile Module //
Route::get('/profile', [DashboarController::class, 'profileview'])->name('profile_view');
Route::post('/profile-update', [DashboarController::class, 'profileupdate'])->name('profile_update');

// Department Module //
Route::resource('department',DepartmentController::class);
Route::post('department-update',[DepartmentController::class, 'update'])->name('update_dept');
Route::get('department-delete',[DepartmentController::class, 'destroy'])->name('delete_dept');


// system Module //
Route::resource('system-category',CategoryController::class);




// system Module //
Route::resource('system',SystemController::class);
Route::post('system-update',[SystemController::class, 'update'])->name('update_system');
Route::get('system-delete',[SystemController::class, 'destroy'])->name('delete_system');

// Employee Module //
Route::resource('employee',EmployeeController::class);
Route::post('employee-update',[EmployeeController::class, 'update'])->name('update_employee');
Route::get('employee-delete',[EmployeeController::class, 'destroy'])->name('delete_employee');


});

