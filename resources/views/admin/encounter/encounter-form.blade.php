<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $action === 'create' ? 'Cadastrar' : 'Editar' }} encontro
        </h2>
    </x-slot>
    <div class="sm:max-w-md sm:mx-auto">
        <form wire:submit.prevent="submit">
            <div class="card mb-4">
                <x-errors class="mb-4" />
                <div class="card-body p-4 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-datetime-picker wire:model.defer="date" label="Data" without-time />
                        </div>
                    </div>
                    <div wire:ignore>
                        <x-label label="Decrição" />
                        <textarea wire:model.defer="description" class="min-h-fit h-48" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <x-button wire:click="submit" flat primary label="Salvar" />
                    @if ($encounter)
                        <x-button href="{{ route('encounters.show', $encounter) }}" flat label="Ir para encontro" />
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            // forced_root_block: false,
            menubar: false,
            statusbar: false,
            toolbar: 'undo redo | bold italic',
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('description', editor.getContent());
                });
            }
        });
    </script>
@endpush
