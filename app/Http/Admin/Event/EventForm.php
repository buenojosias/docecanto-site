<?php

namespace App\Http\Admin\Event;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class EventForm extends Component
{
    use Actions;
    use WithPagination;

    public function render()
    {
        return view('admin.event.event-form');
    }
}
