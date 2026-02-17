<div class="">
    <x-ts-card header="Familiares" minimize="mount" class="infolist">
        @island(lazy: true)
            @placeholder
                <x-spinner />
            @endplaceholder
            @forelse ($this->kins as $kin)
                <x-list-item :title="$kin->name" :subtitle="$kin->pivot->kinship" />
            @empty
                <x-empty label="Nenhum familiar adicionado." />
            @endforelse
        @endisland
        <x-slot:footer>
            <x-ts-button @click="$modalOpen('kinship-modal')" text="Adicionar familiar" loading="openFormModal" flat />
        </x-slot>
    </x-ts-card>
    @island
        <livewire:kins.add :$member @added="$refresh" />
    @endisland
</div>
