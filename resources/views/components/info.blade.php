@props(['label' => null, 'value' => null, 'note' => null, 'href' => null, 'bool' => null])

<div {{ $attributes }}>
    <dl class="flex-1" href="#">
        @if ($label)
            <dt>{{ $label }}</dt>
        @endif
        @if (is_array($value))
            <dd>
                @foreach ($value as $val)
                    {{ $val }}
                    @if (!$loop->last)
                        /
                    @endif
                @endforeach
            </dd>
        @else
            @if ($value)
                <dd class="break-words">
                    @if ($href)
                        <a href="{{ $href }}" class="hover:underline flex items-center gap-1 text-primary-700 dark:text-primary-200">
                            <x-ts-icon name="fluentui.link-16-o" class="h-4 w-4 mt-0.5" />
                            {{ $value }}
                        </a>
                    @else
                        {{ $value }}
                    @endif
                </dd>
                @if ($note)
                    <p class="note">{{ $note }}</p>
                @endif
            @elseif ($bool)
                <dd>
                    <x-ts-icon :name="$bool === 'Y' ? 'fluentui.checkmark-circle-12-o' : 'fluentui.dismiss-circle-12-o'"
                        class="h-6 w-6 {{ $bool === 'Y' ? 'text-emerald-600' : 'text-red-600' }}" />
                </dd>
            @endif
        @endif
    </dl>
    @if ($slot)
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
