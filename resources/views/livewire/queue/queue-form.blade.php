<div class="space-y-6">
    <div class="page-header">
        <div class="title">
            <h2>{{ $action === 'create' ? 'Cadastrar interessado' : 'Editar interessado' }}</h2>
        </div>
    </div>
    <div class="sm:w-2/3 md:w-1/2 sm:mx-auto">
        <div class="card mb-4">
            <x-ts-errors class="mb-4" />
            <div class="card-body display sm:grid sm:grid-cols-4 space-y-4 sm:space-y-0 gap-4">
                <div class="col-span-3">
                    <x-ts-input wire:model="data.child_name" label="Nome da criança/adolescente" required />
                </div>
                <div>
                    <x-ts-input wire:model="data.age" type="number" min="6" label="Idade" required />
                </div>
                <div class="col-span-4">
                    <x-ts-input wire:model="data.parent_name" label="Nome do responsável" required />
                </div>
                <div class="col-span-2">
                    <x-ts-input wire:model="data.child_phone" label="WhatsApp da criança"
                        x-mask="(99) 99999-9999" />
                </div>
                <div class="col-span-2">
                    <x-ts-input wire:model="data.parent_phone" label="WhatsApp do responsável"
                        x-mask="(99) 99999-9999" />
                </div>
                <div class="col-span-2">
                    <x-ts-input wire:model="data.church" label="Igreja" />
                </div>
                <div class="col-span-2">
                    <x-ts-select.native wire:model="data.status" label="Status" required>
                        <option value="">Selecione</option>
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-ts-select.native>
                </div>
            </div>

            <div class="card-footer">
                <x-ts-button wire:click="submit" primary text="Salvar" />
                @if ($action === 'edit')
                    <x-ts-button href="{{ route('queues.show', $data['id']) }}" color="white" text="Ir para ficha" />
                @endif
            </div>
        </div>

    </div>
</div>
