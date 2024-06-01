<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    private $pokemons; // Declare the pokemons property

    public function __construct()
    {
        $this->pokemons = [
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
    }

    public function index()
    {
        return view("pokemon.home", ['pokemons' => $this->pokemons]);
    }

    public function show($title)
    {
        if (array_key_exists($title, $this->pokemons)) {
            $selectedPokemon = $this->pokemons[$title];
            return view('pokemon.show', compact('selectedPokemon'));
        } else {
            return view('pokemon.not-found');
        }
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function notFound()
    {
        return view('pokemon.not-found');
    }

    public function store(Request $request)
    {
        $title = $request['title'];
        $parts = explode(' ', $title);
        $pokemonName = $parts[0];
    
        $newPokemon = [
            'title' => $title,
            'image' => $request['image'],
            'desc'  => $request['desc'],
        ];
    
        $this->pokemons[$pokemonName] = $newPokemon;
    
        $selectedPokemon = $this->pokemons[$pokemonName];
        
        return view('pokemon.show', compact('selectedPokemon'));
    }
    
}
