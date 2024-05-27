<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class CategoryIndex extends Component
{
    use Interactions;

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
            $this->data = [];
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
                $this->toast()->success('Categoria atualizada com sucesso.')->send();
                $this->showFormModal = false;
            } catch (\Throwable $th) {
                $this->dialog()->error('Erro ao atualizar categoria.')->send();
                dd($th);
            }
        } else {
            $data = $this->validate([
                'data.position' => 'required|integer',
                'data.name' => 'required|string|unique:categories,name'
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

    public function render()
    {
        $this->categories = Category::withCount('songs')->orderBy('position')->get();

        return view('livewire.category.category-index');
    }
}
