<div>
    <x-dialog />
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Categoria(s)</h3>
            <div class="card-tools">
                <x-button wire:click="openModal" flat icon="plus" class="-mr-3" />
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($song->categories as $category)
                    <li class="px-4 py-2 border-b flex">
                        <div class="grow">{{ $category->name }}</div>
                        <div>
                            <x-button wire:click="removeCategory({{ $category }})" xs flat negative icon="trash" />
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($showModal)
        <x-modal wire:model.defer="showModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Vincular categoria</h3>
                </div>
                <div class="card-body display">
                    <x-native-select wire:model="selectedCategory">
                        <option value="">Selecione</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </x-native-select>
                </div>
                <div class="card-footer flex space-x-2">
                    <x-button wire:click="submit" sm primary label="Salvar" />
                    <x-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
