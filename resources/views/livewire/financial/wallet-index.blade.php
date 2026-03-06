<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Carteiras</h2>
        </div>
        <div class="action flex gap-2">
            <x-ts-button text="Transferir fundos" x-on:click="$dispatch('open-transfer-modal')" outline />
            <x-ts-button text="Adicionar carteira" wire:click="openModal" />
        </div>
    </div>

    @php
        $headers = [
            ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'initial_balance', 'label' => 'Saldo inicial', 'sortable' => false],
            ['index' => 'balance', 'label' => 'Saldo atual', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->wallets" striped>
        @interact('column_initial_balance', $row)
            <div class="flex items-center gap-1">
                <span>R$</span>
                <span>{{ number_format($row->initial_balance, 2, ',', '.') }}</span>
            </div>
        @endinteract

        @interact('column_balance', $row)
            <div class="flex items-center gap-1">
                <span>R$</span>
                <span>{{ number_format($row->balance, 2, ',', '.') }}</span>
            </div>
        @endinteract

        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>

    <x-ts-modal title="Adicionar nova carteira" size="sm" wire="modal">
        <form wire:submit="createWallet" id="wallet-form" class="space-y-4">
            <x-ts-input label="Nome da carteira" wire:model="name" />
            <x-ts-currency label="Saldo inicial" wire:model="initial_balance" locale="pt-BR" symbol placeholder="0,00" />
        </form>
        <x-slot:footer>
            <x-ts-button type="submit" form="wallet-form" text="Salvar" />
        </x-slot>
    </x-ts-modal>

    @livewire('financial.modals.wallet-transfer')
</div>
