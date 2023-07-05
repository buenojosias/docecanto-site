<div>
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
            <div class="card mb-4">
                <div class="card-body display">
                    <div>
                        <h4>Nome completo</h4>
                        <p>{{ $member->name }}</p>
                    </div>
                    <div class="sm:grid sm:grid-cols-2 space-y-3 sm:space-y-0 gap-4 my-4">
                        <div>
                            <h4>Data de nascimento</h4>
                            <p>{{ $member->birth }}</p>
                        </div>
                        <div>
                            <h4>Idade</h4>
                            <p>{{ $member->age }}</p>
                        </div>
                        <div>
                            <h4>Data do cadastro</h4>
                            <p>{{ $member->registration_date }}</p>
                        </div>
                        <div>
                            <h4>Status</h4>
                            <p>{{ $member->status }}</p>
                        </div>
                    </div>
                    <div class="footer">
                        <x-button href="{{ route('members.edit', $member) }}" sm primary label="Editar" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            @livewire('member.member-contacts', ['member' => $member])
            @livewire('member.member-address', ['member' => $member])
            @livewire('member.member-kins', ['member' => $member])
            @livewire('member.member-user', ['member' => $member])
        </div>
    </div>
</div>
