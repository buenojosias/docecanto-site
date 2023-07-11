<?php

namespace App\Http\Admin\Event;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use WireUi\Traits\Actions;

class EventForm extends Component
{
    use Actions;

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
            $this->time = Carbon::createFromFormat('H:i:s', $this->event->time)->format('H:i');
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
                $this->notification()->success($description = 'Evento cadastrado com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar evento');
                dd($th);
            }
        } else {
            try {
                Event::query()->findOrFail($this->eventId)->update($data);
                $this->notification()->success($description = 'Alterações salvas com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao salvar alterações');
                dd($th);
            }
        }
    }

    public function render()
    {
        return view('admin.event.event-form');
    }
}
