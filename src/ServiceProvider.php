<?php

declare(strict_types=1);

namespace BombenProdukt\Passage;

use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('laravel-passage', fn () => new Passage());
    }

    public function provides(): array
    {
        return ['laravel-passage'];
    }
}
