<div>
    <x-ts-card header="Contatos" minimize="mount" class="infoblock">
        @forelse ($contacts as $contact)
            <x-info :label="$contact->field" :value="$contact->value">
                <x-ts-dropdown icon="fluentui.chevron-down-28" position="bottom-end">
                    <x-ts-dropdown.items wire:click="openFormModal({{ $contact }})" icon="pencil" text="Editar" />
                    <x-ts-dropdown.items wire:click="removeContact({{ $contact }})" icon="trash" text="Remover" />
                </x-ts-dropdown>
            </x-info>
        @empty
            <x-empty label="Nenhum contato adicionado" />
        @endforelse
        <x-slot:footer>
            <x-ts-button wire:click="openFormModal" text="Adicionar contato" flat />
        </x-slot>
    </x-ts-card>

    <x-ts-modal title="{{ $formContact ? 'Editar' : 'Adicionar' }} contato" id="contact-modal" wire="showFormModal"
        size="sm">
        <form wire:submit="submit" class="space-y-4">
            <x-ts-errors class="mb-4 shadow" />
            <x-ts-select.native label="Campo" wire:model.live="field" required>
                <option value="">Selecione</option>
                <option value="WhatsApp">WhatsApp</option>
                <option value="E-mail">E-mail</option>
                <option value="Facebook">Facebook</option>
                <option value="Instagram">Instagram</option>
            </x-ts-select.native>
            @if ($field === 'WhatsApp')
                <x-ts-input wire:model="value" label="{{ $field }}" x-mask="(99) 99999-9999" required />
            @elseif ($field === 'E-mail')
                <x-ts-input type="email" wire:model="value" label="{{ $field }}" required />
            @elseif ($field === 'Facebook' || $field === 'Instagram')
                <x-ts-input wire:model="value" label="{{ $field }}" required />
            @else
                <x-ts-input value="Selecione um campo" disabled />
            @endif

            <x-slot:footer>
                <x-ts-button type="submit" primary text="Salvar" />
                <x-ts-button text="Cancelar" x-on:click="$modalClose('contact-modal')" flat />
            </x-slot:footer>
        </form>
    </x-ts-modal>
</div>
