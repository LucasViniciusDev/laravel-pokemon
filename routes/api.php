<?php

use Illuminate\Support\Facades\Route;

Route::prefix('pokemons')->group(function () {
    Route::get('/', 'Api\PokemonController@index')->name('api.pokemons');
    Route::get('/{name}', 'Api\PokemonController@get')->name('api.pokemons.name');
});
