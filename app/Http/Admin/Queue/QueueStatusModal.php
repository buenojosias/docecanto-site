<?php

namespace App\Http\Admin\Queue;

use App\Models\Queue;
use Livewire\Component;
use WireUi\Traits\Actions;

class QueueStatusModal extends Component
{
    use Actions;

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
            $this->notification()->success('Status alterado com sucesso.');
        } catch (\Throwable $th) {
            $this->notification()->error('Erro ao alterar status.');
            dd($th);
        }
    }

    public function render()
    {
        return view('admin.queue.queue-status-modal');
    }
}
