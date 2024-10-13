<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'required|numeric|between:0,999999.99',
            'height' => 'required|numeric|between:0,999999.99',
            'hp' => 'required|integer|between:0,9999',
            'attack' => 'required|integer|between:0,9999',
            'defense' => 'required|integer|between:0,9999',
            'is_legendary' => 'required|boolean',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->species = $request->species;
        $pokemon->primary_type = $request->primary_type;
        $pokemon->weight = $request->weight;
        $pokemon->height = $request->height;
        $pokemon->hp = $request->hp;
        $pokemon->attack = $request->attack;
        $pokemon->defense = $request->defense;
        $pokemon->is_legendary = $request->is_legendary;
        $pokemon->photo = $request->file('photo')->store('public');
        $pokemon->save();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully!');
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'required|numeric|between:0,999999.99',
            'height' => 'required|numeric|between:0,999999.99',
            'hp' => 'required|integer|between:0,9999',
            'attack' => 'required|integer|between:0,9999',
            'defense' => 'required|integer|between:0,9999',
            'is_legendary' => 'required|boolean',
            'photo' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $pokemon->name = $request->name;
        $pokemon->species = $request->species;
        $pokemon->primary_type = $request->primary_type;
        $pokemon->weight = $request->weight;
        $pokemon->height = $request->height;
        $pokemon->hp = $request->hp;
        $pokemon->attack = $request->attack;
        $pokemon->defense = $request->defense;
        $pokemon->is_legendary = $request->is_legendary;

        if ($request->hasFile('photo')) {
            Storage::delete('public/' . $pokemon->photo);
            $pokemon->photo = $request->file('photo')->store('public');
        }

        $pokemon->save();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully!');
    }

    public function destroy(Pokemon $pokemon)
    {
        Storage::delete('public/' . $pokemon->photo);
        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully!');
    }
}
