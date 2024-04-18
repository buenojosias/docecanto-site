<div class="flex items-center">
    <div class="grow">
        {{ $member->name }}
    </div>
    @if ($member->event)
        <div class="mr-1">
            @if ($member->answer === 'Sim')
                <x-badge outline positive label="Sim" />
            @elseif ($member->answer === 'Não')
                <x-badge outline negative label="Não" />
            @else
                <x-badge outline primary label="Talvez" />
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
        <x-modal wire:model="showFormModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $action === 'create' ? 'Adicionar' : 'Alterar' }} resposta
                    </h3>
                </div>
                <div class="card-body display">
                    <x-native-select wire:model="inputAnswer" label="Resposta" required>
                        <option value="">Selecione</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        <option value="Talvez">Talvez</option>
                    </x-native-select>
                </div>
                <div class="card-footer space-x-2">
                    <x-button wire:click="submit" sm type="submit" primary label="Salvar" />
                    <x-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
