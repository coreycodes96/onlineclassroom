<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Title -->
        <title>Online Classroom | Classes</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@500&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/global.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/e3fc43b658.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="app">
            {{-- Loggedin Header Component --}}
            <loggedin-header user="{{ auth()->user() }}"></loggedin-header>

            {{-- Classes Component --}}
            <classes user-id="{{ auth()->user()->id }}" user-admin="{{ auth()->user()->admin }}" classes="{{ $classes }}"></classes>
        </div>
    </body>
</html>