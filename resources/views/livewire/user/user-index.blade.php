<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Usuários</h2>
        </div>
        <div class="action">
            @can('coordinator')
                <x-ts-button text="Cadastrar usuário" wire:click="$dispatch('open-form-modal')" />
            @endcan
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'role', 'label' => 'Nível', 'sortable' => false],
            ['index' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['index' => 'username', 'label' => 'Username', 'sortable' => false],
        ];
    @endphp

    <x-ts-table :headers="$headers" :rows="$this->users" :filter="['quantity' => 'quantity', 'search' => 'search']" paginate loading striped>
        @interact('column_role', $row)
            {{ $row->role ? Str::ucfirst($row->role) : '---' }}
        @endinteract

        @interact('column_email', $row)
            {{ $row->email ?? '---' }}
        @endinteract

        @interact('column_username', $row)
            {{ $row->username ?? '---' }}
        @endinteract

        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>
    @can('coordinator')
        @livewire('user.user-create')
    @endcan
</div>
