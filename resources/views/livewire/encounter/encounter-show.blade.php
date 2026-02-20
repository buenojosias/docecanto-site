<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Detalhes do ensaio</h2>
        </div>
    </div>
    <div class="md:grid md:grid-cols-2 gap-6">
        <div>
            <x-ts-card class="infoblock">
                <x-detail label="Data do ensaio" :value="$encounter->date->format('d/m/Y')" />
                <x-detail label="Tema do ensaio" :value="$encounter->theme ?? '-'" />
                <x-detail label="Descrição" :value="$encounter->description" :is_html="true" />
                <x-slot:footer>
                    <x-ts-button href="{{ route('encounters.edit', $encounter) }}" flat text="Editar" wire:navigate />
                </x-slot>
            </x-ts-card>
        </div>
        @island(defer: true)
            @if ($encounter->date->format('Y-m-d') <= date('Y-m-d'))
                @placeholder
                <x-spinner />
                @endplaceholder
                <div>
                    @livewire('encounter.encounter-attendance', ['encounter' => $encounter])
                </div>
            @endif
        @endisland
    </div>
</div>
