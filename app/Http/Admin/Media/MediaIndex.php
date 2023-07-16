<?php

namespace App\Http\Admin\Media;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class MediaIndex extends Component
{
    use Actions;
    use WithFileUploads;

    public $song;
    public $audio;
    public $validAudio;
    public $showUploadModal = false;

    public function mount($song)
    {
        $this->song = $song;
        $this->openUploadModal();
    }

    public function openUploadModal()
    {
        $this->showUploadModal = true;
    }

    // public function updated() {
        // dd('abc');
        // $this->validate([
        //     'audio' => 'mimetypes:audio/mp3',
        // ]);
        // $this->validAudio = $this->audio;
    // }

    public function submit()
    {
        $this->audio->store('media');
    }

    public function render()
    {
        return view('admin.media.media-index');
    }
}
