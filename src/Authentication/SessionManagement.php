<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Authentication;

final readonly class SessionManagement
{
    public function __construct(
        private Client $client,
    ) {
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
