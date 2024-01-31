<div>
    <x-modal wire:model.defer="statusModal" max-width="sm">
        <div class="card w-full">
            <form wire:submit.prevent="submit">
                <div class="card-header">
                    <h3 class="card-title">Alterar status</h3>
                </div>
                <div class="card-body display">
                    <x-native-select wire:model.defer="status" label="Novo status" required>
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-native-select>
                </div>
                <div class="card-footer space-x-2">
                    <x-button type="submit" sm primary label="Salvar" />
                    <x-button x-on:click="close" sm flat label="Cancelar" />
                </div>
            </form>
        </div>
    </x-modal>
</div>
