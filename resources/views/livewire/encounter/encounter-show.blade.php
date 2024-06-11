<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ensaio</h2>
    </x-slot>
    <div class="md:grid md:grid-cols-2 gap-4">
        <div>
            <div class="card mb-4">
                <div class="card-body display space-y-4">
                    <div>
                        <h4>Data do ensaio</h4>
                        <p>{{ $encounter->date->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <h4 class="mb-1">Descrição</h4>
                        {!! $encounter->description !!}
                    </div>
                </div>
                <div class="card-footer">
                    <x-ts-button href="{{ route('encounters.edit', $encounter) }}" sm flat text="Editar" />
                </div>
            </div>
        </div>
        @if ($encounter->date->format('Y-m-d') <= date('Y-m-d'))
            <div>
                @livewire('encounter.encounter-attendance', ['encounter' => $encounter])
            </div>
        @endif
    </div>
</div>
