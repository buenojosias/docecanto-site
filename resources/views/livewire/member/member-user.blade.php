<div>
    <x-notifications />
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Informações de login</h3>
            <div class="card-tools">
                @if ($showUser)
                    <x-button wire:click="unloadUser" flat icon="chevron-up" class="-mr-2" />
                @else
                    <x-button wire:click="loadUser" flat icon="chevron-down" class="-mr-2" />
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
                                <x-button wire:click="resetPassword" flat sm icon="arrow-path" />
                            </div>
                        </li>
                    @else
                        <x-empty label="Nenhuma informação de login adicionada." />
                    @endif
                </ul>
                <div class="card-footer">
                    @if ($user)
                        <x-button wire:click="openFormModal" flat label="Alterar dados de acesso" sm class="w-full" />
                    @else
                        <x-button wire:click="openFormModal" flat label="Cadastrar dados de acesso" sm class="w-full" />
                    @endif
                </div>
            </div>
        @endif
    </div>

    <x-modal wire:model="showFormModal" max-width="sm">
        <div class="card w-full">
            <form wire:submit="submit">
                <div class="card-header">
                    <h3 class="card-title">{{ $user ? 'Editar' : 'Cadastrar' }} informações de login</h3>
                </div>
                <div class="card-body display">
                    <x-errors class="mb-4 shadow" />
                    <div class="grid sm:grid-cols-4 gap-2">
                        <div class="sm:col-span-4">
                            <x-input type="email" label="E-mail" wire:model="email" required />
                        </div>
                        <div class="sm:col-span-4">
                            <x-input label="Username" wire:model="username" required />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex justify-end gap-x-2">
                        <x-button type="submit" sm primary label="Salvar" />
                        <x-button label="Cancelar" sm flat x-on:click="close" />
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
</div>
