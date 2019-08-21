<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
    /**
     * Los listener de eventos para la aplicación.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\MensajeRecibido' => [
            'App\Listeners\EnviarRespuesta',
            'App\Listeners\NotificarModeradores',
            // ... defina aquí más listener de ser necesario
            // ...
        ],
    ];

    /**
     * Registre eventos para la aplicación.
     *
     * @return void
     */
    public function boot() {
        parent::boot();

        //
    }
}
