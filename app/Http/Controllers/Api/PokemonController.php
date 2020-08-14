<?php

namespace App\Http\Controllers\Api;

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
            return $this->responseJsonData($data);
        else
            return $this->responseError($data->message, $data->code);
    }

    public function get($name)
    {
        $data = $this->pokemonService->get($name);

        if(!$data->error)
            return $this->responseJsonData($data);
        else
            return $this->responseError($data->message, $data->code);
    }
}
