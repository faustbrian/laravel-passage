<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage;

use BaseCodeOy\Manager\AbstractManager;

final class PassageManager extends AbstractManager
{
    #[\Override()]
    protected function createConnection(array $config): object
    {
        return new Passage($config);
    }

    #[\Override()]
    protected function getConfigName(): string
    {
        return 'passage';
    }
}
