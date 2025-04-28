<x-ts-modal title="Cadastrar usuário" size="md" wire>
    <form wire:submit="createUser" id="user-form" class="space-y-4">
        <x-ts-input label="Nome *" wire:model="name" />
        <x-ts-input label="E-mail *" wire:model="email" type="email" />
        <x-ts-input label="Username *" wire:model="username" />
        <x-ts-input label="Senha *" wire:model="password" type="password" />
        <x-ts-input label="Confirmar senha *" wire:model="password_confirmation" type="password" />
        <x-ts-select.native label="Função *" wire:model="role" :options="[
            ['label' => 'Selecione', 'value' => ''],
            ['label' => 'Conselheiro', 'value' => 'conselheiro'],
            ['label' => 'Coordenador', 'value' => 'coordenador'],
        ]" select="label:label|value:value" />
    </form>
    <x-slot:footer>
        <x-ts-button type="submit" text="Salvar" form="user-form" loading="createUser" />
    </x-slot>
</x-ts-modal>
