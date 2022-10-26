<?php

namespace Creso\LaravelEasyofficeApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Creso\LaravelEasyofficeApi\Commands\LaravelEasyofficeApiCommand;

class LaravelEasyofficeApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-easyoffice-api')
            ->hasConfigFile();
    }
}
