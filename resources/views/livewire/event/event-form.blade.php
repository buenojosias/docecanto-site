<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $action === 'create' ? 'Adicionar' : 'Editar' }} evento
        </h2>
    </x-slot>
    <div class="sm:max-w-md sm:mx-auto">
        <form wire:submit.prevent="submit">
            <div class="card mb-4">
                <x-errors class="mb-4" />
                <div class="card-body p-4 space-y-4">
                    <x-input wire:model.defer="title" label="Título" required />
                    <x-input wire:model.defer="local" label="Local" />
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-datetime-picker wire:model.defer="date" label="Data" without-time
                                :min="now()" />
                        </div>
                        <div>
                            <x-time-picker wire:model.defer="time" label="Horário (opcional)" format="24"
                                interval="30" />
                        </div>
                    </div>
                    <x-toggle wire:model.defer="is_presentation" md left-label="É apresentação" />
                    <div wire:ignore>
                        <x-label label="Decrição" />
                        <textarea wire:model.defer="description" class="min-h-fit h-48" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="card-footer space-x-2">
                    <x-button wire:click="submit" sm primary label="Salvar" />
                    @if ($event)
                        <x-button href="{{ route('events.show', $event) }}" sm flat label="Ir para evento" />
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
