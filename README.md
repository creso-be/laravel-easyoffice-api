# Laravel EasyOffice API wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creso/laravel-easyoffice-api.svg?style=flat-square)](https://packagist.org/packages/creso/laravel-easyoffice-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/creso/laravel-easyoffice-api/run-tests?label=tests)](https://github.com/creso/laravel-easyoffice-api/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/creso/laravel-easyoffice-api/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/creso/laravel-easyoffice-api/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
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
];
```

## Usage

```php
$laravelEasyofficeApi = new Creso\LaravelEasyofficeApi();
echo $laravelEasyofficeApi->echoPhrase('Hello, Creso!');
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
