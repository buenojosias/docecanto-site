<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Categorias musicais</h2>
        </div>
        <div class="action">
            <x-ts-button text="Adicionar" wire:click="openFormModal" />
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'position', 'label' => '#', 'sortable' => false],
            ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'songs_count', 'label' => 'Músicas', 'sortable' => false],
        ];
    @endphp

    @php
        $headers[] = ['index' => 'action', 'label' => '', 'sortable' => false];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->categories" striped>
        @can('coordinator')
            @interact('column_action', $row)
                <div class="flex justify-end">
                    <x-ts-button wire:click="openFormModal({{ $row }})" sm icon="pencil" flat />
                </div>
            @endinteract
        @endcan
    </x-ts-table>
    @if ($showFormModal)
        <x-ts-modal wire="showFormModal" size="sm"
            title="{{ $action === 'create' ? 'Adicionar' : 'Editar' }} categoria" id="category-modal">
            <form wire:submit="submit" id="category-form">
                <x-ts-errors />
                <div class="space-y-2">
                    <x-ts-input wire:model="data.position" label="Sequência" type="number" />
                    <x-ts-input wire:model="data.name" label="Nome" />
                </div>
            </form>
            <x-slot:footer>
                <x-ts-button type="submit" form="category-form" primary text="Salvar" />
                <x-ts-button text="Cancelar" x-on:click="$modalClose('category-modal')" flat />
            </x-slot>
        </x-ts-modal>
    @endif
</div>
