<div>
    <x-modal wire:model.live="statusModal" max-width="sm">
        <div class="card w-full">
            <form wire:submit="submit">
                <div class="card-header">
                    <h3 class="card-title">Alterar status</h3>
                </div>
                <div class="card-body display">
                    <x-ts-select.native wire:model.live="status" label="Novo status" required>
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-ts-select.native>
                </div>
                <div class="card-footer space-x-2">
                    <x-ts-button type="submit" sm primary label="Salvar" />
                    <x-ts-button x-on:click="close" sm flat label="Cancelar" />
                </div>
            </form>
        </div>
    </x-modal>
</div>
