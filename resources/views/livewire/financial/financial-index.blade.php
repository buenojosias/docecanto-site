<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Financeiro</h2>
        </div>
    </div>

    <div class="mb-4 p-4 flex justify-between items-center bg-white shadow rounded-md">
        <p class="font-semibold text-gray-700">Saldo atual</p>
        <h2 class="text-2xl font-bold text-gray-800">R$ {{ number_format($totalBalance, 2, ',', '.') }}</h2>
    </div>

    <div class="mt-4 sm:grid sm:grid-cols-3 gap-6">
        <div class="mb-4 sm:mb-0">
            <x-ts-card header="Carteiras" class="detail">
                @forelse ($this->wallets as $wallet)
                    <x-detail :label="$wallet->name" :value="'R$ ' . number_format($wallet->balance, 2, ',', '.')">
                        <x-ts-button icon="pencil" flat sm />
                    </x-detail>
                @empty
                    <x-empty label="Nenhuma cateira adicionada" />
                @endforelse
                <x-slot:footer>
                    <x-ts-button text="Adicionar nova" x-on:click="$wire.dispatch('open-create-wallet-modal')" flat />
                </x-slot>
            </x-ts-card>
        </div>
        <div class="col-span-2">
            <x-ts-card header="Últimos lançamentos">
                @php
                    $headers = [
                        ['index' => 'date', 'label' => 'Data', 'sortable' => false],
                        ['index' => 'description', 'label' => 'Descrição', 'sortable' => false],
                        ['index' => 'amount', 'label' => 'Valor', 'sortable' => false],
                    ];
                @endphp

                <x-ts-table :headers="$headers" :rows="$this->transactions" striped>
                    @interact('column_date', $row)
                        {{ $row->date->format('d/m/Y') }}
                    @endinteract

                    @interact('column_description', $row)
                        <span class="text-wrap">{{ $row->description }}</span>
                    @endinteract

                    @interact('column_amount', $row)
                        <div class="flex justify-between gap-1">
                            <span>R$</span>
                            <span>{{ number_format($row->amount, 2, ',') }}</span>
                        </div>
                    @endinteract

                    <x-slot:empty>
                        <x-empty />
                    </x-slot:empty>
                </x-ts-table>
                <x-slot:footer>
                    <x-ts-button text="Ver todos" :href="route('financial.transactions.index')" flat />
                </x-slot:footer>
            </x-ts-card>
            <div class="grid sm:grid-cols-2 gap-2 mt-4">
                <x-ts-button text="Adicionar lançamento" x-on:click="$dispatch('open-transaction-modal')" outline />
                <x-ts-button text="Gerenciar mensalidades" :href="route('financial.mensalities.index')" outline />
                @can('coordinator')
                    <x-ts-button text="Adicionar transferência" />
                @endcan
            </div>
        </div>
    </div>

    @livewire('financial.modals.create-wallet')
    @livewire('financial.modals.create-transaction')
</div>
