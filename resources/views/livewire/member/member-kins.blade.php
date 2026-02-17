<div class="">
    <x-ts-card header="Familiares" minimize="mount" class="infolist">
        @forelse ($this->kins as $kin)
            <x-list-item :title="$kin->name" :subtitle="$kin->pivot->kinship" />
        @empty
            <x-empty label="Nenhum familiar adicionado." />
        @endforelse
        <x-slot:footer>
            <x-ts-button wire:click="openFormModal" text="Adicionar familiar" loading="openFormModal" flat />
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
                    <x-ts-button type="submit" form="kinship-form" text="Salvar" primary loading="submit" />
                @endif
                <x-ts-button text="Cancelar" x-on:click="$modalClose('kinship-modal')" color="white" loading="submit" />
            </x-slot>
        </form>
    </x-ts-modal>
</div>
