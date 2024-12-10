<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Authentication;

final readonly class Users
{
    public function __construct(
        private Client $client,
    ) {
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
