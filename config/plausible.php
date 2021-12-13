<?php

return [
    /**
     * Host from Plausible
     */
    'host' => env('PLAUSIBLE_HOST', 'https://plausible.io'),

    /**
     * API Key from Plausible
     */
    'key' => env('PLAUSIBLE_KEY', null),

    /**
     * Site name as shown in the Plausible dashboard
     * e.g. jackwhiting.co.uk
     */
    'site' => env('PLAUSIBLE_SITE', null),

    /**
     * Do you want to use the cache?
     * True of False.
     */
    'cache_enabled' => env('PLAUSIBLE_CACHE', true),

    /**
     * Cache duration
     */
    'cache_duration' => 20000,

    /**
     * Default Time Period
     * Options: day, yesterday, 7d, 30d, 6mo, 12mo,
     */
    'default_period' => '6mo',
];
