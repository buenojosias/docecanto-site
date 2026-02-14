<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Coralistas</h2>
        </div>
        <div class="action">
            <x-ts-button href="{{ route('members.create') }}" text="Cadastrar novo" primary/>
        </div>
    </div>
    <div class="card">
        <div class="card-header relative" x-data="{ filters: false }">
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
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Aniversário</th>
                        <th>Idade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td>
                                <a href="{{ route('members.show', $member) }}" class="link">{{ $member->name }}</a>
                            </td>
                            <td>{{ $member->birthday }}</td>
                            <td>{{ $member->age }}</td>
                            <td>
                                @if ($member->status !== 'Ativo')
                                    <x-ts-badge flat warning :text="$member->status" outline />
                                @endif
                            </td>
                            <td class="text-right">
                                <x-ts-button href="{{ route('members.edit', $member) }}" flat sm icon="pencil" />
                            </td>
                        </tr>
                    @empty
                        <x-empty />
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-paginate">
            {{ $members->links() }}
        </div>
    </div>
</div>
