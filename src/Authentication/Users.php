<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

final readonly class Users
{
    public function __construct(private Client $client)
    {
        //
    }

    public function info(string $identifier): array
    {
        return $this->client->get(
            path: 'users',
            data: ['identifier' => $identifier],
        )->json('user');
    }
}
