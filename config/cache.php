<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | Paksa menggunakan FILE untuk development
    | agar tidak membutuhkan tabel database.
    |
    */

    'default' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    */

    'stores' => [

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        /*
        |--------------------------------------------------
        | Database cache (DISIAPKAN, TIDAK AKTIF)
        |--------------------------------------------------
        */
        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION', null),
            'table' => 'cache',
            'lock_connection' => null,
            'lock_table' => null,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    */

    'prefix' => Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_',

];
