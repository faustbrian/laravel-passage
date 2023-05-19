<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Facades;

final class Passage
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-passage';
    }
}
