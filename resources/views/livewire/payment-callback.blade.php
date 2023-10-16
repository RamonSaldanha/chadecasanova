<div>
  <div class="container">
    @if($result == 'success')
    <div class="alert alert-success" role="alert">
      Pagamento realizado com sucesso!
    </div>
    @endif

    @if($result == 'failure')
    <div class="alert alert-danger" role="alert">
      Houve algum erro no pagamento
    </div>
    @endif

    @if($result == 'pending')
    <div class="alert alert-warning" role="alert">
      Aguardando a confirmação do pagamento
    </div>
    @endif
  </div>
</div>