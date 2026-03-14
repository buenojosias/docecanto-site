<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Produtos</h2>
        </div>
        <div class="action">
            <x-ts-button text="Cadastrar produto" @click="$modalOpen('create-product-modal')" />
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'variants_count', 'label' => 'Variações', 'sortable' => false],
            ['index' => 'is_active', 'label' => 'Status', 'sortable' => false],
            ['index' => 'action', 'label' => '', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->products" loading striped>
        @interact('column_is_active', $row)
            <x-ts-badge :color="$row->is_active ? 'green' : 'red'" :text="$row->is_active ? 'Ativo' : 'Inativo'" />
        @endinteract

        @interact('column_action', $row)
            <x-ts-button icon="fluentui.edit-20-o" color="secondary" @click="$dispatch('edit-product', { product: {{ $row->id }} })"
                scope="without-padding" flat />
            <x-ts-button icon="fluentui.delete-12-o" color="red" @click="$dispatch('delete-product', { product: {{ $row->id }} })"
                scope="without-padding" flat />
        @endinteract

        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>

    <livewire:product.product-create @product-created="$refresh" />
</div>
