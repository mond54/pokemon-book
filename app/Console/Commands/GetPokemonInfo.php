<?php

namespace App\Console\Commands;

require "vendor/autoload.php";

use Illuminate\Console\Command;
use App\Models\Pokemon;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GetPokemonInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getpokemoninfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $p_no_array = range(1, 898);
            foreach ($p_no_array as $no) {
                // すでに取得済みの場合はスキップ
                $pokemon = Pokemon::where('p_id', $no)->first();
                if (!empty($pokemon)) {
                    continue;
                }
                // ポケモンごとの情報をcurlで取得
                $url = 'https://pokeapi.co/api/v2/pokemon/'.$no;
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $r = curl_exec($curl);
                $data = json_decode($r, true);
                $p_info = self::getPokemonInfo($data);
                print_r($p_info['id']);
                print_r($p_info['jp_name']."\n");
                print_r($p_info['en_name']."\n");
                print_r("\n");
                $p_info = Pokemon::createPokemon($p_info);
                sleep(1);
            }
            curl_close($curl);

        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    static function getPokemonInfo($d) {
        $p_info = [];
        // パラメータを設定
        $p_info['id'] = $d['id'];
        $p_info['en_name'] = $d['name'];
        $from = "en"; // English
        $to   = "ja"; // 日本語

        // $st = new GoogleTranslate($p_info['en_name'], $from, $to);
        // $p_info['jp_name'] = $st->exec();

        // Google Translateインスタンスを作成
        $st = new GoogleTranslate();

        // 翻訳元と翻訳先の言語を設定
        $st->setSource($from); // 翻訳元言語
        $st->setTarget($to);   // 翻訳先言語

        // 翻訳実行
        $p_info['jp_name'] = $st->translate($p_info['en_name']);

        $p_info['type1'] = $d['types'][0]['type']['name'];
        if (isset($d['types'][1])) {
            $p_info['type2'] = $d['types'][1]['type']['name'];
        } else {
            $p_info['type2'] = null;
        }
        $p_info['ability1'] = $d['abilities'][0]['ability']['name'];
        if (isset($d['abilities'][1]) && !$d['abilities'][1]['is_hidden']) {
            $p_info['ability2'] = $d['abilities'][1]['ability']['name'];
            $p_info['hidden_ability'] = $d['abilities'][2]['ability']['name'];
        } else {
            $p_info['ability2'] = null;
            if (isset($d['abilities'][1]['is_hidden'])) {
                $p_info['hidden_ability'] = $d['abilities'][1]['ability']['name'];
            } else {
                $p_info['hidden_ability'] = null;
            }
        }
        $p_info['hp'] = $d['stats'][0]['base_stat'];
        $p_info['attack'] = $d['stats'][1]['base_stat'];
        $p_info['defense'] = $d['stats'][2]['base_stat'];
        $p_info['special_attack'] = $d['stats'][3]['base_stat'];
        $p_info['special_defense'] = $d['stats'][4]['base_stat'];
        $p_info['speed'] = $d['stats'][5]['base_stat'];
        $p_info['total_stats'] = $p_info['hp'] + $p_info['attack'] + $p_info['defense'] + $p_info['special_attack'] + $p_info['special_defense'] + $p_info['speed'];
        $p_info['front_default'] = $d['sprites']['front_default'];
        $p_info['back_default'] = $d['sprites']['back_default'];
        if (isset($d['sprites']['other']['dream_world'])) {
            $p_info['dream_world_front_default'] = $d['sprites']['other']['dream_world']['front_default'];
        } else {
            $p_info['dream_world_front_default'] = null;
        }
        if (isset($d['sprites']['other']['home'])) {
            $p_info['home_front_default'] = $d['sprites']['other']['home']['front_default'];
        } else {
            $p_info['home_front_default'] = null;
        }
        if (isset($d['sprites']['other']['official-artwork'])) {
            $p_info['official_artwork_front_default'] = $d['sprites']['other']['official-artwork']['front_default'];
        } else {
            $p_info['official_artwork_front_default'] = null;
        }
        $p_info['height'] = $d['height'];
        $p_info['weight'] = $d['weight'];

        return $p_info;
    }
}
