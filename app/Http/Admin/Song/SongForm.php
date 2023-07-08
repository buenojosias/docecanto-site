<?php

namespace App\Http\Admin\Song;

use App\Models\Song;
use Livewire\Component;
use WireUi\Traits\Actions;

class SongForm extends Component
{
    use Actions;

    public $song;
    public $categories;
    public $songId, $number, $title, $resume, $lyrics, $fulltext, $detached;
    public $action;

    public function mount($number = null)
    {
        if ($number) {
            $this->song = Song::query()->where('number', $number)->firstOrFail();
            $this->songId = $this->song->id;
            $this->number = $this->song->number;
            $this->title = $this->song->title;
            $this->resume = $this->song->resume;
            $this->lyrics = $this->song->lyrics;
            $this->fulltext = $this->song->fulltext;
            $this->detached = $this->song->detached;
            $this->action = 'edit';
        } else {
            $this->action = 'create';
        }
    }

    public function submit()
    {
        $this->generateFullText();
        if ($this->action === 'create') {
            $data = $this->validate([
                'number' => 'required|integer|unique:songs,number',
                'title' => 'required|string',
                'resume' => 'required|string|max:255',
                'lyrics' => 'required',
                'fulltext' => 'required|string',
            ]);
            try {
                $this->song = Song::query()->create($data);
                $this->songId = $this->song->id;
                $this->notification()->success($description = 'Música cadastrada com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar música');
                dd($th);
            }
        } else {
            $data = $this->validate([
                'number' => 'required|integer|unique:songs,number,'.$this->songId,
                'title' => 'required|string',
                'resume' => 'required|string|max:255',
                'lyrics' => 'required',
                'fulltext' => 'required|string',
            ]);
            try {
                Song::query()->findOrFail($this->songId)->update($data);
                $this->notification()->success($description = 'Alterações salvas com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao salvar atualizações');
                dd($th);
            }
        }
    }

    public function generateFullText()
    {
        $temp_fulltext = preg_replace('#<[^>]+>#', ' ', $this->lyrics);
        $temp_fulltext = preg_replace('#\s+#', ' ', $temp_fulltext);
        $temp_fulltext = preg_replace(array("/(á|à|ã|â|ä|Á|À|Ã|Â|Ä)/","/(é|è|ê|ë|É|È|Ê|Ë)/","/(í|ì|î|ï|Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö|Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü|Ú|Ù|Û|Ü)/","/(ç|Ç)/","/(ñ|Ñ)/","/(1. |2. |3. |4. |5. |6. )/"),explode(" ","a e i o u c n "), $temp_fulltext);
        $temp_fulltext = strtolower($temp_fulltext);
        $this->fulltext = trim($temp_fulltext);
    }

    public function render()
    {
        return view('admin.song.song-form');
    }
}
