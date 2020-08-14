<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::intended('https://documenter.getpostman.com/view/7272792/T1LPDSCF?version=latest#693bbf71-d257-459a-9ea9-7a0b4f7de935');
});

Route::prefix('pokemons')->group(function () {
    Route::get('/', 'Api\PokemonController@index')->name('api.pokemons');
    Route::get('/{name}', 'Api\PokemonController@get')->name('api.pokemons.name');
});
