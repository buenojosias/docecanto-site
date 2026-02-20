<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>{{ $action === 'create' ? 'Cadastrar' : 'Editar' }} ensaio</h2>
        </div>
    </div>
    <div class="sm:max-w-xl sm:mx-auto">
        <x-ts-card>
            <form wire:submit="submit" class="space-y-4">
                <x-ts-errors class="mb-4" />
                <div class="sm:w-1/2">
                    <x-ts-date wire:model="date" label="Data" format="DD/MM/YYYY" />
                </div>
                <x-ts-input wire:model="theme" label="Tema do ensaio" />
                <div wire:ignore>
                    <x-ts-label label="Decrição" />
                    <textarea wire:model="description" class="min-h-fit h-48" name="description" id="description"></textarea>
                </div>
                <x-slot:footer>
                    <x-ts-button wire:click="submit" primary text="Salvar" loading="submit" />
                    @if ($encounter)
                        <x-ts-button href="{{ route('encounters.show', $encounter) }}" wire:navigate flat text="Ir para ensaio" />
                    @endif
                </x-slot:footer>
            </form>
        </x-ts-card>
    </div>
</div>
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
