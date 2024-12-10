<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Management;

final readonly class Admins
{
    public function __construct(
        private Client $client,
    ) {
        //
    }

    public function list(): array
    {
        return $this->client->getByApp(path: 'admins')->json();
    }

    public function get(string $adminId): array
    {
        return $this->client->getByApp(path: 'admins/'.$adminId)->json();
    }

    public function create(string $email): array
    {
        return $this->client->postByApp(path: 'admins', data: ['email' => $email])->json();
    }

    public function delete(string $adminId): array
    {
        return $this->client->deleteByApp(path: 'admins/'.$adminId)->json();
    }
}
