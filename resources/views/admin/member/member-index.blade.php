<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Integrantes</h2>
    </x-slot>
    <x-button href="{{ route('members.create') }}" label="Cadastrar novo" primary class="mb-3 w-full sm:w-auto" />
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Aniversário</th>
                        <th>Idade</th>
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
                            <td class="text-right">
                                <x-button href="{{ route('members.edit', $member) }}" flat sm icon="pencil-alt" />
                                <x-button href="#" flat sm icon="phone" />
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
