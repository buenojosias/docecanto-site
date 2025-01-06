<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ficha técnica</h3>
            <div class="card-tools">
                @if ($showRating)
                    <x-ts-button wire:click="unloadRating" flat icon="chevron-up" />
                @else
                    <x-ts-button wire:click="loadRating" flat icon="chevron-down" />
                @endif
            </div>
        </div>
        @if ($rating)
            <div class="card-body">
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
            </div>
            <div class="card-footer">
                <x-ts-button wire:click="openFormModal" sm flat label="Editar" />
            </div>
        @endif
    </div>
    @if ($showFormModal)
        <x-modal wire:model.live="showFormModal">
            @livewire('rating.rating-form', ['member' => $member, 'rating' => $rating])
        </x-modal>
    @endif
</div>
