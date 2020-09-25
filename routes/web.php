<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PersonController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/login', [LoginController::class, 'handleLogin'])->name('handle-login');

Route::resource('admin/persons', PersonController::class);
