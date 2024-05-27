<div class="flex items-center">
    <div class="grow">
        {{ $member->name }}
    </div>
    @if ($member->event)
        <div class="mr-1">
            @if ($member->answer === 'Sim')
                <x-ts-badge outline positive label="Sim" />
            @elseif ($member->answer === 'Não')
                <x-ts-badge outline negative label="Não" />
            @else
                <x-ts-badge outline primary label="Talvez" />
            @endif
        </div>
        <x-dropdown>
            <x-dropdown.item wire:click="openFormModal('edit')" icon="pencil" label="Alterar" />
            <x-dropdown.item wire:click="removeAnswer" icon="trash" label="Remover" />
        </x-dropdown>
    @else
        <div class="mr-1">
            <small class="text-gray-800">Sem resposta</small>
        </div>
        <x-dropdown>
            <x-dropdown.item wire:click="openFormModal('create')" icon="pencil" label="Adicionar resposta" />
        </x-dropdown>
    @endif
    @if($showFormModal)
        <x-modal wire:model.live="showFormModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $action === 'create' ? 'Adicionar' : 'Alterar' }} resposta
                    </h3>
                </div>
                <div class="card-body display">
                    <x-ts-select.native wire:model.live="inputAnswer" label="Resposta" required>
                        <option value="">Selecione</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        <option value="Talvez">Talvez</option>
                    </x-ts-select.native>
                </div>
                <div class="card-footer space-x-2">
                    <x-ts-button wire:click="submit" sm type="submit" primary label="Salvar" />
                    <x-ts-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
