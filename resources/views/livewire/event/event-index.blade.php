<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eventos</h2>
    </x-slot>

    <x-notifications />
    <x-dialog />
    <div class="card">
        {{-- @dump($events) --}}
        {{-- <div class="card-header">
            <h3 class="card-title">Próximos eventos</h3>
        </div> --}}
        <div class="card-body">
            <div class="sm:grid sm:grid-cols-2 md:grid-cols-5">
                <div class="sm:order-last md:col-span-2 p-4">
                    <!-- INÍCIO DO CALENDÁRIO -->
                    <div class="mb-3 flex">
                        <div>
                            <x-button wire:click="goToPreviusMonth" sm flat icon="chevron-left" />
                        </div>
                        <div class="grow text-center font-semibold text-gray-800">
                            {{ $monthLabels[$currentMonth] }}/{{ $currentYear }}</div>
                        <div>
                            <x-button wire:click="goToNextMonth" sm flat icon="chevron-right" />
                        </div>
                    </div>
                    <div class="flex py-0.5">
                        @foreach ($dayLabels as $weekday)
                            <div class="basis-1/7 px-2 py-1 text-center text-xs">{{ $weekday }}</div>
                        @endforeach
                    </div>
                    <div class="flex flex-wrap divide-y">
                        @for ($i = 0; $i < $firstWeekdayOfMonth; $i++)
                            <div class="basis-1/7 border-t"></div>
                        @endfor
                        @for ($i = 1; $i <= $daysInMonth; $i++)
                            @php
                                $day_events = $events->where('day', $i);
                            @endphp
                            <div class="basis-1/7 h-12 flex items-center justify-center border-t">
                                <div wire:click="selectDay({{ $day_events->count() > 0 ? $i : null }})"
                                    class="
                                        w-8 h-8 flex items-center justify-center rounded-full text-sm
                                        {{ date($currentYear . '-' . substr("00{$currentMonth}", -2) . '-' . substr("00{$i}", -2)) == date('Y-m-d') && $day_events->count() == 0 ? 'text-cdc-800 font-bold' : '' }}
                                        {{ $day_events->count() > 0 ? 'bg-cdc-700 text-white font-semibold cursor-pointer' : 'cursor-default' }}
                                    ">
                                    {{ $i }}</div>
                            </div>
                        @endfor
                        @for ($i = 1; $i <= $remainder; $i++)
                            <div class="basis-1/7 "></div>
                        @endfor
                    </div>
                    <!-- FIM DO CALENDÁRIO -->
                    <x-button href="{{ route('events.create') }}" label="Adicionar evento"
                        class="w-full mt-6 font-semibold" md primary />
                </div>
                <div class="md:col-span-3 px-4 md:pr-6">
                    @if ($currentDay)
                        <p class="mt-2 pb-2 border-b text-sm font-semibold text-gray-600">
                            Exibindo eventos do dia
                            {{ $currentDay . '/' . $currentMonth . '/' . $currentYear }}
                            <span wire:click="selectDay({{ null }})"
                                class="text-sm text-sky-600 cursor-pointer">[limpar
                                filtro]</span>
                        </p>
                    @endif
                    <ul>
                        @forelse ($currentDay != null ? $events->where('day', $currentDay) : $events as $event)
                            <li class="flex py-4 border-b last:border-b-0 hover:bg-gray-50">
                                <div class="grow cursor-pointer">
                                    <a href="{{ route('events.show', $event) }}">
                                        <p class="font-semibold text-gray-900">{{ $event->title }}</p>
                                        <p class="text-gray-700 text-sm font-semibold">
                                            <i class="fa fa-calendar-alt text-xs text-gray-500 mr-0.5"></i>
                                            {{ strtolower($event->date->format('d/m')) }}
                                            @if ($event->time)
                                                <i class="fa fa-clock text-xs text-gray-500 mr-0.5 ml-2"></i>
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('H:i') }}
                                            @endif
                                        </p>
                                    </a>
                                </div>
                                <div class="flex items-center">
                                    <x-badge outline secondary :label="$event->members_count . ' confirmados'" />
                                </div>
                                <div class="flex items-center px-2">
                                    <x-dropdown>
                                        <x-dropdown.item href="{{ route('events.edit', $event) }}"
                                            icon="pencil" label="Editar" />
                                        <x-dropdown.item wire:click="removeEvent({{ $event }})" icon="trash"
                                            label="Remover" />
                                    </x-dropdown>
                                </div>
                            </li>
                        @empty
                            <x-empty label="Nenhum evento programado para o mês selecionado." />
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
