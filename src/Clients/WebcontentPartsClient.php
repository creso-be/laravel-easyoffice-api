<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

class WebcontentPartsClient extends BaseClient
{
    public function getCacheTtl(): int
    {
        return config('easyoffice-api.cache_lifetime.webcontentParts', parent::getCacheTtl());
    }

    public function all(array $filters = []): array
    {
        $path = $this->createFilterQuery('web-content-parts', $filters);

        $response = $this->getRequest($path);

        return $response['data'] ?? [];
    }

    public function get(string $uuid): array
    {
        $response = $this->getRequest("web-content-part/{$uuid}");

        return $response['data'] ?? [];
    }
}
