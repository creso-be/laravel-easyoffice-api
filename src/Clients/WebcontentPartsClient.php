<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

class WebcontentPartsClient extends BaseClient
{
    public function all(array $filters = []): array
    {
        $path = $this->createFilterQuery('web-content-parts', $filters);

        $response = $this->httpClient->get($path);

        return $response->json('data');
    }

    public function get(string $uuid): array
    {
        $response = $this->httpClient->get("web-content-part/{$uuid}");

        return $response->json('data');
    }
}
