<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Músicas</h2>
    </x-slot>

    <div class="sm:grid sm:grid-cols-4 gap-4">
        <div>
            <x-ts-button href="{{ route('songs.create') }}" primary text="Adicionar nova" class="w-full" />
            <div class="card my-4">
                <div class="card-header">
                    <h3 class="card-title">Categorias</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="flex py-1.5 px-4 border-b">
                                <div wire:click="selectCategory({{ $category->id }})" class="cursor-pointer">
                                    {{ $category->name }}
                                </div>
                            </li>
                        @endforeach
                        <li class="flex justify-between py-2 px-4">
                            <x-ts-label label="Apenas fixadas" />
                            <x-ts-toggle wire:model.live="detached" sm />
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sm:col-span-3">
            @if ($filter)
                <div class="card mb-4">
                    <div class="card-body p-2 flex justify-between items-center text-sm">
                        <div>
                            Filtro de categoria: {{ $categories->where('id', $filter)->first()->name }}
                        </div>
                        <div>
                            <x-ts-button wire:click="selectCategory" color="white">
                                <x-ts-icon name="x-mark" class="h-5 w-5" />
                            </x-ts-button>
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
                                            <x-ts-icon name="bookmark" class="w-4 h-4 mr-1 text-orange-700" solid />
                                        @endif
                                        <a href="{{ route('songs.show', $song->number) }}">{{ $song->title }}</a>
                                    </td>
                                    <td>
                                        @foreach ($song->categories as $category)
                                            <x-ts-badge xs color="secondary" light text="{{ $category->name }}" />
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <x-ts-button href="{{ route('songs.edit', $song->number) }}" sm color="white">
                                            <x-ts-icon name="pencil" class="h-3 w-3" />
                                        </x-ts-button>
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
