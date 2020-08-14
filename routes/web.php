<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('pokemons');
});

Route::prefix('pokemons')->group(function () {
    Route::get('/', 'Web\PokemonController@index')->name('pokemons');
    Route::get('/{name}', 'Web\PokemonController@get')->name('pokemons.name');
});
