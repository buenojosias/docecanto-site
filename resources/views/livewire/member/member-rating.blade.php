<div>
    <x-ts-card header="Ficha técnica" scope="without-padding">
        <ul>
            <li class="border-b py-1.5 px-4 flex justify-between">
                <div>Altura <small>(cm)</small></div>
                <div class="text-right" width="1%">{{ $rating->height ?? '' }}</div>
            </li>
            <li class="border-b py-1.5 px-4 flex justify-between">
                <div>Habilidade vocal <small>(1-5)</small></div>
                <div class="text-right" width="1%">{{ $rating->tuning ?? '' }}</div>
            </li>
            <li class="border-b py-1.5 px-4 flex justify-between">
                <div>Potência vocal <small>(1-5)</small></div>
                <div class="text-right">{{ $rating->vocal_power ?? '' }}</div>
            </li>
            <li class="border-b py-1.5 px-4 flex justify-between">
                <div>Nota mais grave</div>
                <div class="text-right">{{ $rating->lowestNote->name ?? '' }}</div>
            </li>
            <li class="border-b py-1.5 px-4 flex justify-between">
                <div>Nota mais aguda</div>
                <div class="text-right">{{ $rating->highestNote->name ?? '' }}</div>
            </li>
        </ul>
        <x-slot:footer>
            @if ($rating)
                <x-ts-button wire:click="openFormModal" text="Editar" flat />
            @else
                <x-ts-button wire:click="openFormModal" text="Adicionar ficha técnica" flat />
            @endif
        </x-slot:footer>
    </x-ts-card>
    @if ($showFormModal)
        <x-ts-modal wire:model.live="showFormModal">
            @livewire('rating.rating-form', ['member' => $member, 'rating' => $rating])
        </x-ts-modal>
    @endif
</div>
