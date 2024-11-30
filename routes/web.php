<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

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
});


// ポケモン一覧ページのルート
Route::get('/pokemons', [PokemonController::class, 'index'])->name('poke_index');

// ポケモン詳細ページのルート
Route::get('/pokemons/{id}', [PokemonController::class, 'show'])->name('poke_show');

