<?php

namespace DutchCodingCompany\PulseSpatieHealth;

use DutchCodingCompany\PulseSpatieHealth\Livewire\HealthCheck;
use Illuminate\Foundation\Application;
use Livewire\LivewireManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PulseSpatieHealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('pulse-spatie-health')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        $this->callAfterResolving('livewire', function (LivewireManager $livewireManager, Application $app) {
            $livewireManager->component('pulse.spatie-health', HealthCheck::class);
        });
    }
}
