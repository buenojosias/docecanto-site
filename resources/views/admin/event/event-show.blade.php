<div>
    <x-notifications />
    <x-dialog />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalhes do evento</h2>
    </x-slot>
    <div class="card mb-4">
        <div class="card-body display">
            <div class="grid grid-cols-6 space-y-3 md:space-y-0 gap-4">
                <div class="col-span-6 sm:col-span-3">
                    <h4>Título</h4>
                    <p>{{ $event->title }}</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h4>Data</h4>
                    <p>{{ Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h4>Horário</h4>
                    <p>{{ Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('H:i') }}</p>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h4>É apresentação?</h4>
                    <p>{{ $event->is_presentation ? 'Sim' : 'Não' }}</p>
                </div>
                <div class="col-span-6">
                    <h4>Local</h4>
                    <p>{{ $event->local }}</p>
                </div>
                <div class="col-span-6">
                    <h4>Descrição</h4>
                    <p>{{ $event->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 gap-4">
        @livewire('event.event-members', ['event' => $event])
        @if ($event->is_presentation)
            @livewire('event.event-songs', ['event' => $event])
        @endif
    </div>
</div>
