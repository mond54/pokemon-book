<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    protected $dates = ['publication_date', 'expiration_date', 'registration_date'];
    protected $fillable = [
        'p_id', 'jp_name', 'en_name', 'type1', 'type2', 'ability1', 'ability2', 'hidden_ability',
        'hp', 'attack', 'defense', 'special_attack', 'special_defense','speed',
        'total_stats', 'front_default', 'back_default', 'dream_world_front_default',
        'home_front_default', 'official_artwork_front_default', 'height', 'weight'
    ];

    static function createPokemon($p_info) {
        if (empty($pokemon)) {
            self::create([
                'p_id'                           => $p_info['id'],
                'jp_name'                        => $p_info['jp_name'],
                'en_name'                        => $p_info['en_name'],
                'type1'                          => $p_info['type1'],
                'type2'                          => $p_info['type2'],
                'ability1'                       => $p_info['ability1'],
                'ability2'                       => $p_info['ability2'],
                'hidden_ability'                 => $p_info['hidden_ability'],
                'hp'                             => $p_info['hp'],
                'attack'                         => $p_info['attack'],
                'defense'                        => $p_info['defense'],
                'special_attack'                 => $p_info['special_attack'],
                'special_defense'                => $p_info['special_defense'],
                'speed'                          => $p_info['speed'],
                'total_stats'                    => $p_info['total_stats'],
                'front_default'                  => $p_info['front_default'],
                'back_default'                   => $p_info['back_default'],
                'dream_world_front_default'      => $p_info['dream_world_front_default'],
                'home_front_default'             => $p_info['home_front_default'],
                'official_artwork_front_default' => $p_info['official_artwork_front_default'],
                'height'                         => $p_info['height'],
                'weight'                         => $p_info['weight']
            ]);
        }
        return true;
    }
}

