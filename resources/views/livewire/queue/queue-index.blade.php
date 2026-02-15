<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Fila de espera</h2>
        </div>
        <div class="action">
            <x-ts-button href="{{ route('queues.create') }}" primary text="Novo interessado" />
        </div>
    </div>
    <x-ts-select.native wire:model.live="filterStatus" label="Status">
        <option value="">Todos</option>
        @foreach ($status_list as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </x-ts-select.native>
    @php
        $headers = [
            ['index' => 'created_at', 'label' => 'Data', 'sortable' => false],
            ['index' => 'child_name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'age', 'label' => 'Idade', 'sortable' => false],
            ['index' => 'status', 'label' => 'Status', 'sortable' => false],
            ['index' => 'action', 'label' => '', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->queues" :filter="['quantity' => 'quantity', 'search' => 'search']" paginate loading striped>
        @interact('column_created_at', $row)
            {{ $row->created_at?->format('d/m/Y') ?? '---' }}
        @endinteract

        @interact('column_child_name', $row)
            <a href="{{ route('queues.show', $row) }}">{{ $row->child_name }}</a>
        @endinteract

        @interact('column_action', $row)
            <div class="flex items-center justify-end gap-2">
                <x-ts-button href="{{ route('queues.edit', $row) }}" icon="pencil" sm flat />
                <x-ts-button icon="trash" sm color="red" flat />
            </div>
        @endinteract
    </x-ts-table>
</div>
