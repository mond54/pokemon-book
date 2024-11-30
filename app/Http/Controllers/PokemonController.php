<?php
// app/Http/Controllers/PokemonController.php
namespace App\Http\Controllers;

use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index()
    {
        // すべてのポケモンを取得
        $pokemons = Pokemon::all();

        // ビューにデータを渡す
        return view('pokemons.index', compact('pokemons'));
    }

    public function show($id)
    {
        // 特定のポケモンを取得
        $pokemon = Pokemon::findOrFail($id);

        // 詳細ビューにデータを渡す
        return view('pokemons.show', compact('pokemon'));
    }
}
?>
