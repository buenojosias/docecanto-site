<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Usuários</h2>
        </div>
        <div class="action">
            <x-ts-button text="Cadastrar usuário" @click="$modalOpen('create-user-modal')" />
        </div>
    </div>
    @php
        $headers = [
            ['index' => 'name', 'label' => 'Nome', 'sortable' => false],
            ['index' => 'role', 'label' => 'Nível', 'sortable' => false],
            ['index' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['index' => 'username', 'label' => 'Username', 'sortable' => false],
            ['index' => 'action', 'label' => '', 'sortable' => false],
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

        @interact('column_action', $row)
            <x-ts-button icon="fluentui.edit-20-o" color="secondary" @click="$dispatch('edit-user', { user: {{ $row->id }} })"
                scope="without-padding" flat />
            <x-ts-button icon="fluentui.delete-12-o" color="red" @click="$dispatch('delete-user', { user: {{ $row->id }} })"
                scope="without-padding" flat />
        @endinteract

        <x-slot:empty>
            <x-empty />
        </x-slot:empty>
    </x-ts-table>
    <livewire:user.create-global @created="$refresh" />
    <livewire:user.user-delete @deleted="$refresh" />
    <livewire:user.user-edit @saved="$refresh" />
</div>
