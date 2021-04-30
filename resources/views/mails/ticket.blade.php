<!DOCTYPE html>
<html>
<head>
    <title> Solicitação de Ticket para Evento - CREF4/SP</title>
    <meta charset="utf-8">
    <style>
        body{
            width:510px;
            margin:0;
            padding:0 20px;
            font-family:"Raleway", sans-serif;
            font-size:12px;
        }
        h1{
            font-size:20px;
        }
        h2{
            font-size:16px;
        }
    </style>
</head>
<body>
<h1>
    Solicitação de Ticket para Evento - CREF4/SP
</h1>
<hr>
<p>
    Olá, <b>{{ $nomeInscrito }}</b>,
</p> 
<p>
    Seu ticket é <b>{{ $ticket }}</b>, para o evento {{ $nome }} em <b><?= substr($data,6,8); ?>/<?= substr($data,4,-2); ?>/<?= substr($data, 0, 4); ?>, {{ $local }} </b>
</p> 

    <div>
    <p><b>Nome: </b> {{$nomeInscrito}} </p>

    <?php if($registro != '') { ?>
        <p><b>Registro: </b> {{$registro}}; </p>
    <?php  } ?>

    <p><b>Email: </b> {{$email}}; </p>
    <p><b>Telefone: </b> {{$telefone}}; </p>
    
    <p><b>Palestra: {{ $nome }};</b></p>

    <p><b>
        Endereço: {{ $local }};
    </b></p>
<!--     
    <p><b>CEP: </b> {{$cep}} </p>
    <p><b>Estado: </b> {{$estado}} </p>
    <p><b>Cidade: </b> {{$cidade}} </p>
    <p><b>Bairro: </b> {{$bairro}} </p>
    <p><b>Endereço: </b> {{$endereco}} </p>
    <p><b>Número: </b> {{$numero}} </p>
    <p><b>Complemento: </b> {{$complemento}} </p>
    <p><b>Celular: </b> {{$celular}} </p> -->
    </div>

    <p>
        Lembre-se de levar uma copia do ticket no dia do evento.
    </p> 

<hr>
<div>
    <p>
        <br>
        SEDE – SÃO PAULO<br>
        Rua Líbero Badaró, 377, 3º andar, Centro<br>
        CEP 01009-000<br>
        São Paulo/SP, (11) 3292-1700<br>
        Esta é uma mensagem automática. Por favor, não responda este e-mail.
    </p>
</div>
</body>
</html> 