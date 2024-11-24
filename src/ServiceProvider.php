<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage;

use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use BaseCodeOy\Passage\Mixins\RouteMixin;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Route;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('passage', fn (Container $app): PassageManager => new PassageManager($app['config']));

        Route::mixin(new RouteMixin());
    }

    public function provides(): array
    {
        return ['passage'];
    }
}
