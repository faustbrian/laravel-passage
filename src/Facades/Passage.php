<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Facades;

use BombenProdukt\Passage\Authentication\Authentication;
use BombenProdukt\Passage\Management\Management;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Authentication authentication()
 * @method static Management     management()
 */
final class Passage extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'passage';
    }
}
