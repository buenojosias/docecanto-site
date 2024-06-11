<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventForm extends Component
{
    use Interactions;

    public $action;
    public $event;
    public $eventId;
    public $title;
    public $local;
    public $date;
    public $time;
    public $is_presentation = false;
    public $description;

    public function mount($event = null)
    {
        if ($event) {
            $this->event = Event::findOrFail($event);
            $this->eventId = $this->event->id;
            $this->title = $this->event->title;
            $this->local = $this->event->local;
            $this->date = $this->event->date;
            if ($this->event->time) {
                $this->time = Carbon::createFromFormat('H:i:s', $this->event->time)->format('H:i');
            } else {
                $this->time = null;
            }
            $this->is_presentation = $this->event->is_presentation;
            $this->description = $this->event->description;
            $this->action = 'edit';
        } else {
            $this->action = 'create';
        }
    }

    public function submit()
    {
        $data = $this->validate([
            'title' => 'required|string|max:255',
            'local' => 'nullable|string|max:255',
            'date' => 'required|date|after:now',
            'time' => 'nullable|date_format:H:i',
            'is_presentation' => 'required|boolean',
            'description' => 'required|string|'
        ]);

        if ($this->action === 'create') {
            try {
                $this->event = Event::query()->create($data);
                $this->eventId = $this->event->id;
                $this->action = 'edit';
                $this->toast()->success('Evento cadastrado com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao cadastrar evento')->send();
                dd($th);
            }
        } else {
            try {
                Event::query()->findOrFail($this->eventId)->update($data);
                $this->toast()->success('Alterações salvas com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao salvar alterações')->send();
                dd($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.event.event-form');
    }
}
