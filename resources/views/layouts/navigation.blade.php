<aside :class="{ 'block': showsidebar, 'hidden': !showsidebar }"
    class="fixed z-20 h-full top-0 left-0 pt-10 flex lg:flex flex-shrink-0 flex-col w-64 bg-white"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-90"
    x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-1.5">
                    <li>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="home">Dashboard</x-nav-link>
                        <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')" icon="children">Integrantes</x-nav-link>
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" icon="key">Usuários</x-nav-link>
                        {{-- <x-nav-link :href="route('ratings.index')" :active="request()->routeIs('ratings.*')" icon="clipboard-user">Fichas
                            técnicas</x-nav-link> --}}
                        <x-nav-link :href="route('queues.index')" :active="request()->routeIs('queues.*')" icon="clock">Fila de espera</x-nav-link>
                    </li>
                </ul>
                <div class="space-y-2 pt-1.5">
                    <x-nav-link :href="route('songs.index')" :active="request()->routeIs('songs.*')" icon="music">Músicas</x-nav-link>
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" icon="music">Categorias</x-nav-link>
                </div>
                <div class="space-y-2 pt-1.5">
                    <x-nav-link :href="route('encounters.index')" :active="request()->routeIs('encounters.*')" icon="users">Ensaios</x-nav-link>
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.*')" icon="calendar">Eventos</x-nav-link>
                </div>
                <div class="space-y-2 pt-1.5">
                    <x-nav-link :href="route('financial.index')" :active="request()->routeIs('financial.*')" icon="wallet">Financeiro</x-nav-link>
                </div>
            </div>
        </div>
    </div>
</aside>
<div @click="showsidebar = false" x-show="showsidebar" class="bg-gray-900 lg:hidden opacity-50 fixed inset-0 z-10">
</div>
