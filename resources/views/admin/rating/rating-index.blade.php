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
                        <th>Menor<br />nota</th>
                        <th>Maior<br />nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ratings as $rating)
                        <tr>
                            @livewire('rating.rating-item', ['rating' => $rating], key($rating->id))
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
