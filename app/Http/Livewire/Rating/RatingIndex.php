<?php

namespace App\Http\Livewire\Rating;

use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class RatingIndex extends Component
{
    use Actions;
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
