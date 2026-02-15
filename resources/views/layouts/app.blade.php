<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme()">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Coral Doce Canto' : 'Coral Doce Canto' }}</title>
    <link rel="stylesheet" href="{{ asset('icons/all.min.css') }}">
    <tallstackui:script />
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-bind:class="{ 'dark bg-gray-700': darkTheme, 'bg-[#f3f2f3]': !darkTheme }">
    <x-ts-dialog />
    <x-ts-toast />
    <x-ts-layout>
        <x-slot:header>
            <x-ts-layout.header>
                <x-slot:right>
                    <x-ts-theme-switch only-icons />
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
                <x-ts-side-bar.item text="Home" icon="fluentui.home-24-o" :route="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate />
                <x-ts-side-bar.separator text="Membros" line />
                <x-ts-side-bar.item text="Coralistas" icon="fluentui.people-audience-24-o" :route="route('members.index')"
                    :current="request()->routeIs('members.*')" wire:navigate />
                <x-ts-side-bar.item text="Fichas técnicas" icon="fluentui.text-bullet-list-square-person-20-o"
                    :route="route('ratings.index')" :current="request()->routeIs('ratings.*')" wire:navigate />
                <x-ts-side-bar.item text="Usuários" icon="fluentui.person-lock-24-o" :route="route('users.index')" :current="request()->routeIs('users.*')"
                    wire:navigate />
                <x-ts-side-bar.item text="Fila de espera" icon="fluentui.person-clock-24-o" :route="route('queues.index')"
                    :current="request()->routeIs('queues.*')" wire:navigate />
                <x-ts-side-bar.separator text="Repertório" line />
                <x-ts-side-bar.item text="Músicas" icon="fluentui.music-note-2-24-o" :route="route('songs.index')"
                    :current="request()->routeIs('songs.*')" wire:navigate />
                <x-ts-side-bar.item text="Categorias" icon="fluentui.group-list-24-o" :route="route('categories.index')"
                    :current="request()->routeIs('categories.*')" wire:navigate />
                <x-ts-side-bar.separator text="Programação" line />
                <x-ts-side-bar.item text="Ensaios" icon="fluentui.book-open-24-o" :route="route('encounters.index')" :current="request()->routeIs('encounters.*')"
                    wire:navigate />
                <x-ts-side-bar.item text="Eventos" icon="fluentui.calendar-ltr-24-o" :route="route('events.index')"
                    :current="request()->routeIs('events.*')" wire:navigate />
                <x-ts-side-bar.separator text="Gestão" line />
                <x-ts-side-bar.item text="Financeiro" icon="fluentui.money-24-o" :route="route('financial.index')" :current="request()->routeIs('financial.*')"
                    wire:navigate />
                <x-ts-side-bar.item text="Carteiras" icon="fluentui.wallet-24-o" />
                <x-ts-side-bar.item text="Extrato financeiro" icon="fluentui.document-text-extract-24-o" :route="route('financial.transactions.index')" :current="request()->routeIs('financial.transactions.*')" />
                <x-ts-side-bar.item text="Contribuições mensais" icon="fluentui.person-money-24-o" :route="route('financial.mensalities.index')" :current="request()->routeIs('financial.mensalities.*')" />
            </x-ts-side-bar>
        </x-slot:menu>

        {{ $slot }}
    </x-ts-layout>

    @livewireScripts
</body>

</html>
