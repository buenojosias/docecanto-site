<div class="space-y-6">
    <x-ts-toast />
    <x-ts-dialog />
    <div class="page-header">
        <div class="title">
            <h2>Detalhes do evento</h2>
        </div>
        <div class="action">
            @can('coordinator')
                <x-ts-button href="{{ route('events.edit', $event) }}" primary text="Editar" />
            @endcan
        </div>
    </div>
    <x-ts-card class="detail grid grid-cols-6 space-y-3 md:space-y-0 gap-4">
        <div class="col-span-6 sm:col-span-3">
            <x-detail label="Título" :value="$event->title" />
        </div>
        <div class="col-span-2 sm:col-span-1">
            <x-detail label="Data" :value="Carbon\Carbon::parse($event->date)->format('d/m/Y')" />
        </div>
        <div class="col-span-2 sm:col-span-1">
            <x-detail label="Horário" :value="$event->time ? Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('H:i') : ''" />
        </div>
        <x-detail label="É apresentação?" :value="$event->is_presentation ? 'Sim' : 'Não'" />
        <div class="col-span-2 sm:col-span-3">
            <x-detail label="Local" :value="$event->local ?? 'Não informado'" />
        </div>
        <div class="col-span-6">
            <x-detail label="Descrição" :value="$event->description" :is_html="true"></x-detail>
        </div>
    </x-ts-card>
    <div class="sm:grid sm:grid-cols-2 gap-4 mt-4">
        @livewire('event.event-members', ['event' => $event])
        @if ($event->is_presentation)
            @livewire('event.event-songs', ['event' => $event])
        @endif
    </div>
</div>
