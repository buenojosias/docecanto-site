<?php

namespace App\Http\Admin\Queue;

use App\Models\Queue;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class QueueIndex extends Component
{
    use Actions;
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

        return view('admin.queue.queue-index');
    }
}
