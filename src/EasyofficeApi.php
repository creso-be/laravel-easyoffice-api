<?php

namespace Creso\LaravelEasyofficeApi;

use Creso\LaravelEasyofficeApi\Clients\WebcontentPartsClient;
use Illuminate\Http\Client\PendingRequest;

class EasyOfficeApi
{
    public function __construct(private PendingRequest $httpClient)
    {
    }

    public function webcontentParts(): WebcontentPartsClient
    {
        return new WebcontentPartsClient($this->httpClient);
    }
}
