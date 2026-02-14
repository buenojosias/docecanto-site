{{-- <!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('build/assets/app-a6bae78e.css') }}">
    <script src="{{ asset('build/assets/app-6870bb4e.js') }}" defer></script>
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
    @livewireScripts
</body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Coral Doce Canto') }}</title>
    <link rel="stylesheet" href="{{ asset('icons/all.min.css') }}">
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-ts-layout>
        <x-slot:header>
            <x-ts-layout.header>
                <x-slot:right>
                    RIGHT
                </x-slot:right>
            </x-ts-layout.header>
        </x-slot:header>
        <x-slot:menu>
            <x-ts-side-bar>
                <x-slot:brand>
                    <div class="mt-6">
                        <img src="{{ asset('img/logotipo.png') }}" class="h-8" />
                    </div>
                </x-slot:brand>
                <x-ts-side-bar.item text="Home" :route="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate />
                <x-ts-side-bar.separator text="Membros" line />
                <x-ts-side-bar.item text="Coralistas" :route="route('members.index')" :current="request()->routeIs('members.*')" wire:navigate />
                <x-ts-side-bar.item text="Usuários" :route="route('users.index')" :current="request()->routeIs('users.*')" wire:navigate />
                <x-ts-side-bar.item text="Fichas técnicas" :route="route('ratings.index')" :current="request()->routeIs('ratings.*')" wire:navigate />
                <x-ts-side-bar.item text="Fila de espera" :route="route('queues.index')" :current="request()->routeIs('queues.*')" wire:navigate />
                <x-ts-side-bar.separator text="Repertório" line />
                <x-ts-side-bar.item text="Músicas" :route="route('songs.index')" :current="request()->routeIs('songs.*')" wire:navigate />
                <x-ts-side-bar.item text="Categorias" :route="route('categories.index')" :current="request()->routeIs('categories.*')" wire:navigate />
                <x-ts-side-bar.separator text="Programação" line />
                <x-ts-side-bar.item text="Ensaios" :route="route('encounters.index')" :current="request()->routeIs('encounters.*')" wire:navigate />
                <x-ts-side-bar.item text="Eventos" :route="route('events.index')" :current="request()->routeIs('events.*')" wire:navigate />
                <x-ts-side-bar.separator text="Gestão" line />
                <x-ts-side-bar.item text="Financeiro" :route="route('financial.index')" :current="request()->routeIs('financial.*')" wire:navigate />
            </x-ts-side-bar>
        </x-slot:menu>

        {{ $slot }}
    </x-ts-layout>

    @livewireScripts
</body>

</html>
