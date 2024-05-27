<div>
    <x-notifications />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $action === 'create' ? 'Cadastrar' : 'Editar' }} interessado
        </h2>
    </x-slot>
    <div class="sm:w-2/3 md:w-1/2 sm:mx-auto">
        <div class="card mb-4">
            <x-errors class="mb-4" />
            <div class="card-body display sm:grid sm:grid-cols-4 space-y-4 sm:space-y-0 gap-4">
                <div class="col-span-3">
                    <x-input wire:model.live="data.child_name" label="Nome da criança/adolescente" required />
                </div>
                <div>
                    <x-input wire:model.live="data.age" type="number" min="6" label="Idade" required />
                </div>
                <div class="col-span-4">
                    <x-input wire:model.live="data.parent_name" label="Nome do responsável" required />
                </div>
                <div class="col-span-2">
                    <x-phone wire:model.live="data.child_phone" label="WhatsApp da criança"
                        mask="['(##) ####-####', '(##) #####-####']" emitFormatted="true" />
                </div>
                <div class="col-span-2">
                    <x-phone wire:model.live="data.parent_phone" label="WhatsApp do responsável"
                        mask="['(##) ####-####', '(##) #####-####']" emitFormatted="true" />
                </div>
                <div class="col-span-2">
                    <x-input wire:model.live="data.church" label="Igreja" />
                </div>
                <div class="col-span-2">
                    <x-ts-select.native wire:model.live="data.status" label="Status" required>
                        <option value="">Selecione</option>
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-ts-select.native>
                </div>
            </div>

            <div class="card-footer">
                <x-ts-button wire:click="submit" primary label="Salvar" />
                @if ($action === 'edit')
                    <x-ts-button href="{{ route('queues.show', $data['id']) }}" flat label="Ir para ficha" />
                @endif
            </div>
        </div>

    </div>
</div>
