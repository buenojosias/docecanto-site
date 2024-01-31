<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Participantes</h3>
        </div>

        <div class="grid grid-cols-4 divide-x border-b">
            <div class="px-2 py-1 text-center">
                <div class="text-2xl text-gray-800 font-bold">{{ $event->members->where('pivot.answer', 'Sim')->count() }}</div>
                <div class="text-xs font-medium text-gray-600">Sim</div>
            </div>
            <div class="px-2 py-1 text-center">
                <div class="text-2xl text-gray-800 font-bold">{{ $event->members->where('pivot.answer', 'Não')->count() }}</div>
                <div class="text-xs font-medium text-gray-600">Não</div>
            </div>
            <div class="px-2 py-1 text-center">
                <div class="text-2xl text-gray-800 font-bold">{{ $event->members->where('pivot.answer', 'Talvez')->count() }}</div>
                <div class="text-xs font-medium text-gray-600">Talvez</div>
            </div>
            <div class="px-2 py-1 text-center">
                <div class="text-2xl text-gray-800 font-bold">{{ $noAnswer }}</div>
                <div class="text-xs font-medium text-gray-600">Sem resposta</div>
            </div>
        </div>

        <div class="card-body">
            <ul>
                @foreach ($members as $member)
                    <li class="border-b px-4 py-2">
                        @livewire('event.event-members-item', ['event' => $event, 'member' => $member], key($member->id))
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
