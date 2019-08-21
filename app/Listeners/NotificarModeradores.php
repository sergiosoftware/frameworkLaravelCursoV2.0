<?php

namespace App\Listeners;

use App\Events\MensajeRecibido;
use App\User;
use Mail;

class NotificarModeradores {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MensajeRecibido  $event
     * @return void
     */
    public function handle(MensajeRecibido $event) {

        // Buscar los usuarios con rol de "Moderador"
        $users = User::whereHas('roles', function ($q) {
            $q->where('nombre', 'Moderador');
        })->get();

        $mensaje = $event->getMensaje();

        // supuestamente enviar a cada Moderador un mensaje
        foreach ($users as $user) {
            $dataUsuario = $user->getAttributes();

            Mail::send('emails.notifica-moderador', ['msg' => $mensaje], function ($msg) use ($dataUsuario) {
                $msg->to($dataUsuario['email'], $dataUsuario['name'])->subject('Nuevo mensaje por revisar');
            });

            break; // Sólo enviar al 1er moderador. Quitar esto cuando se encolen debidamente los mensajes
        }

        // A partir del segundo envío, esto fallará porque no se encolaron los mensajes
        // y no se está dando un intervalo de tiempo entre los envíos. El error es:
        // Expected response code 354 but got code "550", with message 
        // "550 5.7.0 Requested action not taken: too many emails per second "
        // https://laracasts.com/discuss/channels/laravel/delay-between-processes-in-job-queue

    }
}