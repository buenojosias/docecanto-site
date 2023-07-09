<?php

namespace App\Http\Admin\Event;

use App\Models\Event;
use Livewire\Component;
use WireUi\Traits\Actions;

class EventShow extends Component
{
    use Actions;

    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('admin.event.event-show');
    }
}
