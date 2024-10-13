<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/pokedex', function () {
    return view('pokedex');
})->name('pokedex');

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/pokedex', 'PokedexController@index')->name('pokedex.index');
Route::get('/pokedex/{id}', 'PokedexController@show')->name('pokemon.show');

Route::get('/', [App\Http\Controllers\PokedexController::class, 'index'])->name('home');

Route::get('/pokedex', [App\Http\Controllers\PokedexController::class, 'index'])->name('pokedex');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pokemon', App\Http\Controllers\PokemonController::class);


Route::get('/', [PokemonController::class, 'index'])->name('index');
Route::get('/pokedex', [PokedexController::class, 'index'])->name('pokedex');
