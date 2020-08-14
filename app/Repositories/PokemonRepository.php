<?php

namespace App\Repositories;

use App\Interfaces\IPokemonRepository;
use App\Helpers\HttpClient;

class PokemonRepository implements IPokemonRepository
{
    public function getAll($page)
    {
        $limit = \config('pokemon.limit_per_page');
        $offset = $page * $limit;
        return json_decode(HttpClient::getInstance()->Get("api/v2/pokemon/?offset={$offset}&limit=${limit}"));
    }

    public function getByName(string $name)
    {
        return json_decode(HttpClient::getInstance()->Get("api/v2/pokemon/{$name}"));
    }

    public function getByUrl(string $url)
    {
        return json_decode(HttpClient::getInstance()->Get($url));
    }

    public function getFormByUrl(string $url)
    {
        return json_decode(HttpClient::getInstance()->Get($url));
    }
}
