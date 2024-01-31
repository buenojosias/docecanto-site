<?php

namespace App\Http\Livewire\Encounter;

use App\Models\Encounter;
use Livewire\Component;
use WireUi\Traits\Actions;

class EncounterForm extends Component
{
    use Actions;

    public $action;
    public $encounter;
    public $encounterId;
    public $date;
    public $description;

    public function mount($encounter = null)
    {
        if ($encounter) {
            $this->encounter = Encounter::findOrFail($encounter);
            $this->encounterId = $this->encounter->id;
            $this->date = $this->encounter->date;
            $this->description = $this->encounter->description;
            $this->action = 'edit';
        } else {
            $this->action = 'create';
        }
    }

    public function submit()
    {
        $data = $this->validate([
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        if ($this->action === 'create') {
            try {
                $this->encounter = Encounter::query()->create($data);
                $this->encounterId = $this->encounter->id;
                $this->action = 'edit';
                $this->notification()->success($description = 'Encontro cadastrado com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar encontro');
                dd($th);
            }
        } else {
            try {
                Encounter::query()->findOrFail($this->encounterId)->update($data);
                $this->notification()->success($description = 'Alterações salvas com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao salvar alterações');
                dd($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.encounter.encounter-form');
    }
}
