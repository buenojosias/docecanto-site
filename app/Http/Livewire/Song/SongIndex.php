<?php

namespace App\Http\Livewire\Song;

use App\Models\Category;
use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class SongIndex extends Component
{
    use Actions;
    use WithPagination;

    public $categories;
    public $filter;

    public function mount()
    {
        $this->categories = Category::orderBy('position')->get();
    }

    public function selectCategory($category = null)
    {
        $this->filter = $category;
        $this->resetPage();
    }

    public function render()
    {
        $songs = Song::query()
            ->select(['id','number','title','detached'])
            ->when($this->filter, function($query) {
                $filter = $this->filter['id'];
                $query->whereHas('categories', function ($query) use ($filter) {
                    $query->where('id', $filter);
                });
            })
            ->orderBy('number')
            ->with('categories');

            if ($this->filter) {
                $songs = $songs->get();
            } else {
                $songs = $songs->paginate();
            }

        return view('livewire.song.song-index', [
            'songs' => $songs
        ]);
    }
}
