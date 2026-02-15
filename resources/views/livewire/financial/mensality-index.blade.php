<div class="space-y-6">
    <x-ts-toast />
    <x-ts-dialog />
    <div class="page-header">
        <div class="title">
            <h2>Mensalidades</h2>
        </div>
        <div class="action">
            <x-ts-button text="Lançar mensalidade" x-on:click="$dispatch('open-mensality-modal')" />
        </div>
    </div>

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
                        <th>Coralista</th>
                        <th>Mês de referência</th>
                        <th width="106">Valor</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mensalities as $mensality)
                        <tr>
                            <td>{{ $mensality->date->format('d/m/Y') }}</td>
                            <td>{{ $mensality->member->name }}</td>
                            <td>{{ App\Enums\MonthEnum::from($mensality->month)->getShortName() }}/{{ $mensality->year }}</td>
                            <td class="flex justify-between gap-x-1"><span>R$</span> {{ number_format($mensality->amount, 2, ',') }}</td>
                            {{-- <td>Link</td> --}}
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
