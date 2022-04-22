<?php

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
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get(
    '/',
    [Controller::class, 'index']
    );
Route::get(
    '/admin',
    [AdminController::class, 'show']
    );

Route::get(
    '/login',
    [LoginController::class, 'login']
    );

Route::post(
    '/admin',
    [AdminController::class, 'register']
    )->name('admin.register');

Route::get(
    '/api/{entrada}',
    [Controller::class, 'show']
    );
