<?php

namespace App\Livewire\Song;

use App\Models\Category;
use Livewire\Component;
// use WireUi\Traits\WireUiActions;

class SongCategories extends Component
{
    // use WireUiActions;

    public $song;
    public $categories;
    public $showModal = false;
    public $selectedCategory;

    public function mount($song)
    {
        $this->song = $song;
    }

    public function openModal()
    {
        $this->categories = Category::query()->whereNotIn('id', $this->song->categories->pluck('id'))->get();
        $this->showModal = true;
    }

    public function submit()
    {
        $cats = $this->categories->pluck('id')->toArray();
        if (in_array($this->selectedCategory, $cats)) {
            try {
                $this->song->categories()->attach($this->selectedCategory);
                $this->showModal = false;
                $this->notification()->success($description = 'Categoria adicionada com sucesso.');
                $this->selectedCategory = null;
            } catch (\Throwable $th) {
                $this->dialog()->error($description = 'Erro ao adicionar categoria.');
            }
        }
    }

    public function removeCategory($category)
    {
        $this->dialog()->confirm([
            'title' => 'Deseja desvincular esta categoria?',
            'method' => 'doRemoveCategory',
            'params' => ['category' => $category['id']],
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doRemoveCategory($id)
    {
        try {
            $this->song->categories()->detach($id);
            $this->showModal = false;
            $this->notification()->success($description = 'Categoria desvinculada com sucesso.');
        } catch (\Throwable $th) {
            $this->dialog()->error($description = 'Erro ao desvincular categoria.');
        }
    }

    public function render()
    {
        $this->song->load('categories');

        return view('livewire.song.song-categories');
    }
}
