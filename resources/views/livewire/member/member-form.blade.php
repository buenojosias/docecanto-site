<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>{{ $method === 'create' ? 'Novo' : 'Editar' }} coralista</h2>
        </div>
    </div>

    <x-ts-card class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="font-semibold">
            <h3>Informações pessoais</h3>
        </div>
        <div class="col-span-2">
            <form wire:submit="submit" id="member-form" class="grid sm:grid-cols-4 gap-4">
                <div class="sm:col-span-4">
                    <x-ts-input wire:model="name" label="Nome" placeholder="Informe o nome completo" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-input type="date" wire:model="birth" label="Data de nascimento" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-input type="date" wire:model="registration_date" label="Data de cadastro" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-select.native wire:model="status" label="Status">
                        <option value="">Selecione</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                        <option value="Afastado">Afastado</option>
                        <option value="Desistente">Desistente</option>
                    </x-ts-select.native>
                </div>
            </form>
        </div>
        <x-slot:footer>
            <x-ts-button primary type="submit" form="member-form" primary text="Salvar" />
        </x-slot:footer>
    </x-ts-card>
</div>
