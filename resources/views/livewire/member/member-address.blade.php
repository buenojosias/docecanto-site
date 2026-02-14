<div>
    <x-ts-card header="Endereço">
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
        <x-slot:footer>
            @if ($addressData)
                <x-ts-button wire:click="openFormModal" text="Alterar endereço" flat />
            @else
                <x-ts-button wire:click="openFormModal" text="Cadastrar endereço" flat />
            @endif
        </x-slot:footer>
    </x-ts-card>
    <x-ts-modal wire="showFormModal" :title="$addressData ? 'Editar endereço' : 'Adicionar endereço'" size="xl" id="address-modal">
        <form id="address-form" wire:submit="submit">
            <x-ts-errors class="mb-4 shadow" />
            <div class="grid sm:grid-cols-6 gap-2">
                <div class="sm:col-span-4">
                    <x-ts-input label="Endereço" wire:model="address" required />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-input label="Complemento" wire:model="complement" />
                </div>
                <div class="sm:col-span-3">
                    <x-ts-input label="Bairro" wire:model="district" required />
                </div>
                <div class="sm:col-span-3">
                    <x-ts-input label="Cidade" wire:model="city" required />
                </div>
            </div>
        </form>
        <x-slot:footer>
            <x-ts-button type="submit" form="address-form" text="Salvar" primary />
            <x-ts-button text="Cancelar" x-on:click="$modalClose('address-modal')" flat />
        </x-slot>
    </x-ts-modal>
</div>
