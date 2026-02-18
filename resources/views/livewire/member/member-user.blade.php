<div>
    <x-ts-card header="Informações de login" class="infoblock" minimize="mount">
        @if ($user)
            <x-info label="E-mail" :value="$user->email" />
            <x-info label="Username" :value="$user->username" />
            <x-info label="Senha" value="******">
                <x-ts-button wire:click="resetPassword" flat icon="arrow-path" scope="without-padding" />
            </x-info>
        @else
            <x-empty label="Nenhuma informação de login adicionada." />
        @endif
        <x-slot:footer>
            @if ($user)
                <x-ts-button wire:click="openFormModal" text="Alterar dados de acesso" flat />
            @else
                <x-ts-button wire:click="openFormModal" text="Cadastrar dados de acesso" flat />
            @endif
        </x-slot>
    </x-ts-card>

    <x-ts-modal wire="showFormModal"
        title="{{ $user ? 'Editar informações de login' : 'Cadastrar informações de login' }}" size="sm"
        id="user-modal">
        <form wire:submit="submit" id="user-form">
            <div class="card-body display">
                <x-ts-errors class="mb-4 shadow" />
                <div class="grid sm:grid-cols-4 gap-2">
                    <div class="sm:col-span-4">
                        <x-ts-input type="email" label="E-mail" wire:model="email" required />
                    </div>
                    <div class="sm:col-span-4">
                        <x-ts-input label="Username" wire:model="username" required />
                    </div>
                </div>
            </div>
        </form>
        <x-slot:footer>
            <x-ts-button type="submit" form="user-form" primary text="Salvar" />
            <x-ts-button text="Cancelar" x-on:click="$modalClose('user-modal')" flat />
        </x-slot>
    </x-ts-modal>
</div>
