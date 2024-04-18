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
                    <x-input wire:model="data.child_name" label="Nome da criança/adolescente" required />
                </div>
                <div>
                    <x-input wire:model="data.age" type="number" min="6" label="Idade" required />
                </div>
                <div class="col-span-4">
                    <x-input wire:model="data.parent_name" label="Nome do responsável" required />
                </div>
                <div class="col-span-2">
                    <x-phone wire:model="data.child_phone" label="WhatsApp da criança"
                        mask="['(##) ####-####', '(##) #####-####']" emitFormatted="true" />
                </div>
                <div class="col-span-2">
                    <x-phone wire:model="data.parent_phone" label="WhatsApp do responsável"
                        mask="['(##) ####-####', '(##) #####-####']" emitFormatted="true" />
                </div>
                <div class="col-span-2">
                    <x-input wire:model="data.church" label="Igreja" />
                </div>
                <div class="col-span-2">
                    <x-native-select wire:model="data.status" label="Status" required>
                        <option value="">Selecione</option>
                        @foreach ($options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </x-native-select>
                </div>
            </div>

            <div class="card-footer">
                <x-button wire:click="submit" primary label="Salvar" />
                @if ($action === 'edit')
                    <x-button href="{{ route('queues.show', $data['id']) }}" flat label="Ir para ficha" />
                @endif
            </div>
        </div>

    </div>
</div>
