<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use Livewire\WithPagination;
// use WireUi\Traits\WireUiActions;

class QueueIndex extends Component
{
    // use WireUiActions;
    use WithPagination;

    public $queues;
    public $filterStatus;
    public $status_list = ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu'];

    public function mount()
    {

    }

    public function render()
    {
        $this->queues = Queue::query()
            ->when($this->filterStatus, function ($query) {
                $query->where('status', $this->filterStatus);
            })
            ->get();

        return view('livewire.queue.queue-index');
    }
}
