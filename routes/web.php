<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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


Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');

    Route::get('/people', 'App\Http\Controllers\PersonController@index')->name('people.index');
    Route::get('/people/{id}', 'App\Http\Controllers\PersonController@show')->name('people.show');
    Route::get('/planets', 'App\Http\Controllers\PlanetController@index')->name('planets.index');
    Route::get('/planets/{id}', 'App\Http\Controllers\PlanetController@show')->name('planets.show');
    Route::get('/species', 'App\Http\Controllers\SpeciesController@index')->name('species.index');
    Route::get('/species/{id}', 'App\Http\Controllers\SpeciesController@show')->name('species.show');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
