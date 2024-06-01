<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pokemons = [
            'charmeleon' => [
                'title' => 'Charmeleon #005',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/005.png',
                'desc' => 'Charmeleon mercilessly destroys its foes using its sharp claws. If it encounters a strong foe, it turns aggressive. In this excited state, the flame at the tip of its tail flares with a bluish white color.',
            ],
            'wartortle' => [
                'title' => 'Wartortle #008',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/008.png',
                'desc' => 'Its tail is large and covered with a rich, thick fur. The tail becomes increasingly deeper in color as Wartortle ages. The scratches on its shell are evidence of this Pokémon\'s toughness as a battler.',
            ],
            'butterfree' => [
                'title' => 'Butterfree #012',
                'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/012.png',
                'desc' => 'Its wings are covered in toxic scales. If it finds bird Pokémon going after Caterpie, Butterfree sprinkles its scales on them to drive them off.',
            ],
        ];

        foreach ($pokemons as $key => $pokemon) {
            DB::table('pokemon_table')->insert([
                'title' => $pokemon['title'],
                'url' => $pokemon['image'],
                'desc' => $pokemon['desc'],
            ]);
        }
    }
}
