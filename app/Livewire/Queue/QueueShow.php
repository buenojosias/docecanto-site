<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class QueueShow extends Component
{
    use Interactions;

    public $queue;

    public $showStatusModal = false;

    public function mount(Queue $queue)
    {
        $this->queue = $queue;
        $this->queue->load('user');
    }

    public function openStatusModal()
    {
        $this->showStatusModal = true;
    }

    public function deleteQueue(): void
    {
        $this->dialog()
            ->question('Deseja remover este item da lista de espera?')
            ->confirm('Confirmar', 'doDeleteQueue')
            ->cancel('Cancelar')
            ->send();
    }

    public function doDeleteQueue()
    {
        try {
            Queue::query()->findOrFail($this->queue->id)->delete();
            $this->dialog()->success('Item removido.')->send();

            return redirect()->route('queues.index');
        } catch (\Throwable $th) {
            $this->dialog()->error('Erro ao remover item.')->send();
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.queue.queue-show')->title('Fila de espera');
    }
}
