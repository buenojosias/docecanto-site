<div>
    <x-ts-card header="Ficha técnica" scope="without-padding">
        <table class="table whitespace-nowrap">
            <tr>
                <td>Altura <small>(cm)</small></td>
                <td class="text-right" width="1%">{{ $rating->height ?? '' }}</td>
            </tr>
            <tr>
                <td>Habilidade vocal <small>(1-5)</small></td>
                <td class="text-right" width="1%">{{ $rating->tuning ?? '' }}</td>
            </tr>
            <tr>
                <td>Potência vocal <small>(1-5)</small></td>
                <td class="text-right">{{ $rating->vocal_power ?? '' }}</td>
            </tr>
            <tr>
                <td>Nota mais grave</td>
                <td class="text-right">{{ $rating->lowestNote->name ?? '' }}</td>
            </tr>
            <tr>
                <td>Nota mais aguda</td>
                <td class="text-right">{{ $rating->highestNote->name ?? '' }}</td>
            </tr>
        </table>
        <x-slot:footer>
            @if ($rating)
                <x-ts-button wire:click="openFormModal" text="Editar" flat />
            @else
                <x-ts-button wire:click="openFormModal" text="Adicionar ficha técnica" flat />
            @endif
        </x-slot:footer>
    </x-ts-card>
    @if ($showFormModal)
        <x-modal wire:model.live="showFormModal">
            @livewire('rating.rating-form', ['member' => $member, 'rating' => $rating])
        </x-modal>
    @endif
</div>
