<div class="space-y-6">
    <x-ts-toast />
    <div class="page-header">
        <div class="title">
            <h2>Transações</h2>
        </div>
        <div class="action">
            <x-ts-button text="Lançar transação" x-on:click="$dispatch('open-transaction-modal')" />
        </div>
    </div>

    <div class="card">
        {{-- <div class="card-header relative" x-data="{ filters: false }">
            <div></div>
            <div class="card-tools py-1">
                <x-ts-button @click="filters = !filters" icon="funnel" color="secondary" flat />
            </div>
            <div x-show="filters" @click.outside="filters = false" class="filters">
                <div>
                    <x-ts-select.native label="Status" wire:model.live="status">
                        <option value="">Todos</option>
                        <option value="Ativo">Ativos</option>
                        <option value="Inativo">Inativos</option>
                        <option value="Afastado">Afastados</option>
                        <option value="Desistente">Desistentes</option>
                    </x-ts-select.native>
                </div>
            </div>
        </div> --}}
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th width="106">Valor</th>
                        <th>Lançado por</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date->format('d/m/Y') }}</td>
                            <td class="text-md">{{ $transaction->description }}</td>
                            <td>{{ $transaction->category }}</td>
                            <td class="flex justify-between items-center gap-x-1 {{ $transaction->amount < 0 ? 'text-red-700' : '' }}"><span>R$</span> {{ number_format($transaction->amount, 2, ',') }}</td>
                            <td>{{ strtok($transaction->user->name, " ") }}</td>
                            {{-- <td>Link</td> --}}
                        </tr>
                    @empty
                        <x-empty />
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-paginate">
            {{ $transactions->links() }}
        </div>
    </div>

    @livewire('financial.modals.create-transaction')
</div>
