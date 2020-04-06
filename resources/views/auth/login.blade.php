<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Title -->
		<title>Online Classroom | Login</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@500&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/global.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/e3fc43b658.js" crossorigin="anonymous"></script>
	</head>
	<body>
		{{-- Header Start --}}
		<header>
			<div class="container">
				{{-- Title With Globe Icon --}}
				<h3><i class="fas fa-globe"></i>nline Classroom</h3>
				
				{{-- Home Button With Home Icon --}}
				<li><a href="/"><button class="btn">Home <i class="fas fa-home"></i></button></a></li>
			</div>
		</header>
		{{-- Header End --}}
		
		{{-- Login Component Start --}}
		<div id="app">
			<login></login>
		</div>
		{{-- Login Component End --}}
	</body>
</html>