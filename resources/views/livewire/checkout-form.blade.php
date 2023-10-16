<div>
	<h3 class="mb-4">Presenteie este item</h3>
	@if (session('message'))
		<div class="alert alert-success alert-dismissible fade show">
			{!! session('message') !!}
		</div>
	@endif

	@if($available)
	<form wire:submit="save">
		<div class="mb-3 row">
			<label for="nomesobrenome" class="col-sm-3 col-form-label">Nome/Sobrenome*</label>
			<div>
				<input type="text" class="form-control" id="nomesobrenome" wire:model="fullname">
				@error('fullname')
					<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
						{{ $message }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@enderror
			</div>
		</div>
		<div class="mb-3 row">
			<label for="e-mail" class="col-sm-2 col-form-label">E-mail*</label>
			<div>
				<input type="email" style="max-width: 400px;" class="form-control" id="e-mail"  wire:model="email">
				@error('email')
					<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
						{{ $message }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@enderror
			</div>
		</div>
		<div class="mb-3 row">
			<label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp*</label>
			<div>
				<input type="text" style="max-width: 250px;" class="form-control" id="whatsapp" placeholder="(84) 9 9999-9999" wire:model="whatsapp">
				@error('whatsapp')
					<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
						{{ $message }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@enderror
			</div>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Deixe uma mensagem para o casal</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="comment"></textarea>
			@error('comment')
				<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
					{{ $message }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2" wire:model="terms">
				<label class="form-check-label" for="flexRadioDefault2">
					Estou ciente de que estou assumindo o compromisso de presentear este item.
				</label>
				@error('terms')
					<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
						{{ $message }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-primary mt-3">Presentear</button>
		</div>
	</form>
	@else
		<div class="alert alert-warning">
			Este item já foi presenteado!
		</div>
	@endif
</div>
