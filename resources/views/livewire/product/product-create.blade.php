<div>
    <x-ts-modal id="create-product-modal" title="Cadastrar Produto" size="4xl">
        <form wire:submit="submit" id="create-product-form" class="space-y-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <x-ts-input wire:model="name" label="Nome do produto" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-textarea wire:model="description" label="Descrição" />
                </div>
                <div class="sm:col-span-2">
                    <x-ts-toggle wire:model="is_active" label="Ativo" />
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Variações</h3>
                    <x-ts-button text="Adicionar variação" wire:click="addVariant" size="sm" icon="plus" position="left" />
                </div>

                <x-ts-errors />

                <div class="space-y-4">
                    @foreach ($variants as $index => $variant)
                        <div class="p-4 border rounded-lg dark:border-gray-700 relative" wire:key="variant-{{ $index }}">
                            <div class="absolute top-2 right-2">
                                <x-ts-button icon="trash" color="red" wire:click="removeVariant({{ $index }})" flat sm />
                            </div>

                            <h4 class="font-medium mb-4">Variação #{{ $index + 1 }}</h4>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <x-ts-input wire:model="variants.{{ $index }}.cost_price" label="Preço de Custo" type="number" step="0.01" prefix="R$" />
                                <x-ts-input wire:model="variants.{{ $index }}.sale_price" label="Preço de Venda" type="number" step="0.01" prefix="R$" />
                                <x-ts-input wire:model="variants.{{ $index }}.stock_quantity" label="Quantidade em Estoque" type="number" />

                                <div class="sm:col-span-3 mt-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Atributos (Ex: Cor, Tamanho)</label>
                                    <div class="space-y-2">
                                        @foreach ($variant['attributes'] ?? [] as $attrIndex => $attribute)
                                            <div class="flex items-center gap-2" wire:key="variant-{{ $index }}-attr-{{ $attrIndex }}">
                                                <div class="flex-1">
                                                    <x-ts-input wire:model="variants.{{ $index }}.attributes.{{ $attrIndex }}.key" placeholder="Nome (Ex: Cor)" />
                                                </div>
                                                <div class="flex-1">
                                                    <x-ts-input wire:model="variants.{{ $index }}.attributes.{{ $attrIndex }}.value" placeholder="Valor (Ex: Azul)" />
                                                </div>
                                                <div>
                                                    <x-ts-button icon="trash" color="red" wire:click="removeAttribute({{ $index }}, {{ $attrIndex }})" flat sm />
                                                </div>
                                            </div>
                                        @endforeach
                                        <x-ts-button text="Adicionar atributo" wire:click="addAttribute({{ $index }})" size="sm" flat />
                                    </div>
                                </div>

                                <div class="sm:col-span-3 mt-2">
                                    <x-ts-toggle wire:model="variants.{{ $index }}.is_active" label="Ativo" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if(empty($variants))
                    <div class="text-center text-red-500 mt-4">
                        É necessário adicionar pelo menos uma variação.
                    </div>
                @endif
            </div>
        </form>

        <x-slot:footer>
            <x-ts-button text="Cancelar" x-on:click="$modalClose('create-product-modal')" flat />
            <x-ts-button type="submit" form="create-product-form" text="Salvar" />
        </x-slot:footer>
    </x-ts-modal>
</div>
