<div class="flex items-center">
    <div class="grow">
        {{ $member->name }}
    </div>
    @if ($member->event)
        <div class="mr-1">
            @if ($member->answer === 'Sim')
                <x-ts-badge outline color="green" text="Sim" />
            @elseif ($member->answer === 'Não')
                <x-ts-badge outline color="orange" text="Não" />
            @else
                <x-ts-badge outline color="secondary" text="Talvez" />
            @endif
        </div>
        <x-ts-dropdown icon="ellipsis-vertical" static>
            <x-ts-dropdown.items wire:click="openFormModal('edit')" icon="pencil" text="Alterar" />
            <x-ts-dropdown.items wire:click="removeAnswer" icon="trash" text="Remover" />
        </x-ts-dropdown>
    @else
        <div class="mr-1">
            <small class="text-gray-800">Sem resposta</small>
        </div>
        <x-ts-dropdown icon="ellipsis-vertical" static>
            <x-ts-dropdown.items wire:click="openFormModal('create')" icon="pencil" text="Adicionar resposta" />
        </x-ts-dropdown>
    @endif
    @if ($showFormModal)
        <x-ts-modal wire="showFormModal" :title="$action === 'create' ? 'Adicionar resposta' : 'Alterar respostas'" size="sm">
            <x-ts-select.native wire:model="inputAnswer" label="Resposta" required>
                <option value="">Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
                <option value="Talvez">Talvez</option>
            </x-ts-select.native>
            <x-slot:footer>
                <x-ts-button wire:click="submit" sm type="submit" primary text="Salvar" />
                <x-ts-button sm flat text="Cancelar" x-on:click="close" />
            </x-slot:footer>
        </x-ts-modal>
    @endif
</div>
