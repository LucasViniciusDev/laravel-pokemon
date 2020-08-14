<?php

namespace App\Interfaces;

interface IPokemonRepository
{
    public function getAll(int $page);
    public function getByName(string $name);
    public function getByUrl(string $url);
    public function getFormByUrl(string $url);
}
