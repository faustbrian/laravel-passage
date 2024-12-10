<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage;

use BaseCodeOy\Passage\Authentication\Authentication;
use BaseCodeOy\Passage\Management\Management;

final readonly class Passage
{
    public function __construct(
        private readonly array $config,
    ) {
        //
    }

    public function authentication(): Authentication
    {
        return new Authentication($this->config);
    }

    public function management(): Management
    {
        return new Management($this->config);
    }
}
