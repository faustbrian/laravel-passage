<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

final readonly class Apps
{
    public function __construct(private Client $client)
    {
        //
    }

    public function get(): array
    {
        return $this->client->get(path: '/')->json('app');
    }
}
