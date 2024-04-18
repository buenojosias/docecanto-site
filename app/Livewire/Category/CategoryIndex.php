<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class CategoryIndex extends Component
{
    use WireUiActions;

    public $categories;
    public $showFormModal = false;

    public $action;
    public $data;

    public function openFormModal($category = null)
    {
        if ($category) {
            $this->data = $category;
            $this->action = 'edit';
        } else {
            $this->data = null;
            $this->action = 'create';
        }
        $this->showFormModal = true;
    }

    public function submit()
    {
        if ($this->action === 'edit') {
            $data = $this->validate([
                'data.position' => 'required|integer',
                'data.name' => 'required|string|unique:categories,name,'.$this->data['id']
            ]);
            try {
                Category::query()->find($this->data['id'])->update($this->data);
                $this->notification()->success($description = 'Categoria atualizada com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->dialog()->error($description = 'Erro ao atualizar categoria.');
                dd($th);
            }
        } else {
            $data = $this->validate([
                'data.position' => 'required|integer',
                'data.name' => 'required|string|unique:categories,name'
            ]);
            try {
                Category::query()->create($this->data);
                $this->notification()->success($description = 'Categoria adicionada com sucesso.');
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->dialog()->error($description = 'Erro ao adicionar categoria.');
                dd($th);
            }
        }
    }

    public function render()
    {
        $this->categories = Category::withCount('songs')->orderBy('position')->get();

        return view('livewire.category.category-index');
    }
}
