<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

use Illuminate\Http\Client\PendingRequest;

class BaseClient
{
    public function __construct(protected PendingRequest $httpClient)
    {
    }

    public function createFilterQuery(string $path, array $filters): string
    {
        if (empty($filters)) {
            return $path;
        }

        $filters = collect($filters)->flatMap(function ($value, $key) {
            return ["filter[$key]" => $value];
        });

        $queryString = http_build_query($filters->toArray());

        return "{$path}?{$queryString}";
    }
}
