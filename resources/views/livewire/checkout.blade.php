<div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="cover-image" style="background-image: url('{{ Storage::url($product->photo) }}') ">
				</div>
			<!-- <img src="{{ Storage::url($product->photo) }}" class="img-fluid rounded-start" alt="..."> -->
				<div class="">
					<h5 class="">{{ $product->title }}</h5>
					<p class="">{{ $product->description }}</p>
					<p class=""><small class="text-muted">R$ {{ $product->price }}</small></p>
					<!-- <a  wire:navigate>Início</a> -->
				</div>
				<livewire:checkout-form :product="$product" /> 
			</div>
		</div>
	</div>
</div>
