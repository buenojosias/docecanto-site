<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Música</h2>
        </div>
    </div>

    <div class="sm:grid sm:grid-cols-6 gap-6">
        <div class="col-span-4">
            <x-ts-card>
                <x-card-header :title="$song->number . '. ' . $song->title">
                    <x-slot:action>
                        @if ($song->detached)
                            <x-ts-badge sm icon="bookmark" color="orange" text="Fixada" outline />
                        @endif
                    </x-slot:action>
                </x-card-header>
                <div class="lyrics">
                    {!! $song->lyrics !!}
                </div>
                <x-slot:footer>
                    <x-ts-button text="Editar" href="{{ route('songs.edit', $song->number) }}" wire:navigate flat />
                    @if ($song->detached)
                        <x-ts-button wire:click="removeDetach" text="Desafixar" flat />
                    @else
                        <x-ts-button wire:click="addDetach" text="Fixar" flat />
                    @endif
                </x-slot>
            </x-ts-card>
        </div>
        <div class="col-span-2 space-y-6">
            @livewire('song.song-categories', ['song' => $song])
            @livewire('audio.audio-index', ['song' => $song])
        </div>
    </div>
</div>
