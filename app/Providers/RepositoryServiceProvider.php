<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IPokemonRepository;
use App\Repositories\PokemonRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPokemonRepository::class, PokemonRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
