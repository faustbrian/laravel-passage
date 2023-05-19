<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Management;

use BombenProdukt\Passage\Client;

final readonly class Management
{
    public function __construct(private readonly Client $client)
    {
        //
    }

    public function admins(): Admins
    {
        return new Admins($this->client);
    }

    public function apps(): Apps
    {
        return new Apps($this->client);
    }

    public function apiKeys(): ApiKeys
    {
        return new ApiKeys($this->client);
    }

    public function embeddedMagicLinks(): EmbeddedMagicLinks
    {
        return new EmbeddedMagicLinks($this->client);
    }

    public function events(): Events
    {
        return new Events($this->client);
    }

    public function users(): Users
    {
        return new Users($this->client);
    }
}
