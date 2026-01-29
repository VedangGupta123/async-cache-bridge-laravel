<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Cache Strategy
    |--------------------------------------------------------------------------
    |
    | Supported: "strict", "background", "force_refresh"
    |
    */
    'default_strategy' => 'strict',

   /*
    |--------------------------------------------------------------------------
    | Cache Adapter Service
    |--------------------------------------------------------------------------
    |
    | The service ID in the IoC container that implements PSR-16.
    | By default, we use the standard Laravel Cache Store.
    |
    */
    'adapter' => 'cache.store',
];
