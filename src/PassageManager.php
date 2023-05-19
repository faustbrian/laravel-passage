<?php

declare(strict_types=1);

namespace BombenProdukt\Passage;

use BombenProdukt\Manager\AbstractManager;

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
