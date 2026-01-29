<?php

namespace Tests;

use Fyennyi\AsyncCache\Bridge\Laravel\AsyncCacheServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array<int, string>
     */
    protected function getPackageProviders($app)
    {
        return [
            AsyncCacheServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default configuration for tests
        $app['config']->set('cache.default', 'array');
    }
}
