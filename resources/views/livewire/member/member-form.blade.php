<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>{{ $method === 'create' ? 'Novo' : 'Editar' }} coralista</h2>
        </div>
    </div>
    <form wire:submit="submit">
        <x-ts-errors class="mb-4 shadow" />
        <div class="form-card mb-4">
            <div class="heading">
                <h3>Informações pessoais</h3>
            </div>
            <div class="body">
                <div class="grid sm:grid-cols-4 gap-4">
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
                </div>
            </div>
            <div class="footer">
                <x-ts-button primary type="submit" primary text="Salvar" />
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
