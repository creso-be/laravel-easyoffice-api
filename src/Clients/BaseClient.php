<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class BaseClient
{
    public function __construct(protected PendingRequest $httpClient)
    {
        $this->httpClient->throw([$this, 'handleErrors']);
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

    public function handleErrors(Response $response): void
    {
        Log::error("[EO] API call to EasyOffice failed with status code {$response->status()}", [
            'reasonPhrase' => $response->reason(),
            'headers' => $response->headers(),
            'requestUri' => $response->transferStats?->getRequest()?->getUri(),
            'requestTarget' => $response->transferStats?->getRequest()?->getRequestTarget(),
        ]);

        abort($response->status(), $response->reason());
    }
}
