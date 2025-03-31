<div>
    <x-ts-toast />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Música</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-6 gap-6">
        <div class="col-span-4">
            <x-ts-card>
                <x-slot:header>
                    <h2 class="text-2xl font-semibold text-gray-700">
                        <small>{{ $song->number }}.</small>
                        {{ $song->title }}
                    </h2>
                    @if ($song->detached)
                        <div>
                            <x-ts-badge sm icon="bookmark" color="orange" text="Fixada" outline />
                        </div>
                    @endif
                </x-slot>

                <div class="lyrics">
                    {!! $song->lyrics !!}
                </div>
                <x-slot:footer>
                    @can('coordinator')
                        <x-ts-button href="{{ route('songs.edit', $song->number) }}" text="Editar" sm flat />
                    @endcan
                    @if ($song->detached)
                        <x-ts-button wire:click="removeDetach" text="Desafixar" flat sm />
                    @else
                        <x-ts-button wire:click="addDetach" text="Fixar" flat sm />
                    @endif
                </x-slot>
                {{-- </div> --}}
            </x-ts-card>
        </div>
        <div class="col-span-2">
            @livewire('song.song-categories', ['song' => $song])
            @livewire('audio.audio-index', ['song' => $song])
        </div>
    </div>
</div>
