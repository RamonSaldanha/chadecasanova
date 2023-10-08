<div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6 py-4">
				<h1>Chá de casa nova de Ramon e Vivian</h1>
				<p>
					🏠✨ Chá de Casa Nova: Ramon & Vivian! ✨🏠
				</p>
				<p>
					Olá, amiguinhos e amiguinhas! 🌟 Ramon e Vivian estão abrindo as portas de seu novo ninho e eles precisam de uma ajudinha para torná-lo o cantinho mais aconchegante e charmoso! 💕🛋
				</p>
				<p>
					Vamos tornar esse lar ainda mais especial? Venha participar deste momento mágico e escolha algo que tenha a carinha deles. Cada detalhe, cada item, será um pedacinho do amor e carinho que temos por esse casal tão querido. 🌼💝
				</p>
				<p>
					Porque casa não é apenas feita de tijolos e cimento, mas principalmente de momentos, risadas e, claro, a companhia incrível de amigos como você! 🏡❤️
				</p>
				<p>
					Participe dessa celebração e deixe o novo lar do Ramon e da Vivian repleto de mimos e amor! 🎁💐
				</p>
				<p>
					Nos vemos lá! 🎉✨
				</p>

				<h4>Escolha seu presente</h4>

				<div class="row row-cols-1 g-4">
					@foreach ($products as $product)
					<div class="col">
						<div class="card">
							<div class="row g-0">
								<div class="col-md-4">
									<img src="{{ Storage::url($product->photo) }}" class="img-fluid rounded-start" alt="...">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title">{{ $product->title }}</h5>
										<p class="card-text text-truncate">{{ $product->description }}</p>
										<p class="card-text"><small class="text-muted">R$ {{ $product->price }}</small></p>
										<!-- create wire:navigeate to checkout with product slug title -->
										<a href="/checkout/{{ $product->slug }}" class="btn btn-primary" wire:navigate>Escolher</a>
										<!-- <a  wire:navigate>Início</a> -->
									</div>
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