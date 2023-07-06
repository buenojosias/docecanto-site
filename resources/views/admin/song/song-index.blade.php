<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Músicas</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-4 gap-4">
        <div class="mb-4">
            <div class="card mb-2">
                <div class="card-header">
                    <h3 class="card-title">Categorias</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="flex py-1.5 px-4 border-b">
                                <div>
                                    <a href="{{ route('songs.categories', $category) }}">{{ $category->name }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <x-button white label="ADICIONAR NOVA" class="w-full" />
        </div>

        <div class="sm:col-span-3">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-hover whitespace-nowrap">
                        <thead>
                            <tr>
                                <th>Núm.</th>
                                <th>Título</th>
                                <th>Categoria(s)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($songs as $song)
                                <tr>
                                    <td>{{ $song->number }}</td>
                                    <td class="flex items-center">
                                        @if ($song->detached)
                                            <x-icon name="flag" class="w-4 h-4 mr-1 text-orange-700" solid />
                                        @endif
                                        <a href="{{ route('songs.show', $song) }}">{{ $song->title }}</a>
                                    </td>
                                    <td>
                                        @foreach ($song->categories as $category)
                                            <x-badge xs flat label="{{ $category->name }}" />
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <x-button href="#" flat sm icon="pencil-alt" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
