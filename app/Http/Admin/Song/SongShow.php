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
    public $audio;

    public function mount($number)
    {
        $this->song = Song::query()->where('number', $number)->firstOrFail();
        $this->audio = $this->song->audio;
    }

    public function addDetach()
    {
        try {
            $this->song->update(['detached' => true]);
            $this->notification()->success($description = 'Música fixada.');
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao fixar música.');
        }
    }

    public function removeDetach()
    {
        try {
            $this->song->update(['detached' => false]);
            $this->notification()->success($description = 'Música desafixada.');
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao desafixar música.');
        }
    }

    public function render()
    {
        return view('admin.song.song-show');
    }
}
