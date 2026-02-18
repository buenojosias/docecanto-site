<div>
    <x-ts-card header="Endereço" minimize="mount" class="infoblock g-2">
        @if ($addressData)
            <x-info label="Endereço" :value="$addressData->address" />
            <x-info label="Complemento" :value="$addressData->complement ?? '-'" />
            <x-info label="Bairro" :value="$addressData->district" />
            <x-info label="Cidade" :value="$addressData->city ?? ''" />
        @else
            <x-empty label="Endereço não informado." />
        @endif
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
            <div class="grid sm:grid-cols-6 gap-4">
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
