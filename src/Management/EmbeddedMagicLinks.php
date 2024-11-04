<?php

declare(strict_types=1);

namespace BaseCodeOy\Passage\Management;

final readonly class EmbeddedMagicLinks
{
    public function __construct(private Client $client)
    {
        //
    }

    public function create(array $data): array
    {
        return $this->client->postByApp(path: 'magic-links', data: $data)->json();
    }
}
