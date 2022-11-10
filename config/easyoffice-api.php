<?php

return [

    /**
     * The base url of the EasyOffice API.
     */
    'base_url' => env('EASY_OFFICE_API_BASE_URL'),

    /**
     * The API token to authenticate with the EasyOffice API.
     */
    'api_token' => env('EASY_OFFICE_API_TOKENS'),

    /**
     * Enable or disable api response cache.
     */
    'enable_cache' => env('EASY_OFFICE_ENABLE_CACHE'),
    
    /**
     * The cache lifetime of an api response in seconds.
     *
     * This will only be used in case no specific cache lifetime is configured for the api type
     * in the config setting below.
     */
    'default_cache_liftime' => 60 * 60,  // 1h

    /**
     * The cache lifetime of an api response in seconds for a given api type.
     */
    'cache_lifetime' => [
        'webcontentParts' => 60 * 60 * 24, // 24h

        'catalogs' => 60 * 60 * 24, // 24h

        'products' => 60 * 60 * 24, // 24h
    ],
];
