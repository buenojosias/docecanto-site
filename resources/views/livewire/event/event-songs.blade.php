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
                    <li class="border-b px-2">
                        <div class="flex items-center">
                            <div class="grow">
                                <a href="{{ route('songs.show', $song->number) }}" target="_blank">
                                    {{ $song->number }}. {{ $song->title }}
                                </a>
                            </div>
                            <div class="p-2">
                                <x-button wire:click="removeSong({{ $song->id }})" negative xs flat
                                    icon="trash" />
                            </div>
                        </div>
                        @if ($song->pivot->comment)
                            <div class="-mt-1 pb-2 pl-1 flex space-x-2 text-gray-700">
                                <x-icon name="annotation" class="w-3" />
                                <small>{{ $song->pivot->comment ?? '' }}</small>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($showFormModal)
        <x-modal wire:model="showFormModal" max-width="sm">
            <div class="card w-full">
                <div class="card-header">
                    <h3 class="card-title">Adicionar música</h3>
                </div>
                <div class="card-body display space-y-4">
                    <x-native-select wire:model.live="dataCategory" label="Categoria">
                        <option value="">Selecione</option>
                        @foreach ($inputCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-native-select>
                    @if ($dataCategory)
                        <x-native-select wire:model.live="dataSong" label="Música">
                            <option value="">Selecione</option>
                            @foreach ($inputSongs as $song)
                                <option value="{{ $song->id }}">{{ $song->number }}. {{ $song->title }}</option>
                            @endforeach
                        </x-native-select>
                        <x-input wire:model="dataComment" label="Comentário" />
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
