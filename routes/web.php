<?php

use App\Http\Controllers\PokemonController;
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


Route::get("home", [PokemonController::class, "index"])->name("pokemon.home");

Route::get('/pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');

Route::post('/pokemon', [PokemonController::class, 'store'])->name('pokemon.store');

Route::get('/pokemon/{title}', [PokemonController::class, 'show'])->name('pokemon.show');

Route::get('/pokemon/not-found', [PokemonController::class, 'notFound'])->name('pokemon.not-found');
