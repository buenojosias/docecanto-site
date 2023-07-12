<?php

namespace App\Http\Admin\Encounter;

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
        return view('admin.encounter.encounter-show');
    }
}
