<div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Adicione um produto</h3>
				@if (session('message'))
				<div class="alert alert-success">
					{{ session('message') }}
				</div>
				@endif
				<form wire:submit="save">
					<div class="mb-3">
						<label for="title" class="form-label">Título do produto</label>
						<input class="form-control" id="title" type="text" wire:model="title">
						@error('title')
						<div class="alert alert-danger mt-2" role="alert">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="mb-3">
						<label for="description" class="form-label">Descrição</label>
						<div wire:ignore>
							<div style="height: 140px;" x-ref="editor" x-data x-init="
								const quill = new Quill($refs.editor, { theme: 'snow' });
								quill.on('text-change', () => {
									$wire.set('description', quill.root.innerHTML);
								});
							">
								{!!  $description !!}
							</div>
						</div>
						@error('description')
						<div class="alert alert-danger mt-2" role="alert">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="row">
						<div class="col">
							<label for="price" class="form-label">Preço</label>
							<input class="form-control" id="price" type="text" placeholder="50.00" wire:model="price" />
							@error('price')
							<div class="alert alert-danger mt-2" role="alert">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="col">
							<label for="price" class="form-label">Preço do frete</label>
							<input class="form-control" id="price" type="text" placeholder="15.00" wire:model="freight_price" />
							@error('price')
							<div class="alert alert-danger mt-2" role="alert">
								{{ $message }}
							</div>
							@enderror
						</div>
					</div>

					<div
						x-data="{ uploading: false, progress: 0 }"
						x-on:livewire-upload-start="uploading = true"
						x-on:livewire-upload-finish="uploading = false"
						x-on:livewire-upload-error="uploading = false"
						x-on:livewire-upload-progress="progress = $event.detail.progress"
					>
						<div class="mb-3">
							<label for="photo" class="form-label">Foto</label>
							<input class="form-control" id="photo" type="file" wire:model="photo" />

							@if ($photo) 
								<img src="{{ $photo->temporaryUrl() }}" style="max-height: 250px;" class="mt-3">
							@endif
					
							@error('photo')
							<div class="alert alert-danger mt-2" role="alert">
								{{ $message }}
							</div>
							@enderror
							
						</div>
						<div x-show="uploading">
							<progress max="100" x-bind:value="progress" width="80px"></progress>
						</div>
					</div>


					<button class="btn btn-primary" type="submit">Adicionar</button>
				</form>


				<h3>Todos produtos</h3>

				@if (session('turnAvailable'))
				<div class="alert alert-success">
					{{ session('turnAvailable') }}
				</div>
				@endif
				<table class="table table-sm">
					<thead>
						<tr>
							<th>Photo</th>
							<th>Title</th>
							<th>Price</th>
							<th>Status</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td><img src="{{ \Storage::url($product->photo) }}" width="50px;" alt="..."></td>
							<td><a  class="d-inline-block text-truncate" style="max-width: 250px;" href="/checkout/{{ $product->slug }}" target="_blank">{{ $product->title }}</a></td>
							<td>{{ $product->price }}</td>
							<td>
								@if($product->paid === 2)
									<span class="badge bg-success">Pago</span>
								@elseif($product->giver && $product->paid !== 2)
									<span class="badge bg-warning">Reinvidicado</span>
								@else
									<span class="badge bg-info">Disponível</span>
								@endif
							</td>
							<td>
								@if($product->paid === 2)
									<a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $product->giver->whatsapp) }}?text=Olá, agradecemos muito pelo presente que você nos deu. Logo estaremos mandando uma fotxinha dele e marcando a data para recebê-lo(a) na nossa casinha 😍. Ramon e Vivi" target="_blank" class="btn btn-sm btn-success text-sm">
										<i class="fab fa-whatsapp"></i> Agradecer
									</a>
								@elseif($product->giver && $product->paid !== 2)
									<button type="button" class="btn btn-warning btn-sm" wire:click="turnAvailable({{$product->id}})">Marcar disponível</button>
									<button type="button" class="btn btn-success btn-sm" wire:click="turnPaid({{$product->id}})">Marcar pago</button>
									</button>
								@else
									
								@endif

								<livewire:modal-edit-product :product="$product" :key="$product->id" />

								<button class="btn btn-sm btn-danger text-sm p-1" wire:click="delete({{ $product->id }})"
									x-on:click="if (! confirm('Tem certeza que deseja deletar este produto?')) { return false; }"
								>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
										<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
									</svg>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>