<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coral Doce Canto</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/landing-cd3773bd.css') }}">
    {{-- @vite(['resources/css/landing.css', 'resources/js/app.js']) --}}
</head>

<body>
    <nav>
        <div>
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/lt-white.png') }}" class="h-9 md:h-10 mr-2" alt="Coral Doce Canto" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="" aria-controls="navbar-default"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="navbar" id="navbar-default">
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Faça parte</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-material"
                            class="sm:border sm:border-yellow-500 sm:rounded-lg px-4">Área do membro</a>
                    </li>
                    {{-- <li>
                        <a href="https://material.coraldocecanto.com.br" class="nav-material"
                            class="sm:border sm:border-yellow-500 sm:rounded-lg px-4">Área do membro</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <div class="sm:px-8 sm:px-0 sm:max-w-5xl sm:mx-auto sm:grid grid-cols-12 sm:items-center space-y-10">
        <div class="text-center sm:text-left text-white sm:col-span-5 space-y-1 sm:space-y-3">
            <p class="text-6xl sm:text-7xl md:text-7xl font-thin text-yellow-500">Cantar</p>
            <p class="text-3xl sm:text-4xl md:text-5xl">é próprio de</p>
            <p class="text-4xl sm:text-5xl md:text-6xl font-bold">quem <span class="text-yellow-500">ama</span>.</p>
        </div>
        <div class="text-center sm:col-span-7 px-6 sm:px-8">
            <img src="{{ asset('img/choir-illustration.png') }}" class="w-full" alt="">
            {{-- <img src="{{ asset('img/choir-cartoon.png') }}" class="w-100" alt=""> --}}
        </div>
    </div>

    <div class="mt-12 p-4 w-full bg-[#690E51] shadow">
        <div class="sm:w-auto sm:mx-auto flex justify-center gap-4">
            <a href="https://www.instagram.com/coraldocecanto/" target="_blank">
                <img src="{{ asset('img/logo-instagram.png') }}" class="h-6 sm:h-8" alt="Instagram">
            </a>
            <a href="https://www.facebook.com/CoralDoceCanto/" target="_blank">
                <img src="{{ asset('img/logo-facebook.png') }}" class="h-4 sm:h-6" alt="Facebook">
            </a>
            <a href="https://www.youtube.com/@CoralDoceCanto" target="_blank">
                <img src="{{ asset('img/logo-youtube.png') }}" class="h-4 sm:h-6" alt="Youtube">
            </a>
        </div>
    </div>

</body>

</html>
