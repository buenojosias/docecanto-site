<div>
    <div class="card mb-4">
        <div class="card-header">
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
                        <li class="flex space-x-2 items-center py-2 px-4 border-b">
                            <div class="grow">
                                <h4 class="text-sm font-medium text-gray-600">{{ $contact->field }}</h4>
                                <p class="font-medium text-gray-900">{{ $contact->value }}</p>
                            </div>
                            <div class="flex items-center">
                                <x-dropdown>
                                    <x-dropdown.item wire:click="openFormModal({{ $contact }})" icon="pencil-alt"
                                        label="Editar" />
                                    <x-dropdown.item wire:click="removeContact({{ $contact }})" icon="trash" label="Remover" />
                                </x-dropdown>
                            </div>
                        </li>
                    @empty
                        <x-empty label="Nenhum contato adicionado" />
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                <x-button wire:click="openFormModal" flat label="Adicionar contato" sm class="w-full" />
            </div>
        @endif
    </div>

    <x-modal wire:model.defer="showFormModal" max-width="sm">
        <div class="card w-full">
            <form wire:submit.prevent="submit">
                <div class="card-header">
                    <h3 class="card-title">{{ $formContact ? 'Editar' : 'Cadastrar' }} contato</h3>
                </div>
                <div class="card-body display">
                    <x-errors class="mb-4 shadow" />
                    <div class="grid sm:grid-cols-4 gap-2">
                        <div class="sm:col-span-4">
                            <x-native-select label="Campo" wire:model="field" required>
                                <option value="">Selecione</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="E-mail">E-mail</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                            </x-native-select>
                        </div>
                        <div class="sm:col-span-4">
                            @if ($field === 'WhatsApp')
                                <x-inputs.phone wire:model.defer="value" label="{{ $field }}"
                                    mask="['(##) ####-####', '(##) #####-####']" emitFormatted="true" required />
                            @elseif ($field === 'E-mail')
                                <x-input type="email" wire:model.defer="value" label="{{ $field }}"
                                    required />
                            @elseif ($field === 'Facebook' || $field === 'Instagram')
                                <x-input wire:model.defer="value" label="{{ $field }}" required />
                            @else
                                <p>Selecione o campo</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex justify-end gap-x-4">
                        <x-button label="Cancelar" sm flat x-on:click="close" />
                        <x-button type="submit" sm primary label="Salvar" />
                    </div>
                </div>
            </form>
        </div>
    </x-modal>
</div>
