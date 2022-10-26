<?php

namespace Creso\LaravelEasyofficeApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creso\LaravelEasyofficeApi\EasyOfficeApi
 */
class EasyOfficeApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creso\LaravelEasyofficeApi\EasyOfficeApi::class;
    }
}
