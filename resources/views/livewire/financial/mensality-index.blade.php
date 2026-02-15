<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Mensalidades</h2>
        </div>
        <div class="action">
            <x-ts-button text="Lançar mensalidade" x-on:click="$dispatch('open-mensality-modal')" />
        </div>
    </div>

    <div class="grid gap-4 rounded-md bg-white p-4 shadow sm:grid-cols-2 lg:grid-cols-4">
        <x-ts-date wire:model.live="dateStart" :max-date="now()" format="DD/MM/YYYY" label="Data inicial" helpers />
        <x-ts-date wire:model.live="dateEnd" :max-date="now()" format="DD/MM/YYYY" label="Data final" helpers />

        <x-ts-select.native wire:model.live="memberId" label="Coralista">
            <option value="">Todos</option>
            @foreach ($this->members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </x-ts-select.native>

        <x-ts-select.native wire:model.live="referenceMonth" label="Mês de referência">
            <option value="">Todos</option>
            @foreach ($this->months as $month)
                <option value="{{ $month['value'] }}">{{ $month['label'] }}</option>
            @endforeach
        </x-ts-select.native>
    </div>

    @php
        $headers = [
            ['index' => 'date', 'label' => 'Data', 'sortable' => false],
            ['index' => 'member.name', 'label' => 'Coralista', 'sortable' => false],
            ['index' => 'month', 'label' => 'Mês de referência', 'sortable' => false],
            ['index' => 'amount', 'label' => 'Valor', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->mensalities" paginate loading striped>
        @interact('column_date', $row)
            {{ $row->date->format('d/m/Y') }}
        @endinteract

        @interact('column_month', $row)
            {{ App\Enums\MonthEnum::from($row->month)->getShortName() }}/{{ $row->year }}
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

    @livewire('financial.modals.create-mensality')
</div>
