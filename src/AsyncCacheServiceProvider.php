<?php

namespace Fyennyi\AsyncCache\Bridge\Laravel;

use Fyennyi\AsyncCache\AsyncCacheBuilder;
use Fyennyi\AsyncCache\AsyncCacheManager;
use Illuminate\Support\ServiceProvider;

/**
 * Service Provider for Laravel integration.
 */
class AsyncCacheServiceProvider extends ServiceProvider
{
    /**
     * Register services in the container.
     */
    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/async-cache.php', 'async-cache');

        $this->app->singleton(AsyncCacheManager::class, function ($app) {
            $config = $app['config']['async-cache'];

            $adapterService = $config['adapter'] ?? 'cache.store';
            $cacheAdapter = $app->make($adapterService);

            return AsyncCacheBuilder::create($cacheAdapter)
                ->withLogger($app['log']) // Laravel Log Manager
                ->build();
        });

        $this->app->alias(AsyncCacheManager::class, 'async-cache');
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/async-cache.php' => \config_path('async-cache.php'),
            ], 'async-cache-config');
        }
    }
}
