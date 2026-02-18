<x-ts-modal title="Cadastrar usuário" id="create-user-modal" size="sm">
    <form wire:submit="create" id="create-user-form" class="space-y-4">
        <x-ts-input wire:model="name" label="Nome" placeholder="Informe o nome completo" />
        <x-ts-input wire:model="email" label="E-mail" type="email" placeholder="Informe o e-mail" />
        <x-ts-input wire:model="username" label="Username" placeholder="Informe o username" />
        <x-ts-password wire:model="password" label="Senha" placeholder="Informe a senha" generator :rules="['min:6']" />
        <x-ts-select.native wire:model="role" label="Nível de acesso">
            <option value="">Selecione</option>
            <option value="responsável">Responsável</option>
            <option value="conselheiro">Conselheiro(a)</option>
            <option value="coordenador">Coordenador</option>
        </x-ts-select.native>
    </form>
    <x-slot:footer>     
        <x-ts-button type="submit" form="create-user-form" text="Salvar" />
        <x-ts-button text="Cancelar" flat x-on:click="$modalClose('create-user-modal')" />
    </x-slot:footer>
</x-ts-modal>

<script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('created', (event) => {
           $modalClose('create-user-modal');
       });
    });
</script>