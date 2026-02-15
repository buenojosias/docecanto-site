<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Ensaio</h2>
        </div>
    </div>
    <div class="md:grid md:grid-cols-2 gap-4">
        <div class="mb-4">
            <x-ts-card class="detail">
                <x-detail label="Data do ensaio" :value="$encounter->date->format('d/m/Y')" />
                <x-detail label="Descrição" :value="$encounter->description" :is_html="true" />
                @can('coordinator')
                    <x-slot:footer>
                        <x-ts-button href="{{ route('encounters.edit', $encounter) }}" flat text="Editar" />
                    </x-slot>
                @endcan
            </x-ts-card>
        </div>
        @if ($encounter->date->format('Y-m-d') <= date('Y-m-d'))
            <div>
                @livewire('encounter.encounter-attendance', ['encounter' => $encounter])
            </div>
        @endif
    </div>
</div>
