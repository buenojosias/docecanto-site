<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fichas técnicas</h2>
    </x-slot>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover whitespace-nowrap">
                <thead>
                    <tr>
                        <th>Integrante</th>
                        <th>Altura</th>
                        <th>Segurança<br />vocal</th>
                        <th>Potência<br />vocal</th>
                        <th>Nota mais<br />grave</th>
                        <th>Nota mais<br />aguda</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ratings as $rating)
                        <tr>
                            <td>{{ $rating->member->name }}</td>
                            <td>{{ $rating->height ?? '' }}</td>
                            <td>{{ $rating->tuning ?? '' }}</td>
                            <td>{{ $rating->vocal_power ?? '' }}</td>
                            <td>{{ $rating->lowestNote->name ?? '' }}</td>
                            <td>{{ $rating->highestNote->name ?? '' }}</td>
                            {{-- <td class="text-right">
                                <x-ts-button wire:click="openFormModal" flat sm icon="pencil" />
                            </td> --}}
                        </tr>
                    @empty
                        <x-empty />
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- <div class="card-paginate">
            {{ $ratings->links() }}
        </div> --}}
    </div>
</div>
