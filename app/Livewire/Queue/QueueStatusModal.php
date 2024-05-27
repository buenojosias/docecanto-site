<?php

namespace App\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class QueueStatusModal extends Component
{
    use Interactions;

    public $statusModal = true;
    public $queue;
    public $status;
    public $options = ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu'];

    public function mount($queue)
    {
        $this->queue = $queue;
        $this->status = $queue->status;
    }

    public function submit()
    {
        $data = $this->validate([
            'status' => 'required|string|in:' . implode(',', $this->options),
        ]);

        try {
            Queue::query()->findOrFail($this->queue->id)->update($data);
            $this->toast()->success('Status alterado com sucesso.')->send();
            $this->statusModal = false;
        } catch (\Throwable $th) {
            $this->toast()->error('Erro ao alterar status.')->send();
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.queue.queue-status-modal');
    }
}
