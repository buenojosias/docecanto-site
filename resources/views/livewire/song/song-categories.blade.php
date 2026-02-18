<div>
    <x-ts-card class="infolist">
        <x-card-header title="Categoria(s)">
            <x-slot:action>
                <x-ts-button wire:click="openModal" icon="fluentui.add-12-o" scope="without-padding" flat />
            </x-slot:action>
        </x-card-header>
        @foreach ($song->categories as $category)
            <x-list-item :title="$category->name">
                <x-slot:right>
                    <x-ts-button icon="trash" wire:click="removeCategory({{ $category }})" flat sm color="red" />
                </x-slot:right>
            </x-list-item>
        @endforeach
    </x-ts-card>
    @if ($showModal)
        <x-ts-modal wire="showModal" size="sm" title="Vincular categoria" id="category-modal">
            <x-ts-select.native wire:model.live="selectedCategory">
                <option value="">Selecione</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </x-ts-select.native>
            <x-slot:footer>
                <x-ts-button wire:click="submit" primary text="Salvar" />
                <x-ts-button x-on:click="$modalClose('category-modal')" flat text="Cancelar" />
            </x-slot>
        </x-ts-modal>
    @endif
</div>
