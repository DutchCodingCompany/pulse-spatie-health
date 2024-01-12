<?php

namespace Bramr94\PulseSpatieHealth\Livewire;

use Illuminate\Contracts\View\View;
use Laravel\Pulse\Livewire\Card;
use Spatie\Health\Enums\Status;
use Spatie\Health\ResultStores\ResultStore;

class HealthCheck extends Card
{
    public function render(ResultStore $resultStore): View
    {
        return view('pulse-spatie-health::livewire.health-check', [
            'latestResults' => $resultStore->latestResults(),
        ]);
    }

    public function getIcon(string $status): string
    {
        return match ($status) {
            Status::ok()->value => 'check-circle',
            Status::warning()->value => 'exclamation-circle',
            Status::skipped()->value => 'arrow-circle-right',
            Status::failed()->value, Status::crashed()->value => 'x-circle',
            default => ''
        };
    }

    public function getIconColor(string $status): string
    {
        return match ($status) {
            Status::ok()->value => 'text-emerald-500',
            Status::warning()->value => 'text-yellow-500',
            Status::skipped()->value => 'text-blue-500',
            Status::failed()->value, Status::crashed()->value => 'text-red-500',
            default => 'text-gray-500'
        };
    }

    protected function css(): string
    {
        return __DIR__.'/../../dist/pulse-spatie-health.css';
    }
}
