<?php

namespace App\Http\Admin\Event;

use App\Models\Category;
use App\Models\Song;
use Livewire\Component;
use WireUi\Traits\Actions;

class EventSongs extends Component
{
    use Actions;

    public $event;
    public $songs;
    public $dataCategory, $dataSong, $dataComment;
    public $inputCategories;
    public $inputSongs = [];
    public $showFormModal;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function openFormModal()
    {
        $this->inputCategories = Category::all();
        $this->dataCategory = $this->dataSong = null;
        $this->showFormModal = true;
    }

    public function submit()
    {
        if (! $this->inputSongs)
            return;
        $availableSongs = $this->inputSongs->pluck('id')->toArray();
        if (is_numeric($this->dataSong) && in_array($this->dataSong, $availableSongs)) {
            try {
                $this->event->songs()->attach($this->dataSong, ['comment' => $this->dataComment]);
                $this->notification()->success('Música adicionada com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error('Erro ao adicionar música.');
                dd($th);
            }
        }
    }

    public function removeSong($song): void
    {
        $this->dialog()->confirm([
            'title' => 'Deseja remover esta música do evento?',
            'method' => 'doRemoveSong',
            'params' => ['id' => $song],
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doRemoveSong($id)
    {
        try {
            $this->event->songs()->detach($id);
            $this->notification()->success($description = 'Músicas removida com sucesso.');
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao remover música.');
            dump($th);
        }
    }

    public function render()
    {
        $this->songs = $this->event->songs()->orderBy('number')->get();
        if ($this->dataCategory) {
            $this->inputSongs = Song::query()
                ->whereHas('categories', function ($query) {
                    $query->where('id', $this->dataCategory);
                })
                ->whereDoesntHave('events', function($query) {
                    $query->where('id', $this->event->id);
                })
                ->orderBy('number')
                ->get();
        }
        return view('admin.event.event-songs');
    }
}
