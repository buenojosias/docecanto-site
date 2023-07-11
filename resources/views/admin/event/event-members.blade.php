<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Participantes</h3>
        </div>

        <div class="grid grid-cols-4 divide-x border-b">
            <div class="px-2 py-1 text-center font-medium">
                <div>?</div>
                <small>SIM</small>
            </div>
            <div class="px-2 py-1 text-center font-medium">
                <div>?</div>
                <small>NÃO</small>
            </div>
            <div class="px-2 py-1 text-center font-medium">
                <div>?</div>
                <small>TALVEZ</small>
            </div>
            <div class="px-2 py-1 text-center font-medium">
                <div>?</div>
                <small>SEM RESPOSTA</small>
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
