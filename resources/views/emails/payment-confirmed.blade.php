<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pagamento do Chá de Casa Nova</title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #5C6BC0;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #344495;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 0 auto;">

    <h2>Confirmação de Pagamento do Chá de Casa Nova</h2>
    <p>Olá <span id="nomeComprador">{{ $giver->fullname }}</span>,</p>
    <p>Recebemos com alegria a confirmação do seu pagamento e queremos agradecer imensamente por fazer parte deste momento tão especial em nossas vidas.</p>
    <p><strong>Detalhes do Presente:</strong></p>
    <ul>
        <li>Item: <span id="nomeItem">{{ $product->title }}</span></li>
        <li>Valor: <span id="valorItem">R$ {{ $product->price }}</span></li>
    </ul>
    <p>Seu presente já está registrado e muito em breve estará conosco, contribuindo para o início desta nova etapa.</p>
    <p>Caso precise de mais detalhes sobre sua contribuição ou tenha qualquer dúvida, por favor, não hesite em entrar em contato conosco.</p>
    <p>Com todo o nosso carinho e gratidão,<br><span id="nomeEmpresa">Vivian & Ramon</span></p>

</body>

</html>
