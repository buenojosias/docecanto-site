<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Usuários</h2>
    </x-slot>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Username</th>
                        <th width="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td>
                                <a href="{{ route('members.show', $member) }}" class="link">{{ $member->name }}</a>
                            </td>
                            <td>{{ $member->user->email ?? '---' }}</td>
                            <td>{{ $member->user->username ?? '---' }}</td>
                            <td>
                                <x-ts-button sm color="white">
                                    <x-ts-icon name="no-symbol" class="h-4 w-4" />
                                </x-ts-button>
                                <x-ts-button sm color="white">
                                    <x-ts-icon name="trash" class="h-4 w-4" />
                                </x-ts-button>
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
