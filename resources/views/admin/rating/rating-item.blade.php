<div>
    <td>{{ $rating->member->name }}</td>
    <td>{{ $rating->height ?? '' }}</td>
    <td>{{ $rating->tuning ?? '' }}</td>
    <td>{{ $rating->vocal_power ?? '' }}</td>
    <td>{{ $rating->lowestNote->name ?? '' }}</td>
    <td>{{ $rating->highestNote->name ?? '' }}</td>
    <td class="text-right">
        {{-- <x-button wire:click="openFormModal" flat sm icon="pencil-alt" /> --}}
    </td>
    {{-- @if ($showFormModal)
        <x-modal wire:model.defer="showFormModal">
            @livewire('rating.rating-form', ['member' => $rating->member, 'rating' => $rating])
        </x-modal>
    @endif --}}
</div>
