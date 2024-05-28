<?php

namespace App\Livewire\Audio;

use App\Models\Audio;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use ProtoneMedia\LaravelFFMpeg\Filesystem\Media;
use TallStackUi\Traits\Interactions;

class AudioIndex extends Component
{
    use Interactions;
    use WithFileUploads;

    public $song;
    public $audios;
    public $showUploadModal = false;
    public $file;
    public $type;
    public $validFile;
    private $filename, $path;
    public $types = ['Vocal', 'Playback', 'Guia', 'PB com guia'];

    public function mount(Song $song)
    {
        $this->song = $song;
        $this->audios = $this->song->audios;
    }

    public function openUploadModal()
    {
        $this->showUploadModal = true;
    }

    public function updated()
    {
        $this->validate([
            'file' => 'required',
        ]);
        $this->validFile = $this->file;
    }

    public function submit()
    {
        $this->filename = $this->song->number . '-' . \Str::slug($this->song->title, '_') . '-' . time();
        $this->path = $this->file->store('audios', 's3');

        if ($this->path) {
            try {
                Song::query()->findOrFail($this->song->id)->audios()->create([
                    'type' => $this->type,
                    'filename' => $this->filename,
                    'path' => $this->path
                ]);
                $this->showUploadModal = false;
                $this->toast()->success('Áudio adicionado com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->success('Erro ao adicionar áudio.')->send();
                dd($th);
            }
        }
    }

    public function deleteAudio($audio)
    {
        $this->dialog()
            ->question('Deseja excluir este áudio?')
            ->confirm('Confirmar', 'doDeleteAudio', $audio['id'])
            ->cancel('Cancelar')
            ->send();
    }

    public function doDeleteAudio($id)
    {
        $audio = Audio::query()->findOrFail($id)->first();
        if (Storage::delete($audio->path)) {
            try {
                $audio->delete();
                $this->toast()->success('Áudio excluído com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->success('Erro ao excluir áudio.')->send();
                dd($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.audio.audio-index');
    }
}
