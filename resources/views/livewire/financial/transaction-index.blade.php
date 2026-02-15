<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Transações</h2>
        </div>
        <div class="action">
            <x-ts-button text="Lançar transação" x-on:click="$dispatch('open-transaction-modal')" />
        </div>
    </div>

    <div class="grid gap-4 rounded-md bg-white p-4 shadow sm:grid-cols-2 lg:grid-cols-4">
        <x-ts-select.native wire:model.live="category" label="Categoria">
            <option value="">Todas</option>
            @foreach ($this->categories as $categoryOption)
                <option value="{{ $categoryOption }}">{{ $categoryOption }}</option>
            @endforeach
        </x-ts-select.native>

        <x-ts-date wire:model.live="dateStart" :max-date="now()" format="DD/MM/YYYY" label="Data inicial" helpers />
        <x-ts-date wire:model.live="dateEnd" :max-date="now()" format="DD/MM/YYYY" label="Data final" helpers />

        <x-ts-select.native wire:model.live="flow" label="Fluxo">
            <option value="">Todos</option>
            <option value="entrada">Entrada</option>
            <option value="saida">Saída</option>
        </x-ts-select.native>
    </div>

    @php
        $headers = [
            ['index' => 'date', 'label' => 'Data', 'sortable' => false],
            ['index' => 'description', 'label' => 'Descrição', 'sortable' => false],
            ['index' => 'category', 'label' => 'Categoria', 'sortable' => false],
            ['index' => 'amount', 'label' => 'Valor', 'sortable' => false],
            ['index' => 'user.name', 'label' => 'Lançado por', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->transactions" paginate loading striped>
        @interact('column_date', $row)
            {{ $row->date->format('d/m/Y') }}
        @endinteract

        @interact('column_description', $row)
            <span class="text-md">{{ $row->description }}</span>
        @endinteract

        @interact('column_amount', $row)
            <div @class([
                'flex items-center justify-between gap-1',
                'text-red-700' => $row->amount < 0,
            ])>
                <span>R$</span>
                <span>{{ number_format($row->amount, 2, ',') }}</span>
            </div>
        @endinteract

        @interact('column_user_name', $row)
            {{ $row->user ? strtok($row->user->name, ' ') : '---' }}
        @endinteract

        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>

    @livewire('financial.modals.create-transaction')
</div>
