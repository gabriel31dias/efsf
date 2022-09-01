<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/users/chang_password', [App\Http\Controllers\UserController::class, 'changPassword'])->name('home');



Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('profile', App\Http\Controllers\ProfileController::class);

Route::resource('service-station', App\Http\Controllers\ServiceStationController::class);
