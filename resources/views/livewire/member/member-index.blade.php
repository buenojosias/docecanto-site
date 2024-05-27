<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Integrantes</h2>
    </x-slot>
    <x-ts-button href="{{ route('members.create') }}" text="Cadastrar novo" primary class="mb-3 w-full sm:w-auto" />
    <div class="card">
        <div class="card-header relative" x-data="{ filters: false }">
            <div></div>
            <div class="card-tools py-1">
                <x-ts-button @click="filters = !filters" color="white">
                    <x-ts-icon name="funnel" class="h-5 w-5 text-primary-600" />
                </x-ts-button>
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
                                    <x-ts-badge outline warning :text="$member->status" />
                                @endif
                            </td>
                            <td class="text-right">
                                <x-ts-button href="{{ route('members.edit', $member) }}" outline sm icon="pencil" />
                                <x-ts-button href="#" outline sm icon="phone" />
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
