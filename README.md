# Laravel EasyOffice API wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creso/laravel-easyoffice-api.svg?style=flat-square)](https://packagist.org/packages/creso/laravel-easyoffice-api)
[![Total Downloads](https://img.shields.io/packagist/dt/creso/laravel-easyoffice-api.svg?style=flat-square)](https://packagist.org/packages/creso/laravel-easyoffice-api)

Laravel wrapper around the EasyOffice API.

## Installation

You can install the package via composer:

```bash
composer require creso/laravel-easyoffice-api
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-easyoffice-api-config"
```

This is the contents of the published config file:

```php
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
     * Enable or disable api response cache. (not used yet)
     */
    'enable_cache' => env('EASY_OFFICE_ENABLE_CACHE'),
    
    /**
     * The cache lifetime of an api response in seconds. (not used yet)
     *
     * This will only be used in case no specific cache lifetime is configured for the api type
     * in the config setting below.
     */
    'default_cache_liftime' => 60 * 60,  // 1h

    /**
     * The cache lifetime of an api response in seconds for a given api type. (not used yet)
     */
    'cache_lifetime' => [
        'webcontentParts' => 60 * 60 * 24, // 24h
    ],
];
```

## Usage

## Facade vs Dependency injection vs app helper

```php
# Using the facade
EasyOfficeApi::webcontentParts()->all();
```

```php
# Dependency injection

use Creso\LaravelEasyofficeApi\EasyofficeApi;<?php

class MyClass 
{
    public function __construct(private EasyofficeApi $easyofficeApi)
    {
    }
    
    public function __invoke()
    {
        $this->easyofficeApi->webcontentParts()->all();    
    }    
}
```

```php
# Using the Laravel app helper
use Creso\LaravelEasyofficeApi\EasyofficeApi;

app(EasyofficeApi::class)->webcontentParts()->all();
```

## Webcontent parts

```php
# Get all webcontent parts
EasyOfficeApi::webcontentParts()->all();

# Get all webcontents parts, but filterd by uuid
EasyOfficeApi::webcontentParts()->all(['uuid' => 'a-full-or-partial-uuid-to-filter-on']);

# A specific webcontent part by uuid
EasyOfficeApi::webcontentParts()->get('729bc31d-ab1b-4cfb-9dab-b5419bdc92ca');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tim Van Dyck](https://github.com/creso-be)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
