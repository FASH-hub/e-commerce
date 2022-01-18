<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\CartController;

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

Route::get('/login', [AuthController::class, 'login'])
->middleware('loggedIn');

Route::get('/register', [AuthController::class, 'register'])
    ->middleware('loggedIn');

Route::post('/register-user', [AuthController::class, 'registerUser'])
    ->name('register-user');

Route::post('/login-user', [AuthController::class, 'loginUser'])
    ->name('login-user');

Route::get('/userPage', [AuthController::class, 'welcome'])->middleware('isLoggedIn');

Route::get('/logout', [AuthController::class, 'logout']);


