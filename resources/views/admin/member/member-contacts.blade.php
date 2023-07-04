<div class="card mb-4">
    <div class="card-header cursor-pointer" wire:click="loadContacts">
        <h3 class="card-title">Contatos</h3>
        <div class="card-tools">
            @if ($showContacts)
                <x-button wire:click="unloadContacts" flat icon="chevron-up" class="-mr-2" />
            @else
                <x-button wire:click="loadContacts" flat icon="chevron-down" class="-mr-2" />
            @endif
        </div>
    </div>
    @if ($showContacts)
        <div class="card-body">
            <ul>
                @forelse ($contacts as $contact)
                    <li class="py-2 px-4 border-b">
                        <h4 class="text-sm font-medium text-gray-600">{{ $contact->field }}</h4>
                        <p class="font-medium text-gray-900">{{ $contact->value }}</p>
                    </li>
                @empty
                    <x-empty label="Nenhum contato adicionado" />
                @endforelse
            </ul>
        </div>
        <div class="card-footer">
            <x-button flat label="Adicionar contato" sm class="w-full" />
        </div>
    @endif
</div>
