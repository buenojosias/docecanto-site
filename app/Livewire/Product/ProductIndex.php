<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ProductIndex extends Component
{
    #[Computed]
    public function products()
    {
        return Product::query()
            ->orderBy('name')
            ->withCount('variants')
            ->get();
    }

    public function render(): View
    {
        return view('livewire.product.product-index')->title('Produtos');
    }
}
