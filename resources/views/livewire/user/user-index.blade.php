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
                        <th>Nível</th>
                        <th>E-mail</th>
                        <th>Username</th>
                        <th width="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                {{-- <a href="{{ route('users.show', $user) }}" class="link">{{ $user->name }}</a> --}}
                                {{ $user->name }}
                            </td>
                            <td>{{ Str::ucfirst($user->role) }}</td>
                            <td>{{ $user->email ?? '---' }}</td>
                            <td>{{ $user->username ?? '---' }}</td>
                            <td>
                                <x-ts-button name="no-symbol" sm flat />
                                <x-ts-button name="trash" sm flat />
                            </td>
                        </tr>
                    @empty
                        <x-empty />
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-paginate">
            {{ $users->links() }}
        </div>
    </div>
</div>
