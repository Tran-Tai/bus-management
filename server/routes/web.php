<?php

use App\Http\Controllers\StationsController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\BusesController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\StaffsController;
use App\Http\Controllers\UserController;
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

// Route::get('{any}', function () {
//     return view('client');
// })->where('any','.*');

Route::get('/', [StationsController::class, 'index']);
Route::post('/', [StationsController::class, 'search']);

Route::prefix('stations')->group(function () {
    Route::get('', [StationsController::class, 'index']);
    Route::post('', [StationsController::class, 'search']);
    Route::get('/create', [StationsController::class, 'create']);
    Route::post('/create', [StationsController::class, 'store']);
    Route::get('/{id}', [StationsController::class, 'show']);
    Route::get('/{id}/edit', [StationsController::class, 'edit']);
    Route::put('/{id}', [StationsController::class, 'update']);
    Route::get('/{id}/delete', [StationsController::class, 'delete']);
    Route::delete('/{id}', [StationsController::class, 'destroy']);
});

Route::prefix('staffs')->group(function () {
    Route::get('', [StaffsController::class, 'index']);
    Route::get('/create', [StaffsController::class, 'create']);
    Route::post('/create', [StaffsController::class, 'store']);
    Route::get('/{id}', [StaffsController::class, 'show']);
    Route::get('/{id}/edit', [StaffsController::class, 'edit']);
    Route::put('/{id}', [StaffsController::class, 'update']);
    Route::get('/{id}/delete', [StaffsController::class, 'delete']);
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

Route::prefix('routes')->group(function () {
    Route::get('', [RoutesController::class, 'index']);
    Route::post('', [RoutesController::class, 'search']);
    Route::get('/create', [RoutesController::class, 'create']);
    Route::post('/create', [RoutesController::class, 'store']);
    Route::get('/createname', [RoutesController::class, 'createname']);
    Route::post('/createname', [RoutesController::class, 'storename']);
    Route::get('/create/{id}/{number}', [RoutesController::class, 'createStation']);
    Route::post('/create/{id}/{number}', [RoutesController::class, 'storeStation']);
    Route::get('/{id}', [RoutesController::class, 'show']);
    Route::get('/{id}/edit', [RoutesController::class, 'edit']);
    Route::put('/{id}', [RoutesController::class, 'update']);
    Route::get('/{id}/delete', [RoutesController::class, 'delete']);
    Route::delete('/{id}', [RoutesController::class, 'destroy']);
});


Route::prefix('buses')->group(function () {
    Route::get('', [BusesController::class, 'index']);
    Route::get('/create', [BusesController::class, 'create']);
    Route::post('/create', [BusesController::class, 'store']);
    Route::get('/{id}', [BusesController::class, 'show']);
    Route::get('/{id}/edit', [BusesController::class, 'edit']);
    Route::put('/{id}', [BusesController::class, 'update']);
    Route::get('/{id}/delete', [BusesController::class, 'delete']);
    Route::delete('/{id}', [BusesController::class, 'destroy']);
});

Route::prefix('trips')->group(function () {
    Route::get('/route/{route_id}', [TripsController::class, 'index']);
    Route::get('/create/{route_name_id}', [TripsController::class, 'create']);
    Route::post('/create/{route_name_id}', [TripsController::class, 'store']);
    Route::get('/{id}/create/{station_id}', [TripsController::class, 'createHistory']);
    Route::post('/{id}/create/{station_id}', [TripsController::class, 'storeHistory']);
    Route::get('/{id}/ticket/{station_id}', [TripsController::class, 'createTicket']);
    Route::post('/{id}/ticket/{station_id}', [TripsController::class, 'storeTicket']);
    Route::post('/getInfo', [TripsController::class, 'info']);
    Route::get('/{id}', [TripsController::class, 'show']);
    Route::get('/{id}/edit', [TripsController::class, 'edit']);
    Route::put('/{id}', [TripsController::class, 'update']);
    Route::get('/{id}/delete', [TripsController::class, 'delete']);
    Route::delete('/{id}', [TripsController::class, 'destroy']);
});

Route::prefix('users')->group(function () {
    Route::get('/{user_id}/show_ticket', [UserController::class, 'show_ticket']);
    Route::get('/{user_id}/buy_ticket', [UserController::class, 'buy_ticket']);
    Route::post('/{user_id}/buy_ticket', [UserController::class, 'store_ticket']);
    Route::get('/{user_id}/trips_list', [UserController::class, 'showTrip']);
    Route::get('/{user_id}/book', [UserController::class, 'book']);
    Route::post('/{user_id}/book', [UserController::class, 'store_book']);
});

Route::get('login', function () {
    return view('login');
});

Route::get('logout',    [UserController::class, 'signOut']);
Route::post('login',    [UserController::class, 'signIn']);


// Route::get('{any}', function () {
//     return view('client');
// })->where('any', '.*');
