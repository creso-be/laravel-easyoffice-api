<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class BaseClient
{
    public function __construct(protected PendingRequest $httpClient)
    {
        $this->httpClient->throw([$this, 'handleErrors']);
    }

    public function getRequest(string $endpoint, array $options = [], bool $skipCache = false): array
    {
        $cacheKey = $this->generateCacheKey($endpoint);

        if ($this->getCacheEnabled() && Cache::has($cacheKey) && ! $skipCache) {
            return Cache::get($cacheKey);
        }

        $response = $this->httpClient->get($endpoint, $options)->json();

        if ($this->getCacheEnabled()) {
            Cache::put($cacheKey, $response, $this->getCacheTtl());
        }

        return $response;
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

    public function getCacheTtl(): int
    {
        return config('easyoffice-api.default_cache_liftime');
    }

    public function getCacheEnabled(): bool
    {
        return config('easyoffice-api.enable_cache', false);
    }

    public function generateCacheKey(string $endpoint, array $options = []): string
    {
        $cacheKey = "easyoffice__{$endpoint}";

        foreach ($options as $key => $value) {
            $cacheKey .= "__{$key}_{$value}";
        }

        return $cacheKey;
    }

    public function handleErrors(Response $response): void
    {
        if ($response->status() === 422) {
            $messages = $response->json('errors') ?? [];

            throw ValidationException::withMessages($messages);
        }

        Log::error("[EO] API call to EasyOffice failed with status code {$response->status()}", [
            'reason' => $response->reason(),
            'response' => $response->body(),
            'headers' => $response->headers(),
            'requestUri' => $response->transferStats?->getRequest()?->getUri(),
        ]);

        abort($response->status(), $response->reason());
    }
}
