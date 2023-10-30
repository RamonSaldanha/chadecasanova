<div>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Editar
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<form>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar {{ $product->title }}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<img src="{{ Storage::url($product->photo) }}" width="80px" class="img-fluid rounded-start" alt="...">
							</div>
							@if($product->giver)
								<div class="col-md-12">
									{{$product->giver->fullname}}
								</div>
							@else
							<div class="col-md-12">
								<p class="text-danger">Este item ainda não foi presenteado</p>
							</div>
							@endif
						</div>
					</div>
					<div class="modal-footer">
						@if($product->giver !== null)
							<button type="button" class="btn btn-success" @click="$dispatch('turn-available')">Tornar disponível</button>
						@endif
						{{-- criar dois botões com ícone de whatsapp para enviar uma mensagem de agradecimento pela doação e outra para enviar uma mensagem para perguntar se existe alguma dúvida, já que o produto foi reinvidicado --}}
						{{$product_id}}
						@if ($product->giver !== null)
							<a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $product->giver->whatsapp) }}?text=" target="_blank" class="btn btn-success">
								<i class="fab fa-whatsapp"></i> Agradecer
							</a>
						@endif
					</div>
				</div>
			</form>
		</div>
	</div>
</div>