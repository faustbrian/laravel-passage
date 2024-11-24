<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Management;

final readonly class Management
{
    private readonly Client $client;

    public function __construct(array $config)
    {
        $this->client = new Client($config);
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
