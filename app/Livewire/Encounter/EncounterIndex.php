<?php

namespace App\Livewire\Encounter;

use App\Models\Encounter;
use Livewire\Component;
use Livewire\WithPagination;
// use WireUi\Traits\WireUiActions;

class EncounterIndex extends Component
{
    // use WireUiActions;
    use WithPagination;

    public $date;
    public $filterDate;
    public $period;

    public function mount($period = 'proximos')
    {
        $this->period = $period;
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        $encounters = Encounter::query()
        ->when($this->filterDate, function ($query) {
            $query->whereDate('date', $this->filterDate);
        })
        ->when($this->period === 'proximos', function ($query) {
            $query
                ->whereDate('date', '>=', $this->date)
                ->orderBy('date', 'asc');
        })
        ->when($this->period === 'realizados', function ($query) {
            $query
                ->whereDate('date', '<=', $this->date)
                ->with('members')
                ->orderBy('date', 'desc');
        })
        ->paginate();

        return view('livewire.encounter.encounter-index', [
            'encounters' => $encounters
        ]);
    }
}
