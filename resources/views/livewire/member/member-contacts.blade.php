<div>
    <div class="card mb-2">
        <div class="card-header" title="Contatos">
            <h3 class="card-title">Contatos</h3>
            <div class="card-tools">
                @if ($showContacts)
                    <x-ts-button icon="chevron-up" wire:click="unloadContacts" flat />
                @else
                    <x-ts-button icon="chevron-down" wire:click="loadContacts" flat />
                @endif
            </div>
        </div>
        @if ($showContacts)
            <div class="card-body">
                <ul>
                    @forelse ($contacts as $contact)
                        <li class="flex space-x-2 items-center py-2 px-4 border-b">
                            <div class="grow">
                                <h4 class="text-sm font-medium text-gray-600">{{ $contact->field }}</h4>
                                <p class="font-medium text-gray-900">{{ $contact->value }}</p>
                            </div>
                            <div class="flex items-center">
                                <x-ts-dropdown>
                                    <x-ts-dropdown.items wire:click="openFormModal({{ $contact }})" icon="pencil"
                                        label="Editar" />
                                    <x-ts-dropdown.items wire:click="removeContact({{ $contact }})" icon="trash"
                                        label="Remover" />
                                </x-ts-dropdown>
                            </div>
                        </li>
                    @empty
                        <x-empty label="Nenhum contato adicionado" />
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                <x-ts-button x-on:click="$modalOpen('contact-modal')" text="Adicionar contato" sm class="w-full" />
            </div>
        @endif
    </div>

    <x-ts-modal id="contact-modal" max-width="sm">
        <div class="card w-full">
            <form wire:submit="submit">
                <div class="card-header">
                    <h3 class="card-title">{{ $formContact ? 'Editar' : 'Adicionar' }} contato</h3>
                </div>
                <div class="card-body display">
                    <x-ts-errors class="mb-4 shadow" />
                    <div class="grid sm:grid-cols-4 gap-2">
                        <div class="sm:col-span-4">
                            <x-ts-select.native label="Campo" wire:model.live="field" required>
                                <option value="">Selecione</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="E-mail">E-mail</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                            </x-ts-select.native>
                        </div>
                        <div class="sm:col-span-4">
                            @if ($field === 'WhatsApp')
                                <x-ts-input wire:model="value" label="{{ $field }}" x-mask="(99) 99999-9999"
                                    required />
                            @elseif ($field === 'E-mail')
                                <x-ts-input type="email" wire:model="value" label="{{ $field }}"
                                    required />
                            @elseif ($field === 'Facebook' || $field === 'Instagram')
                                <x-ts-input wire:model="value" label="{{ $field }}" required />
                            @else
                                <p>Selecione o campo</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex justify-end gap-x-2">
                        <x-ts-button type="submit" sm primary text="Salvar" />
                        <x-ts-button text="Cancelar" sm x-on:click="close" flat />
                    </div>
                </div>
            </form>
        </div>
    </x-ts-modal>
</div>
