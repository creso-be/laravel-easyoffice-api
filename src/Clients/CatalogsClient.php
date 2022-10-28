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

    public function get(string $uuid, int $page = 1): array
    {
        $response = $this->httpClient->get("catalog/{$uuid}?page={$page}");

        return $response->json();
    }
}
