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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="col-span-2 space-y-4">
            <x-ts-card header="Informações pessoais" class="infoblock g-2">
                <x-info label="Nome completo" :value="$member->name" />
                <x-info label="Data de nascimento" :value="$member->birth->format('d/m/Y')" />
                <x-info label="Idade" :value="$member->age" />
                <x-info label="Data do cadastro" :value="$member->registration_date ? $member->registration_date->format('d/m/Y') : '-'" />
                <x-info label="Status" :value="$member->status" href="#" />
                <x-info label="Ativo" bool="N" />
                <x-slot:footer>
                    <x-ts-button href="{{ route('members.edit', $member) }}" text="Editar" flat />
                </x-slot:footer>
            </x-ts-card>
            @livewire('member.member-profile', ['member' => $member])
            <div class="grid lg:grid-cols-2 gap-4">
                @island()
                    @livewire('member.member-kins', ['member' => $member])
                @endisland
                @livewire('member.member-address', ['member' => $member])
            </div>
        </div>
        <div class="space-y-4">
            @island()
                @livewire('member.member-rating', ['member' => $member])
            @endisland
            @island()
                @livewire('member.member-user', ['member' => $member])
            @endisland
            @island
                @livewire('member.member-contacts', ['member' => $member])
            @endisland
        </div>
    </div>
</div>
