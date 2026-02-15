<?php

namespace App\Livewire\Audio;

use Livewire\Component;

class AudioPlayer extends Component
{
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
