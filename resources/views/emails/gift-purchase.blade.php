<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Presente para o Chá de Casa Nova</title>
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

    <h2>Confirmação de Presente para o Chá de Casa Nova</h2>
    <p>Olá <span id="nomeComprador">{{ $giver->fullname }}</span>,</p>
    <p>Estamos emocionados por você escolher fazer parte deste momento especial ao nos presentear no nosso Chá de Casa Nova!</p>
    <p><strong>Detalhes do Presente:</strong></p>
    <ul>
        <li>Item: <span id="nomeItem">{{ $product->title }}</span></li>
        <li>Valor: <span id="valorItem">R$ {{ $product->price }}</span></li>
    </ul>
    <p>Para finalizar sua generosa contribuição, por favor, confirme o presente e realize o pagamento clicando no botão abaixo.</p>
    <a href="{{ route('payment', $product->slug) }}" class="btn">Confirmar e Pagar</a>
    <p>Agradecemos sua generosidade e apoio neste novo capítulo de suas vidas.</p>
    <p>Se você tiver alguma dúvida ou precisar de assistência adicional, por favor, não hesite em entrar em contato conosco.</p>
    <p>Com carinho,<br><span id="nomeEmpresa">Vivian & Ramon</span></p>

</body>

</html>
