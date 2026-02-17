<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Coralistas</h2>
        </div>
        <div class="action">
            <x-ts-button href="{{ route('members.create') }}" text="Cadastrar novo" primary />
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'name', 'label' => 'Nome'],
            ['index' => 'birthday', 'label' => 'Aniversário', 'sortable' => false],
            ['index' => 'age', 'label' => 'Idade', 'sortable' => false],
            ['index' => 'status', 'label' => 'Status', 'sortable' => false],
            ['index' => 'action', 'label' => '', 'sortable' => false],
        ];
    @endphp
    <x-ts-table :$headers :rows="$this->members" filter paginate>
        @interact('column_name', $row)
            <a href="{{ route('members.show', $row) }}">{{ $row->name }}</a>
        @endinteract

        @interact('column_action', $row)
            <div class="flex justify-end gap-2">
                @if ($row->status !== 'Ativo')
                    <x-ts-badge flat warning :text="$row->status" outline />
                @endif
                <x-ts-button href="{{ route('members.edit', $row) }}" flat icon="fluentui.edit-16" scope="without-padding" />
            </div>
        @endinteract
    </x-ts-table>
</div>
</div>
