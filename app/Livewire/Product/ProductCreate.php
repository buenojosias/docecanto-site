<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ProductCreate extends Component
{
    use Interactions;

    public string $name = '';

    public ?string $description = null;

    public bool $is_active = true;

    public array $variants = [];

    public function mount(): void
    {
        $this->addVariant();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'variants' => 'required|array|min:1',
            'variants.*.cost_price' => 'nullable|numeric|min:0',
            'variants.*.sale_price' => 'required|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:0',
            'variants.*.attributes' => 'nullable|array',
            'variants.*.is_active' => 'boolean',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'is_active' => 'ativo',
            'variants' => 'variações',
            'variants.*.cost_price' => 'preço de custo',
            'variants.*.sale_price' => 'preço de venda',
            'variants.*.stock_quantity' => 'quantidade em estoque',
            'variants.*.attributes' => 'atributos',
            'variants.*.is_active' => 'ativo',
        ];
    }

    public function addVariant(): void
    {
        $this->variants[] = [
            'attributes' => [],
            'cost_price' => null,
            'sale_price' => null,
            'stock_quantity' => 0,
            'is_active' => true,
        ];
    }

    public function addAttribute(int $variantIndex): void
    {
        $this->variants[$variantIndex]['attributes'][] = ['key' => '', 'value' => ''];
    }

    public function removeAttribute(int $variantIndex, int $attributeIndex): void
    {
        unset($this->variants[$variantIndex]['attributes'][$attributeIndex]);
        $this->variants[$variantIndex]['attributes'] = array_values($this->variants[$variantIndex]['attributes']);
    }

    public function removeVariant(int $index): void
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);

        if (empty($this->variants)) {
            $this->addVariant();
        }
    }

    public function submit(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $product = Product::query()->create([
                'name' => $this->name,
                'description' => $this->description,
                'is_active' => $this->is_active,
            ]);

            foreach ($this->variants as $variant) {
                $attributes = null;
                if (!empty($variant['attributes'])) {
                    $attributes = collect($variant['attributes'])
                        ->filter(fn($attr) => !empty($attr['key']))
                        ->pluck('value', 'key')
                        ->toArray();
                }

                $product->variants()->create([
                    'cost_price' => $variant['cost_price'] === '' ? null : $variant['cost_price'],
                    'sale_price' => $variant['sale_price'],
                    'stock_quantity' => $variant['stock_quantity'],
                    'attributes' => empty($attributes) ? null : $attributes,
                    'is_active' => $variant['is_active'],
                ]);
            }

            DB::commit();

            $this->reset(['name', 'description', 'is_active', 'variants']);
            $this->addVariant();

            $this->toast()->success('Produto cadastrado com sucesso.')->send();

            $this->dispatch('product-created');

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dialog()->error('Erro ao cadastrar produto.')->send();
            report($th);
        }
    }

    public function render(): View
    {
        return view('livewire.product.product-create');
    }
}
