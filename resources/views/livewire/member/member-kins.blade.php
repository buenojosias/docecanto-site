<div class="">
    <x-ts-card header="Familiares" minimize="mount" class="infolist">
        @forelse ($this->kins as $kin)
            <x-list-item :title="$kin->name" :subtitle="$kin->pivot->kinship" />
        @empty
            <x-empty label="Nenhum familiar adicionado." />
        @endforelse
        <x-slot:footer>
            <x-ts-button @click="$modalOpen('kinship-modal')" text="Adicionar familiar" loading="openFormModal" flat />
        </x-slot>
    </x-ts-card>
    <livewire:kins.add :$member @kinAdded="$refresh" />
</div>
