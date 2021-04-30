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
    Requisição de Formulario ao site CREF4/SP
</h1>
<hr>
<p>
    Olá, {{$array['nome']}}!<br>
</p> 
<p>
    Sua requisição foi enviada com sucesso!
</p> 
<p>
    Seu Formulario:
</p> 
<?php
    foreach ($array as $key => $value) :
?>
    <p><?= str_replace('_', ' ', $key) ?> : <strong> <?= $value ?></strong> </p>
<?php
    endforeach;
?>

<hr>
<p><strong>Anexos:</strong></p>
<?php
if($pdf != ''){
?>
    <p>
        <a href="http://crefsp.gov.br/storage/app/denuncias/<?php echo $pdf; ?>" target="_blank">Documento</a>
    </p>
<?php }?>

<?php
if($jpeg != ''){
?>
<p>
    <a href="http://crefsp.gov.br/storage/app/denuncias/<?php echo $jpeg; ?>" target="_blank">Imagem</a>
</p>
<?php }?>

<?php
if($audio != ''){
?>
<p>
    <a href="http://crefsp.gov.br/storage/app/denuncias/<?php echo $audio; ?>" target="_blank">Áudio</a>
</p>
<?php }?>

<?php
if($video != ''){?>
<p>
    <a href="http://crefsp.gov.br/storage/app/denuncias/<?php echo $video; ?>" target="_blank">Vídeo</a>
</p>
<?php }?>
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