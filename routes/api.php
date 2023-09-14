<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardSwitcherController;
use App\Http\Controllers\MerchantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('', function (Request $request) {
        return response()->json("Welcome to KnoxAPI TEST");
    });
    Route::prefix('auth')->group(function () {
        Route::post('signup', [AuthController::class, 'signup']);
        Route::post('login', [AuthController::class, 'login']);
    });


    Route::middleware('auth:api')->group(function () {
        Route::prefix('cards')->group(function () {
            Route::post('', [CardController::class, 'store']);
        });
        Route::prefix('merchants')->group(function () {
            Route::get('', [MerchantController::class, 'index']);
        });
        Route::prefix('card-switcher')->group(function () {
            Route::post('', [CardSwitcherController::class, 'store']);
            Route::put('{task_id}/status', [CardSwitcherController::class, 'updateTaskStatus']);
        });
    });
});

