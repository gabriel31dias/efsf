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

Route::post('/checkequalpassword', [App\Http\Controllers\Auth\LoginController::class, 'checkEqualPass'])->name('checkequalpass');
Route::post('/savepassword', [App\Http\Controllers\Auth\LoginController::class, 'saveNewPassword'])->name('savepassword');



Route::resource('citizen', App\Http\Controllers\CitizenController::class);

Route::resource('genres', App\Http\Controllers\GenresController::class);

Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('profile', App\Http\Controllers\ProfileController::class);

Route::resource('service-station', App\Http\Controllers\ServiceStationController::class);
Route::resource('registry', App\Http\Controllers\RegistryController::class);
Route::resource('registry-interdiction', App\Http\Controllers\RegistryInterdictionController::class);

