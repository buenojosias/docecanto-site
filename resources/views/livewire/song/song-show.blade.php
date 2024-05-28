<div>
    <x-ts-toast />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Música</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-6 gap-6">
        <div class="col-span-4">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h2 class="sm:flex sm:gap-1.5 pb-3 border-b text-2xl font-semibold text-gray-700">
                        <div class="grow">
                            <small>{{ $song->number }}.</small>
                            {{ $song->title }}
                        </div>
                        @if ($song->detached)
                            <div>
                                <x-ts-badge md icon="bookmark" orange label="Fixada" />
                            </div>
                        @endif
                    </h2>
                    <div class="lyrics">
                        {!! $song->lyrics !!}
                    </div>
                </div>
                <div class="card-footer space-x-2">
                    <x-ts-button href="{{ route('songs.edit', $song->number) }}" flat primary text="Editar" />
                    @if ($song->detached)
                        <x-ts-button wire:click="removeDetach" text="Desafixar" />
                    @else
                        <x-ts-button wire:click="addDetach" primary text="Fixar" />
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-2">
            @livewire('song.song-categories', ['song' => $song])
            @livewire('audio.audio-index', ['song' => $song])
        </div>
    </div>
</div>
