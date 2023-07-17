<?php

namespace App\Http\Admin\Media;

use App\Models\Song;
use Illuminate\Support\Facades\Storage;
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
    public $showPlayer = false;
    public $selectedMedia;
    private $path;
    public $media;

    public function mount(Song $song)
    {
        $this->song = $song;
        $this->media = $this->song->media;
    }

    public function openUploadModal()
    {
        $this->showUploadModal = true;
    }

    public function updated() {
        $this->validate([
            'audio' => 'required',
        ]);
        $this->validAudio = $this->audio;
    }

    public function submit()
    {
        $this->path = $this->audio->store('media', 's3');

        if($this->path) {
            try {
                Song::query()->findOrFail($this->song->id)->media()->create([
                    'type' => 'Música',
                    'path' => $this->path
                ]);
                $this->notification()->success('Mídia adicionada com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->success('Erro ao adicionar mídia.');
                dd($th);
            }
        }
    }

    public function openPlayer($media)
    {
        if ($this->selectedMedia) {
            $this->selectedMedia = $media;
            $this->showPlayer = false;
        }

        $this->selectedMedia = $media;
        $this->showPlayer = true;
    }

    public function closePlayer()
    {
        $this->showPlayer = false;
        $this->selectedMedia = null;
    }

    public function render()
    {
        return view('admin.media.media-index');
    }
}
