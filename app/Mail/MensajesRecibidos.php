<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensajesRecibidos extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Mensaje de contacto';
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.mensajes-recibidos');
    }
}
