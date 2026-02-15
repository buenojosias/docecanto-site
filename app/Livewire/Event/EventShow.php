<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EventShow extends Component
{
    use Interactions;

    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.event-show')->title('Detalhes do evento');
    }
}
