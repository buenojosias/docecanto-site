@props(['label', 'value', 'url', 'is_html' => false])

<div>
    <dl>
        <dt>{{ $label }}</dt>
        @if (is_array($value))
            <dd>
                @foreach ($value as $val)
                    {{ $val }}
                    @if (!$loop->last)
                        /
                    @endif
                @endforeach
            </dd>
        @elseif ($is_html)
            <dd class="break-words">{!! $value !!}</dd>
        @else
            <dd class="break-words">{{ $value }}</dd>
        @endif
    </dl>
    @if ($slot)
        <div>
            {{ $slot }}
        </div>
    @endif
</div>
