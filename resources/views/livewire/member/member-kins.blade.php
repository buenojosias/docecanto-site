<div class="">
    {{-- <div class="absolute h-full w-full bg-slate-800/55 rounded flex items-center justify-center backdrop-blur-sm">
            <div class="h-12 w-12 animate-spin text-white dark:text-white z-100">
                <svg class="h-12 w-12 animate-spin text-white dark:text-white" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>
        </div> --}}

    <x-ts-card header="Familiares" scope="without-padding">
        <ul>
            @forelse ($kins as $kin)
                <li class="py-2 px-4 border-b">
                    <p class="font-medium text-gray-900">{{ $kin->name }}</p>
                    <h4 class="text-sm font-medium text-gray-600">{{ $kin->pivot->kinship }}</h4>
                </li>
            @empty
                <x-empty label="Nenhum familiar adicionado." />
            @endforelse
        </ul>
        <x-slot:footer>
            <x-ts-button wire:click="openFormModal" text="Adicionar familiar" flat />
        </x-slot>
    </x-ts-card>

    <x-ts-modal wire="showFormModal" title="Adicionar familiar" id="kinship-modal">
        <form wire:submit="submit" id="kinship-form">
            <x-ts-errors class="mb-4 shadow" />
            <span>
                Como você deseja adicionar o membro familiar?
            </span>
            <div class="grid sm:grid-cols-4 gap-4 mt-4">
                <div class="sm:col-span-2">
                    <x-ts-radio id="sync" label="Vincular familiar cadastrado" wire:model.live="action"
                        value="sync" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-radio id="create" label="Cadastrar novo familiar" wire:model.live="action"
                        value="create" />
                </div>
                @if ($action === 'sync')
                    <div class="sm:col-span-4">
                        <x-ts-select.styled label="Buscar familiar" wire:model="idk" placeholder="Comece a digitar"
                            :request="route('api.kins')" select="label:name|value:id" />
                    </div>
                @endif
                @if ($action === 'create')
                    <div class="sm:col-span-4">
                        <x-ts-input wire:model="name" label="Nome *" placeholder="Nome completo" required />
                    </div>
                    <div class="sm:col-span-2">
                        <x-ts-input type="date" wire:model="birth" label="Data de nascimento" />
                    </div>
                    <div class="sm:col-span-4">
                        <x-ts-input wire:model="profession" label="Profissão" placeholder="Profissão" />
                    </div>
                @endif
                @if ($action)
                    <div class="sm:col-span-4">
                        <x-ts-input wire:model="kinship" label="Grau de parentesco" placeholder="Grau de parentesco" />
                    </div>
                    @if ($action === 'sync')
                        <div class="sm:col-span-2"></div>
                    @endif
                @endif
            </div>
            <x-slot:footer>
                @if ($action)
                    <x-ts-button type="submit" form="kinship-form" primary text="Salvar" />
                @endif
                <x-ts-button text="Cancelar" x-on:click="$modalClose('kinship-modal')" color="white" />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
