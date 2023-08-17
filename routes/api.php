<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-citizen', [App\Http\Controllers\CitizenController::class, 'getCitizen'])->name('getCitizen');



Route::apiResource('user', App\Http\Controllers\UserController::class);







Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);


Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('profile', App\Http\Controllers\ProfileController::class);

Route::apiResource('service-station', App\Http\Controllers\ServiceStationController::class);





