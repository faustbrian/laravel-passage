<?php

declare(strict_types=1);

namespace BombenProdukt\Passage;

use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;
use BombenProdukt\Passage\Mixins\RouteMixin;
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
