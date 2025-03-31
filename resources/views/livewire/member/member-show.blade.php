<div>
    <x-ts-dialog />
    @if ($member->status != 'Ativo')
        <div class="alert warning">
            O status atual do integrante é <span class="font-semibold">{{ $member->status }}</span>.
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Informações do integrante</h2>
    </x-slot>
    <div class="md:grid md:grid-cols-5 space-y-3 md:space-y-0 gap-4">
        <div class="col-span-3">
            <x-ts-card>
                <div class="detail pb-4">
                    <x-detail label="Nome completo" :value="$member->name" />
                </div>
                <div class="sm:grid sm:grid-cols-2 space-y-3 sm:space-y-0 gap-4 detail">
                    <x-detail label="Data de nascimento" :value="$member->birth->format('d/m/Y')" />
                    <x-detail label="Idade" :value="$member->age" />
                    <x-detail label="Data do cadastro" :value="$member->registration_date->format('d/m/Y')" />
                    <x-detail label="Status" :value="$member->status" />
                </div>
                <x-slot:footer>
                    <x-ts-button href="{{ route('members.edit', $member) }}" text="Editar" flat />
                </x-slot:footer>

            </x-ts-card>
            <div class="card mb-4">
            </div>
            {{-- @livewire('member.member-profile', ['member' => $member]) --}}
        </div>
        <div class="col-span-2">
            @livewire('member.member-contacts', ['member' => $member])
            @can('coordinator')
                @livewire('member.member-address', ['member' => $member])
            @endcan
            @livewire('member.member-kins', ['member' => $member])
            @livewire('member.member-user', ['member' => $member])
            {{-- @livewire('member.member-rating', ['member' => $member]) --}}
        </div>
    </div>
</div>
