<!DOCTYPE html>
<html>
<head>
    <title>Solicitação de alteração de senha - CREF4/SP Admin</title>
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
    Solicitação de alteração de senha - CREF4/SP Admin
</h1>
<hr>
<p>
    Olá, {{ $email }}!<br>
</p> 
<p>
    Por favor, entre no <a href="{{ request()->getSchemeAndHttpHost() }}/admin/login/reset/{{$token}}">link</a> para atualizar sua senha.<br>
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