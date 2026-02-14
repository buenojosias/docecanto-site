<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Olá, {{ $name }}</h2>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <x-ts-stats title="Coralistas ativos" icon="fluentui.people-audience-24" :number="$members_count" :href="route('members.index')"
            wire:navigate />
        <x-ts-stats title="Músicas cadastradas" icon="fluentui.music-note-2-24" :number="$songs_count" :href="route('songs.index')"
            wire:navigate />
        <x-ts-stats title="Novos interessados" icon="fluentui.person-clock-24" :number="$queues_count" :href="route('queues.index')"
            wire:navigate />
    </div>

    @can('coordinator')
        <div
            class="sm:grid sm:grid-cols-2 md:grid-cols-4 sm:text-center font-semibold bg-gray-50 border-t divide-x divide-y rounded">
            <div class="p-1">
                <a href="{{ route('members.create') }}" class="block p-1.5"><i class="fas fa-plus"></i>
                    Integrante</a>
            </div>
            <div class="p-1">
                <a href="{{ route('songs.create') }}" class="block p-1.5"><i class="fas fa-plus"></i>
                    Música</a>
            </div>
            <div class="p-1">
                <a href="{{ route('encounters.create') }}" class="block p-1.5"><i class="fas fa-plus"></i>
                    Ensaio</a>
            </div>
            <div class="p-1">
                <a href="{{ route('events.index') }}" class="block p-1.5"><i class="fas fa-plus"></i>
                    Evento</a>
            </div>
        </div>
    @endcan
    <div class="mt-4 grid sm:grid-cols-3 gap-4">
        <div>
            <x-ts-card header="Próximos eventos" scope="without-padding">
                <ul>
                    @forelse ($events->slice(0, 3) as $event)
                        <li class="py-2 px-4 border-b">
                            <a href="{{ route('events.show', $event) }}">
                                <h4 class="text-sm font-medium text-gray-600 grow">
                                    {{ Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                                </h4>
                                <p class="font-medium text-gray-900">{{ $event->title }}</p>
                            </a>
                        </li>
                    @empty
                        <li class="py-3 px-4 text-sm">Nenhum evento programado.</li>
                    @endforelse
                </ul>
            </x-ts-card>
        </div>
        <div>
            <x-ts-card header="Aniversariantes da semana" scope="without-padding">
                <ul>
                    @forelse ($births as $birth)
                        <li class="py-2 px-4 border-b">
                            <p class="font-medium text-gray-900">
                                <a href="{{ route('members.show', $birth) }}">{{ $birth->name }}</a>
                            </p>
                            <h4 class="text-sm font-medium text-gray-600 grow">
                                {{ Carbon\Carbon::parse($birth->birth)->format('d/m') }}
                            </h4>
                        </li>
                    @empty
                        <li class="py-3 px-4 text-sm">Nenhum aniversariante na semana atual.</li>
                    @endforelse
                </ul>
            </x-ts-card>
        </div>
    </div>
</div>
