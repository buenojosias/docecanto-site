<?php

namespace App\Livewire\Audio;

use Livewire\Component;
// use WireUi\Traits\WireUiActions;

class AudioPlayer extends Component
{
    // use WireUiActions;

    public $media;
    public $path;

    public function mount($media)
    {
        $this->media = $media;
        // $this->path = $this->media->path;
    }

    public function render()
    {
        return view('livewire.audio.audio-player');
    }
}
