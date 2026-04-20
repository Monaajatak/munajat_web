<?php

return [
    /*
    |--------------------------------------------------------------------------
    | External API Configuration
    |--------------------------------------------------------------------------
    */
    'apis' => [
        'aladhan_base_url' => env('ALADHAN_API_URL', 'https://api.aladhan.com/v1'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache TTLs (in minutes)
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'prayer_times_ttl' => (int) env('PRAYER_TIMES_CACHE_TTL', 360),    // 6 hours
    ],

    /*
    |--------------------------------------------------------------------------
    | App Store Links
    |--------------------------------------------------------------------------
    */
    'store' => [
        'google_play' => env('GOOGLE_PLAY_URL', 'https://play.google.com/store/apps/details?id=com.munajat.app'),
        'app_store'   => env('APP_STORE_URL', '#'),
    ],
];
