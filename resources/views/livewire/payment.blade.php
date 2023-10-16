
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">🎉 Estamos quase lá! 🎉</h2>
            
            <p class="mb-2">Oi! Primeiramente, queremos te agradecer do fundo do coração por chegar até aqui e decidir fazer parte deste momento tão especial. 🥰</p>
            
            <p class="mb-2">Para finalizar e consolidar seu presente, siga os passos abaixo:</p>

            <ol class="mb-2">
                <li>Clique no botão de pagamento do <strong>Mercado Pago</strong> que está nesta página.</li>
                <li>Você será redirecionado para uma página segura do Mercado Pago.</li>
                <li>Siga as instruções na tela para completar o pagamento.</li>
            </ol>

            <p class="mb-2">Assim que o pagamento for confirmado, o seu presente estará garantido! 🎁</p>
            <p class="font-weight-bold text-danger">Muito obrigado por seu carinho e generosidade. 💖</p>

        </div>
    </div>
    <div>
       <a href="{{ $product->mercado_pago_url }}" class="btn btn-secondary">Finalizar compra com <strong>Mercado Pago</strong></a>
        <img src="{{ asset('img/selo-mercado-pago.png') }}" width="280px;" class="img-fluid my-4"/>
    </div>

</div>