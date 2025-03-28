<div>
    <div class="md:-mt-4 mb-4 p-4 bg-white shadow rounded-lg">
        <div class="flex-1">
            <p class="font-semibold text-gray-700">Bem vindo(a),</p>
            <h2 class="text-2xl font-bold">{{ $name }}</h2>
        </div>
    </div>
    <div class="infobox-wrapper">
        <x-infobox value="{{ $members_count }}" label="Membros ativos" href="{{ route('members.index') }}"
            icon="children" />
        <x-infobox value="{{ $songs_count }}" label="Músicas cadastradas" href="{{ route('songs.index') }}"
            icon="music" />
        <x-infobox value="{{ $queues_count }}" label="Novos interessados" href="{{ route('queues.index') }}" icon="clock" />
    </div>
    <div class="sm:grid sm:grid-cols-2 md:grid-cols-4 sm:text-center font-semibold bg-gray-50 border-t divide-x divide-y rounded">
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
    <div class="mt-4 grid sm:grid-cols-3 gap-4">
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Próximos eventos</h3>
                </div>
                <div class="card-body">
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
                </div>
                @if ($events->count() > 3)
                    <div class="card-footer justify-center">
                        <a href="{{ route('events.index') }}" class="text-sm font-semibold">Ver todos</a>
                    </div>
                @endif
            </div>
        </div>
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Aniversariantes da semana</h3>
                </div>
                <div class="card-body">
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
                </div>
            </div>
        </div>
        {{-- mais cards... --}}
        {{-- </div> --}}
    </div>
</div>
