<div>
    <x-ts-toast />
    <x-ts-dialog />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorias</h2>
    </x-slot>
    @can('coordinator')
        <x-ts-button wire:click="openFormModal" text="Adicionar" primary class="mb-3 w-full sm:w-auto" />
    @endcan
    <div class="card md:max-w-lg">
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Músicas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->position }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->songs_count }} </td>
                            <td class="text-right">
                                @can('coordinator')
                                    <x-ts-button wire:click="openFormModal({{ $category }})" sm icon="pencil" flat />
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @can('coordinator')
        @if ($showFormModal)
            <x-ts-modal wire="showFormModal" size="sm"
                title="{{ $action === 'create' ? 'Adicionar' : 'Editar' }} categoria" id="category-modal">
                <form wire:submit="submit" id="category-form">
                    <x-ts-errors />
                    <div class="card-body display space-y-2">
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
    @endcan
</div>
