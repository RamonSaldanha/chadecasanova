<!-- FILEPATH: /C:/Users/ramon/Desktop/code library/Chá de Casa Nova/resources/mail/GiftPurchase.blade -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Confirmação de Pedido de Compra</title>
  </head>
  <body>
    <h1>Confirmação de Pedido de Compra</h1>
    <p>Olá {{ $giver->fullname }},</p>
    <p>Obrigado por comprar conosco! Seu pedido foi confirmado e estamos processando o pagamento.</p>
    <p>Para finalizar a compra, clique no botão abaixo para ser redirecionado para a página de checkout:</p>
    <a href="[LINK PARA A PÁGINA DE CHECKOUT]" target="_blank"><button>Finalizar Compra</button></a>
    <p>Obrigado novamente por escolher nossa loja!</p>
    <p>Atenciosamente,</p>
    <p>[NOME DA LOJA]</p>
  </body>
</html>
