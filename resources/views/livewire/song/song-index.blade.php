<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>Músicas</h2>
        </div>
        <div class="action">
            @can('coordinator')
                <x-ts-button href="{{ route('songs.create') }}" primary text="Adicionar nova" />
            @endcan
        </div>
    </div>

    <div class="space-y-4">
        <div
            class="flex sm:justify-between flex-col sm:flex-row items-center gap-4 bg-white py-2 px-3 rounded-md shadow">
            <div class="w-full sm:w-1/2 lg:w-1/3">
                <x-ts-select.native wire:model.live="filter" :options="$categories" select="label:name|value:id" />
            </div>
            <x-ts-toggle wire:model.live="detached" label="Apenas fixadas" color="primary" />
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover whitespace-nowrap">
                    <thead>
                        <tr>
                            <th>Núm.</th>
                            <th>Título</th>
                            <th>Categoria(s)</th>
                            @can('coordinator')
                                <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($songs as $song)
                            <tr>
                                <td>{{ $song->number }}</td>
                                <td class="flex items-center">
                                    @if ($song->detached)
                                        <x-ts-icon name="bookmark" class="w-4 h-4 mr-1 text-orange-700" solid />
                                    @endif
                                    <a href="{{ route('songs.show', $song->number) }}">{{ $song->title }}</a>
                                </td>
                                <td>
                                    @foreach ($song->categories as $category)
                                        <x-ts-badge xs color="secondary" light text="{{ $category->name }}" />
                                    @endforeach
                                </td>
                                @can('coordinator')
                                    <td class="text-right">
                                        <x-ts-button icon="pencil" href="{{ route('songs.edit', $song->number) }}" sm
                                            flat />
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (!$filter)
                <div class="card-paginate">
                    {{ $songs->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
