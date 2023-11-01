<div>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<div class="d-flex justify-content-center">
					<img src="{{ asset('img/ramon-vivian.png') }}"   style="max-width: 90%" class="img-fluid" alt="...">
				</div>
			</div>
			<div class="col-md-8">
				<h2 class="my-4">Casa nova, vida nova</h2>

				<p>Olá, queridos amigos e familiares!</p>

				<p>Bem-vindos ao chá da nossa nova casinha! 🏡 Depois de aventuras acadêmicas e profissionais, estamos prontos para mais uma: criar nosso lar. E, ah, sobre o casamento? Está no radar, prometemos avisar assim que soubermos a data! 😂</p>

				<p>Cada presente selecionado não só ajudará a decorar, mas trará um pedacinho da essência de cada um de vocês para o nosso espaço. Esperamos que possam nos ajudar a tornar este lugar especial.</p>

				<p>Com carinho e gratidão,<br>Ramon & Vivian</p>

				<div class="row row-cols-3 my-5">
					<div class="col">
						<img src="{{ asset('img/polaroid-1.jpg') }}" class="img-fluid" alt="...">
					</div>
					<div class="col">
						<img src="{{ asset('img/polaroid-2.jpg') }}" class="img-fluid" alt="...">
					</div>
					<div class="col">
						<img src="{{ asset('img/polaroid-3.jpg') }}" class="img-fluid" alt="...">
					</div>
				</div>

				<h2 class="my-4">Como funciona?</h2>

				<div class="d-flex justify-content-center my-5">
					<img src="{{ asset('img/como-funciona.jpg') }}" width="320px;" class="img-fluid" alt="...">
				</div>

				<h2 class="my-4">Mensagens de carinho</h2>
				<section>
					<div class="container py-5 text-dark">
						<div class="row d-flex justify-content-center">
							@foreach ( $productsPaied as $product )

								<div class="d-flex flex-start my-2" :wire:key="$product->id">
									<img class="rounded-circle shadow-1-strong me-3"
										src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($product->giver->email)))}}" alt="avatar" width="65"
										height="65" />
									<div class="card w-100">
										<div class="card-body p-4">
											<div class="">
												<div class="fw-bold">{{$product->giver->fullname}}</div>
												<p>
													{{$product->giver->comment}}
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							@endforeach
						</div>
					</div>
				</section>	
				<h2 class="mt-5">Escolha seu presente</h2>

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

