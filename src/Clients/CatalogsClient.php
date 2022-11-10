<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

use Illuminate\Support\Facades\Cache;

class CatalogsClient extends BaseClient
{
    public function getCacheTtl(): int
    {
        return config('easyoffice-api.cache_lifetime.catalogs', parent::getCacheTtl());
    }

    public function all(): array
    {
        $response = $this->getRequest('catalogs');

        return $response['data'] ?? [];
    }

    public function get(string $uuid, int $page = 1): array
    {
        $response = $this->getRequest("catalog/{$uuid}?page={$page}");

        return $response;
    }

    public function getBySlug(string $slug, int $page = 1, $options = []): array
    {
        $options = array_merge($options, ['page' => $page]);

        $response = $this->getRequest("catalog/slug/{$slug}", $options);

        return $response;
    }
}
