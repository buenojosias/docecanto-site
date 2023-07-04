<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $method === 'create' ? 'Novo' : 'Editar' }} integrante
        </h2>
    </x-slot>
    <form wire:submit.prevent="submit">
        <x-errors class="mb-4 shadow" />
        <div class="form-card mb-4">
            <div class="heading">
                <h3>Informações pessoais</h3>
            </div>
            <div class="body">
                <div class="grid sm:grid-cols-4 gap-4">
                    <div class="sm:col-span-4">
                        <x-input wire:model.defer="name" label="Nome" placeholder="Informe o nome completo" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input type="date" wire:model.defer="birth" label="Data de nascimento" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input type="date" wire:model.defer="registration_date" label="Data de cadastro" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-native-select wire:model.defer="status" label="Status">
                            <option value="">Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                            <option value="Afastado">Afastado</option>
                            <option value="Desistente">Desistente</option>
                        </x-native-select>
                    </div>
                </div>
            </div>
            <div class="footer">
                <x-button sm primary type="submit" primary label="Salvar" />
            </div>
            {{-- <div class="heading border-t">
                <h3>Informações parentais</h3>
            </div>
            <div class="body border-t">dsf</div>
            <div class="heading border-t">
                <h3>Informações de contato</h3>
            </div>
            <div class="body border-t">dsf</div> --}}
        </div>
    </form>
</div>
