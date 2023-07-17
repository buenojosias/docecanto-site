<?php

namespace App\Http\Admin\Media;

use Livewire\Component;
use WireUi\Traits\Actions;

class MediaPlayer extends Component
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
        return view('admin.media.media-player');
    }
}
