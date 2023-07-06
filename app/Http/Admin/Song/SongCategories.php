<?php

namespace App\Http\Admin\Song;

use Livewire\Component;
use WireUi\Traits\Actions;

class SongCategories extends Component
{
    use Actions;

    public $song;
    public $categories;

    public function mount($song)
    {
        $this->song = $song;
    }

    public function render()
    {
        $this->categories = $this->song->categories;

        return view('admin.song.song-categories');
    }
}
