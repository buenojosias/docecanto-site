<?php

namespace App\Livewire\Event;

use App\Models\Member;
use Livewire\Component;

class EventMembers extends Component
{
    public $event;
    public $members;
    public $noAnswer;

    public function mount($event)
    {
        $this->event = $event;

        $this->members = Member::query()
            ->select(['id','name'])
            ->with('events', function($query){
                $query->where('event_id', $this->event->id);
            })
            ->where('status', 'ativo')
            ->orderBy('name')
            ->get();

        $this->noAnswer = Member::query()
            ->where('status', 'Ativo')
            ->whereDoesntHave('events', function ($query) {
            $query->where('event_id', $this->event->id);
        })->count();
    }

    public function render()
    {
        return view('livewire.event.event-members');
    }
}
