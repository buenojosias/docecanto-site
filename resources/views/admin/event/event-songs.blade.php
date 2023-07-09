<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Músicas</h3>
            <div class="card-tools">
                <x-button wire:click="openFormModal" flat icon="plus" class="-mr-3" />
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($songs as $song)
                    <li class="flex items-center border-b">
                        <div class="px-4 py-2 grow">
                            <a href="{{ route('songs.show', $song->number) }}" target="_blank">
                                {{ $song->number }}. {{ $song->title }}
                            </a>
                        </div>
                        <div class="p-2">
                            <x-button wire:click="removeSong({{ $song->id }})" negative xs flat icon="trash" />
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($showFormModal)
        <x-modal wire:model.defer="showFormModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Adicionar música</h3>
                </div>
                <div class="card-body display space-y-4">
                    <x-native-select wire:model="dataCategory" label="Categoria">
                        <option value="">Selecione</option>
                        @foreach ($inputCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-native-select>
                    @if ($dataCategory)
                        <x-native-select wire:model="dataSong" label="Música">
                            <option value="">Selecione</option>
                            @foreach ($inputSongs as $song)
                                <option value="{{ $song->id }}">{{ $song->number }}. {{ $song->title }}</option>
                            @endforeach
                        </x-native-select>
                    @else
                        <x-native-select label="Música" disabled>
                            <option value="">Selecione uma categoria</option>
                        </x-native-select>
                    @endif
                </div>
                <div class="card-footer flex space-x-2">
                    {{-- @if ($dataCategory) --}}
                        <x-button wire:click="submit" sm primary label="Salvar" />
                    {{-- @endif --}}
                    <x-button sm flat label="Cancelar" x-on:click="close" />
                </div>
            </div>
        </x-modal>
    @endif
</div>
