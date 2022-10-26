<?php

namespace Creso\LaravelEasyofficeApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Creso\LaravelEasyofficeApi\Commands\LaravelEasyofficeApiCommand;

class LaravelEasyofficeApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-easyoffice-api')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-easyoffice-api_table')
            ->hasCommand(LaravelEasyofficeApiCommand::class);
    }
}
