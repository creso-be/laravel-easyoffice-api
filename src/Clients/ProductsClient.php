<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

class ProductsClient extends BaseClient
{
    public function get(string $uuid, bool $skipCache = false): array
    {
        return $this->getRequest("product/{$uuid}", skipCache: $skipCache);
    }
}
