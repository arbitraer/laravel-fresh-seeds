<?php

namespace Arbitraer\FreshSeeds;

use Arbitraer\FreshSeeds\Commands\FreshSeedCommand;
use Arbitraer\FreshSeeds\Commands\SeedCommand;
use Illuminate\Support\ServiceProvider;

class FreshSeedsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/fresh-seeds.php' => config_path('fresh-seeds.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../seeds/' => database_path('/seeds'),
        ], 'suites');
    }

    public function register()
    {
        $this->registerCommands();
        $this->mergeConfigFrom(__DIR__.'/../config/fresh-seeds.php', 'fresh-seeds');
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FreshSeedCommand::class
            ]);
        }
    }
}