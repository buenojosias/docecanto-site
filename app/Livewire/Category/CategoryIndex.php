<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CategoryIndex extends Component
{
    use Interactions;

    public bool $showFormModal = false;

    public ?string $action = null;

    public array $data = [];

    #[Computed]
    public function categories(): Collection
    {
        return Category::withCount('songs')->orderBy('position')->get();
    }

    public function openFormModal($category = null): void
    {
        if ($category) {
            $this->data = $category;
            $this->action = 'edit';
        } else {
            $this->data = [];
            $this->action = 'create';
        }
        $this->showFormModal = true;
    }

    public function submit(): void
    {
        if ($this->action === 'edit') {
            $data = $this->validate([
                'data.position' => 'required|integer',
                'data.name' => 'required|string|unique:categories,name,'.$this->data['id'],
            ]);
            try {
                Category::query()->find($this->data['id'])->update($this->data);
                $this->toast()->success('Categoria atualizada com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->dialog()->error('Erro ao atualizar categoria.')->send();
                dd($th);
            }
        } else {
            $data = $this->validate([
                'data.position' => 'required|integer',
                'data.name' => 'required|string|unique:categories,name',
            ]);
            try {
                Category::query()->create($this->data);
                $this->toast()->success('Categoria adicionada com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->dialog()->error('Erro ao adicionar categoria.')->send();
                dd($th);
            }
        }
    }

    public function render(): View
    {
        return view('livewire.category.category-index')->title('Categorias');
    }
}
