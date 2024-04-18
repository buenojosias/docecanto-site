<?php

namespace App\Livewire\Rating;

use Livewire\Component;

class RatingItem extends Component
{

    public $rating;
    public $showFormModal = false;


    public function mount($rating)
    {
        $this->rating = $rating;
    }

    public function render()
    {
        return view('livewire.rating.rating-item');
    }
}
