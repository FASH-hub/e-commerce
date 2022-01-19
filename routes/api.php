<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
* ----------------------------------------------------------------
* Authentification routes (register, login, logout)
* ----------------------------------------------------------------
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



/*
* ----------------------------------------------------------------
* Products routes
* ----------------------------------------------------------------
*/

Route::get('/product', [ProdController::class, 'displayProduct']);
Route::post('/product', [ProdController::class, 'addProduct']);
Route::patch('/product/{id}', [ProdController::class, 'updateProduct']);
Route::delete('/product/{id}', [ProdController::class, 'destroyProduct']);



/*
* ----------------------------------------------------------------
* Cart routes 
* ----------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'displayCarts']);
Route::post('/cart', [CartController::class, 'addCart']);
Route::patch('/cart/{id}', [CartController::class, 'updateCart']);
Route::delete('/cart/{id}', [CartController::class, 'destroyCart']);
