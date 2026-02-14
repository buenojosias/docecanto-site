@props(['title', 'subtitle' => null])

<x-slot:header>
    <div
        class="flex justify-between items-start gap-4 p-4">
        <div class="text-md font-medium flex-1">
            {{ $title }}
            @if ($subtitle)
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</div>
            @endif
        </div>
        @if (isset($action))
            <div class="flex items-center gap-2">
                {{ $action }}
            </div>
        @endif
    </div>
</x-slot:header>
