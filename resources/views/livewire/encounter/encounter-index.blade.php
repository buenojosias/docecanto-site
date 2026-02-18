<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Ensaios</h2>
        </div>
        <div class="actions">
            <x-ts-button text="Adicionar" href="{{ route('encounters.create') }}" primary wire:navigate />
        </div>
    </div>

    <x-ts-tab x-on:navigate="$dispatch('tab-changed', { tab: $event.detail.select })" selected="Próximos">
        <x-ts-tab.items tab="Próximos">
            <div class="space-y-4">
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-ts-date label="Data Inicial" placeholder="Selecione uma data" wire:model.live="dateStart"
                        :min-date="now()" format="DD/MM/YYYY" helpers />
                    <x-ts-date label="Data Final" placeholder="Selecione uma data" wire:model.live="dateEnd"
                        :min-date="now()" format="DD/MM/YYYY" helpers />
                </div>
                @php
                    $proxHeaders = [
                        ['index' => 'date', 'label' => 'Data', 'sortable' => false],
                        ['index' => 'action', 'label' => '', 'sortable' => false],
                    ];
                @endphp
                <x-ts-table :headers="$proxHeaders" :rows="$this->proximos()" striped>
                    @interact('column_date', $row)
                        <x-ts-link :href="route('encounters.show', $row)" :text="$row->date->format('d/m/Y')" />
                    @endinteract

                    @interact('column_action', $row)
                        @can('coordinator')
                            <x-ts-button href="{{ route('encounters.edit', $row) }}" sm flat icon="pencil" />
                        @endcan
                    @endinteract
                </x-ts-table>
            </div>
        </x-ts-tab.items>

        <x-ts-tab.items tab="Realizados">
            <div class="space-y-4">
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-ts-date label="Data Inicial" placeholder="Selecione uma data" wire:model.live="dateStart"
                        :max-date="now()" format="DD/MM/YYYY" helpers />
                    <x-ts-date label="Data Final" placeholder="Selecione uma data" wire:model.live="dateEnd"
                        :max-date="now()" format="DD/MM/YYYY" helpers />
                </div>
                @php
                    $realizadosHeaders = [
                        ['index' => 'date', 'label' => 'Data', 'sortable' => false],
                        ['index' => 'presencas', 'label' => 'Presenças', 'sortable' => false],
                        ['index' => 'faltas', 'label' => 'Faltas', 'sortable' => false],
                        ['index' => 'action', 'label' => '', 'sortable' => false],
                    ];
                @endphp
                <x-ts-table :headers="$realizadosHeaders" :rows="$this->realizados()" striped>
                    @interact('column_date', $row)
                        <x-ts-link :href="route('encounters.show', $row)" :text="$row->date->format('d/m/Y')" />
                    @endinteract

                    @interact('column_presencas', $row)
                        @if ($row->members->count() === 0)
                            <span class="text-sm text-gray-500">---</span>
                        @else
                            <span class="text-center">{{ $row->members->where('pivot.attendance', 'P')->count() }}</span>
                        @endif
                    @endinteract

                    @interact('column_faltas', $row)
                        @if ($row->members->count() === 0)
                            <span class="text-sm text-gray-500">---</span>
                        @else
                            <span class="text-center">{{ $row->members->where('pivot.attendance', 'F')->count() }}</span>
                        @endif
                    @endinteract

                    @interact('column_action', $row)
                        @can('coordinator')
                            <x-ts-button href="{{ route('encounters.edit', $row) }}" sm flat icon="pencil" />
                        @endcan
                    @endinteract

                    <x-slot:empty>
                        <x-empty />
                    </x-slot:empty>
                </x-ts-table>
            </div>
        </x-ts-tab.items>
    </x-ts-tab>
</div>
