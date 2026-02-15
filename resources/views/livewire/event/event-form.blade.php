<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>{{ $action === 'create' ? 'Adicionar' : 'Editar' }} evento</h2>
        </div>
    </div>
    <div class="sm:max-w-md sm:mx-auto">
        <form wire:submit="submit">
            <div class="card mb-4">
                <x-ts-errors class="mb-4" />
                <div class="card-body p-4 space-y-4">
                    <x-ts-input wire:model="title" label="Título" required />
                    <x-ts-input wire:model="local" label="Local" />
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-ts-date wire:model="date" label="Data" format="DD/MM/YYYY" :min-date="now()" />
                        </div>
                        <div>
                            <x-ts-time wire:model="time" label="Horário (opcional)" format="24" :step-minute="5" />
                        </div>
                    </div>
                    <x-ts-toggle wire:model="is_presentation" md label="É apresentação" position="left" />
                    <div wire:ignore>
                        <x-ts-label label="Decrição" />
                        <textarea wire:model="description" class="min-h-fit h-48" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="card-footer space-x-2">
                    <x-ts-button wire:click="submit" sm primary text="Salvar" />
                    @if ($event)
                        <x-ts-button href="{{ route('events.show', $event) }}" sm flat text="Ir para evento" />
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
