<div>
    <x-dialog />
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Categoria(s)</h3>
            <div class="card-tools">
                <x-ts-button wire:click="openModal" flat icon="plus" class="-mr-3" />
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($song->categories as $category)
                    <li class="px-4 py-2 border-b flex">
                        <div class="grow">{{ $category->name }}</div>
                        <div>
                            <x-ts-button wire:click="removeCategory({{ $category }})" xs flat negative icon="trash" class="-mr-1" />
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($showModal)
        <x-modal wire:model.live="showModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Vincular categoria</h3>
                </div>
                <div class="card-body display">
                    <x-ts-select.native wire:model.live="selectedCategory">
                        <option value="">Selecione</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </x-ts-select.native>
                </div>
                <div class="card-footer flex space-x-2">
                    <x-ts-button wire:click="submit" sm primary label="Salvar" />
                    <x-ts-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
