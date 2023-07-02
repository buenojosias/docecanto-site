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
                            <p>{{ $member->birth->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <h4>Idade</h4>
                            <p>{{ $member->age }}</p>
                        </div>
                        <div>
                            <h4>Responsável</h4>
                            <p>{ placeholder }</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Contatos</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($contacts as $contact)
                            <ul class="py-2 px-4 border-b">
                                <h4 class="text-sm font-medium text-gray-600">{{ $contact->field }}</h4>
                                <p class="font-medium text-gray-900">{{ $contact->value }}</p>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Familiares</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($kins as $kin)
                            <ul class="py-2 px-4 border-b">
                                <p class="font-medium text-gray-900">{{ $kin->name }}</p>
                                <h4 class="text-sm font-medium text-gray-600">{{ $kin->pivot->kinship }}</h4>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
