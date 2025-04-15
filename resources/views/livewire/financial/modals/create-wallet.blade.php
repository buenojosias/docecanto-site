<x-ts-modal title="Adicionar nova carteira" size="sm" wire>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Adicionar nova carteira</h2>
    </x-slot>
    <form wire:submit="createWallet" id="wallet-form" class="space-y-4">
        <x-ts-input label="Nome da carteira" wire:model="name" />
        <x-money-input label="Saldo inicial" model="balance" prefix="R$" placeholder="0,00" />
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" form="wallet-form" text="Salvar" />
    </x-slot>
</x-ts-modal>
