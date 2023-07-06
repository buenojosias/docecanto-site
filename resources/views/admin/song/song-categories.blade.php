<div>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Categoria(s)</h3>
            <div class="card-tools">
                <x-button flat icon="plus" class="-mr-3" />
            </div>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($categories as $category)
                    <li class="px-4 py-2 border-b">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
