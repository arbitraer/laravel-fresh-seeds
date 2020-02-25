<?php

namespace Arbitraer\FreshSeeds\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Arbitraer\FreshSeeds\FreshSeedsServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            FreshSeedsServiceProvider::class,
        ];
    }
}