<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Fila de espera</h2>
        </div>
        <div class="action">
            <x-ts-button href="{{ route('queues.create') }}" primary text="Novo interessado" />
        </div>
    </div>
    <div class="card">
        <div class="card-header relative" x-data="{ filters: false }">
            <h3 class="card-title"></h3>
            <div class="card-tools py-1">
                <x-ts-button icon="funnel" @click="filters = !filters" color="secondary" flat />
            </div>
            <div x-show="filters" @click.outside="filters = false" class="filters">
                <div>
                    <x-ts-select.native wire:model.live="filterStatus" label="Status">
                        <option value="">Todos</option>
                        @foreach ($status_list as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-ts-select.native>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th width="2%">Data</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th></th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($queues as $queue)
                        <tr>
                            <td>{{ $queue->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('queues.show', $queue) }}">{{ $queue->child_name }}</a>
                            </td>
                            <td>{{ $queue->age }}</td>
                            <td>
                                <x-ts-label label="{{ $queue->status }}" />
                            </td>
                            <td>
                                <x-ts-button href="{{ route('queues.edit', $queue) }}" icon="pencil" sm flat />
                                <x-ts-button icon="trash" sm color="red" flat />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
