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

// ポケモン一覧ページのルート
Route::get('/', [PokemonController::class, 'index']);

// ポケモン詳細ページのルート
Route::get('/show/{id}', [PokemonController::class, 'show'])->name('poke_show');

