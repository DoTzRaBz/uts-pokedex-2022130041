<?php

// app/Http/Controllers/PokedexController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon; // tambahkan namespace model Pokemon di sini

class PokedexController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::paginate(10);
        return view('pokedex', compact('pokemons'));
    }

    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        return view('pokemon.show', compact('pokemon'));
    }
}
