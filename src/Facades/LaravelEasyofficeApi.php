<?php

namespace Creso\LaravelEasyofficeApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creso\LaravelEasyofficeApi\LaravelEasyofficeApi
 */
class LaravelEasyofficeApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creso\LaravelEasyofficeApi\LaravelEasyofficeApi::class;
    }
}
