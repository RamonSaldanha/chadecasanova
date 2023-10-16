<div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<div class="d-flex justify-content-center">
					<img src="{{ asset('img/ramon-vivian.png') }}"   style="max-width: 90%" class="img-fluid" alt="...">
				</div>
				<h2 class="mt-3">Casa nova, vida nova</h2>
				<p>
					Estamos começando uma nova jornada, 
				</p>
			</div>
			<div class="col-md-8">
				<h2 class="my-4">Escolha seu presente</h2>

				<div class="row row-cols-3 g-1">
					@foreach ($products as $product)
					<div class="col">
						<div class="card border-0">
							<img src="{{ Storage::url($product->photo) }}" class="img-fluid" alt="...">
							<div class="card-body">
								<div class="card-title fw-bold">{{ $product->title }}</div>
								{{-- <div class="card-text text-truncate">{{ $product->description }}</div> --}}
								<p class="card-text">R$ {{ $product->price }}</p>
								<div class="d-grid gap-2">
									<a href="/checkout/{{ $product->slug }}" class="btn btn-primary btn-sm" wire:navigate>Presentear</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

	</div>
</div>