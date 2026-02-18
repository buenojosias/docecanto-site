<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Fila de espera</h2>
        </div>
        <div class="action">
            <x-ts-button text="Novo interessado" href="{{ route('queues.create') }}" wire:navigate primary />
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
            ['index' => 'created_at', 'label' => 'Data'],
            ['index' => 'child_name', 'label' => 'Nome'],
            ['index' => 'age', 'label' => 'Idade'],
            ['index' => 'status', 'label' => 'Status'],
            ['index' => 'action', 'label' => ''],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->queues" :filter="['quantity' => 'quantity', 'search' => 'search']" paginate loading striped>
        @interact('column_created_at', $row)
            {{ $row->created_at?->format('d/m/Y') ?? '---' }}
        @endinteract

        @interact('column_child_name', $row)
            <a href="{{ route('queues.show', $row) }}" wire:navigate>{{ $row->child_name }}</a>
        @endinteract

        @interact('column_action', $row)
            <div class="flex items-center justify-end gap-2">
                <x-ts-button icon="fluentui.edit-20-o" color="secondary" href="{{ route('queues.edit', $row) }}" wire:navigate scope="without-padding" flat />
                <x-ts-button icon="fluentui.delete-12-o" color="red" scope="without-padding" flat />
            </div>
        @endinteract
    </x-ts-table>
</div>
