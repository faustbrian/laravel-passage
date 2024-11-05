<?php

declare(strict_types=1);

namespace BaseCodeOy\Passage\Management;

final readonly class Events
{
    public function __construct(private Client $client)
    {
        //
    }

    public function list(): array
    {
        return $this->client->getByApp(path: 'events')->json();
    }
}
