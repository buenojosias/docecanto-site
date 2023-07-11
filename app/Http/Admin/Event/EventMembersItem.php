<?php

namespace App\Http\Admin\Event;

use Livewire\Component;
use WireUi\Traits\Actions;

class EventMembersItem extends Component
{
    use Actions;

    public $event;
    public $member;

    public function mount($event, $member)
    {
        $this->event = $event;
        $this->member = $member;
        $this->member->event = $this->member->events->first();
        $this->member->answer = $this->member->event->pivot->answer ?? null;
    }

    public function render()
    {
        return view('admin.event.event-members-item');
    }
}
