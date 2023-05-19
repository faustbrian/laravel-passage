<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

use BombenProdukt\Passage\Client;

final readonly class Authentication
{
    public function __construct(private readonly Client $client)
    {
        //
    }

    public function apps(): Apps
    {
        return new Apps($this->client);
    }

    public function authenticatedUsers(string $token): AuthenticatedUsers
    {
        return new AuthenticatedUsers($this->client->withToken($token));
    }

    public function magicLink(): MagicLinks
    {
        return new MagicLinks($this->client);
    }

    public function sessionManagement(): SessionManagement
    {
        return new SessionManagement($this->client);
    }

    public function users(): Users
    {
        return new Users($this->client);
    }

    public function webAuthn(): WebAuthn
    {
        return new WebAuthn($this->client);
    }
}
