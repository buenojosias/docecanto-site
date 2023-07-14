<?php

namespace App\Http\Admin\Queue;

use App\Models\Queue;
use Livewire\Component;
use WireUi\Traits\Actions;

class QueueShow extends Component
{
    use Actions;

    public $queue;
    public $showStatusModal = false;

    public function mount(Queue $queue) {
        $this->queue = $queue;
        $this->queue->load('user');
    }

    public function openStatusModal()
    {
        $this->showStatusModal = true;
    }

    public function deleteQueue(): void
    {
        $this->dialog()->confirm([
            'title' => 'Deseja este item da fila de espera?',
            'method' => 'dodeleteQueue',
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function dodeleteQueue()
    {
        try {
            Queue::query()->findOrFail($this->queue->id)->delete();
            $this->notification()->success($description = 'Item removido.');
            return redirect()->route('queues.index');
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Erro ao remover item.');
            dump($th);
        }
    }


    public function render()
    {
        return view('admin.queue.queue-show');
    }
}
