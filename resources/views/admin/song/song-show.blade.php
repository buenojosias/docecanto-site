<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Música</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-6 gap-6">
        <div class="col-span-4">
            <div class="card mb-4">
                @if ($song->detached)
                    <div class="card-header bg-orange-400">
                        <x-icon name="flag" class="mt-1.5 w-6 h-6 mr-1 text-white" solid />
                        <h3 class="card-title">Destacada</h3>
                    </div>
                @endif
                <div class="card-body p-4">
                    <h2 class="pb-3 mb-3 border-b text-2xl font-semibold text-gray-700">
                        <small>{{ $song->number }}.</small>
                        {{ $song->title }}
                    </h2>
                    {!! $song->lyrics !!}
                </div>
                <div class="card-footer">
                    <x-button href="{{ route('songs.edit', $song->number) }}" flat primary label="Editar" />
                    @if ($song->detached)
                        <x-button wire:click="removeDetach" flat label="Remover destaque" />
                    @else
                        <x-button wire:click="addDetach" flat primary label="Destacar" />
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-2">
            @livewire('song.song-categories', ['song' => $song])
            @livewire('media.media-index', ['song' => $song])
        </div>
    </div>
</div>
