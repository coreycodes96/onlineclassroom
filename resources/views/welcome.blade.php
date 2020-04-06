<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Title -->
        <title>Online Classroom | Home</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@500&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/global.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/e3fc43b658.js" crossorigin="anonymous"></script>
    </head>
    <body>
        {{-- Nav Start --}}
        <nav>
            <div class="container">
                {{-- Back Button --}}
                <div class="float-left">
                    <li><button id="up-btn" class="btn">Up <i class="fas fa-hand-point-up"></i></button></li>
                </div>
                {{-- Login Link --}}
                <li><a href="/login"><button class="btn">Login <i class="fas fa-sign-in-alt"></i></button></a></li>

                {{-- Create An Account Link --}}
                <li><a href="/register"><button class="btn">Create An Account <i class="fas fa-user-plus"></i></button></a></li>
            </div>

        </nav>
        {{-- Nav End --}}
        
        {{-- Header Start --}}
        <header>
            <div>
                {{-- Title & Globe Icon--}}
                <h1><i class="fas fa-globe"></i>nline Classroom</h1>
                {{-- Button --}}
                <button id="learnMore-btn" class="btn">Learn More <i class="fab fa-leanpub"></i></button>
            </div>
        </header>
        {{-- Header End --}}

        {{-- Main Start --}}
        <section class="main">
            <div class="container">
                {{-- Box Start --}}
                <div class="box-container">
                    <div class="box">
                        <h3>Create An Account</h3>
                    </div>
                    <div class="box">
                        <h3>Join A Class</h3>
                    </div>
                    <div class="box">
                        <h3>Learn, Learn, Learn</h3>
                    </div>
                </div>
                {{-- Box End --}}
            </div>
        </section>
        {{-- Main End --}}

        {{-- Script --}}
        <script>

            //the learn more button
            const learnMoreBtn = document.querySelector('#learnMore-btn');
            //the header element
            const header = document.querySelector('header');
            //the main class div
            const main = document.querySelector('.main');
            //the up button
            const upBtn = document.querySelector('#up-btn');


            //scroll down the main section
            learnMoreBtn.addEventListener('click', function(){
                main.scrollIntoView({ block: 'end',  behavior: 'smooth' });
                upBtn.style.display = 'block';
            });

            //scroll to the header section
            upBtn.addEventListener('click', function(){
                header.scrollIntoView({block: 'end', behavior: 'smooth'});
                upBtn.style.display = 'none';
            });
        </script>
    </body>
</html>