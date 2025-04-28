<x-ts-modal title="Lançar transação" size="md" wire>
    <form wire:submit="addTransaction" id="transaction-form" class="space-y-4">
        <x-ts-input label="Descrição *" wire:model="description" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ts-input label="Categoria *" wire:model="category" />
            <x-ts-date label="Data *" wire:model="date" format="DD/MM/YYYY" :max-date="now()" />
            <x-ts-select.native label="Fluxo *" wire:model="flow" :options="['Entrada', 'Saída']" />
            <x-ts-input label="Valor *" wire:model="displayAmount" prefix="R$" />
        </div>
        <x-ts-select.native label="Carteira *" wire:model="wallet_id" :options="$wallets" select="label:name|value:id" />
        <x-ts-textarea label="Observação" wire:model="note" />
    </form>
    <x-slot:footer>
        <x-ts-button text="Salvar" type="submit" form="transaction-form" loading="addTransaction" />
    </x-slot>
</x-ts-modal>
