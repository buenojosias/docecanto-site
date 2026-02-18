<x-ts-modal title="Editar usuário" id="edit-user-modal" size="sm">
    <form wire:submit="save" id="edit-user-form" class="space-y-4">
        <x-ts-input wire:model="email" label="E-mail" type="email" />
        <x-ts-input wire:model="username" label="Username" />
        <x-ts-password wire:model="password" label="Senha" placeholder="Informe a senha" generator :rules="['min:6']" />
        <x-ts-select.native wire:model="role" label="Nível de acesso">
            <option value="">Selecione</option>
            <option value="coralista">Coralista</option>
            <option value="responsável">Responsável</option>
            <option value="conselheiro">Conselheiro(a)</option>
            <option value="coordenador">Coordenador</option>
        </x-ts-select.native>
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" form="edit-user-form" primary text="Salvar" />
        <x-ts-button text="Cancelar" x-on:click="$modalClose('edit-user-modal')" flat />
    </x-slot:footer>
</x-ts-modal>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('open-edit-modal', (event) => {
            $modalOpen('edit-user-modal');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('saved', (event) => {
            $modalClose('edit-user-modal');
        });
    });
</script>
