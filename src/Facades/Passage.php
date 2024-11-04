<?php

declare(strict_types=1);

namespace BaseCodeOy\Passage\Facades;

use BaseCodeOy\Passage\Authentication\Authentication;
use BaseCodeOy\Passage\Management\Management;
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
