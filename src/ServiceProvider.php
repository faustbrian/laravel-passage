<?php

declare(strict_types=1);

namespace BombenProdukt\Passage;

use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Container\Container;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('passage', fn (Container $app): PassageManager => new PassageManager($app['config']));
    }

    public function provides(): array
    {
        return ['passage'];
    }
}
