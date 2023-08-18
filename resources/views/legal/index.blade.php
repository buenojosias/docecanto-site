<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coral Doce Canto - {{ $legal->title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/landing-cd3773bd.css') }}">
    <script src="{{ asset('build/assets/landing-6870bb4e.js') }}" defer></script>
    {{-- @vite(['resources/css/landing.css', 'resources/js/landing.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center px-1 py-4 bg-gray-100">

        <div class="policy">
            <div class="text-center mb-4">
                <a href="/" href="_blank">
                    <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
                </a>
            </div>

            <h1 class="uppercase">{{ $legal->title }}</h1>
            {!! $legal->content !!}
            {{-- <p><small>Data de vigência: 6 de agosto de 2023.</small></p> --}}
            <p class="mt-6 text-center text-sm">
                Josias Pereira Bueno (Coordenador)<br>
                Última atualização: {{ Carbon\Carbon::parse($legal->updated_at)->locale('pt-BR')->translatedFormat('d \d\e F \d\e Y') }}
            </p>
        </div>
    </div>
</body>

</html>
