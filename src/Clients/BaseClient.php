<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

use Illuminate\Http\Client\PendingRequest;

class BaseClient
{
    public function __construct(protected PendingRequest $httpClient)
    {
    }
}
