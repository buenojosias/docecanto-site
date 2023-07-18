<?php

namespace App\Http\Admin\Audio;

use Livewire\Component;
use WireUi\Traits\Actions;

class AudioPlayer extends Component
{
    use Actions;

    public $media;
    public $path;

    public function mount($media)
    {
        $this->media = $media;
        // $this->path = $this->media->path;
    }

    public function render()
    {
        return view('admin.audio.audio-player');
    }
}
