<div>
    <x-ts-toast />
    <x-ts-dialog />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fila de espera</h2>
    </x-slot>
    <div class="card">
        <div class="card-body display sm:grid sm:grid-cols-4 gap-4 space-y-3 sm:space-y-0">
            <div class="col-span-2">
                <h4>Nome</h4>
                <p>{{ $queue->child_name }}</p>
            </div>
            <div>
                <h4>Idade</h4>
                <p>{{ $queue->age }}</p>
            </div>
            <div>
                <h4>WhatsApp</h4>
                <p>{{ $queue->child_phone ?? 'Não informado' }}</p>
            </div>
            <div class="col-span-3">
                <h4>Responsável</h4>
                <p>{{ $queue->parent_name }}</p>
            </div>
            <div>
                <h4>WhatsApp</h4>
                <p>{{ $queue->parent_phone ?? 'Não informado' }}</p>
            </div>
            <div class="col-span-2">
                <h4>Status</h4>
                <p>{{ $queue->status }}</p>
            </div>
            <div>
                <h4>Data do cadastro</h4>
                <p>{{ $queue->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <h4>Última atualização</h4>
                <p>{{ $queue->updated_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="col-span-2">
                <h4>Igreja</h4>
                <p>{{ $queue->church ?? 'Não informada' }}</p>
            </div>
            @if ($queue->user)
                <div class="col-span-2">
                    <h4>Cadatrado(a) por</h4>
                    <p>{{ $queue->user->name }}</p>
                </div>
            @endif
        </div>
        <div class="card-footer gap-2">
            <x-ts-button href="{{ route('queues.edit', $queue) }}" text="Editar" flat />
            <x-ts-button wire:click="openStatusModal" text="Alterar status" flat />
            <x-ts-button wire:click="deleteQueue" text="Excluir" flat color="red" />
        </div>
    </div>
    @if ($showStatusModal)
        @livewire('queue.queue-status-modal', ['queue' => $queue])
    @endif
</div>
