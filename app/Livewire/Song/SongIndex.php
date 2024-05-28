<?php

namespace App\Livewire\Song;

use App\Models\Category;
use App\Models\Song;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class SongIndex extends Component
{
    use Interactions;
    use WithPagination;

    public $categories;

    #[Url('categoria', except: null)]
    public $filter = null;

    #[Url('destacadas', except: false)]
    public $detached = false;

    public function mount()
    {
        $this->categories = Category::orderBy('position')->get();
    }

    public function selectCategory($category = null)
    {
        $this->filter = $category;
        // $this->resetPage();
    }

    public function render()
    {
        $songs = Song::query()
            ->select(['id','number','title','detached'])
            ->when($this->filter, function($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('id', $this->filter);
                });
            })
            ->when($this->detached, function($query) {
                $query->where('detached', true);
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
