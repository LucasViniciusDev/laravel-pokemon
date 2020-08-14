<?php

namespace App\Services;

use App\Interfaces\IPokemonRepository;
use Illuminate\Http\Request;

class PokemonService extends Services
{
    private $pokemonRepository;

    public function __construct(IPokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function getAll(Request $request)
    {
        try
        {
            $page = $request->has('page') ? $request->input('page') : 1;
            $page = ($page - 1) < 0 ? 1 : $page;

            $pokemons = $this->pokemonRepository->getAll($page - 1);

            $data = new \stdClass;
            $data->pokemons = [];
            $data->total = $pokemons->count;
            $data->total_pages = (int)ceil($pokemons->count/\config('pokemon.limit_per_page'));
            $data->current_page = $page;
            $data->error = false;

            foreach($pokemons->results as $currentPokemon)
            {
                // Obtem as informações mais detalhadas do pokemon, imagens, etc.
                $pokemon = $this->pokemonRepository->getByUrl($currentPokemon->url);
                array_push($data->pokemons, $pokemon);
            }

            return $data;
        }
        catch(\Exception $e)
        {
            return $this->error($e);
        }
    }

    public function get(string $name)
    {
        try
        {
            $pokemon = $this->pokemonRepository->getByName($name);

            $data = new \stdClass;
            $data->pokemon = $pokemon;
            $data->error = false;

            $forms = [];
            foreach($pokemon->forms as $currentForm)
            {
                // Obtem as informações das formas do pokemon
                $form = $this->pokemonRepository->getFormByUrl($currentForm->url);
                array_push($forms, $form);
            }

            $data->pokemon->forms = $forms;
            return $data;
        }
        catch(\Exception $e)
        {
            return $this->error($e);
        }
    }
}
