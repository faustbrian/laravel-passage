<?php

declare(strict_types=1);

namespace BombenProdukt\Passage;

use BombenProdukt\Passage\Authentication\Authentication;
use BombenProdukt\Passage\Management\Management;

final readonly class Passage
{
    private Client $client;

    public function __construct(array $config)
    {
        $this->client = new Client($config);
    }

    public function authentication(): Authentication
    {
        return new Authentication($this->client);
    }

    public function management(): Management
    {
        return new Management($this->client);
    }
}
