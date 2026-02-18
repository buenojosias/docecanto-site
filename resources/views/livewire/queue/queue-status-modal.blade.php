<x-ts-modal wire="statusModal" size="sm" title="Alterar status" id="status-modal">
    <form wire:submit="submit" id="status-form">
        <x-ts-select.native wire:model.live="status" label="Novo status" required>
            @foreach ($options as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </x-ts-select.native>
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" form="status-form" primary text="Salvar" />
        <x-ts-button x-on:click="$modalClose('status-modal')" color="white" text="Cancelar" />
    </x-slot>
</x-ts-modal>
