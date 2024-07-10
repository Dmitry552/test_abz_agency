<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\UserController;
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

Route::prefix('users')
    ->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store'])->middleware(['validate.token']);
    });

Route::get('/positions', [PositionController::class, 'index']);

Route::get('/token', [AuthController::class, 'getToken']);

Route::post('/proxy', [ProxyController::class, 'handle']);
