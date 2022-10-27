<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

class CatalogsClient extends BaseClient
{
    public function all(): array
    {
        $response = $this->httpClient->get('catalogs');

        return $response->json('data');
    }

    public function get(string $uuid): array
    {
        $response = $this->httpClient->get("catalog/{$uuid}");

        return $response->json();
    }
}
