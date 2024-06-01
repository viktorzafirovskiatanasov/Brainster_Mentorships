<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonInputRequest;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
 

    public function __construct()
    {
    }

    public function index()
    {   
        return view("pokemon.home", ['pokemons' => session()->get('pokemons')]);
    }

    public function show($title)
    {
      
        $pokemons = session()->get('pokemons');
        if (isset($pokemons[$title])) {
            $selectedPokemon = $pokemons[$title];
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

    public function store(PokemonInputRequest $request)
    {
        $title = $request['title'];
        $parts = explode(' ', $title);
        $pokemonName = $parts[0];
    
        $newPokemon = [
            'title' => $title,
            'image' => $request['image'],
            'desc'  => $request['desc'],
        ];
    
        session()->put('pokemons.' . $pokemonName, $newPokemon);
        $pokemonsInSession = session('pokemons', []);
        $selectedPokemon = null;
        foreach ($pokemonsInSession as $pokemon) {
            if (isset($pokemon['title']) && strpos($pokemon['title'], $pokemonName) !== false) {
                $selectedPokemon = $pokemon;
                break;
            }
        }
        
        return view('pokemon.show', compact('selectedPokemon'));
    }
    
}
