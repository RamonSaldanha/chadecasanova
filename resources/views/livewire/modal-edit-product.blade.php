<div class="d-inline">
	<button type="button" class="btn btn-primary btn-sm text-sm" data-bs-toggle="modal" data-bs-target="#editProduct-{{$product->id}}">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
			<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
		</svg>
	</button>

	<!-- Modal -->
	<div class="modal fade" id="editProduct-{{$product->id}}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<form>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editProductLabel">Editar {{ $product->title }}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<img src="{{ Storage::url($product->photo) }}" width="80px" class="img-fluid rounded-start" alt="...">
							</div>

							<div class="form-control">
								<label for="photo" class="form-label">Título</label>
								<input class="form-control" id="title" type="text" wire:model="title" />

								@error('photo')
								<div class="alert alert-danger mt-2" role="alert">
									{{ $message }}
								</div>
								@enderror
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
						<button wire:click="save()" >Salvar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>