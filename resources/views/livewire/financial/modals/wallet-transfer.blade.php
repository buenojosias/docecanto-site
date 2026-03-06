<x-ts-modal title="Transferir fundos" size="sm" wire="modal">
    <form wire:submit="transfer" id="transfer-form" class="space-y-4">
        <x-ts-select.native
            label="Carteira de origem"
            wire:model="source_wallet_id"
            :options="$wallets"
            select="label:name|value:id"
        />

        <x-ts-select.native
            label="Carteira de destino"
            wire:model="destination_wallet_id"
            :options="$wallets"
            select="label:name|value:id"
        />

        <x-ts-currency
            label="Valor"
            wire:model="amount"
            locale="pt-BR"
            symbol
            placeholder="0,00"
        />
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" form="transfer-form" text="Salvar" />
    </x-slot>
</x-ts-modal>
