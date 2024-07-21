<?php

namespace App\Providers;

use App\Events\TemperaturaMalteriaEvent;
use App\Listeners\TemperaturaListenerEvent;
use App\Listeners\TemperaturaMalteriaListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        TemperaturaMalteriaEvent::class => [
            TemperaturaMalteriaListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
