<?php

declare(strict_types=1);

namespace Creso\LaravelEasyofficeApi\Clients;

class WebcontentPartsClient extends BaseClient
{
    public function all(): array
    {
        // TODO filter op uuid
        $response = $this->httpClient->get('web-content-parts');

        return $response->json('data');
    }

    public function get()
    {
        // TODO
    }
}
