<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class EventShow extends Component
{
    use WireUiActions;

    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.event-show');
    }
}
