<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fila de espera</h2>
    </x-slot>
    <x-button href="{{ route('queues.create') }}" primary label="Novo interessado" class="mb-4" />
    <div class="card">
        <div class="card-header relative" x-data="{ filters: false }">
            <h3 class="card-title"></h3>
            <div class="card-tools py-1">
                <x-button flat icon="funnel" @click="filters = !filters" />
            </div>
            <div x-show="filters" @click.outside="filters = false" class="filters">
                <div>
                    <x-native-select wire:model.live="filterStatus" label="Status">
                        <option value="">Todos</option>
                        @foreach ($status_list as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-native-select>
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
                                <x-badge sm label="{{ $queue->status }}" />
                            </td>
                            <td>
                                <x-button href="{{ route('queues.edit', $queue) }}" flat sm icon="pencil" />
                                <x-button flat sm negative icon="trash" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
