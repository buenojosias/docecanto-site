<?php

namespace App\Livewire\Encounter;

use App\Models\Encounter;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EncounterForm extends Component
{
    use Interactions;

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
            'description' => 'nullable|string',
        ]);

        if ($this->action === 'create') {
            try {
                $this->encounter = Encounter::query()->create($data);
                $this->encounterId = $this->encounter->id;
                $this->toast()->success('Encontro cadastrado com sucesso.')->send();
                $this->action = 'edit';
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao cadastrar encontro.')->send();
                dd($th);
            }
        } else {
            try {
                Encounter::query()->findOrFail($this->encounterId)->update($data);
                $this->toast()->success('Alterações salvas com sucesso.')->send();
            } catch (\Throwable $th) {
                $this->toast()->error('Erro ao salvar alterações.')->send();
                dd($th);
            }
        }
    }

    public function render()
    {
        return view('livewire.encounter.encounter-form')->title($this->action === 'create' ? 'Cadastrar ensaio' : 'Editar ensaio');
    }
}
