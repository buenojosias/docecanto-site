<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorias</h2>
    </x-slot>
    <x-button wire:click="openFormModal" label="Adicionar" primary class="mb-3 w-full sm:w-auto" />
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
                                <x-button wire:click="openFormModal({{ $category }})" flat sm
                                    icon="pencil" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($showFormModal)
        <x-modal wire:model="showFormModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">{{ $action === 'create' ? 'Adicionar' : 'Editar' }} categoria</h3>
                </div>
                <form wire:submit="submit">
                    <x-errors />
                    <div class="card-body display space-y-2">
                        <x-input wire:model="data.position" label="Sequência" type="number" />
                        <x-input wire:model="data.name" label="Nome" />
                    </div>
                    <div class="card-footer space-x-2">
                        <x-button type="submit" sm primary label="Salvar" />
                        <x-button sm flat label="Cancelar" x-on:click="close" />
                    </div>
                </form>
            </div>
        </x-modal>
    @endif
</div>
