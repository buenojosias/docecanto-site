<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Músicas</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-4 gap-4">
        <div>
            <x-button href="{{ route('songs.create') }}" primary label="Adicionar nova" class="w-full" />
            <div class="card my-4">
                <div class="card-header">
                    <h3 class="card-title">Categorias</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="flex py-1.5 px-4 border-b">
                                <div wire:click="selectCategory({{ $category }})" class="cursor-pointer">
                                    {{ $category->name }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="sm:col-span-3">
            @if ($filter)
                <div class="card mb-4">
                    <div class="card-body display flex justify-between text-sm">
                        <div>
                            Filtro de categoria: {{ $filter['name'] }}
                        </div>
                        <div>
                            <x-button wire:click="selectCategory" xs flat icon="x-mark" />
                        </div>
                    </div>
                </div>
            @endif

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
                                            <x-icon name="bookmark" class="w-4 h-4 mr-1 text-orange-700" solid />
                                        @endif
                                        <a href="{{ route('songs.show', $song->number) }}">{{ $song->title }}</a>
                                    </td>
                                    <td>
                                        @foreach ($song->categories as $category)
                                            <x-badge xs flat label="{{ $category->name }}" />
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <x-button href="{{ route('songs.edit', $song->number) }}" flat sm icon="pencil" />
                                    </td>
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
</div>
