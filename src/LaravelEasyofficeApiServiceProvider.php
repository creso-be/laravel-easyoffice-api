<?php

namespace Creso\LaravelEasyofficeApi;

use Creso\LaravelEasyofficeApi\Clients\BaseClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
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

    public function packageRegistered()
    {
        $this->app->singleton(EasyOfficeApi::class, function ($app) {
            $httpClient = Http::withToken(config('easyoffice-api.api_token'))
                ->baseUrl(config('easyoffice-api.base_url'))
                ->acceptJson()
                ->throw();

            return new EasyOfficeApi($httpClient);
        });

        $this->app->bind(\Creso\LaravelEasyofficeApi\Facades\EasyOfficeApi::class, EasyOfficeApi::class);
    }
}
