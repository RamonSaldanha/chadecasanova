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
						<textarea class="form-control" id="description" wire:model="description"></textarea>
						@error('description')
						<div class="alert alert-danger mt-2" role="alert">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="mb-3">
						<label for="price" class="form-label">Preço</label>
						<input class="form-control" id="price" type="text" placeholder="50,00" wire:model="price" />
						@error('price')
						<div class="alert alert-danger mt-2" role="alert">
							{{ $message }}
						</div>
						@enderror
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
				<table class="table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Deletar</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td>{{ $product->title }}</td>
							<td>{{ $product->description }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->photo }}</td>
							<td class="d-flex">
								<livewire:modal-edit-product :product="$product" /> 
								<button class="btn btn-danger ms-2" wire:click="delete({{ $product->id }})">Deletar</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>