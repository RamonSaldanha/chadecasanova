<div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<div class="d-flex justify-content-center">
					<img src="{{ asset('img/raquel-xand.png') }}"   style="max-width: 80%" class="img-fluid" alt="...">
				</div>
			</div>
			<div class="col-md-8">
				<h1 class="my-4">Casa nova, vida nova</h1>

				<p>Olá, queridos amigos e familiares!</p>

				<p>Bem vindos ao chá da nossa casa nova 🥰 Como vocês sabem em janeiro iniciaremos uma nova etapa em nossas vidas, estaremos nós mudando para nossa casinha e criando um espaço de muito amor e alegria 🥰</p>

				<p>Gostaríamos de contar com vocês, para juntos montarmos nosso cantinho, e cada presente será uma alegria imensa para nós, além de também ter um pedacinho de cada um de vocês juntos a nós 🥰</p>

				<p>Obrigada por fazerem parte dessa nossa nova etapa 🥰</p>

				<p>Com carinho e gratidão,<br>Raquel, Alexandre, Alice e Alex que está por vim</p>

				<div class="my-5">
					<div id="carouselExample" class="carousel slide">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="row row-cols-3 g-2">
									<div class="col">
										<img src="{{ asset('img/1-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
									<div class="col">
										<img src="{{ asset('img/2-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
									<div class="col">
										<img src="{{ asset('img/3-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="row row-cols-3 g-2">
									<div class="col">
										<img src="{{ asset('img/4-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
									<div class="col">
										<img src="{{ asset('img/5-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
									<div class="col">
										<img src="{{ asset('img/6-_1_.webp') }}" class="img-fluid" alt="...">
									</div>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>

				</div>

				<h1 class="my-4">Como funciona?</h1>

				<div class="d-flex justify-content-center my-5">
					<img src="{{ asset('img/como-funciona.jpg') }}" width="320px;" class="img-fluid" alt="...">
				</div>

				<h1 class="my-4">Mensagens de carinho</h1>
				<section>
					<div class="container py-5 text-dark">
						<div class="row d-flex justify-content-center">
							@foreach ( $productsPaied as $productPaied )

								<div class="d-flex flex-start my-2" :wire:key="$productPaied->id">
									<img class="rounded-circle shadow-1-strong me-3"
										src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($productPaied->giver->email)))}}" alt="avatar" width="65"
										height="65" />
									<div class="card w-100">
										<div class="card-body p-4">
											<div class="">
												<div class="fw-bold">{{$productPaied->giver->fullname}}</div>
												<p>
													{{$productPaied->giver->comment}}
												</p>
											</div>
										</div>
									</div>
								</div>

							@endforeach
						</div>
					</div>
				</section>	
				<h1 class="mt-5">Escolha seu presente</h1>

				<div class="filter">
					<livewire:products-filter />
				</div>

				<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
					@foreach ($products as $product)
					<div class="col">
						<div class="card h-100">
							<img src="{{ Storage::url($product->photo) }}" class="img-fluid" alt="...">
							<div class="card-body d-flex flex-column">
								<div class="card-title fw-bold" style="line-height: 1">{{ $product->title }}</div>
								{{-- <div class="card-text text-truncate">{{ $product->description }}</div> --}}
								<div class="card-text fw-bold text-success">R$ {{ $product->price }}</div>
								@if(!$product->giver)
								<div class="d-grid gap-2 mt-auto">
									<a href="/checkout/{{ $product->slug }}" class="btn btn-primary btn-sm" wire:navigate>Escolher</a>
								</div>
								@else
									@if ($product->paid === 2)
										<div	div style="font-size: 1rem; line-height: 1;">Presente dado por: <strong>{{ $product->giver->fullname }}</strong>.</div>
									@else
										<div	div style="font-size: 1rem; line-height: 1;">Presente reinvidicado por: <strong>{{ $product->giver->fullname }}</strong>.</div>	
									@endif
								@endif	
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>

	</div>
</div>

