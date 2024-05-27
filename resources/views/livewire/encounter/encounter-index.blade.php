<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ensaios</h2>
        <nav class="tabs" x-data="{ showtabs: false }">
            <div>
                <x-tab-link href="{{ route('encounters.index') }}" active="{{ $period === 'proximos' }}"
                    label="Próximos" />
                <x-tab-link href="{{ route('encounters.index', 'realizados') }}" active="{{ $period === 'realizados' }}"
                    label="Realizados" />
            </div>
        </nav>
    </x-slot>
    <div class="sm:max-w-lg sm:mx-auto">
        <x-ts-button href="{{ route('encounters.create') }}" primary label="Adicionar" />
        <div class="card mt-4">
            <div class="card-header relative" x-data="{ filters: false }">
                <h3 class="title"></h3>
                <div class="card-tools py-1">
                    <x-ts-button flat icon="funnel" @click="filters = !filters" />
                </div>
                <div x-show="filters" @click.outside="filters = false" class="filters">
                    <div>
                        @if ($period === 'realizados')
                            <x-datetime-picker without-time label="Filtrar por data" placeholder="Selecione uma data"
                                wire:model.live="filterDate" clearable="false" :max="now()" />
                        @else
                            <x-datetime-picker without-time label="Filtrar por data" placeholder="Selecione uma data"
                                wire:model.live="filterDate" clearable="false" :min="now()" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover whitespace-nowrap">
                    <thead>
                        <tr>
                            <th>Data</th>
                            @if ($period && $period === 'realizados')
                                <th width="1%" class="text-center">Presenças</th>
                                <th width="1%" class="text-center">Faltas</th>
                            @endif
                            <th width="1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($encounters as $encounter)
                            <tr>
                                <td>
                                    <a href="{{ route('encounters.show', $encounter) }}">
                                    {{ $encounter->date->format('d/m/Y') }}
                                    </a>
                                </td>
                                @if ($period && $period === 'realizados')
                                    @if ($encounter->members->count() === 0)
                                        <td colspan="2" class="text-center text-sm text-gray-500">Sem lançamento</td>
                                    @else
                                        <td class="text-center">
                                            {{ $encounter->members->where('pivot.attendance', 'P')->count() }}</td>
                                        <td class="text-center">
                                            {{ $encounter->members->where('pivot.attendance', 'F')->count() }}</td>
                                    @endif
                                @endif
                                <td>
                                    <x-ts-button href="{{ route('encounters.edit', $encounter) }}" sm flat icon="pencil" />
                                </td>
                            </tr>
                        @empty
                            <x-empty />
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-paginate">
                {{ $encounters->links() }}
            </div>
        </div>
    </div>

</div>
