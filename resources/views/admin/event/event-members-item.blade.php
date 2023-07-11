<div class="flex">
    <div class="grow">
        {{ $member->name }}
    </div>
    @if ($member->event)
        <div>
            @if ($member->answer === 'Sim')
                <x-badge outline positive label="Sim" />
            @elseif ($member->answer === 'Não')
                <x-badge outline negative label="Não" />
            @else
                <x-badge outline warning label="Talvez" />
            @endif
        </div>
    @else
        <div class="space-x-4">
            <small class="text-gray-800">Sem resposta</small>
            {{-- <x-button xs label="Responder" /> --}}
        </div>
    @endif
    <div></div>
</div>
