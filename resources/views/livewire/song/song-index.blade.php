<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Músicas</h2>
        </div>
        <div class="action">
            @can('coordinator')
                <x-ts-button href="{{ route('songs.create') }}" primary text="Adicionar nova" />
            @endcan
        </div>
    </div>

    <div class="space-y-4">
        <div
            class="flex sm:justify-between flex-col sm:flex-row items-center gap-4 bg-white py-2 px-3 rounded-md shadow">
            <div class="w-full sm:w-1/2 lg:w-1/3">
                <x-ts-select.native wire:model.live="filter" :options="$categories" select="label:name|value:id" />
            </div>
            <x-ts-toggle wire:model.live="detached" label="Apenas fixadas" color="primary" />
        </div>
        @php
            $headers = [
                ['index' => 'number', 'label' => 'Núm.', 'sortable' => false],
                ['index' => 'title', 'label' => 'Título', 'sortable' => false],
                ['index' => 'categories', 'label' => 'Categoria(s)', 'sortable' => false],
            ];
        @endphp

        @can('coordinator')
            @php
                $headers[] = ['index' => 'action', 'label' => '', 'sortable' => false];
            @endphp
        @endcan

        <x-ts-table :headers="$headers"
                    :rows="$this->songs"
                    :filter="['quantity' => 'quantity', 'search' => 'search']"
                    paginate
                    loading
                    striped>
            @interact('column_title', $row)
                <div class="flex items-center gap-1">
                    @if ($row->detached)
                        <x-ts-icon name="bookmark" class="h-4 w-4 text-orange-700" solid />
                    @endif
                    <a href="{{ route('songs.show', $row->number) }}">{{ $row->title }}</a>
                </div>
            @endinteract

            @interact('column_categories', $row)
                <div class="flex flex-wrap gap-2">
                    @foreach ($row->categories as $category)
                        <x-ts-badge xs color="secondary" light text="{{ $category->name }}" />
                    @endforeach
                </div>
            @endinteract

            @can('coordinator')
                @interact('column_action', $row)
                    <div class="flex justify-end">
                        <x-ts-button icon="pencil" href="{{ route('songs.edit', $row->number) }}" sm flat />
                    </div>
                @endinteract
            @endcan

            <x-slot:empty>
                <x-empty />
            </x-slot:empty>
        </x-ts-table>
    </div>
</div>
