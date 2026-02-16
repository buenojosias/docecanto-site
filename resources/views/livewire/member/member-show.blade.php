<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Coralista<br>
                <small>{{ $member->name }}</small>
            </h2>
        </div>
    </div>

    @if ($member->status != 'Ativo')
        <x-ts-alert text="O status atual do integrante é {{ $member->status }}." color="amber" />
    @endif

    <div class="md:grid md:grid-cols-5 space-y-3 md:space-y-0 gap-6">
        <div class="col-span-3 space-y-5">
            <x-ts-card header="Informações pessoais">
                <div class="detail pb-4">
                    <x-detail label="Nome completo" :value="$member->name" />
                </div>
                <div class="sm:grid sm:grid-cols-2 space-y-3 sm:space-y-0 gap-4 detail">
                    <x-detail label="Data de nascimento" :value="$member->birth->format('d/m/Y')" />
                    <x-detail label="Idade" :value="$member->age" />
                    <x-detail label="Data do cadastro" :value="$member->registration_date ? $member->registration_date->format('d/m/Y') : ''" />
                    <x-detail label="Status" :value="$member->status" />
                </div>
                <x-slot:footer>
                    <x-ts-button href="{{ route('members.edit', $member) }}" text="Editar" flat />
                </x-slot:footer>
            </x-ts-card>
            @livewire('member.member-profile', ['member' => $member])
        </div>
        <div class="col-span-2 space-y-5">
            @livewire('member.member-kins', ['member' => $member])
            @livewire('member.member-address', ['member' => $member])
            @livewire('member.member-contacts', ['member' => $member])
            @livewire('member.member-user', ['member' => $member])
            @livewire('member.member-rating', ['member' => $member])
        </div>
    </div>
</div>
