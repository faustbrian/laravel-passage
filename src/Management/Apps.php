<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Management;

final readonly class Apps
{
    public function __construct(
        private Client $client,
    ) {
        //
    }

    public function list(): array
    {
        return $this->client->get(path: '/')->json();
    }

    public function create(array $body): array
    {
        return $this->client->post(path: '/', data: $body)->json();
    }

    public function claim(string $name): array
    {
        return $this->client->postByApp(path: 'claim', data: ['name' => $name])->json();
    }

    public function get(): array
    {
        return $this->client->getByApp(path: '/')->json();
    }

    public function update(array $body): array
    {
        return $this->client->patchByApp(path: '/', data: $body)->json();
    }

    public function delete(): array
    {
        return $this->client->deleteByApp(path: '/')->json();
    }
}
