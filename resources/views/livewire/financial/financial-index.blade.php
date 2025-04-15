<div>
    <x-ts-toast />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Financeiro</h2>
    </x-slot>

    <div class="mb-4 p-4 flex justify-between items-center bg-white shadow rounded-md">
        <p class="font-semibold text-gray-700">Saldo atual</p>
        <h2 class="text-2xl font-bold text-gray-800">R$ {{ number_format($totalBalance, 2, ',', '.') }}</h2>
    </div>

    <div class="mt-4 grid sm:grid-cols-3 gap-6">
        <x-ts-card header="Carteiras" class="detail">
            @forelse ($wallets as $wallet)
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
        <div class="col-span-2">
            <x-ts-card header="Últimos lançamentos">
                <div class="table table-responsive">
                    adf
                </div>
                <x-slot:footer>
                    <x-ts-button flat text="Ver todos" />
                </x-slot>
            </x-ts-card>

            <div class="grid sm:grid-cols-2 gap-2 mt-4">
                <x-ts-button text="Adicionar lançamento" />
                <x-ts-button text="Gerenciar mensalidades" outline />
                <x-ts-button text="Adicionar transferência" />
            </div>
        </div>
    </div>
    @livewire('financial.modals.create-wallet')
</div>
