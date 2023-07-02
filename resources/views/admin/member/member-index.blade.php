<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Membros</h2>
    </x-slot>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td>
                                <a href="#" class="link">{{ $member->name }}</a>
                            </td>
                            {{-- <td><a href="'{{ route('members.show', $member) }}'">{{ $member->name }}</a></td> --}}
                            <td>{{ $member->age }}</td>
                            <td class="text-right">
                                <x-button href="#" flat sm icon="key" />
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
