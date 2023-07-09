<?php

namespace App\Http\Admin\Event;

use Livewire\Component;
use WireUi\Traits\Actions;

class EventMembers extends Component
{
    use Actions;

    public $event;
    public $mumbers;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('admin.event.event-members');
    }
}
