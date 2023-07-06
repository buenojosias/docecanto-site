<?php

namespace App\Http\Admin\Song;

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
    public $songs;

    public function mount($category = null)
    {
        $this->categories = Category::orderBy('position')->get();
        if($category) {
            $category = Category::find($category);
            $this->songs = $category->songs()->with('categories')->orderBy('number')->get();
        } else {
            $this->songs = Song::with('categories')->orderBy('number')->get();
        }
    }

    public function render()
    {
        return view('admin.song.song-index');
    }
}
