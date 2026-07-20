@props([
    'quantity' => null,
    'search' => null,
    'category' => null,
    'status' => null,
    'categories' => [],
    'statuses' => [],
    'quantities' => [10, 25, 50, 100],
])

    <x-ts-card class="grid grid-cols-1 sm:grid-cols-4 gap-4 items-end">
        @if ($quantity)
        <x-ts-select.native
            label="Quantidade"
            :options="$quantities"
            wire:model.live="{{ $quantity }}"
            required
            invalidate />
        @endif

        @if ($category)
        <x-ts-select.native
            label="Categoria"
            wire:model.live="{{ $category }}"
            :options="$categories"
            select="label:name|value:id" />
        @endif

        @if ($status)
        <x-ts-select.native
            label="Status"
            wire:model.live="{{ $status }}"
            :options="$statuses"
            select="label:name|value:id" />
        @endif

        @if ($search)
        <x-ts-input
            scope="table.input"
            icon="magnifying-glass"
            wire:model.live.debounce.500ms="{{ $search }}"
            placeholder="Buscar"
            type="search"
            invalidate />
        @endif
        
        {{ $slot }}
    </x-ts-card>