<?php

namespace App\Livewire\Song;

use App\Models\Category;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongCategories extends Component
{
    use Interactions;

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
                $this->toast()->success('Categoria adicionada com sucesso.')->send();
                $this->selectedCategory = null;
            } catch (\Throwable $th) {
                $this->dialog()->error('Erro ao adicionar categoria.')->send();
            }
        }
    }

    public function removeCategory($category)
    {
        $this->dialog()
            ->question('Deseja desvincular esta categoria?')
            ->confirm('Confirmar', 'doRemoveCategory', $category['id'])
            ->cancel('Cancelar')
            ->send();
    }

    public function doRemoveCategory($id)
    {
        try {
            $this->song->categories()->detach($id);
            $this->showModal = false;
            $this->toast()->success('Categoria desvinculada com sucesso.')->send();
        } catch (\Throwable $th) {
            $this->dialog()->error('Erro ao desvincular categoria.')->send();
        }
    }

    public function render()
    {
        $this->song->load('categories');

        return view('livewire.song.song-categories');
    }
}
