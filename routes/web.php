<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Client\AjaxController;
use App\Http\Controllers\Client\SiteController;
use App\Http\Controllers\Client\UploadImgController;
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

Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'handleLogin'])->name('handle-login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'checkAuth'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'user-management', 'as' => 'users.'], function () {
        Route::get('/', [UserManagement::class, 'dashboard'])->name('management');
        Route::get('create', [UserManagement::class, 'create'])->name('create');
        Route::post('create', [UserManagement::class, 'handleCreate'])->name('handle-create');
    });

    Route::group(['prefix' => 'person-management'], function () {
        Route::get('/', [PersonController::class, 'dashboard'])->name('person-management');

        Route::group(['prefix' => 'persons', 'as' => 'persons.'], function () {
            Route::get('create', [PersonController::class, 'create'])->name('create');
            Route::post('create', [PersonController::class, 'handleCreate'])->name('handle-create');
            Route::get('edit/{id}', [PersonController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [PersonController::class, 'handleEdit'])->name('handle-edit');
            Route::get('delete/{id}', [PersonController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'parents', 'as' => 'parents.'], function () {
            Route::get('create', [ParentController::class, 'create'])->name('create');
            Route::post('create', [ParentController::class, 'handleCreate'])->name('handle-create');
        });
    });

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'handleRegister'])->name('handle-register');
});

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
    Route::get('resource-tree', [AjaxController::class, 'getResourceTree'])->name('resource-tree');
});

Route::get('upload-file', [UploadImgController::class, 'uploadImg'])->name('upload-img');
Route::post('upload-file', [UploadImgController::class, 'handleUploadImg'])->name('handle-upload-img');
