<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormularioEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $array;
    public $pdf;
    public $jpeg;
    public $audio;
    public $video;

    public function __construct($email, $array, $pdf, $jpeg, $audio, $video)
    {
        $this->email = $email;
        $this->array = $array;
        $this->pdf = $pdf;
        $this->jpeg = $jpeg;
        $this->audio = $audio;
        $this->video = $video;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cref4sp@crefsp.gov.br')
            ->subject('Requisição ao site CREF4/SP')
            ->view('mails.formulario');
    }
}
