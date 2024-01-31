<?php

namespace App\Http\Livewire\Queue;

use App\Models\Queue;
use Livewire\Component;
use WireUi\Traits\Actions;

class QueueForm extends Component
{
    use Actions;

    public $action;
    public $data;
    // public $child_name;
    // public $child_phone;
    // public $parent_name;
    // public $parent_phone;
    // public $age;
    // public $church;
    // public $status;
    public $options = ['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu'];

    public function mount($queue = null)
    {
        if ($queue) {
            $this->data = Queue::findOrFail($queue)->toArray();
            $this->action = 'edit';
        } else {
            $this->data['child_phone'] = '';
            $this->data['parent_phone'] = '';
            $this->action = 'create';
        }

    }

    public function submit() {
        $data = $this->validate([
            'data.child_name' => 'required|string|max:160',
            'data.age' => 'required|integer|min:6|max:16',
            'data.parent_name' => 'required|string|max:160',
            'data.child_phone' => 'nullable|string|max:15',
            'data.parent_phone' => 'nullable|required_if:child_phone,null|max:15',
            'data.church' => 'nullable|string|max:160',
            'data.status' => 'required|string|in:' . implode(',', $this->options),
        ]);
        try {
            if ($this->action === 'create') {
                $this->data = Queue::create($this->data)->toArray();
                $this->action = 'edit';
            } else {
                Queue::query()->findOrFail($this->data['id'])->update($this->data);
            }
            $this->notification()->success('Informações salvas com sucesso.');
            return;
        } catch (\Throwable $th) {
            $this->notification()->error('Erro ao salvar informações.');
            dump($th);
        }
    }

    public function render()
    {
        return view('livewire.queue.queue-form');
    }
}
