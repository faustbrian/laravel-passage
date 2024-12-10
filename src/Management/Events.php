<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Management;

final readonly class Events
{
    public function __construct(
        private Client $client,
    ) {
        //
    }

    public function list(): array
    {
        return $this->client->getByApp(path: 'events')->json();
    }
}
