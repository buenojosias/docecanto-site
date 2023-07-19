<div>
    <x-notifications />
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Endereço</h3>
            <div class="card-tools">
                @if ($showAddress)
                    <x-button wire:click="unloadAddress" flat icon="chevron-up" class="-mr-2" />
                @else
                    <x-button wire:click="loadAddress" flat icon="chevron-down" class="-mr-2" />
                @endif
            </div>
        </div>
        @if ($showAddress)
            <div class="card-body">
                <ul>
                    @if ($addressData)
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">Endereço</h4>
                            <p class="font-medium text-gray-900">{{ $addressData->address }}</p>
                        </li>
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">Complemento</h4>
                            <p class="font-medium text-gray-900">{{ $addressData->complement ?? '' }}</p>
                        </li>
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">Bairro</h4>
                            <p class="font-medium text-gray-900">{{ $addressData->district }}</p>
                        </li>
                        <li class="py-2 px-4 border-b">
                            <h4 class="text-sm font-medium text-gray-600">Cidade</h4>
                            <p class="font-medium text-gray-900">{{ $addressData->city ?? '' }}</p>
                        </li>
                    @else
                        <x-empty label="Endereço não informado." />
                    @endif
                </ul>
                <div class="card-footer">
                    @if ($addressData)
                        <x-button wire:click="openFormModal" flat label="Alterar endereço" sm class="w-full" />
                    @else
                        <x-button wire:click="openFormModal" flat label="Cadastrar endereço" sm class="w-full" />
                    @endif
                </div>
            </div>
        @endif
    </div>

    <x-modal wire:model.defer="showFormModal" max-width="md">
        <div class="card w-full">
            <form wire:submit.prevent="submit">
                <div class="card-header">
                    <h3 class="card-title">{{ $addressData ? 'Editar' : 'Adicionar' }} endereço</h3>
                </div>
                <div class="card-body display">
                    <x-errors class="mb-4 shadow" />
                    <div class="grid sm:grid-cols-6 gap-2">
                        <div class="sm:col-span-4">
                            <x-input label="Endereço" wire:model.defer="address" required />
                        </div>
                        <div class="sm:col-span-2">
                            <x-input label="Complemento" wire:model.defer="complement" />
                        </div>
                        <div class="sm:col-span-3">
                            <x-input label="Bairro" wire:model.defer="district" required />
                        </div>
                        <div class="sm:col-span-3">
                            <x-input label="Cidade" wire:model.defer="city" required />
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
