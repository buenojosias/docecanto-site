<?php

namespace App\Http\Admin\Song;

use App\Models\Song;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class SongShow extends Component
{
    use Actions;
    use WithPagination;

    public $song;
    public $media;

    public function mount(Song $song)
    {
        $this->song = $song;
        $this->media = $song->media;
    }

    public function render()
    {
        return view('admin.song.song-show');
    }
}
