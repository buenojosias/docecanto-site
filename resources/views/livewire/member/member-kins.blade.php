<div>
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Familiares</h3>
            <div class="card-tools">
                @if ($showKins)
                    <x-button wire:click="unloadKins" flat icon="chevron-up" class="-mr-2" />
                @else
                    <x-button wire:click="loadKins" flat icon="chevron-down" class="-mr-2" />
                @endif
            </div>
        </div>
        @if ($showKins)
            <div class="card-body">
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
            </div>
            <div class="card-footer">
                <x-button wire:click="openFormModal" flat label="Adicionar familiar" sm class="w-full" />
            </div>
        @endif
    </div>

    <x-modal wire:model="showFormModal">
        <form wire:submit="submit">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionar familiar</h3>
                </div>
                <div class="card-body display">
                    <x-errors class="mb-4 shadow" />
                    <span>
                        Como você deseja adicionar o membro familiar?
                    </span>
                    <div class="grid sm:grid-cols-4 gap-4 mt-4">
                        <div class="sm:col-span-2">
                            <x-radio id="sync" label="Vincular familiar cadastrado" wire:model.live="action"
                                value="sync" />
                        </div>
                        <div class="sm:col-span-2">
                            <x-radio id="create" label="Cadastrar novo familiar" wire:model.live="action"
                                value="create" />
                        </div>
                        @if ($action === 'sync')
                            <div class="sm:col-span-4">
                                <x-select label="Buscar familiar" wire:model="idk"
                                    placeholder="Comece a digitar" :async-data="route('api.kins')" option-label="name"
                                    option-value="id" />
                            </div>
                        @endif
                        @if ($action === 'create')
                            <div class="sm:col-span-4">
                                <x-input wire:model="name" label="Nome *" placeholder="Nome completo"
                                    required />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input type="date" wire:model="birth" label="Data de nascimento" />
                            </div>
                            <div class="sm:col-span-4">
                                <x-input wire:model="profession" label="Profissão" placeholder="Profissão" />
                            </div>
                        @endif
                        @if ($action)
                            <div class="sm:col-span-4">
                                <x-input wire:model="kinship" label="Grau de parentesco" placeholder="Grau de parentesco" />
                            </div>
                            @if ($action === 'sync')
                                <div class="sm:col-span-2"></div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex justify-between gap-x-2">
                        @if ($action)
                            <x-button sm type="submit" primary label="Salvar" />
                        @endif
                        <x-button sm flat label="Cancelar" x-on:click="close" />
                    </div>
                </div>
            </div>
        </form>
    </x-modal>
</div>
