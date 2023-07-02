<aside :class="{ 'block': showsidebar, 'hidden': !showsidebar }"
    class="fixed z-20 h-full top-0 left-0 pt-10 flex lg:flex flex-shrink-0 flex-col w-64 bg-white"
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-90"
    x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-2">
                    <li>
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="home">Dashboard</x-nav-link>
                        <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')" icon="home">Membros</x-nav-link>
                    </li>
                </ul>
                <div class="space-y-2 pt-2">
                    {{-- mais links --}}
                </div>
            </div>
        </div>
    </div>
</aside>
<div @click="showsidebar = false" x-show="showsidebar" class="bg-gray-900 lg:hidden opacity-50 fixed inset-0 z-10">
</div>
