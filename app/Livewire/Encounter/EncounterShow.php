<?php

namespace App\Livewire\Encounter;

use App\Models\Encounter;
use Livewire\Component;

class EncounterShow extends Component
{
    public $encounter;

    public function mount($encounter)
    {
        $this->encounter = Encounter::query()->findOrFail($encounter);
    }

    public function render()
    {
        return view('livewire.encounter.encounter-show');
    }
}
