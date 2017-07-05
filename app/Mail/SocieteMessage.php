<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SocieteMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $nomSociete;
    public $email;
    public $login;
    public $mot_de_passe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nomSociete, $email, $login, $mot_de_passe)
    {
        $this->nomSociete = $nomSociete;
        $this->email = $email;
        $this->login = $login;
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.message.create');
    }
}
