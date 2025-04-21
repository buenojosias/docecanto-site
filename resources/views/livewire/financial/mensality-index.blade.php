<div>
    <x-ts-toast />
    <x-ts-dialog />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mensalidades</h2>
    </x-slot>
    <x-ts-button text="Lançar mensalidade" x-on:click="$dispatch('open-mensality-modal')" class="mb-3 w-full sm:w-auto" />

    <div class="card">
        {{-- <div class="card-header relative" x-data="{ filters: false }">
            <div></div>
            <div class="card-tools py-1">
                <x-ts-button @click="filters = !filters" icon="funnel" color="secondary" flat />
            </div>
            <div x-show="filters" @click.outside="filters = false" class="filters">
                <div>
                    <x-ts-select.native label="Status" wire:model.live="status">
                        <option value="">Todos</option>
                        <option value="Ativo">Ativos</option>
                        <option value="Inativo">Inativos</option>
                        <option value="Afastado">Afastados</option>
                        <option value="Desistente">Desistentes</option>
                    </x-ts-select.native>
                </div>
            </div>
        </div> --}}
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Mês de referência</th>
                        <th>Coralista</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mensalities as $mensality)
                        <tr>
                            <td>{{ $mensality->date->format('d/m/Y') }}</td>
                            <td>{{ $mensality->month_formatted }}/{{ $mensality->year }}</td>
                            <td>{{ $mensality->member->name }}</td>
                            <td>R$ {{ number_format($mensality->amount, 2, ',') }}</td>
                            <td>Link</td>
                        </tr>
                    @empty
                        <x-empty />
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-paginate">
            {{ $mensalities->links() }}
        </div>
    </div>

    @livewire('financial.modals.create-mensality')
</div>
