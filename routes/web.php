<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('test.doctor')
        ->name('dashboard');

    Route::middleware('is.patient')
        ->prefix('appointment')
        ->group(function () {
            Route::get('create', [\App\Http\Controllers\AppointmentsController::class, 'create'])
                ->name('appointment.create');

            Route::post('store', [\App\Http\Controllers\AppointmentsController::class, 'store'])
                ->name('appointment.store');
        });



    Route::get('logout', [\App\Http\Controllers\Auth\AuthenticationController::class, 'logout'])
        ->name('logout');
});


Route::view('about', 'about')->name('about');

Route::view('login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::view('register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('login', [\App\Http\Controllers\Auth\AuthenticationController::class, 'login'])
    ->middleware('guest')
    ->name('login.authenticate');

Route::post('register', [\App\Http\Controllers\Auth\AuthenticationController::class, 'register'])
    ->middleware('guest')
    ->name('register.store');



