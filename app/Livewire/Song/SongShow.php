<?php

namespace App\Livewire\Song;

use App\Models\Song;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class SongShow extends Component
{
    use Interactions;

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
            $this->toast()->success('Música fixada.')->send();
        } catch (\Throwable $th) {
            $this->toast()->error('Erro ao fixar música.')->send();
        }
    }

    public function removeDetach()
    {
        try {
            $this->song->update(['detached' => false]);
            $this->toast()->success('Música desafixada.')->send();
        } catch (\Throwable $th) {
            $this->toast()->error('Erro ao desafixar música.')->send();
        }
    }

    public function render()
    {
        return view('livewire.song.song-show')->title('Música');
    }
}
