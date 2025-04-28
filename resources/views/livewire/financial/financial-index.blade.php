<div>
    <x-ts-toast />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Financeiro</h2>
    </x-slot>

    <div class="mb-4 p-4 flex justify-between items-center bg-white shadow rounded-md">
        <p class="font-semibold text-gray-700">Saldo atual</p>
        <h2 class="text-2xl font-bold text-gray-800">R$ {{ number_format($totalBalance, 2, ',', '.') }}</h2>
    </div>

    <div class="mt-4 sm:grid sm:grid-cols-3 gap-6">
        <div class="mb-4 sm:mb-0">
            <x-ts-card header="Carteiras" class="detail">
                @forelse ($wallets as $wallet)
                    <x-detail :label="$wallet->name" :value="'R$ ' . number_format($wallet->balance, 2, ',', '.')">
                        <x-ts-button icon="pencil" flat sm />
                    </x-detail>
                @empty
                    <x-empty label="Nenhuma cateira adicionada" />
                @endforelse
                @can('coordinator')
                    <x-slot:footer>
                        <x-ts-button text="Adicionar nova" x-on:click="$wire.dispatch('open-create-wallet-modal')" flat />
                    </x-slot>
                @endcan
            </x-ts-card>
        </div>
        <div class="col-span-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Últimos lançamentos</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->date->format('d/m/Y') }}</td>
                                    <td class="text-wrap">{{ $transaction->description }}</td>
                                    <td class="flex justify-between space-x-1"><span>R$</span>
                                        <span>{{ number_format($transaction->amount, 2, ',') }}</span>
                                    </td>
                                </tr>
                            @empty
                                <x-empty />
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-paginate">
                    <x-ts-button text="Ver todos" :href="route('financial.transactions.index')" flat />
                </div>
            </div>

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
