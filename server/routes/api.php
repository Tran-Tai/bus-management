<?php

use App\Http\Controllers\BusesController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\StaffsController;
use App\Http\Controllers\StationsController;
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

Route::group(['middleware' => 'auth'], function () {
});

Route::post('login', [UserController::class, 'login']);

Route::prefix('buses')->group(function () {
    Route::get('', [BusesController::class, 'index']);
    Route::post('/create', [BusesController::class, 'store']);
    Route::get('/{id}', [BusesController::class, 'show']);
    Route::put('/{id}', [BusesController::class, 'update']);
    Route::delete('/{id}', [BusesController::class, 'destroy']);
});

Route::prefix('routes')->group(function () {
    Route::get('', [RoutesController::class, 'index']);
    Route::get('search/{keyword}', [RoutesController::class, 'search']);
    Route::get('/createroute/{routename_id}/{direction}', [RoutesController::class, 'store']);
    Route::post('/createname', [RoutesController::class, 'storename']);
    Route::post('/create/{id}/{number}', [RoutesController::class, 'storeStation']);
    Route::get('/{id}', [RoutesController::class, 'show']);
    Route::put('/{id}', [RoutesController::class, 'update']);
    Route::delete('/{id}', [RoutesController::class, 'destroy']);
    Route::get('/find/{start_station_id}/{target_station_id}', [RoutesController::class, 'findPath']);
});

Route::prefix('stations')->group(function () {
    Route::get('', [StationsController::class, 'index']);
    Route::get('search/{keyword}', [StationsController::class, 'search']);
    Route::post('/create', [StationsController::class, 'store']);
    Route::get('/{id}', [StationsController::class, 'show']);
    Route::put('/{id}', [StationsController::class, 'update']);
    Route::delete('/{id}', [StationsController::class, 'destroy']);
});

Route::prefix('staffs')->group(function () {
    Route::get('', [StaffsController::class, 'index']);
    Route::post('/create', [StaffsController::class, 'store']);
    Route::get('/{id}/edit', [StaffsController::class, 'edit']);
    Route::put('/{id}', [StaffsController::class, 'update']);
    Route::delete('/{id}', [StaffsController::class, 'destroy']);
});

Route::prefix('operations')->group(function () {
    Route::get('', [OperationsController::class, 'index']);
    Route::get('/create', [OperationsController::class, 'create']);
    Route::post('/create', [OperationsController::class, 'store']);
    Route::get('/{id}', [OperationsController::class, 'show']);
    Route::get('/{id}/edit', [OperationsController::class, 'edit']);
    Route::put('/{id}', [OperationsController::class, 'update']);
    Route::get('/{id}/delete', [OperationsController::class, 'delete']);
    Route::delete('/{id}', [OperationsController::class, 'destroy']);
});
