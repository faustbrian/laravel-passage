<?php

declare(strict_types=1);

namespace BaseCodeOy\Passage\Authentication;

final readonly class SessionManagement
{
    public function __construct(private Client $client)
    {
        //
    }

    public function createRefreshToken(string $refreshToken): array
    {
        return $this->client->post(
            path: 'tokens',
            data: ['refresh_token' => $refreshToken],
        )->json('auth_result');
    }

    public function revokeRefreshToken(string $refreshToken): array
    {
        return $this->client->delete(
            path: 'tokens',
            data: ['refresh_token' => $refreshToken],
        )->json();
    }
}
