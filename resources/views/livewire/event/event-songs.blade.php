<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Músicas</h3>
            @can('coordinator')
                <div class="card-tools">
                    <x-ts-button wire:click="openFormModal" flat icon="plus" class="-mr-3" />
                </div>
            @endcan
        </div>
        <div class="card-body">
            <ul>
                @forelse ($songs as $song)
                    <li class="border-b px-2">
                        <div class="flex items-center py-2">
                            <div class="grow pl-2">
                                <a href="{{ route('songs.show', $song->number) }}" target="_blank">
                                    {{ $song->number }}. {{ $song->title }}
                                </a>
                            </div>
                            @can('coordinator')
                                <div>
                                    <x-ts-button wire:click="removeSong({{ $song->id }})" negative sm flat
                                        icon="trash" />
                                </div>
                            @endcan
                        </div>
                        @if ($song->pivot->comment)
                            <div class="-mt-1 pb-2 pl-1 flex space-x-2 text-gray-700">
                                <x-ts-icon name="annotation" class="w-3" />
                                <small>{{ $song->pivot->comment ?? '' }}</small>
                            </div>
                        @endif
                    </li>
                @empty
                    <x-empty label="Nenhuma música adicionada." />
                @endforelse
            </ul>
        </div>
    </div>
    @can('coordinator')
        @if ($showFormModal)
            <x-ts-modal wire="showFormModal" title="Adicionar música" id="song-modal" size="sm">
                <div class="space-y-4">
                    <x-ts-select.native wire:model.live="dataCategory" label="Categoria">
                        <option value="">Selecione</option>
                        @foreach ($inputCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-ts-select.native>
                    @if ($dataCategory)
                        <x-ts-select.native wire:model="dataSong" label="Música">
                            <option value="">Selecione</option>
                            @foreach ($inputSongs as $song)
                                <option value="{{ $song->id }}">{{ $song->number }}. {{ $song->title }}</option>
                            @endforeach
                        </x-ts-select.native>
                        <x-ts-input wire:model="dataComment" label="Comentário" />
                    @else
                        <x-ts-select.native label="Música" disabled>
                            <option value="">Selecione uma categoria</option>
                        </x-ts-select.native>
                    @endif
                </div>
                <x-slot:footer>
                    {{-- @if ($dataCategory) --}}
                    <x-ts-button wire:click="submit" sm primary text="Salvar" />
                    {{-- @endif --}}
                    <x-ts-button sm flat text="Cancelar" x-on:click="$modalClose('song-modal')" />
                </x-slot>
            </x-ts-modal>
        @endif
    @endcan
</div>
