<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta para validar el token
Route::get('token/validate', [AuthController::class, 'verifyToken']);

// Ruta para renovar el token
Route::get('token/refresh', [AuthController::class, 'refreshToken']);



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::resource('forms', FormController::class);

// Protected Routes
Route::middleware('jwt.verify')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('enterprises', EnterpriseController::class);
    // Route::resource('forms', FormController::class);

});
