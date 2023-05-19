<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Facades;

use Illuminate\Support\Facades\Facade;

final class Passage extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'passage';
    }
}
