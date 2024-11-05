<?php

declare(strict_types=1);

namespace BaseCodeOy\Passage;

use BaseCodeOy\Manager\AbstractManager;

final class PassageManager extends AbstractManager
{
    protected function createConnection(array $config): object
    {
        return new Passage($config);
    }

    protected function getConfigName(): string
    {
        return 'passage';
    }
}
