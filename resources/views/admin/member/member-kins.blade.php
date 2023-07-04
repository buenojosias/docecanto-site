<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Familiares</h3>
        <div class="card-tools">
            @if ($showKins)
                <x-button wire:click="unloadKins" flat icon="chevron-up" class="-mr-2" />
            @else
                <x-button wire:click="loadKins" flat icon="chevron-down" class="-mr-2" />
            @endif
        </div>
    </div>
    @if ($showKins)
        <div class="card-body">
            <ul>
                @forelse ($kins as $kin)
                    <li class="py-2 px-4 border-b">
                        <p class="font-medium text-gray-900">{{ $kin->name }}</p>
                        <h4 class="text-sm font-medium text-gray-600">{{ $kin->pivot->kinship }}</h4>
                    </li>
                @empty
                    <x-empty label="Nenhum familiar adicionado." />
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            <x-button flat label="Adicionar familiar" sm class="w-full" />
        </div>
    @endif
</div>
