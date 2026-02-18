<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Fila de espera</h2>
        </div>
    </div>
    <x-ts-card header="Informações pessoais" class="infoblock g-3">

        <x-info label="Nome" :value="$queue->child_name" />
        <x-info label="Idade" :value="$queue->age" />
        <x-info label="WhatsApp" :value="$queue->child_phone ?? 'Não informado'" />
        <x-info label="Responsável" :value="$queue->parent_name" />
        <x-info label="WhatsApp" :value="$queue->parent_phone ?? 'Não informado'" />
        <x-info label="Status" :value="$queue->status" />
        <x-info label="Data do cadastro" :value="$queue->created_at->format('d/m/Y H:i')" />
        <x-info label="Última atualização" :value="$queue->updated_at->format('d/m/Y H:i')" />
        <x-info label="Igreja" :value="$queue->church ?? 'Não informada'" />
        @if ($queue->user)
            <x-info label="Cadatrado(a) por" :value="$queue->user->name" />
        @endif

        <x-slot:footer>
            <x-ts-button href="{{ route('queues.edit', $queue) }}" text="Editar" flat />
            <x-ts-button wire:click="openStatusModal" text="Alterar status" flat loading="openStatusModal" />
            <x-ts-button wire:click="deleteQueue" text="Excluir" flat color="red" />
        </x-slot:footer>
    </x-ts-card>
    @if ($showStatusModal)
        <livewire:queue.queue-status-modal :queue="$queue" @statusUpdated="$refresh" />
    @endif
</div>
