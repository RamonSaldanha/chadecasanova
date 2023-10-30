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
							<th>Deletar</th>
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
							<td class="d-flex">
								@if($product->paid === 2)
									<a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $product->giver->whatsapp) }}?text=Olá, agradecemos muito pelo presente que você nos deu. Logo estaremos mandando uma fotxinha dele e marcando a data para recebê-lo(a) na nossa casinha 😍. Ramon e Vivi" target="_blank" class="btn btn-sm btn-success">
										<i class="fab fa-whatsapp"></i> Agradecer
									</a>
								@elseif($product->giver && $product->paid !== 2)
									<button type="button" class="btn btn-warning btn-sm" @click="$dispatch('turn-available')">Tornar disponível</button>
								@else
									
								@endif
								<button class="btn btn-sm btn-danger ms-2" wire:click="delete({{ $product->id }})">Deletar</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>