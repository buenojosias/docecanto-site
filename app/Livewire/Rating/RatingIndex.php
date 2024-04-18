<?php

namespace App\Livewire\Rating;

use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class RatingIndex extends Component
{
    use WireUiActions;
    use WithPagination;

    public $ratings;
    public $showFormModal;

    public function mount()
    {
        $this->ratings = Rating::query()
            ->with(['member','lowestNote','highestNote'])
            ->whereRelation('member', 'status', 'Ativo')
            ->get()
            ->sortBy('member.name');
    }

    public function openFormModal()
    {
        $this->showFormModal = true;
    }



    public function render()
    {
        return view('livewire.rating.rating-index');
    }
}
