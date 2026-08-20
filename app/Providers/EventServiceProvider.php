<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Relaciones entre los eventos y sus escuchadores en la aplicación.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Registra los eventos utilizados por la aplicación.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determina si los eventos y escuchadores deben descubrirse automáticamente.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
