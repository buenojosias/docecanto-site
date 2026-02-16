<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar ficha técnica</h3>
            <div class="card-tools -mr-2">
                <x-ts-button x-on:click="close" sm flat icon="x-mark" />
            </div>
        </div>
        <form wire:submit="submit">
            <x-ts-errors />
            <div class="card-body display grid grid-cols-2 gap-4">
                <x-ts-input wire:model.live="data.height" label="Altura" />
                <div></div>
                <x-ts-select.native wire:model.live="data.tuning" label="Segurança vocal">
                    <option value="">Selecione</option>
                    @foreach ($options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-ts-select.native>
                <x-ts-select.native wire:model.live="data.vocal_power" label="Potência vocal">
                    <option value="">Selecione</option>
                    @foreach ($options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-ts-select.native>
                <x-ts-select.native wire:model.live="data.lowest_note_id" label="Nota mais baixa">
                    <option value="">Selecione</option>
                    @foreach ($notes as $note)
                        <option value="{{ $note->id }}">{{ $note->name }}</option>
                    @endforeach
                </x-ts-select.native>
                <x-ts-select.native wire:model.live="data.highest_note_id" label="Nota mais alta">
                    <option value="">Selecione</option>
                    @foreach ($notes as $note)
                        <option value="{{ $note->id }}">{{ $note->name }}</option>
                    @endforeach
                </x-ts-select.native>
            </div>
            <div class="card-footer space-x-2">
                <x-ts-button type="submit" sm primary label="Salvar" />
                <x-ts-button x-on:click="close" sm flat label="Cancelar" />
            </div>
        </form>
    </div>
</div>
