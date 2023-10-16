<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>{{ $title ?? 'Chá de casa nova' }}</title>

		@vite(['resources/css/app.css', 'resources/sass/app.scss'])

	</head>

	<body>
		<livewire:navbar /> 
		{{ $slot }}
	</body>
<script>
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new window.bootstrap.Popover(popoverTriggerEl)
	})
</script>
	@vite(['resources/js/app.js'])

</html>
