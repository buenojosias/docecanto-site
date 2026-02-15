<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Categoria(s)</h3>
            @can('coordinator')
                <div class="card-tools">
                    <x-ts-button wire:click="openModal" flat icon="plus" />
                </div>
            @endcan
        </div>
        <div class="card-body">
            <ul>
                @foreach ($song->categories as $category)
                    <li class="px-4 py-2 border-b flex">
                        <div class="grow">{{ $category->name }}</div>
                        @can('coordinator')
                            <div>
                                <x-ts-button icon="trash" wire:click="removeCategory({{ $category }})" flat sm
                                    color="red" />
                            </div>
                        @endcan
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @can('coordinator')
        @if ($showModal)
            <x-ts-modal wire="showModal" size="sm" title="Vincular categoria" id="category-modal">
                <x-ts-select.native wire:model.live="selectedCategory">
                    <option value="">Selecione</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </x-ts-select.native>
                <x-slot:footer>
                    <x-ts-button wire:click="submit" sm primary text="Salvar" />
                    <x-ts-button sm flat text="Cancelar" x-on:click="$modalClose('category-modal')" />
                </x-slot>
            </x-ts-modal>
        @endif
    @endcan
</div>
