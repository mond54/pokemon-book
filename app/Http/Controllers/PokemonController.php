<?php
// app/Http/Controllers/PokemonController.php
namespace App\Http\Controllers;

use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::orderBy('id', 'asc')->get(); // Pokemonというテーブル名

        // ビューにデータを渡す
        return view('pokemons.index', compact('pokemons'));
    }

    public function show($id)
    {
        // 引数で受け取ったポケモンIDを使用してデータを取得
        $pokemon = Pokemon::find($id);

        // データが見つからない場合の処理
        if (! $pokemon) {
            return redirect()->route('poke_show')->with('error', 'ポケモンが見つかりません。');
        }

        return view('pokemons.show', compact('pokemon'));
    }
}
?>
