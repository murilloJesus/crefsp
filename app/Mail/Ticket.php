<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ticket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $email;
    public $nome;
    public $data;
    public $local;
    public $tipo;
    public $nomeInscrito;
    public $cep;
    public $cidade;
    public $bairro;
    public $endereco;
    public $numero;
    public $complemento;
    public $telefone;
    public $celular;
    public $estado;
    public $registro;



    public function __construct($ticket, $email, $nome, $data, $local, $tipo, $nomeInscrito, $cep, $cidade, $bairro, $endereco, $numero, $complemento, $telefone, $celular, $estado, $registro)
    {
        $this->ticket = $ticket;
        $this->email = $email;
        $this->nome = $nome;
        $this->data = $data;
        $this->local = $local;
        $this->tipo = $tipo;
        $this->nomeInscrito = $nomeInscrito;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->endereco = $endereco;
        $this->complemento = $complemento;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->registro = $registro;
    }


    public function build()
    {
        return $this->from('cref4sp@crefsp.gov.br')
                            ->subject("Ticket para evento: ". $this->nome .", CREF4/SP - ". $this->tipo)
                            ->view('mails.ticket');
    }
}
