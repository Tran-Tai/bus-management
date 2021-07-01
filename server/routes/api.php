<?php

use App\Http\Controllers\BusesController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('buses')->group(function () {
    Route::get('', [BusesController::class, 'index']);
    Route::post('/create', [BusesController::class, 'store']);
    Route::get('/{id}', [BusesController::class, 'show']);
    Route::put('/{id}', [BusesController::class, 'update']);
    Route::delete('/{id}', [BusesController::class, 'destroy']);
});

Route::prefix('routes')->group(function () {
    Route::get('', [RoutesController::class, 'index']);
    Route::post('', [RoutesController::class, 'search']);
    Route::post('/create', [RoutesController::class, 'store']);
    Route::post('/createname', [RoutesController::class, 'storename']);
    Route::post('/create/{id}/{number}', [RoutesController::class, 'storeStation']);
    Route::get('/{id}', [RoutesController::class, 'show']);
    Route::put('/{id}', [RoutesController::class, 'update']);
    Route::delete('/{id}', [RoutesController::class, 'destroy']);
});