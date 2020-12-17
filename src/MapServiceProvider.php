<?php

namespace edgewizz\map;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class MapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Map\Controllers\MapController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'map');
        Blade::component('map::map.open', 'map.open');
        Blade::component('map::map.index', 'map.index');
        Blade::component('map::map.edit', 'map.edit');
    }
}
