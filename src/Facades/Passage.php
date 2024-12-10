<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return 'passage';
    }
}
