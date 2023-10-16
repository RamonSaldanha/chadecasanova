<div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="d-flex justify-content-center">
					<img src="{{ Storage::url($product->photo) }}" width="200px;" class="img-fluid" :alt="$product->title">
				</div>
				<div class="my-4">
					<div class="fw-bold text-center">{{ $product->title }}</div>
					<p class="">{{ $product->description }}</p>
					<p class="text-center fw-bold text-success">R$ {{ $product->price }}</p>
					<!-- <a  wire:navigate>Início</a> -->
				</div>
			</div>
			<div class="col-8">
				<livewire:checkout-form :product="$product" /> 
			</div>
		</div>
	</div>
</div>
