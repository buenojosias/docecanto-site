<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Músicas</h2>
        </div>
        <div class="action">
            <x-ts-button href="{{ route('songs.create') }}" primary text="Adicionar nova" wire:navigate />
        </div>
    </div>

    <div class="space-y-4">
        <x-filters
            quantity="quantity"
            search="search"
            :categories="$categories"
            category="category"
        >
            <div class="flex items-center mb-2">
                <x-ts-toggle wire:model.live="detached" label="Apenas fixadas" color="primary" />
            </div>
        </x-filters>
        @php
            $headers = [
                ['index' => 'number', 'label' => 'Núm.', 'sortable' => false],
                ['index' => 'title', 'label' => 'Título', 'sortable' => false],
                ['index' => 'categories', 'label' => 'Categoria(s)', 'sortable' => false],
            ];
        @endphp

        @php
            $headers[] = ['index' => 'action', 'label' => '', 'sortable' => false];
        @endphp

        <x-ts-table :headers="$headers" :rows="$this->songs" paginate loading>
            @interact('column_title', $row)
                <div class="flex items-center gap-1">
                    @if ($row->detached)
                        <x-ts-icon name="bookmark" class="h-4 w-4 text-orange-700" solid />
                    @endif
                    <a href="{{ route('songs.show', $row->number) }}" wire:navigate>{{ $row->title }}</a>
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
