<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Coral Doce Canto') }}</title>
    <link rel="stylesheet" href="{{ asset('icons/all.min.css') }}">
    <style>[x-cloak] { display: none !important; }</style>
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-a6bae78e.css') }}">
    <script src="{{ asset('build/assets/app-6870bb4e.js') }}" defer></script> --}}
</head>
<body x-data="{ showsidebar: false, usermenu: false }" class="bg-gray-200 antialiased">
    @include('layouts.navstack')
    <div class="flex overflow-hidden pt-12">
        @include('layouts.navigation')
        <div class="h-full w-full relative overflow-y-auto lg:ml-64">
            @if (isset($header))
                <header class="bg-white shadow px-4">
                    <div class="max-w-5xl mx-auto py-4">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main class="py-4 sm:py-6 lg:py-8 px-4">
                <div class="max-w-5xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @stack('scripts')
    {{-- @livewireScripts --}}
</body>
</html>
