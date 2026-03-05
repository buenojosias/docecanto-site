<x-ts-modal title="Lançar transação" size="md" wire>
    <form wire:submit="addTransaction" id="transaction-form" class="space-y-4">
        <x-ts-input label="Descrição *" wire:model="description" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ts-input label="Categoria *" wire:model="category" />
            <x-ts-date label="Data *" wire:model="date" format="DD/MM/YYYY" :max-date="now()" />
            <x-ts-select.native label="Tipo *" wire:model="type" :options="$types" />
            <x-ts-currency label="Valor *" wire:model="displayAmount" locale="pt-BR" symbol />
            <x-ts-select.native label="Método *" wire:model="method" :options="$mothods" />
            <x-ts-select.native label="Carteira *" wire:model="wallet_id" :options="$wallets" select="label:name|value:id" />
        </div>
        <x-ts-textarea label="Observação" wire:model="note" />
    </form>
    <x-slot:footer>
        <x-ts-button text="Salvar" type="submit" form="transaction-form" loading="addTransaction" />
    </x-slot>
</x-ts-modal>
