<?php

namespace Tests\Integration;

use Fyennyi\AsyncCache\AsyncCacheManager;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_it_can_resolve_manager_from_container() : void
    {
        $manager = $this->app->make(AsyncCacheManager::class);

        $this->assertInstanceOf(AsyncCacheManager::class, $manager);
    }

    public function test_it_registers_config_correctly() : void
    {
        $config = config('async-cache');

        $this->assertIsArray($config);
        $this->assertEquals('strict', $config['default_strategy']);
    }
}
