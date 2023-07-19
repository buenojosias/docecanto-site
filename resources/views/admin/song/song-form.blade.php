<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $song ? 'Editar' : 'Cadastrar' }} música
        </h2>
    </x-slot>
    <div class="sm:grid sm:grid-cols-6 gap-6">
        <div class="col-span-4">
            <div class="card mb-4">
                <x-errors class="mb-4" />
                <div class="card-body p-2 sm:flex space-x-2">
                    <div class="w-1/6">
                        <x-input wire:model.defer="number" type="number" min="1" label="Número" />
                    </div>
                    <div class="grow">
                        <x-input wire:model.defer="title" label="Título" />
                    </div>
                </div>
                <div class="card-body p-2">
                    <x-input wire:model.defer="resume" label="Versão resumida" />
                </div>
                <div class="card-body p-2">
                    <div wire:ignore>
                        <textarea wire:model.defer="lyrics" class="min-h-fit h-48 " name="lyrics" id="lyrics"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <x-button wire:click="submit" primary label="Salvar" />
                    @if ($song)
                        <x-button href="{{ route('songs.show', $song->number) }}" flat label="Ir para música" />
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-2">
            @if ($song)
                @livewire('song.song-categories', ['song' => $song])
            @endif
            {{-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Fulltext</h3>
                </div>
                <div class="card-body display">
                    {{ $fulltext }}
                </div>
            </div> --}}
        </div>
    </div>
</div>

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#lyrics',
            // forced_root_block: false,
            menubar: false,
            statusbar: false,
            toolbar: 'undo redo | bold italic',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('lyrics', editor.getContent());
                });
            }
        });
    </script>
@endpush
