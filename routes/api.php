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
Route::get('/login', [AuthController::class, 'loginUser'])
    ->middleware('loggedIn');

Route::get('/display-users', [AuthController::class, 'displayUsers'])
    ->middleware('loggedIn');

Route::get('/displayUserById/{id}', [AuthController::class, 'displayUserById'])
    ->name('displayUserById');

Route::post('/register-user', [AuthController::class, 'registerUser'])
    ->name('register-user');

Route::post('/login-user', [AuthController::class, 'loginUser'])
    ->name('login-user');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::delete('/delete-user/{id}', [AuthController::class, 'deleteUser'])
    ->name('delete-user');

Route::patch('/update-user/{id}', [CartController::class, 'updateUser'])
    ->name('updateUser');

Route::patch('/updatePsswd/{id}', [CartController::class, 'updatePsswd'])
    ->name('updatePsswd');



/*
* ----------------------------------------------------------------
* Products routes
* ----------------------------------------------------------------
*/

Route::get('/allProduct', [ProdController::class, 'displayProduct']);
Route::patch('/product/{id}', [ProdController::class, 'displayProductById']);
Route::post('/addProduct', [ProdController::class, 'addProduct']);
Route::patch('/updateProduct/{id}', [ProdController::class, 'updateProduct']);
Route::delete('/deleteProduct/{id}', [ProdController::class, 'destroyProduct']);



/*
* ----------------------------------------------------------------
* Cart routes 
* ----------------------------------------------------------------
*/

Route::get('/allCart', [CartController::class, 'displayCarts']);
Route::patch('/cart/{id}', [ProdController::class, 'displayCartById']);
Route::post('/cart', [CartController::class, 'addCart']);
Route::patch('/cart/{id}', [CartController::class, 'updateCart']);
Route::delete('/cart/{id}', [CartController::class, 'destroyCart']);
