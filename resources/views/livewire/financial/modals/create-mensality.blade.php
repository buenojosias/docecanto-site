<x-ts-modal title="Lançar mensalidade" size="sm" wire>
    <form wire:submit="addMensality" id="mensality-form" class="space-y-4">
        <x-ts-select.styled label="Coralista" wire:model="member_id" :options="$members" select="label:name|value:id" searchable />
        <x-ts-select.native label="Mês de referência" wire:model="month" :options="$months" />
        <x-ts-date label="Data do pamamento" wire:model="date" format="DD/MM/YYYY" :max-date="now()" />
        <x-ts-input label="Valor pago" wire:model="amount" type="number" model="amount" prefix="R$" suffix=",00" />
        <x-ts-select.native label="Carteira" wire:model="wallet_id" :options="$wallets" select="label:name|value:id" />
    </form>
    <x-slot:footer>
        <x-ts-button text="Salvar" type="submit" form="mensality-form" />
    </x-slot>
</x-ts-modal>
