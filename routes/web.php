<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\UserManagement;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'handleLogin'])->name('handle-login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'checkAuth'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'user-management', 'as' => 'users.'], function () {
        Route::get('/', [UserManagement::class, 'dashboard'])->name('management');
        Route::get('/create', [UserManagement::class, 'create'])->name('create');
        Route::post('/create', [UserManagement::class, 'handleCreate'])->name('handle-create');
    });

    Route::group(['prefix' => 'person-management', 'as' => 'persons.'], function () {
        Route::get('/', [PersonController::class, 'dashboard'])->name('management');
        Route::get('/create', [PersonController::class, 'create'])->name('create');
        Route::post('/create', [PersonController::class, 'handleCreate'])->name('handle-create');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'handleRegister'])->name('handle-register');
});
