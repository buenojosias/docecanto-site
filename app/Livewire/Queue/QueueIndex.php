<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use Livewire\WithPagination;

class QueueIndex extends Component
{
    use WithPagination;

    public $queues;
    public $filterStatus;
    public $status_list = ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu'];

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
