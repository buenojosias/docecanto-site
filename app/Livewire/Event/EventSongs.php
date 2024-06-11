<?php

namespace App\Livewire\Event;

use App\Models\Category;
use App\Models\Song;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventSongs extends Component
{
    use Interactions;

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
                $this->toast()->success('Música adicionada com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao adicionar música.')->send();
                dd($th);
            }
        }
    }

    public function removeSong($song): void
    {
        $this->dialog()
            ->question('Deseja remover esta música do evento?')
            ->confirm(method: 'doRemoveSong', params: $song)
            ->cancel()
            ->send();
    }

    public function doRemoveSong($id)
    {
        try {
            $this->event->songs()->detach($id);
            $this->toast()->success($description = 'Músicas removida com sucesso.')->send();
            $this->showFormModal = false;
        } catch (\Throwable $th) {
            $this->toast()->error($description = 'Erro ao remover música.')->send();
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
        return view('livewire.event.event-songs');
    }
}
