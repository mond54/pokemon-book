<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{

    /**
     * pokeapiに対してデータを取得
     *
     * @param  int  $no
     * @return array
     */

    public function fetchData($no = 0)
    {
        // CurlでポケモンAPIに通信を実行
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$no);

        // 通信に成功したら結果を配列で返す
        if ($response->successful()) {
            return (array) $response->json();
        }
        return [];
    }

}
