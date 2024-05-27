<?php

namespace App\Livewire\Audio;

use App\Models\Audio;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use ProtoneMedia\LaravelFFMpeg\Filesystem\Media;
// use WireUi\Traits\WireUiActions;

class AudioIndex extends Component
{
    // use WireUiActions;
    use WithFileUploads;

    public $song;
    public $audios;
    public $showUploadModal = false;
    public $file;
    public $type;
    public $validFile;
    private $filename, $path;
    public $types = [ 'Vocal', 'Playback', 'Guia', 'PB com guia' ];

    public function mount(Song $song)
    {
        $this->song = $song;
        $this->audios = $this->song->audios;
    }

    public function openUploadModal()
    {
        $this->showUploadModal = true;
    }

    public function updated() {
        $this->validate([
            'file' => 'required',
        ]);
        $this->validFile = $this->file;
    }

    public function submit()
    {
        $this->filename = $this->song->number .'-'. \Str::slug($this->song->title, '_').'-'.time();
        $this->path = $this->file->store('audios', 's3');

        if($this->path) {
            try {
                Song::query()->findOrFail($this->song->id)->audios()->create([
                    'type' => $this->type,
                    'filename' => $this->filename,
                    'path' => $this->path
                ]);
                $this->notification()->success('Áudio adicionado com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->success('Erro ao adicionar áudio.');
                dd($th);
            }
        }
    }

    public function deleteAudio($audio)
    {
        $this->dialog()->confirm([
            'title' => 'Deseja excluir este áudio?',
            'method' => 'doDeleteAudio',
            'params' => ['id' => $audio['id']],
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doDeleteAudio($id)
    {
        $audio = Audio::query()->findOrFail($id)->first();
        Storage::delete($audio->path);
        try {
            $audio->delete();
            $this->notification()->success('Áudio excluído com sucesso.');
        } catch (\Throwable $th) {
            $this->notification()->success('Erro ao excluir áudio.');
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.audio.audio-index');
    }
}
