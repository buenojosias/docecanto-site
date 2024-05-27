<div>
    <x-ts-dialog />
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Informações de login</h3>
            <div class="card-tools">
                @if ($showUser)
                    <x-ts-button wire:click="unloadUser" icon="chevron-up" class="-mr-2" />
                @else
                    <x-ts-button wire:click="loadUser" icon="chevron-down" class="-mr-2" />
                @endif
            </div>
        </div>
        @if ($showUser)
            <div class="card-body">
                <ul>
                    @if ($user)
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">E-mail</h4>
                            <p class="font-medium text-gray-900">{{ $user->email }}</p>
                        </li>
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">Username</h4>
                            <p class="font-medium text-gray-900">{{ $user->username }}</p>
                        </li>
                        <li class="flex space-x-2 items-center py-2 px-4 border-b">
                            <div class="grow">
                                <h4 class="text-sm font-medium text-gray-600">Senha</h4>
                            </div>
                            <div>
                                <x-ts-button wire:click="resetPassword" sm icon="arrow-path" />
                            </div>
                        </li>
                    @else
                        <x-empty label="Nenhuma informação de login adicionada." />
                    @endif
                </ul>
                <div class="card-footer">
                    @if ($user)
                        <x-ts-button wire:click="openFormModal" text="Alterar dados de acesso" sm class="w-full" />
                    @else
                        <x-ts-button wire:click="openFormModal" text="Cadastrar dados de acesso" sm class="w-full" />
                    @endif
                </div>
            </div>
        @endif
    </div>

    <x-ts-modal wire="showFormModal" title="{{ $user ? 'Editar informações de login' : 'Cadastrar informações de login' }}" size="sm" id="user-modal">
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
            <x-ts-button text="Cancelar" x-on:click="$modalClose('user-modal')" color="white" />
        </x-slot>
    </x-ts-modal>
</div>
