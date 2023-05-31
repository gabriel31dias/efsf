<?php

use App\Http\Controllers\CitizenController;
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

Route::resource('unit', App\Http\Controllers\UnityController::class);

Route::resource('process', App\Http\Controllers\ProcessController::class);
Route::resource('director-signature', App\Http\Controllers\DirectorSignatureController::class);
Route::resource('ballots', App\Http\Controllers\BallotsController::class);
Route::get('/ballots-search', [App\Http\Controllers\BallotsController::class, 'search'])->name('ballots-search');



Route::get('/monitor/{id}/edit', [App\Http\Controllers\MonitorProcessController::class, 'edit'])->name('monitor-process');

Route::get('/testeFaceB', [App\Http\Controllers\CitizenController::class, 'generateFaceB']);

Route::get('/generate-prontuario/{id}', [App\Http\Controllers\CitizenController::class, 'generateProtuario'])->name('generateProtuario');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.auth');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/checkequalpassword', [App\Http\Controllers\Auth\LoginController::class, 'checkEqualPass'])->name('checkequalpass');
Route::post('/savepassword', [App\Http\Controllers\Auth\LoginController::class, 'saveNewPassword'])->name('savepassword');

Route::get('/citizen/{id}', [App\Http\Controllers\CitizenController::class, 'index'])->name('citizen');


Route::resource('citizen', App\Http\Controllers\CitizenController::class)->middleware('can:permission,"citizen.index"');

Route::resource('genres', App\Http\Controllers\GenresController::class)->middleware('can:permission,"genre.index"');;

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('can:permission,"users.index"');

Route::resource('profile', App\Http\Controllers\ProfileController::class)->middleware('can:permission,"profile.index"');

Route::resource('service-station', App\Http\Controllers\ServiceStationController::class)->middleware('can:permission,"station.index"');
Route::resource('blocked-certificate', App\Http\Controllers\BlockedCertificateController::class)->middleware('can:permission,"blocked.index"');

Route::resource('registry', App\Http\Controllers\RegistryController::class)->middleware('can:permission,"registry.index"');
Route::resource('registry-interdiction', App\Http\Controllers\RegistryInterdictionController::class)->middleware('can:permission,"interdiction.index"');
Route::resource('registry-suspension', App\Http\Controllers\RegistrySuspensionController::class)->middleware('can:permission,"suspension.index"');
Route::resource('registry-transfer', App\Http\Controllers\RegistryTransferController::class)->middleware('can:permission,"transfer.index"');
Route::resource('feature', App\Http\Controllers\FeatureController::class)->middleware('can:permission,"feature.index"');
Route::resource('county', App\Http\Controllers\CountyController::class)->middleware('can:permission,"locale.index"');
Route::resource('uf', App\Http\Controllers\UfController::class)->middleware('can:permission,"locale.index"');

Route::get('impressao', [App\Http\Controllers\PrintController::class,'index'])->name('print.index');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


