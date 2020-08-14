<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PokemonService;

class PokemonController extends Controller
{
    private $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index(Request $request)
    {
        $data = $this->pokemonService->getAll($request);
        if(!$data->error)
            return view('pokemons', ['data' => $data]);
        else
            return view('error', ['error' => $data]);
    }

    public function get($name)
    {
        $data = $this->pokemonService->get($name);

        if(!$data->error)
            return view('pokemon', ['pokemon' => $data->pokemon]);
        else
            return view('error', ['error' => $data]);
    }
}
