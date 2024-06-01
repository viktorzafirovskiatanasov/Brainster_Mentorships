<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonInputRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokemonController extends Controller
{


    public function __construct()
    {
    }
    public function index()
    {
        if (!session()->has('pokemons')) {
            $pokemons = DB::table('pokemon_table')->get();
            session(['pokemons' => $pokemons]);
        }

        $pokemons = session()->get('pokemons');
        return view("pokemon.home", ['pokemons' => $pokemons]);
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

        $newPokemon = (object) [
            'title' => $title,
            'url' => $request['url'],
            'desc'  => $request['desc'],
        ];

        $pokemonsInSession = session('pokemons', []);

        $pokemonsInSession[$pokemonName] = $newPokemon;

        session()->put('pokemons', $pokemonsInSession);

        $selectedPokemon = $pokemonsInSession[$pokemonName];

        return view('pokemon.show', compact('selectedPokemon'));
    }
}
